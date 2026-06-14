<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::resource('books', BookController::class); //resource controller untuks ales
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index'); //menampilkan data penjualan dengan sorting
Route::get ('/api-books',  function () { //route untuk menampilkan data buku dengan API
    return Inertia::render('ApiBooks/Index'); //menampilkan data buku dengan API
}); 