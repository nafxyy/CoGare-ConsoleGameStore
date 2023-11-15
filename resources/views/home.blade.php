@extends('layouts.global')

@section('title')
CoGare | Your Favorite Games Store
@endsection

@section('content')
    <div class="w-full h-full flex">
            @include('components.sidebar')
        <div class="w-full flex flex-col">
            @include('components.navbar')
            @include('components.hero')
            @include('components.footer')
        </div>
    </div>



    @include('components.produk')
    {{-- @include('components.address') --}}
    {{-- @include('components.contact') --}}

@endsection
