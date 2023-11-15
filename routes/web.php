<?php

use App\Models\Games;
use App\Models\Console;
use App\Models\Gamepad;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\GamepadController;

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



// ------ Login dan Register ---------- //
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

// ------ LOGOUT ----- //
Route::get('/logout', [
    AuthController::class, 'logout'
])->name('logout');

Route::middleware('auth')->group(function () {
    // ------ DATA ADMIN ------- //
    Route::get('/admin/dashboardAdmin', function () {
        return view('admin.dashboardAdmin');
    })->name('admin.dashboardAdmin');
    Route::get('/admin/dataConsole', function () {
        return view('admin.dataConsole',['console'=>Console::all()]);
    })->name('admin.console');
    Route::get('/admin/dataGame', function () {
        return view('admin.dataGame',['game'=>Games::all()]);
    })->name('admin.game');

    Route::get('/admin/dataGamepad', function () {
        return view('admin.dataGamepad',['game'=>Gamepad::all()]);
    })->name('admin.gamepad');

    Route::controller(ConsoleController::class)->group(function(){
        Route::get('/admin/console/tambah', 'tambah')->name('console.add');
        Route::post('/admin/console/tambah/action','store')->name('console.store');
        Route::get('/admin/console/edit/{id}', 'edit')->name('console.edit');
        Route::post('/admin/console/edit/{id}/action','update')->name('console.update');
        Route::post('/admin/console/delete/{id}/action', 'delete')->name('console.delete');
    });

    Route::controller(GameController::class)->group(function(){
        Route::get('/admin/game/tambah', 'tambah')->name('game.add');
        Route::post('/admin/game/tambah/action','store')->name('game.store');
        Route::get('/admin/game/edit/{id}', 'edit')->name('game.edit');
        Route::post('/admin/game/edit/{id}/action','update')->name('game.update');
        Route::post('/admin/game/delete/{id}/action', 'delete')->name('game.delete');
    });

    Route::controller(GamepadController::class)->group(function(){
        Route::get('/admin/gamepad/tambah', 'tambah')->name('gamepad.add');
        Route::post('/admin/gamepad/tambah/action','store')->name('gamepad.store');
        Route::get('/admin/gamepad/edit/{id}', 'edit')->name('gamepad.edit');
        Route::post('/admin/gamepad/edit/{id}/action','update')->name('gamepad.update');
        Route::post('/admin/gamepad/delete/{id}/action', 'delete')->name('gamepad.delete');
    });
});

// ------ DATA PRODUK ------- //
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









