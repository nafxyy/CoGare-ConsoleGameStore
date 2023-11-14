<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::get('/data/keranjang', function () {
    return view('data.keranjang');
})->name('data.keranjang');

Route::get('/data/console', function () {
    return view('data.console');
})->name('data.console');

Route::get('/data/gamepad', function () {
    return view('data.gamepad');
})->name('data.gamepad');

Route::get('/data/games', function () {
    return view('data.games');
})->name('data.games');

Route::get('/data/detail_produk', function () {
    return view('data.detail_produk');
})->name('data.detail_produk');
