<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\KategoriController;

Route::resource('kategori', KategoriController::class);