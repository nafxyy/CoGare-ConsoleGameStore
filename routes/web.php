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


    Route::get('/admin/dataProduk', function () {
        return view('admin.dataProduk', ['produk' => Produk::all()]);
    })->name('admin.gamepad');

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
        Route::delete('/keranjang/remove/{id}', [KeranjangController::class, 'removeItem'])->name('keranjang.remove');
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
    return view(
        'data.keranjang', [
            'keranjang' => Keranjang::where('pesanan_id', $pesanan->id)->get(),
            'pesanan' => Pesanan::where('user_id', $userId)->where('status', 'belum_dibayar')->first()
        ]
    );
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

