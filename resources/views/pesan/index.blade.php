@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $produk->nama}}</li>
              </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('uploads') }}/{{ $produk->gambar }}" class="rounded mx-auto d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2>{{ $produk->nama }}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{$produk->harga}}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{$produk->stok}}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{ $produk->keterangan }}</td>
                                    </tr> --}}

                                    <tr>
                                        <td>Jumlah Pesan</td>
                                        <td>:</td>
                                        <td>
                                             <form method="post" action="{{ url('pesan') }}/{{ $produk->id_produk}}" >
                                            @csrf
                                                <input type="text" name="jumlah_pesan" class="form-control" required="">
                                                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Cart Page --}}
@extends('layouts.global')
@section('title', 'Keranjang')

@section('content')
    <div class="flex overflow-x-hidden">
        @include('components.sidebar')
        <div class="w-full">
            @include('components.navbar')
            <div class="container mx-auto mt-8 ml-6">
                <h1 class="text-4xl font-bold mb-8">Keranjang Anda</h1>
                {{-- Item --}}
                <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-4">
                    <div class="flex items-center">
                        <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="Product Image" class="w-20 h-20 mr-4">
                        <div>
                            <h2 class="text-xl font-semibold">PS 4</h2>
                            <p class="text-gray-500">Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                    <div class="flex items-center pr-20">
                        <p class="mr-2">Qty: 1</p>
                        <p class="text-green-600 font-bold">Rp 1,000,000</p>
                        <div class="pl-6">
                            <button class="bg-red-500 text-white px-2 py-1 mr-2 rounded-md">Remove</button>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-4">
                    <div class="flex items-center">
                        <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="Product Image" class="w-20 h-20 mr-4">
                        <div>
                            <h2 class="text-xl font-semibold">PS 4</h2>
                            <p class="text-gray-500">Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                    <div class="flex items-center pr-20">
                        <p class="mr-2">Qty: 1</p>
                        <p class="text-green-600 font-bold">Rp 1,000,000</p>
                        <div class="pl-6">
                            <button class="bg-red-500 text-white px-2 py-1 mr-2 rounded-md">Remove</button>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-4">
                    <div class="flex items-center">
                        <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="Product Image" class="w-20 h-20 mr-4">
                        <div>
                            <h2 class="text-xl font-semibold">PS 4</h2>
                            <p class="text-gray-500">Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                    <div class="flex items-center pr-20">
                        <p class="mr-2">Qty: 1</p>
                        <p class="text-green-600 font-bold">Rp 1,000,000</p>
                        <div class="pl-6">
                            <button class="bg-red-500 text-white px-2 py-1 mr-2 rounded-md">Remove</button>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-4">
                    <div class="flex items-center">
                        <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="Product Image" class="w-20 h-20 mr-4">
                        <div>
                            <h2 class="text-xl font-semibold">PS 4</h2>
                            <p class="text-gray-500">Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                    <div class="flex items-center pr-20">
                        <p class="mr-2">Qty: 1</p>
                        <p class="text-green-600 font-bold">Rp 1,000,000</p>
                        <div class="pl-6">
                            <button class="bg-red-500 text-white px-2 py-1 mr-2 rounded-md">Remove</button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-4">
                    <div class="flex items-center">
                        <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="Product Image" class="w-20 h-20 mr-4">
                        <div>
                            <h2 class="text-xl font-semibold">PS 4</h2>
                            <p class="text-gray-500">Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                    <div class="flex items-center pr-20">
                        <p class="mr-2">Qty: 1</p>
                        <p class="text-green-600 font-bold">Rp 1,000,000</p>
                        <div class="pl-6">
                            <button class="bg-red-500 text-white px-2 py-1 mr-2 rounded-md">Remove</button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center border-b border-gray-300 pb-4 mb-4">
                    <div class="flex items-center">
                        <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="Product Image" class="w-20 h-20 mr-4">
                        <div>
                            <h2 class="text-xl font-semibold">PS 4</h2>
                            <p class="text-gray-500">Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                    <div class="flex items-center pr-20">
                        <p class="mr-2">Qty: 1</p>
                        <p class="text-green-600 font-bold">Rp 1,000,000</p>
                        <div class="pl-6">
                            <button class="bg-red-500 text-white px-2 py-1 mr-2 rounded-md">Remove</button>
                        </div>
                    </div>
                </div>

                {{-- Total --}}
                <div class="flex justify-between mb-4 pr-20">
                    <div class="text-lg font-semibold">
                        <p class="mb-2">Total Quantity: 6</p>
                        <p class="text-xl font-bold">Total Price: Rp 6,000,000</p>
                    </div>
                    {{-- checkout button --}}
                    <div>
                        <a href="{{ route('data.checkout_sukses') }}" class="bg-blue-500 text-white w-20 h-11 rounded-md flex items-center justify-center">Checkout</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

