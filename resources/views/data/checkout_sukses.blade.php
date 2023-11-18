@extends('layouts.global')
@section('title')
    CoGare - Checkout Sukses
@endsection

@section('content')
    <div class="flex overflow-x-hidden h-full">
        @include('components.sidebar')
        <div class="w-full">
            @include('components.navbar')

            <div class="bg-gray-100 h-screen">
                <div class="w-full flex flex-col items-center justify-center z-0 px-4 pt-[15%]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-56 text-green-600 items-center">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>
                    <h1 class="text-xl font-normal text-center mb-8 text-blue-500">CHECKOUT BERHASIL!</h1>
                    <h1 class="text-4xl font-bold text-center mb-8 text-black">Pesanan Anda Diterima!</h1>
                    <div></div>
                    <h2 class="font-bold text-base text-center mb-8 text-black">Terima kasih telah melakukan pembelian di CoGare Game Store. Semoga berkah selalu</h2>

                    <!-- Button -->
                    <a href="{{ route('home') }}" class= "bg-[#9bff21] hover:bg-green-400 text-black font-bold py-2 px-4 rounded-md shadow-md">Continue Shopping</a>

                </div>
            </div>

        </div>
    </div>
@endsection
