{{-- Product Detail Page --}}
@extends('layouts.global')
@section('title')
Detail Produk
@endsection

@section('content')
    <div class="flex overflow-x-hidden">
        @include('components.sidebar')
        <div class="w-full">
            @include('components.navbar')

            <div class="container mx-auto mt-[150px] flex">
                {{-- Gambar Produk --}}
                <div class="flex-none w-1/2">
                    <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="Product Image" class="w-full h-auto">
                </div>

                {{-- Detail Produk --}}
                <div class="flex-auto ml-8">
                    <h1 class="text-3xl font-bold mb-4">PLAYSTATION 5 DISC EDITION</h1>
                    <p class="text-lg font-bold text-green-600 mb-4">Rp 1,000,000</p>
                    <p class="text-gray-500 mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minima fugit nesciunt ipsum sint similique provident magni, delectus mollitia officia, dolore rerum architecto porro? Tempora sequi enim, soluta maxime accusamus quidem.</p>

                    {{-- Add / Less Items --}}
                    <div class="flex items-center mb-4">
                        <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-l-md" onclick="kurangProduk()">-</button>
                        <input type="text" class="w-12 text-center" value="1" id="quantityInput">
                        <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-r-md" onclick="tambahProduk()">+</button>
                    </div>

                    {{-- Tambah Keranjang --}}
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md" onclick="tambahKeranjang()">Tambahkan ke Keranjang</button>
                </div>
            </div>

            {{-- List Gambar --}}
            <div class="flex justify-between mt-14 ml-14 mr-14">
                <div class="image-container rounded-md" onclick="gantiGambar('{{ asset('assets/images/ps5_banner.png') }}')">
                    <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="Product Image" class="w-32 h-32 cursor-pointer">
                </div>
                <div class="image-container rounded-md" onclick="gantiGambar('{{ asset('assets/images/ps5_banner.png') }}')">
                    <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="Product Image" class="w-32 h-32 cursor-pointer">
                </div>
                <div class="image-container rounded-md" onclick="gantiGambar('{{ asset('assets/images/ps5_banner.png') }}')">
                    <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="Product Image" class="w-32 h-32 cursor-pointer">
                </div>
                <div class="image-container rounded-md" onclick="gantiGambar('{{ asset('assets/images/ps5_banner.png') }}')">
                    <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="Product Image" class="w-32 h-32 cursor-pointer">
                </div>
            </div>

            {{-- Produk Lainnya --}}
            <div class="flex justify-center items-center text-white h-[450px] relative">
                <p class="absolute top-0 left-0 p-8 font-bold text-black text-2xl mt-12">Produk Lainnya</p>
                <div class="flex space-x-8 pt-0 mt-12">
                    <div class="bg-slate-900 p-6 rounded-md text-center">
                        <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                        <p class="font-bold">PS 4</p>
                    </div>
                    <div class="bg-slate-900 p-6 rounded-md text-center">
                        <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                        <p class="font-bold">PS 4</p>
                    </div>
                    <div class="bg-slate-900 p-6 rounded-md text-center">
                        <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                        <p class="font-bold">PS 4</p>
                    </div>
                    <div class="bg-slate-900 p-6 rounded-md text-center">
                        <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                        <p class="font-bold">PS 4</p>
                    </div>
                    <div class="bg-slate-900 p-6 rounded-md text-center">
                        <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                        <p class="font-bold">PS 4</p>
                    </div>
                    <div class="bg-slate-900 p-6 rounded-md text-center">
                        <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                        <p class="font-bold">PS 4</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function tambahProduk() {
            var quantityInput = document.getElementById('quantityInput');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function kurangProduk() {
            var quantityInput = document.getElementById('quantityInput');
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }

        function tambahKeranjang() {
            var quantity = document.getElementById('quantityInput').value;
            alert('Barang ditambahkan ke keranjang dengan jumlah: ' + quantity);
            // Lakukan logika tambahan sesuai kebutuhan, misalnya: kirim request ke backend, update keranjang, dll.
        }

        function gantiGambar(gambarPath) {
            var productImage = document.querySelector('.flex-none img');
            productImage.src = gambarPath;
        }
    </script>
@endsection
