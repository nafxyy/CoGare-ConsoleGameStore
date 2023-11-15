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
        return redirect()->route('admin.console');
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
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $console = Console::findOrFail($id);

    $console->id_console = $request->id_console;
    $console->nama = $request->nama;
    $console->harga = $request->harga;
    $console->stok = $request->stok;

    if ($request->hasFile('gambar')) {
        // Hapus file gambar lama
        Storage::delete('public/images/' . $console->gambar);

        // Unggah file gambar baru
        $gambarPath = $request->file('gambar')->store('images', 'public');
        $console->gambar = $gambarPath;
    }

    $console->save();

    session()->flash('successedit', 'Berhasil Edit Produk!');
    return redirect()->route('admin.console');
}


    public function delete($id)
    {
        $console = Console::findOrFail($id);
        Storage::delete('public/images/'.$console->gambar);
        $console->delete();
        session()->flash('successhapus', 'Berhasil Hapus Produk!');
        return redirect()->route('admin.console');
    }
}
