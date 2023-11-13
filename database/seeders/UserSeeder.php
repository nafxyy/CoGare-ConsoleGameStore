<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id'=>'1',
                'role'=>'admin',
                'username'=>'ZARRR',
                'password'=>'123',
                'nama_asli'=>'Maezar',
                'email'=>'maezarabdillah01@gmail.com',
                'foto_profil'=>'image.jpg'
            ],
            [
                'id'=>'2',
                'role'=>'user',
                'username'=>'nafxyy',
                'password'=>'321',
                'nama_asli'=>'Naufal',
                'email'=>'naufal@gmail.com',
                'foto_profil'=>'image1.jpg'
            ]
        ];
        foreach($users as $user){
            User::create([
                'id'=>$user['id'],
                'role'=>$user['role'],
                'username'=>$user['username'],
                'password'=>$user['password'],
                'nama_asli'=>$user['nama_asli'],
                'email'=>$user['email'],
                'foto_profil'=>$user['foto_profil'],
            ]);
        }
    }
}
