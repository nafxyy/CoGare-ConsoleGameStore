<?php

namespace App\Http\Controllers\API;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function getProduk(){
        $produk = Produk::all();
        $response = [
            'status' => 'success',
            'message'=>'Data Berhasil Diambil',
            'data'=> $produk
        ];
        return response()->json($response);
    }
}
