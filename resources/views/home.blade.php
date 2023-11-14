@extends('layouts.global')
@section('content')
    <div class="w-full h-full flex">
            @include('components.sidebar')
        <div class="w-full flex flex-col">
            @include('components.navbar')
            @include('components.hero')
        </div>
    </div>



    @include('components.produk')
    {{-- @include('components.address') --}}
    {{-- @include('components.contact') --}}
    {{-- @include('components.footer') --}}
@endsection
