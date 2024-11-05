<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
});

Route::get('/', function () {
    return view('welcome');
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

Route::get('/transactions', function () {
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

Route::get('/stock', function () {
    return view('stock');
});










