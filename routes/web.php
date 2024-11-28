<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProdukController;


// Route untuk halaman utama
Route::get('/', function () {
        return view('home.home');
})->name('home.home');

// Route otentikasi admin
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Group route untuk admin dengan middleware otentikasi
//Route::middleware(['auth:admin'])->group(function () {
     // Route untuk dashboard admin
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Route CRUD untuk admin
        Route::prefix('admin')->name('admin.')->group(function () {
                Route::get('/', [AdminController::class, 'index'])->name('index');
                Route::get('/create', [AdminController::class, 'create'])->name('create');
                Route::post('/', [AdminController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit');
                Route::put('/{id}', [AdminController::class, 'update'])->name('update');
                Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy');
        });

        // Route CRUD untuk Barang Masuk
        Route::prefix('barang')->name('barang.')->group(function () {
                Route::get('/', [BarangController::class, 'index'])->name('index');
                Route::get('/create', [BarangController::class, 'create'])->name('create');
                Route::post('/', [BarangController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('edit');
                Route::put('/{id}', [BarangController::class, 'update'])->name('update');
                Route::delete('/{id}', [BarangController::class, 'destroy'])->name('destroy');
        });

        // Route CRUD untuk Produk
        Route::prefix('produk')->name('produk.')->group(function () {
                Route::get('/', [ProdukController::class, 'index'])->name('index');
                Route::get('/create', [ProdukController::class, 'create'])->name('create');
                Route::post('/', [ProdukController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [ProdukController::class, 'edit'])->name('edit');
                Route::put('/{id}', [ProdukController::class, 'update'])->name('update');
                Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('destroy');
        });

//});
