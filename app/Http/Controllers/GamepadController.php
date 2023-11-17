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
            'consoles' => Console::all()
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
            'console_id' => 'required|exists:consoles,id',
            // Menambah validasi untuk gambar
        ]);

        $nama_foto = rand();
        $gambarPath = $request->file('gambar')->move('assets/images/gamepad', $nama_foto . '-' . $request->file('gambar')->getClientOriginalName());

        // Menambahkan nama file ke dalam $validateData
        $validateData['gambar'] = $nama_foto . '-' . $request->file('gambar')->getClientOriginalName();
        $validateData['console_id'] = $request->console_id;

        $allConsoles = Console::pluck('nama', 'id');
        $validateData['console_name'] = $allConsoles[$request->console_id];

        Gamepad::create($validateData);

        session()->flash('successedit', 'Berhasil Tambah Produk!');
        return redirect()->route('admin.gamepad');
    }


    public function edit($id)
    {
        return view('admin.crud.editGamepad', [
            'gamepads' => Gamepad::all()->where('id', $id)->first(),
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'console_id' => 'required',
        ]);
        $gamepad = Gamepad::findOrFail($id);
        if ($request->hasFile('gambar')) {
            //menghapus gambar sebelum diupdate
            $oldImage = public_path('assets/images/gamepad/' . $gamepad->gambar);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            // Unggah file gambar baru
            $nama_foto = rand();
            $gambarPath = $request->file('gambar')->move('assets/images/gamepad', $nama_foto . '-' . $request->file('gambar')->getClientOriginalName());
            $gamepad->gambar = $nama_foto . '-' . $request->file('gambar')->getClientOriginalName();
        }
        // Update other fields
        $gamepad->id_gamepad = $request->id_gamepad;
        $gamepad->nama = $request->nama;
        $gamepad->harga = $request->harga;
        $gamepad->stok = $request->stok;
        $gamepad->platform = $request->platform;
        $gamepad->console_id = $request->console_id;

        $gamepad->update();

        session()->flash('successedit', 'Berhasil Edit Produk!');
        return redirect()->route('admin.gamepad');
    }

    public function delete($id)
    {
        $gamepad = Gamepad::findOrFail($id);
        $gambarPath = public_path('assets/images/gamepad/' . $gamepad->gambar);
        if (file_exists($gambarPath)) {
            unlink($gambarPath);
        }
        $gamepad->delete();
        session()->flash('successhapus', 'Berhasil Hapus Produk!');
        return redirect()->route('admin.gamepad');
    }

}
