<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Console;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
    	$console = Console::where('id', $id)->first();

    	return view('pesan.index', compact('console'));
    }
}
