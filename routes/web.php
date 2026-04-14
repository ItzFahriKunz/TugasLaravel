<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('landing');
});

Route::resource('/siswa', App\Http\Controllers\SiswaController::class);
Route::resource('/penerbit', App\Http\Controllers\PenerbitController::class);
Route::resource('/penulis', App\Http\Controllers\PenulisController::class);
Route::resource('/petugas', App\Http\Controllers\PetugasController::class);
Route::resource('/buku', App\Http\Controllers\BukuController::class);
Route::resource('/pinjam', App\Http\Controllers\PinjamController::class);
