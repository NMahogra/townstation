<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BookController::class); //resource controller untuks ales
Route::resource('sales', SaleController::class);