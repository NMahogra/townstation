<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aController;

Route::get('/', function () {
    return view('tes.hello');
});

Route::get('/test', [aController::class, 'index']);
Route::get('/books', [aController::class, 'tes']);