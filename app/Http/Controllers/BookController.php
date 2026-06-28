<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $books = Book::all();

    return Inertia::render('Books/Index', [
        'books' => $books
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create() //memanggil method create untuk menampilkan form tambah buku
    {
       return Inertia::render('Books/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //menyimpan data buku yang baru dibuat ke database
    {
        $request->validate([
    'title' => 'required',
    'author' => 'required',
    'price' => 'required|numeric'
]);

Book::create($request->only([
    'title',
    'author',
    'price'
]));

return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book) //menampilkan detail data buku yang dipilih
    {
        return Inertia::render('Books/Show', [
    'book' => $book
]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book) //menampilkan form edit buku dengan data buku yang akan diedit
    {
        return Inertia::render('Books/Edit', [
    'book' => $book
]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Book $book) //mengupdate data buku yang sudah diedit ke database
    {
        $request->validate([
    'title' => 'required',
    'author' => 'required',
    'price' => 'required|numeric'
]);

$book->update($request->only([
    'title',
    'author',
    'price'
]));

return redirect()->route('books.index');//mengembalikan ke halaman index setelah update data buku
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
