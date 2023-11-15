<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $path = public_path('assets/images/profil_user/');
        $gambarPath = $request->file('foto_profil')->move($path, $nama_foto . '-' . $request->file('foto_profil')->getClientOriginalName());

        $validateData['foto_profil'] = $gambarPath;
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
            $user = Auth::User();

            if ($user->role == 'admin') {
                return redirect('/admin/dashboardAdmin');
            } elseif ($user->role == 'user') {
                return redirect('/');
            }
        } else {
            session()->flash('error', 'Username atau Password anda salah!');
            return redirect('/auth/login');
        }
    }
}
