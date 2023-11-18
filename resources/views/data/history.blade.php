@extends('layouts.global')
@section('title', 'History')

@section('content')
    <div class="flex overflow-x-hidden h-screen">
        @include('components.sidebar')
        <div class="w-full">
            @include('components.navbar')
            <div class="container mx-auto mt-8 ml-6 pt-[10%]">
                <h1 class="text-4xl font-bold mb-8">Keranjang Anda</h1>

                {{-- Item --}}
                @foreach ($history as $hs)

                <table class="table">
                    <tbody>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>Rp. {{$hs->jumlah_harga}}</td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td>:</td>
                            <td>{{$hs->total_item}}</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>{{ $hs->kode }}</td>
                        </tr>

                    </tbody>
                </table>
                @endforeach
            </div>
        </div>
    </div>
@endsection
