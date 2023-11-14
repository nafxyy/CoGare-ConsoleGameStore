{{-- Product Console Page --}}
@extends('layouts.global')
@section('title')
Gamepad
@endsection

@section('content')
    <div class="flex overflow-x-hidden">
        @include('components.sidebar')
        <div class="w-full">
            @include('components.navbar')

            <div class="w-full flex flex-col z-0 px-4 pt-[10%]">
                <h1 class="text-center text-4xl font-bold mb-8">LIST GAMEPAD</h1>

                {{-- Produk 1-5 --}}
                <div class="flex justify-center items-center text-white h-[500px] relative">
                    <div class="flex space-x-8 pt-0">
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="bg-slate-900 p-6 rounded-md text-center">
                                <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                                <p class="font-bold">PS 4</p>
                            </div>
                        @endfor
                    </div>
                </div>

                {{-- Produk 6-10 --}}
                <div class="flex justify-center items-center text-white h-[500px] relative mt-4">
                    <div class="flex space-x-8 pt-0">
                        @for ($i = 6; $i <= 10; $i++)
                            <div class="bg-slate-900 p-6 rounded-md text-center">
                                <img src="{{ asset('assets/images/ps5_banner.png') }}" alt="PS4" class="w-32 h-32 mb-4">
                                <p class="font-bold">PS 4</p>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
