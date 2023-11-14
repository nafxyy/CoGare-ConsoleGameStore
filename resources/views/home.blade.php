@extends('layouts.global')
@section('content')
<div class="flex">
    <div class="w-fit">
        @include('components.sidebar')
    </div>
    <div class="w-full flex-col">
        @include('components.navbar')
        @include('components.hero')
    </div>
</div>

    @include('components.produk')
    {{-- @include('components.address') --}}
    {{-- @include('components.contact') --}}
    {{-- @include('components.footer') --}}
@endsection
