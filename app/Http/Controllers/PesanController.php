<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Produk;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
    	$produk = Produk::where('id_produk', $id)->first();

    	return view('pesan.index', compact('produk'));
    }
}
