@extends('layouts.global')
@section('title')
    CoGare- History Kosong
@endsection

@section('content')
    <div class="flex overflow-x-hidden h-full">
        @include('components.sidebar')
        <div class="w-full">
            @include('components.navbar')
            <div class="bg-gray-100 h-screen">
                <div class="w-full flex flex-col items-center justify-center z-0 px-4 pt-[15%]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-44 text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                    <h1 class="text-xl font-normal text-center mb-8 text-blue-500">NO DATA AVAILABLE</h1>
                    <h1 class="text-4xl font-bold text-center mb-8 text-black">{{$nama}} Belum Melakukan Order</h1>
                    <div></div>
                    <h2 class="font-bold text-base text-center mb-8 text-black">Order dulu atuh bang</h2>

                    <!-- Button -->
                    <a href="{{ route('data.console') }}" class= "bg-[#9bff21] hover:bg-green-400 text-black font-bold py-2 px-4 rounded-md shadow-md">Back to Menu</a>

                </div>
            </div>

        </div>
    </div>
@endsection
