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
            'games' => Games::all()
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
            'console_id' => 'required',
            // Menambah validasi untuk gambar
        ]);

        $gambarPath = $request->file('gambar')->store('images','public');
        $validateData['gambar'] = $gambarPath;

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
            'gambar' => 'required|string',
            'console_id' => 'required',
        ]);

        $games = Games::findOrFail($id);
        $games->update([
            'id_game' => $request->id_game,
            'judul' => $request->judul,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'platform' => $request->platform,
            'console_id' => $request->console_id,
            'gambar' => $request->gambar,
        ]);
        session()->flash('successedit', 'Berhasil Edit Produk!');
        return redirect()->route('admin.game');
    }

    public function delete($id)
    {
        $games = Games::findOrFail($id);
        Storage::delete('public/images/'.$games->gambar);
        $games->delete();
        session()->flash('successhapus', 'Berhasil Hapus Produk!');
        return redirect()->route('admin.dataGame');
    }

}
