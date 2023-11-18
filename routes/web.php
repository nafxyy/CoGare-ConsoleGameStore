<?php

use App\Models\User;
use App\Models\Games;
use App\Models\Produk;
use App\Models\Console;
use App\Models\Pesanan;
use App\Models\Keranjang;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\KeranjangController;

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
    return view('home', ['user' => User::all()], ['produk' => Produk::all()]);
})->name('home');



// ------ Login dan Register ---------- //
Route::get('/auth/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login/action', [
    AuthController::class,
    'loginAction'
])->name('login.action');

Route::get('/auth/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register/action', [
    AuthController::class,
    'registerAction'
])->name('register.action');

// ------ LOGOUT ----- //
Route::get('/logout', [
    AuthController::class,
    'logout'
])->name('logout');

Route::middleware('auth')->group(function () {
    // ------ DATA ADMIN ------- //
    Route::get('/admin/dashboardAdmin', function () {
        return view('admin.dashboardAdmin');
    })->name('admin.dashboardAdmin');
    Route::get('/admin/dataConsole', function () {
        return view('admin.dataConsole', ['console' => Console::all()]);
    })->name('admin.console');
    Route::get('/admin/dataGame', function () {
        return view('admin.dataGame', ['game' => Games::all()]);
    })->name('admin.game');

    Route::get('/admin/dataGamepad', function () {
        return view('admin.dataGamepad', ['produk' => Produk::all()]);
    })->name('admin.gamepad');

    // Route::controller(ConsoleController::class)->group(function(){
    //     Route::get('/admin/console/tambah', 'tambah')->name('console.add');
    //     Route::post('/admin/console/tambah/action','store')->name('console.store');
    //     Route::get('/admin/console/edit/{id}', 'edit')->name('console.edit');
    //     Route::post('/admin/console/edit/{id}/action','update')->name('console.update');
    //     Route::post('/admin/console/delete/{id}/action', 'delete')->name('console.delete');
    // });

    // Route::controller(GameController::class)->group(function(){
    //     Route::get('/admin/game/tambah', 'tambah')->name('game.add');
    //     Route::post('/admin/game/tambah/action','store')->name('game.store');
    //     Route::get('/admin/game/edit/{id}', 'edit')->name('game.edit');
    //     Route::post('/admin/game/edit/{id}/action','update')->name('game.update');
    //     Route::post('/admin/game/delete/{id}/action', 'delete')->name('game.delete');
    // });

    // Route::controller(GamepadController::class)->group(function(){
    //     Route::get('/admin/gamepad/tambah', 'tambah')->name('gamepad.add');
    //     Route::post('/admin/gamepad/tambah/action','store')->name('gamepad.store');
    //     Route::get('/admin/gamepad/edit/{id}', 'edit')->name('gamepad.edit');
    //     Route::post('/admin/gamepad/edit/{id}/action','update')->name('gamepad.update');
    //     Route::post('/admin/gamepad/delete/{id}/action', 'delete')->name('gamepad.delete');
    // });

    Route::controller(ProdukController::class)->group(function () {
        Route::get('/admin/produk/tambah', 'tambah')->name('produk.add');
        Route::post('/admin/produk/tambah/action', 'storeee')->name('produk.storeee');
        Route::get('/admin/produk/edit/{id}', 'edit')->name('produk.edit');
        Route::post('/admin/produk/edit/{id}/action', 'update')->name('produk.update');
        Route::post('/admin/produk/delete/{id}/action', 'delete')->name('produk.delete');
    });

    Route::controller(KeranjangController::class)->group(function () {
        Route::get('data/console/{id}', 'index')->name('keranjang.add');
        Route::post('data/console/{id}', 'pesan')->name('keranjang.pesan');
        Route::get('data/checkout', 'checkout')->name('keranjang.checkout');
        // Route::get('/data/keranjangedit/{id}', 'edit')->name('keranjang.edit');
        // Route::post('/data/keranjangedit/{id}/action','update')->name('keranjang.update');
        // Route::post('/data/keranjangdelete/{id}/action', 'delete')->name('keranjang.delete');
    });
});

// ------ DATA PRODUK USER ------- //
Route::get('/data/keranjang', function () {
    return view('data.keranjang');
})->name('data.keranjang');

Route::get('/data/checkout_sukses', function () {
    return view('data.checkout_sukses');
})->name('data.checkout_sukses');

Route::get('/data/stok_kosong', function () {
    return view('data.stok_kosong');
})->name('data.stok_kosong');

Route::get('/data/console', function () {
    return view('data.console', ['produk' => Produk::all()]);
})->name('data.console');

Route::get('/data/gamepad', function () {
    return view('data.gamepad', ['produk' => Produk::all()]);
})->name('data.gamepad');

Route::get('/data/games', function () {
    return view('data.games', ['produk' => Produk::all()]);
})->name('data.games');

Route::get('/data/detail_produk', function () {
    return view('data.detail_produk', ['produk' => Produk::all()]);
})->name('data.detail_produk');

// ------ SEARCH DATA ------- //
Route::get('/search', [SearchController::class, 'search'])->name('search');

// ------ PESAN ----------- //
Route::get('pesan/{id}', 'PesanController@index');

// Route::get('/data/keranjang', function () {
//     $userId = auth()->id();
//     return view('data.keranjang', ['pesanan'=>Pesanan::where('user_id', $userId)->get()]);
// })->name('data.keranjang');

Route::get('/data/keranjang', function () {
    $userId = auth()->id();
    $pesanan = Pesanan::where('user_id', $userId)->where('status', 'belum_dibayar')->first();
    if (empty($pesanan)) {
        $pesanan = new Pesanan;
        $pesanan->user_id = Auth::user()->id;
        $pesanan->tanggal = Carbon::now();
        $pesanan->status = 'belum_dibayar';
        $pesanan->jumlah_harga = 0;
        $pesanan->kode = mt_rand(100, 999);
        $pesanan->total_item = 0;
        $pesanan->save();
    }
    return view('data.keranjang', ['keranjang' => Keranjang::where('pesanan_id', $pesanan->id)->get(), 'pesanan' => $pesanan]);
})->name('data.keranjang');

Route::get('/data/history', function () {
    $userId = auth()->id();
    $pesanan_cek = Pesanan::where('user_id', $userId)->where('status', 'sudah_dibayar')->first();

    if (empty($pesanan_cek)) {
        return view('data.history_kosong', ['nama' => User::where('id', $userId)->first()->nama]);
    } else {
        $pesanan = Pesanan::where('user_id', $userId)->where('status', 'sudah_dibayar')->get();
        return view('data.history', ['history' => $pesanan]);
    }
})->name('data.history');

