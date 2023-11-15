<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerAction(Request $request) {
        // Periksa apakah password dan konfirmasi password cocok
        if ($request->password !== $request->confirm_password) {
            session()->flash('error', 'Konfirmasi password Anda salah!');
            return redirect('/auth/register');
        }

        // Periksa apakah username sudah digunakan
        $usernameExist = User::where('email', $request->email)->first();
        if ($usernameExist) {
            session()->flash('error', 'Username sudah digunakan!');
            return redirect('/auth/register');
        }
        //['role','username','password','nama_asli','email','foto_profil'];
        // Buat akun pengguna baru
        User::create([
            'role' => $request->role,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_asli' => $request->nama_asli,
            'email' => $request->email,
            'foto_profil' => $request->foto_profil,
        ]);

        session()->flash('success', 'Akun berhasil dibuat!');
        return redirect('/auth/signUp');
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
