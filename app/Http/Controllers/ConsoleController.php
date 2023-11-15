<?php

namespace App\Http\Controllers;

use App\Models\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConsoleController extends Controller
{
    public function tambah()
    {
        return view('admin.crud.addConsole', [
            'console' => Console::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_console' => 'required|string|max:20',
            'nama' => 'required|string',
            'harga' => 'required|string',
            'stok' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Simpan gambar ke folder 'public/images/produk_add'
        $gambarPath = $request->file('gambar')->store('images','public');

        $validateData['gambar'] = $gambarPath;

        Console::create($validateData);

        session()->flash('successedit', 'Berhasil Tambah Produk!');
        return redirect()->route('admin.dataConsole');
    }


    public function edit($id)
    {
        return view('admin.crud.editConsole', [
            'consoles' => Console::all()->where('id', $id)->first(),
            // 'games' => Games::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_console' => 'required|string|max:20',
            'nama' => 'required|string',
            'harga' => 'required|string',
            'stok' => 'required|string',
            'gambar' => 'required|string'
        ]);

        $console = Console::findOrFail($id);
        $console->update([
            'id_console' => $request->id_console,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $request->gambar,
        ]);
        session()->flash('successedit', 'Berhasil Edit Produk!');
        return redirect()->route('admin.dataConsole');
    }

    public function delete($id)
    {
        $console = Console::findOrFail($id);
        Storage::delete('public/images/'.$console->gambar);
        $console->delete();
        session()->flash('successhapus', 'Berhasil Hapus Produk!');
        return redirect()->route('admin.dataConsole');
    }
}
