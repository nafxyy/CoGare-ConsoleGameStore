<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

//Login dan Register
Route::get('/auth/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login/action', [
    AuthController::class, 'loginAction'
])->name('login.action');

Route::get('/auth/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register/action', [
    AuthController::class, 'registerAction'
])->name('register.action');

Route::middleware('auth')->group(function () {
    //Dashboard Admin
    Route::get('/admin/dashboardAdmin', function () {
        return view('admin.dashboardAdmin');
    });
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
