<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;    

class aController extends Controller
{
    public function index(){
        $data =   [ 
            'nama' => 'naufal',
        'umur' => 20,
        'kelamin' => 'laki-laki',
        'hobi' => ['mancing', 'main game', 'ngoding'],
        'alamat' => [
            'jalan' => 'jl. merdeka',
            'kota' => 'jakarta',
            'negara' => 'indonesia'
        ]
        ];
    
        return view('tes.hello', $data);
    }

 public function tes()
    {   
        $books = Book::all();

        return view('tes.hello', compact('books'));
    }
}