<?php

use App\Http\Controllers\bukuController;
use App\Http\Controllers\kategoriController;
use App\Models\buku;
use App\Models\kategori;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $bukus = buku::all();
    $kategoris = kategori::all();
    return view('dashboard.index', compact('bukus','kategoris'));
})->name('dashboard');

Route::prefix('master-data')->name('master.data.')->group(function(){
    Route::resource('kategori',kategoriController::class);
    Route::resource('buku',bukuController::class);
});