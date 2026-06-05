<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //menampilkan semua data buku
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //memanggil method create untuk menampilkan form tambah buku
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //menyimpan data buku yang baru dibuat ke database
    {
        Book::create([
             'title' => $request -> title,
            'author' => $request -> author,
            'price' => $request -> price
        ]);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book) //menampilkan detail data buku yang dipilih
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book) //menampilkan form edit buku dengan data buku yang akan diedit
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Book $book) //mengupdate data buku yang sudah diedit ke database
    {
        $book ->update([
        'title' => $request->title,
        'author' => $request->author,
        'price' => $request->price
    ]);

    return redirect()->route('books.index'); //mengembalikan ke halaman index setelah update data buku
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book) //menghapus data buku dari database
    {
        $book->delete();        
    return redirect()->route('books.index');
    }
}
