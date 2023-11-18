<?php

namespace App\Http\Controllers;


use App\Models\Games;
use App\Models\Produk;
use App\Models\Console;
use App\Models\Gamepad;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->get('search');
        $type = $request->get('type');

        // Lakukan pencarian sesuai jenis
        $result = Produk::where('jenis', $type)->where('nama', 'like', '%' . $keyword . '%')->get();
        return view('data.' . $type, [$type => $result, 'produk' => $result, ]);
    }

}
