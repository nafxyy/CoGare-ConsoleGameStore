{{-- Product Console Page --}}
@extends('layouts.global')
@section('title')
Gamepad
@endsection

@section('content')
    <div class="flex overflow-x-hidden h-screen">
        @include('components.sidebar')
        <div class="w-full">
            @include('components.navbar')

            <div class="w-full flex flex-col z-0 px-4 pt-[12%]">
                <h1 class="text-4xl font-bold text-center mb-8">LIST GAMEPAD</h1>
                {{-- container 1 --}}
                <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-12">

                    @foreach ($produk->where('jenis', 'gamepad') as $pr)
                    <form action="{{ route('pesan') }}" method="get">
                        <div class="bg-slate-900 p-4 rounded-lg shadow-lg text-center text-white">
                            <img src="{{ asset('assets/images/produk/' . $pr->gambar) }}" alt="Console Games" class="w-full h-auto">
                            <h1 class="text-xl font-semibold mt-4">{{ $pr->nama }}</h1>
                            <p class="show4 mt-2">Rp. {{ $pr->harga }}</p>
                            <a href= "" type="submit" class="px-2 py-2 bg-yellow-700 rounded-lg">Masukkan Keranjang</a>
                        </div>
                    </form>


            @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
