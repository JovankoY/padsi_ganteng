<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Models\Transaksi;
use App\Http\Controllers\LaporanController;
use App\Models\Transaksi;

// Menampilkan form login
Route::get('login', [LoginController::class, 'tampilLogin'])->name('login');

// Mengirim data login
Route::post('login', [LoginController::class, 'submitLogin'])->name('login.submit');

// Rute untuk logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/menu', function () {
    return view('menu');
});

Route::get('transactions', function () {
    return view('transactions');
});

Route::get('/loyality', function () {
    return view('loyality');
});

Route::get('/laporan_penjualan', function () {
    return view('laporan.index');
Route::get('/laporan_penjualan', function () {
    return view('laporan.index');
});

Route::get('user', function () {
    return view('user');
});

Route::get('stock', function () {
    return view('stock');
});

// Tambahkan route resource untuk menus di bawah ini

Route::resource('menu', MenuController::class);
Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::delete('menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::put('menu/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');

Route::get('user', [UserController::class, 'index'])->name('user.index');
Route::post('/user', [MenuController::class, 'store'])->name('user.store');
Route::resource('user', UserController::class);
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('stock', [BahanController::class, 'index'])->name('stock.index');

// Rute untuk menampilkan halaman form untuk menambah stok baru
Route::get('/stock/create', [BahanController::class, 'create'])->name('stock.create');

// Rute untuk menyimpan stok baru (method POST)
Route::post('/stock', [BahanController::class, 'store'])->name('stock.store');

// Rute untuk menampilkan form edit stok (method GET)
Route::get('stock/{id}/edit', [BahanController::class, 'edit'])->name('stock.edit');

// Rute untuk memperbarui stok (method PUT)
Route::put('stock/{id}', [BahanController::class, 'update'])->name('stock.update');
Route::delete('/stock/{id}', [BahanController::class, 'destroy'])->name('stock.destroy');

Route::prefix('loyality')->name('loyality.')->group(function() {
    Route::get('/', [PelangganController::class, 'index'])->name('index');
    Route::get('create', [PelangganController::class, 'create'])->name('create');
    Route::post('store', [PelangganController::class, 'store'])->name('store');
    Route::post('redeem-referal', [PelangganController::class, 'redeemReferal'])->name('redeemReferal');
});
// web.php
Route::post('/redeem-referal', [PelangganController::class, 'redeemReferal'])->name('loyality.redeemReferal');



Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store']);
Route::get('/nota/{id}', [TransaksiController::class, 'showNota']);
Route::get('/nota/pdf/{id}', [NotaController::class, 'generatePdf']);


Route::get('laporan_penjualan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan_penjualan/{id}/detail', [LaporanController::class, 'showDetailPenjualan'])->name('laporan.penjualan.detail');
Route::get('/laporan_penjualan/{id}/pdf', [LaporanController::class, 'generatePDFJual'])->name('laporan.penjualan.pdf');

// Route::get('/loyality', [PelangganController::class, 'index'])->name('loyality.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
