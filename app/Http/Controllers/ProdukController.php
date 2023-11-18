<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdukController extends Controller
{
    public function tambah()
    {
        $endpoint = env('BASE_ENV').'/api/admin/crud/dataProduk';
        $data = Http::get($endpoint);
        return view('admin.crud.addProduk',[
        'produk'=>$data
        ]);
    }

    public function storeee(Request $request)
    {
        $validateData = $request->validate([
            'id_produk' => 'required|string|max:20',
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'platform' => 'required|string',
            'jenis' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Menambah validasi untuk gambar
        ]);

        $nama_foto = rand();
        $gambarPath = $request->file('gambar')->move('assets/images/produk', $nama_foto . '-' . $request->file('gambar')->getClientOriginalName());

        // Menambahkan nama file ke dalam $validateData
        $validateData['gambar'] = $nama_foto . '-' . $request->file('gambar')->getClientOriginalName();
        Produk::create($validateData);

        session()->flash('successedit', 'Berhasil Tambah Produk!');
        return redirect()->route('admin.gamepad');
    }


    public function edit($id)
    {
        return view('admin.crud.editProduk', [
            'produk' => Produk::all()->where('id', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_produk' => 'required|string|max:20',
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'platform' => 'required|string',
            'jenis' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $produk = Produk::findOrFail($id);
        $produk->id_produk = $request->id_produk;
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->jenis = $request->jenis;
        $produk->platform = $request->platform;
        $produk->stok = $request->stok;
        if ($request->hasFile('gambar')) {
            //menghapus gambar sebelum diupdate
            $oldImage = public_path('assets/images/produk/' . $produk->gambar);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            // Unggah file gambar baru
            $nama_foto = rand();
            $gambarPath = $request->file('gambar')->move('assets/images/produk', $nama_foto . '-' . $request->file('gambar')->getClientOriginalName());
            $produk->gambar = $nama_foto . '-' . $request->file('gambar')->getClientOriginalName();
            $produk->update();
        }
        else{
            $produk->update();
        }

        session()->flash('successedit', 'Berhasil Edit Produk!');
        return redirect()->route('admin.gamepad');
    }

    public function delete($id)
    {
        $produk = Produk::findOrFail($id);
        $gambarPath = public_path('assets/images/produk/' . $produk->gambar);
        if (file_exists($gambarPath)) {
            unlink($gambarPath);
        }
        $produk->delete();
        session()->flash('successhapus', 'Berhasil Hapus Produk!');
        return redirect()->route('admin.gamepad');
    }

    public function showDetailProduk($id) {
        $produk = Produk::find($id);
        return view('detail_produk', ['produk' => $produk]);
    }
}
