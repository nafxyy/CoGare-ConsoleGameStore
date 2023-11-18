@extends('layouts.global')
@section('title', 'History')

@section('content')
    <div class="flex overflow-x-hidden h-screen">
        @include('components.sidebar')
        <div class="w-full">
            @include('components.navbar')
            <div class="container mx-auto mt-8 ml-6 pt-[10%]">
                <h1 class="text-4xl font-bold mb-8">Histori Transaksi {{ auth()->user()->username }}</h1>

                {{-- Item --}}
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">No.</th>
                                <th class="px-4 py-2">Harga</th>
                                <th class="px-4 py-2">Jumlah Item</th>
                                <th class="px-4 py-2">Tanggal Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $index => $hs)
                                <tr>
                                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2">Rp. {{ $hs->jumlah_harga }}</td>
                                    <td class="border px-4 py-2">{{ $hs->total_item }} Item</td>
                                    <td class="border px-4 py-2">{{ $hs->tanggal }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
