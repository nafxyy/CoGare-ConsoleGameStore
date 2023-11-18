@extends('layouts.global')
@section('title', 'Keranjang')

@section('content')
    <div class="flex overflow-x-hidden h-screen">
        @include('components.sidebar')
        <div class="w-full">
            @include('components.navbar')
            <div class="container mx-auto mt-8 ml-6 pt-[10%]">
                <h1 class="text-4xl font-bold mb-8">Keranjang Anda</h1>

                {{-- Item --}}
                @foreach ($keranjang as $ps)
                    <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-4">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/images/produk/' . $ps->produk->gambar) }}" alt="Product Image" class="w-20 h-20 mr-4">
                            <div>
                                <h2 class="text-xl font-semibold">{{ $ps->produk->nama }}</h2>
                                <p class="text-gray-500">{{ $ps->harga }}</p>
                            </div>
                        </div>
                        <div class="flex items-center pr-20">
                            <p class="mr-2">Qty: {{ $ps->jumlah_item }}</p>
                            <p class="text-green-600 font-bold">Rp {{ number_format($ps->jumlah_harga, 0, ',', '.') }}</p>
                            <div class="pl-6">
                                <button class="bg-red-500 text-white px-2 py-1 mr-2 rounded-md">Remove</button>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Total --}}
                <div class="flex justify-between mb-4 pr-20">
                    <div class="text-lg font-semibold">
                        <p class="mb-2">Total Item : {{ $pesanan->pluck('total_item')[0]}}</p>
                        <p class="text-xl font-bold">Total Price : Rp {{ number_format($pesanan->pluck('jumlah_harga')[0], 0, ',', '.')}},00</p>
                    </div>
                    {{-- checkout button --}}
                    <div>
                        <a href="{{ route('keranjang.checkout') }}" class="bg-blue-500 text-white w-20 h-11 rounded-md flex items-center justify-center">Checkout</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
