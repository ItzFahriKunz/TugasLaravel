<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('landing');
});

Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'siswatampil']);
Route::get('/siswa/tambah', [App\Http\Controllers\SiswaController::class, 'siswatambah']);
Route::post('/siswa/store', [App\Http\Controllers\SiswaController::class, 'siswastore']);
Route::get('/siswa/edit/{id}', [App\Http\Controllers\SiswaController::class, 'siswaedit']);
Route::post('/siswa/update', [App\Http\Controllers\SiswaController::class, 'siswaupdate']);
Route::get('/siswa/hapus/{id}', [App\Http\Controllers\SiswaController::class, 'siswahapus']);

Route::get('/penerbit', [App\Http\Controllers\PenerbitController::class, 'penerbittampil']);
Route::get('/penerbit/tambah', [App\Http\Controllers\PenerbitController::class, 'penerbittambah']);
Route::post('/penerbit/store', [App\Http\Controllers\PenerbitController::class, 'penerbitstore']);
Route::get('/penerbit/edit/{id}', [App\Http\Controllers\PenerbitController::class, 'penerbitedit']);
Route::post('/penerbit/update', [App\Http\Controllers\PenerbitController::class, 'penerbitupdate']);
Route::get('/penerbit/hapus/{id}', [App\Http\Controllers\PenerbitController::class, 'penerbithapus']);

Route::get('/penulis', [App\Http\Controllers\PenulisController::class, 'penulistampil']);
Route::get('/penulis/tambah', [App\Http\Controllers\PenulisController::class, 'penulistambah']);
Route::post('/penulis/store', [App\Http\Controllers\PenulisController::class, 'penulisstore']);
Route::get('/penulis/edit/{id}', [App\Http\Controllers\PenulisController::class, 'penulisedit']);
Route::post('/penulis/update', [App\Http\Controllers\PenulisController::class, 'penulisupdate']);
Route::get('/penulis/hapus/{id}', [App\Http\Controllers\PenulisController::class, 'penulushapus']);

Route::get('/petugas', [App\Http\Controllers\PetugasController::class, 'petugastampil']);
Route::get('/petugas/tambah', [App\Http\Controllers\PetugasController::class, 'petugastambah']);
Route::post('/petugas/store', [App\Http\Controllers\PetugasController::class, 'petugasstore']);
Route::get('/petugas/edit/{id}', [App\Http\Controllers\PetugasController::class, 'petugasedit']);
Route::post('/petugas/update', [App\Http\Controllers\PetugasController::class, 'petugasupdate']);
Route::get('/petugas/hapus/{id}', [App\Http\Controllers\PetugasController::class, 'petugashapus']);

Route::get('/buku', [App\Http\Controllers\BukuController::class, 'bukutampil']);
Route::get('/buku/tambah', [App\Http\Controllers\BukuController::class, 'bukutambah']);
Route::post('/buku/store', [App\Http\Controllers\BukuController::class, 'bukustore']);
Route::get('/buku/edit/{id}', [App\Http\Controllers\BukuController::class, 'bukuedit']);
Route::post('/buku/update', [App\Http\Controllers\BukuController::class, 'bukuupdate']);
Route::get('/buku/hapus/{id}', [App\Http\Controllers\BukuController::class, 'bukuhapus']);

Route::get('/pinjam', [App\Http\Controllers\PinjamController::class, 'pinjamtampil']);
Route::get('/pinjam/tambah', [App\Http\Controllers\PinjamController::class, 'pinjamtambah']);
Route::post('/pinjam/store', [App\Http\Controllers\PinjamController::class, 'pinjamstore']);
Route::get('/pinjam/edit/{id}', [App\Http\Controllers\PinjamController::class, 'pinjamedit']);
Route::post('/pinjam/update', [App\Http\Controllers\PinjamController::class, 'pinjamupdate']);
Route::get('/pinjam/hapus/{id}', [App\Http\Controllers\PinjamController::class, 'pinjamhapus']);