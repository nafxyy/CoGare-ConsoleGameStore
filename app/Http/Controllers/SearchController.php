<?php

namespace App\Http\Controllers;


use App\Models\Console;
use App\Models\Games;
use App\Models\Gamepad;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->get('search');
        $type = $request->get('type');

        // Lakukan pencarian sesuai jenis
        if ($type === 'console') {
            $result = Console::where('nama', 'like', '%' . $keyword . '%')->get();
        } if ($type === 'games') {
            $result = Games::where('judul', 'like', '%' . $keyword . '%')->get();
        } if ($type === 'gamepad') {
            $result = Gamepad::where('nama', 'like', '%' . $keyword . '%')->get();
        }

        return view('data.' . $type, [$type => $result, 'type' => $type]);
    }

}
