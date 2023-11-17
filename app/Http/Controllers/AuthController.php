<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerAction(Request $request) {
        // Periksa apakah password dan konfirmasi password cocok
        if ($request->password !== $request->confirm_password) {
            session()->flash('error', 'Konfirmasi password Anda salah!');
            return redirect('/auth/register');
        }

        // Periksa apakah email sudah digunakan
        $emailExist = User::where('email', $request->email)->first();
        if ($emailExist) {
            session()->flash('error', 'Email sudah digunakan!');
            return redirect('/auth/register');
        }

        //['role','username','password','nama_asli','email','foto_profil'];
        $validateData = $request->validate([
            'role' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'nama_asli' => 'required|string',
            'email' => 'required|string',
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            // Menambah validasi untuk gambar
        ]);

        // Simpan gambar ke folder
        $nama_foto = rand();
        $gambarPath = $request->file('foto_profil')->move('assets/images/profil_user', $nama_foto . '-' . $request->file('foto_profil')->getClientOriginalName());

        $validateData['foto_profil'] = $nama_foto . '-' . $request->file('foto_profil')->getClientOriginalName();
        $validateData['password'] = Hash::make($request->password);
        User::create($validateData);

        session()->flash('success', 'Akun berhasil dibuat!');
        return redirect('/auth/login');
    }
    public function loginAction(Request $request) {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect('/admin/dashboardAdmin');
            } elseif ($user->role == 'user') {
                // Cek apakah pesanan belum ada dengan status belum dibayar
                $pesananBelumDibayar = Pesanan::where([
                    'user_id' => $user->id,
                    'status' => 'belum dibayar',
                ])->first();

                if (!$pesananBelumDibayar) {
                    // Jika pesanan belum ada, buat pesanan baru
                    $kodeUnik = rand(0,10);
                    $tanggalSekarang = now();

                    $pesananBaru = Pesanan::create([
                        'user_id' => $user->id,
                        'tanggal' => $tanggalSekarang,
                        'status' => 'belum dibayar',
                        'kode' => $kodeUnik,
                        'jumlah_harga' => 0,
                        'total_item' => 0,
                    ]);

                    // Lakukan redirect atau tampilkan pesan sesuai kebutuhan
                    return redirect('/');
                } else {
                    // Redirect ke halaman utama jika pesanan sudah ada
                    return redirect('/');
                }
            }
        } else {
            session()->flash('error', 'Username atau Password anda salah!');
            return redirect('/auth/login');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
