<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController; // Import MenuController di sini
use App\Http\Controllers\UserController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

// Menampilkan form login
Route::get('/login', [LoginController::class, 'tampilLogin'])->name('login');

// Mengirim data login
Route::post('/login', [LoginController::class, 'submitLogin'])->name('login.submit');

// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
});

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

Route::get('/user', function () {
    return view('user');
});

Route::get('stock', function () {
    return view('stock');
});

// Tambahkan route resource untuk menus di bawah ini

Route::resource('menu', MenuController::class);
Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::get('stock', [BahanController::class, 'index'])->name('stock.index');
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/statement', [NotaController::class, 'index'])->name('statement.index');
Route::get('/loyality', [PelangganController::class, 'index'])->name('loyality.index');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('user', [UserController::class, 'index'])->name('user');
});

Route::get('dashboard', function () {return view('dashboard.dashboard');})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
