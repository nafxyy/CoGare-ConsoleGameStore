@extends('layouts.global')

@section('title')
    Dashboard - Admin
@endsection

@section('content')
    <div class="w-full h-full flex">
        @include('components.sidebarAdmin')
        <div class="w-full flex flex-col bg-slate-100">
            <div class="h-screen mx-5 my-2 p-8 bg-gradient-to-br from-gray-400 via-gray-700 to-gray-900 rounded-lg drop-shadow-md">
                <div class="w-full flex justify-between items-center mb-3">
                    <h1 class="text-2xl font-bold">Selamat Datang Admin {{auth()->user()->username}} !</h1>
                    <img src="{{asset('assets/images/profil_user/'.auth()->user()->foto_profil)}}" alt="Profil" class="rounded-full w-12 h-12 object-cover">
                </div>

                <a href="{{route('admin.gamepad')}}">
                    <button class="w-full text-white bg-slate-800 h-1/3 rounded-lg text-xl font-bold">
                        Masuk Ke Menu Manajemen Data Produk!
                    </button>
                </a>
                <div class="flex pt-[3%] justify-center">
                    <div class="w-1/4 bg-slate-800 h-[300px] flex flex-col items-center rounded-lg shadow-lg shadow-black justify-center mx-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[30%] h-[30%] absolute text-slate-400 opacity-25">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125z" />
                          </svg>

                        <h1 class="text-lg font-bold text-white">Jumlah Data Console</h1>

                        <h1 class="text-9xl text-white">{{ \App\Models\Produk::where('jenis', '=', 'console')->count() }}</h1>
                    </div>
                    <div class="w-1/4 bg-slate-800 h-[300px] flex flex-col items-center rounded-lg shadow-lg shadow-black justify-center mx-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[30%] h-[30%] absolute text-slate-400 opacity-25">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                          </svg>

                        <h1 class="text-lg font-bold text-white">Jumlah Data Gamepad</h1>
                        <h1 class="text-9xl text-white">{{ \App\Models\Produk::where('jenis', '=', 'gamepad')->count() }}</h1>
                    </div>
                    <div class="w-1/4 bg-slate-800 h-[300px] flex flex-col items-center rounded-lg shadow-lg shadow-black justify-center mx-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[30%] h-[30%] absolute text-slate-400 opacity-25">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                          </svg>


                        <h1 class="text-lg font-bold text-white">Jumlah Data Games</h1>
                        <h1 class="text-9xl text-white">{{ \App\Models\Produk::where('jenis', '=', 'games')->count() }}</h1>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
