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
use App\Http\Controllers\HomeController;

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

Route::get('/statement', function () {
    return view('statement');
});

Route::get('user', function () {
    return view('user');
});

Route::get('stock', function () {
    return view('stock');
});

// Tambahkan route resource untuk menus di bawah ini

Route::resource('menu', MenuController::class);
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::delete('menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::put('menu/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');

Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user', [MenuController::class, 'store'])->name('user.store');
Route::resource('user', UserController::class);
Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');


// // Rute untuk halaman index bahan
// Route::get('stock', [BahanController::class, 'index'])->name('stock.index');
// Route::post('stock', [BahanController::class, 'store'])->name('stock.store');
// // Rute untuk halaman create bahan
// Route::get('stock/create', [BahanController::class, 'create'])->name('stock.create');

// // Rute untuk halaman edit bahan
// Route::get('stock/edit/{id?}', [BahanController::class, 'edit'])->name('stock.edit');  // Optional ID

// // Rute untuk proses update bahan
// Route::put('stock/{id}', [BahanController::class, 'update'])->name('stock.update');

// // Rute untuk proses hapus bahan
// Route::delete('stock/{id}', [BahanController::class, 'destroy'])->name('stock.destroy');

// Rute untuk menampilkan daftar bahan
Route::get('stock', [BahanController::class, 'index'])->name('stock.index');

// Rute untuk menampilkan halaman form untuk menambah stok baru
Route::get('/stock/create', [BahanController::class, 'create'])->name('stock.create');

// Rute untuk menyimpan stok baru (method POST)
Route::post('/stock', [BahanController::class, 'store'])->name('stock.store');

// Rute untuk menampilkan form edit stok (method GET)
Route::get('stock/{id}/edit', [BahanController::class, 'edit'])->name('stock.edit');

// Rute untuk memperbarui stok (method PUT)
Route::put('stock/{id}', [BahanController::class, 'update'])->name('stock.update');
Route::delete('/stock/{id_stok}', [BahanController::class, 'destroy'])->name('stock.destroy');


Route::get('/loyality', [PelangganController::class, 'index'])->name('loyality.index');
Route::get('/loyality/create', [PelangganController::class, 'create'])->name('loyality.create');
Route::post('/loyality', [PelangganController::class, 'store'])->name('loyality.store');


Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

Route::get('/statement', [NotaController::class, 'index'])->name('statement.index');
Route::get('/loyality', [PelangganController::class, 'index'])->name('loyality.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
