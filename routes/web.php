<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\buku;
use App\Models\kategori;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     $bukus = buku::all();
//     $kategoris = kategori::all();
//     return view('dashboard.index', compact('bukus', 'kategoris'));
// })->name('dashboard');


Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('Unauthorized', [AuthController::class, 'unauthorized'])->name('unauthorized');

Route::middleware(['auth'])->prefix('master-data')->name('master.data.')->group(function () {
    Route::resource('kategori', KategoriController::class)->middleware([RoleMiddleware::class . ':super_admin']);

    Route::middleware([RoleMiddleware::class . ':super_admin,admin'])->prefix('buku')->name('buku.')->group(function () {
        Route::get('/', [bukuController::class, 'index'])->name('index');
        Route::get('/create', [bukuController::class, 'create'])->name('create');
        Route::get('/show/{buku}', [bukuController::class, 'show'])->name('show');
        Route::post('/store', [bukuController::class, 'store'])->name('store');
        Route::get('/{buku}/edit', [bukuController::class, 'edit'])->name('edit');
        Route::put('/{buku}', [bukuController::class, 'update'])->name('update');
        Route::delete('/{buku}', [bukuController::class, 'destroy'])->name('destroy');
    });
    Route::middleware([RoleMiddleware::class . ':super_admin'])->prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });
});





// Route::prefix('master-data')->name('master.data.')->group(function () {
//     Route::resource('kategori', kategoriController::class);
//     Route::resource('buku', bukuController::class);


//     Route::prefix('user')->name('user.')->group(function () {
//         Route::get('/', [UserController::class, 'index'])->name('index');
//         Route::get('/create', [UserController::class, 'create'])->name('create');
//         Route::post('/store', [UserController::class, 'store'])->name('store');
//         Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
//         Route::put('/{user}', [UserController::class, 'update'])->name('update');
//         Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
//     });
// });
