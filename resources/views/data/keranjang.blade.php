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

                {{-- Total --}}
                <div class="flex justify-between mb-4 pr-20">
                    <div class="text-lg font-semibold">
                        <p class="mb-2">Total Quantity: 4</p>
                        <p class="text-xl font-bold">Total Price: Rp 4,000,000</p>
                    </div>
                    {{-- checkout button --}}
                    <div>
                        <button class="bg-blue-500 text-white w-20 h-11 rounded-md">Checkout</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
