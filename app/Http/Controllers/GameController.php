<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function tambah()
    {
        return view('admin.crud.addGame', [
            'consoles' => Console::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_game' => 'required|string|max:20',
            'judul' => 'required|string',
            'harga' => 'required|string',
            'stok' => 'required|string',
            'platform' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'console_id' => 'required|exists:consoles,id',
        ]);

        // $gambarPath = $request->file('gambar')->store('images', 'public');
        $validateData['console_id'] = $request->console_id;

        $allConsoles = Console::pluck('nama', 'id');
        $validateData['console_name'] = $allConsoles[$request->console_id];

        Games::create($validateData);

        session()->flash('successedit', 'Berhasil Tambah Produk!');
        return redirect()->route('admin.game');
    }


    public function edit($id)
    {
        return view('admin.crud.editGame', [
            'games' => Games::all()->where('id', $id)->first(),
            'consoles' => Console::all(),
        ]);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'id_game' => 'required|string|max:20',
        'judul' => 'required|string',
        'harga' => 'required|string',
        'stok' => 'required|string',
        'platform' => 'required|string',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'console_id' => 'required|exists:consoles,id',
    ]);

    $games = Games::findOrFail($id);

    if ($request->hasFile('gambar')) {
        Storage::delete('public/images/' . $games->gambar);
        $games->gambar = $request->file('gambar')->store('images', 'public');
    }

    // Update other fields
    $games->id_game = $request->id_game;
    $games->judul = $request->judul;
    $games->harga = $request->harga;
    $games->stok = $request->stok;
    $games->platform = $request->platform;
    $games->console_id = $request->console_id;

    $games->save();

    session()->flash('successedit', 'Berhasil Edit Produk!');
    return redirect()->route('admin.game');
}

    public function delete($id)
    {
        $games = Games::findOrFail($id);
        Storage::delete('public/images/' . $games->gambar);
        $games->delete();
        session()->flash('successhapus', 'Berhasil Hapus Produk!');
        return redirect()->route('admin.game');
    }

}
