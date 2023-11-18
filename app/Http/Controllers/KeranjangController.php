<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Keranjang;
use App\Models\User;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{

    public function index($id)
    {
    	$produk = Produk::where('id', $id)->first();

    	return view('pesan.index', compact('produk'));
    }

    public function pesan(Request $request, $id)
    {
    	$produk = Produk::where('id', $id)->first();
    	$tanggal = Carbon::now();

    	$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 'belum_dibayar')->first();
    	if(empty($cek_pesanan))
    	{
    		$pesanan = new Pesanan;
	    	$pesanan->user_id = Auth::user()->id;
	    	$pesanan->tanggal = $tanggal;
	    	$pesanan->status = 'belum_dibayar';
	    	$pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->total_item = 0;
	    	$pesanan->save();
    	}

    	$pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status','belum_dibayar')->first();

    	$cek_pesanan_detail = Keranjang::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if($produk->stok > 0){
    	if(empty($cek_pesanan_detail))
    	{
    		$pesanan_detail = new Keranjang;
	    	$pesanan_detail->produk_id = $produk->id;
	    	$pesanan_detail->pesanan_id = $pesanan_baru->id;
	    	$pesanan_detail->jumlah_item = $request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $produk->harga*$request->jumlah_pesan;
	    	$pesanan_detail->save();
    	}else
    	{
            $pesanan_detail = Keranjang::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();

            if($pesanan_detail->jumlah_item + $request->jumlah_pesan > $produk->stok)
            {
    		return redirect('data/console');
    	}

    		$pesanan_detail->jumlah_item = $pesanan_detail->jumlah_item+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_pesanan_detail_baru = $produk->harga*$request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
	    	$pesanan_detail->update();
    	}

    	//jumlah total
    	$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status','belum_dibayar')->first();
    	$pesanan->jumlah_harga = $pesanan->jumlah_harga+$produk->harga*$request->jumlah_pesan;
    	$pesanan->total_item = $pesanan->total_item+$request->jumlah_pesan;
    	$pesanan->update();

        session()->flash('successedit', 'Berhasil Tambah Produk!');
        return redirect()->route('data.keranjang');
        }
    return redirect()->route('data.stok_kosong');
    }

    public function checkout()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status','belum_dibayar')->first();
 	    $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = Keranjang::where('pesanan_id', $pesanan->id)->first();

            $produk = Produk::where('id', $pesanan_details->produk_id)->first();
            $produk->stok = $produk->stok-$pesanan_details->jumlah_item;
            $produk->update();
            $pesanan->status = 'sudah_dibayar';
            $pesanan->update();

        }

        return view('data.checkout_sukses');
    }

    public function removeItem($id)
    {
        $keranjangItem = Keranjang::find($id);

        if ($keranjangItem) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status','belum_dibayar')->first();
            $pesanan->total_item -= $keranjangItem->jumlah_item;
            $pesanan->jumlah_harga -= $keranjangItem->jumlah_harga;
            $pesanan->update();
            $keranjangItem->delete();
            return redirect()->back()->with('success', 'Berhasil Hapus Item');
        }

        return redirect()->back()->with('error', 'Item tidak Ditemukan');
    }
}
