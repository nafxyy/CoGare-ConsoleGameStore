<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\Gamepad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GamepadController extends Controller
{
    public function tambah()
    {
        return view('admin.crud.addGamepad', [
            'gamepad' => Gamepad::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_gamepad' => 'required|string|max:20',
            'nama' => 'required|string',
            'harga' => 'required|string',
            'stok' => 'required|string',
            'platform' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'console_id' => 'required',
            // Menambah validasi untuk gambar
        ]);

        $gambarPath = $request->file('gambar')->store('images','public');
        $validateData['gambar'] = $gambarPath;

        Gamepad::create($validateData);

        session()->flash('successedit', 'Berhasil Tambah Produk!');
        return redirect()->route('admin.dataGamepad');
    }


    public function edit($id)
    {
        return view('admin.crud.editGamepad', [
            'games' => Gamepad::all()->where('id', $id)->first(),
            'consoles' => Console::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_gamepad' => 'required|string|max:20',
            'nama' => 'required|string',
            'harga' => 'required|string',
            'stok' => 'required|string',
            'platform' => 'required|string',
            'gambar' => 'required|string',
            'console_id' => 'required',
        ]);

        $gamepad = Gamepad::findOrFail($id);
        $gamepad->update([
            'id_gamepad' => $request->id_gamepad,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'platform' => $request->platform,
            'console_id' => $request->console_id,
            'gambar' => $request->gambar,
        ]);
        session()->flash('successedit', 'Berhasil Edit Produk!');
        return redirect()->route('admin.dataGamepad');
    }

    public function delete($id)
    {
        $gamepad = Gamepad::findOrFail($id);
        Storage::delete('public/images/'.$gamepad->gambar);
        $gamepad->delete();
        session()->flash('successhapus', 'Berhasil Hapus Produk!');
        return redirect()->route('admin.dataGamepad');
    }
}
