<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index'])->name('index');         // Menampilkan daftar buku
Route::get('/create', [BookController::class, 'create'])->name('create'); // Menampilkan form tambah buku
Route::post('/', [BookController::class, 'store'])->name('store');          // Menyimpan buku baru
Route::get('/{id}/edit', [BookController::class, 'edit'])->name('edit');  // Menampilkan form edit buku
Route::put('/{id}', [BookController::class, 'update'])->name('update');  // Mengupdate buku
Route::delete('//{id}', [BookController::class, 'destroy'])->name('destroy');  // Menghapus buku

