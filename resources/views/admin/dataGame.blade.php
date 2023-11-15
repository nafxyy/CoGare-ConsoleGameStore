@extends('layouts.global')
@section('title')
    Data Game - Admin
@endsection

@section('content')
    <div class="w-full h-screen flex">
        @include('components.sidebarAdmin')
        <div class="w-full flex flex-col bg-slate-900">
            <div class="h-full m-4 p-8 bg-white rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4">List Data Games</p>
                <hr><br>
                <div class="w-full h-auto flex justify-start">
                    <a href= "{{route('game.add')}}" class="px-4 py-2 bg-green-600 rounded-md text text-white">Tambah Data</a>
                </div><br>
                @if(session('successhapus'))
                        <div class="w-full relative mb-6">
                            <div class="p-2 rounded-sm bg-green-100 ring-1 ring-green-500">
                                <p class="text-green-500">
                                    {{ session('successhapus') }}
                                </p>
                            </div>
                        </div>
                @endif
                @if(session('successtambah'))
                        <div class="w-full relative mb-6">
                            <div class="p-2 rounded-sm bg-green-100 ring-1 ring-green-500">
                                <p class="text-green-500">
                                    {{ session('successtambah') }}
                                </p>
                            </div>
                        </div>
                @endif
                @if(session('successedit'))
                        <div class="w-full relative mb-6">
                            <div class="p-2 rounded-sm bg-green-100 ring-1 ring-green-500">
                                <p class="text-green-500">
                                    {{ session('successedit') }}
                                </p>
                            </div>
                        </div>
                @endif
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-black">
                        <thead class="text-xs text-white uppercase bg-slate-900">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    ID Game
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Judul Game
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga Game
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stok Game
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Platform Game
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Gambar
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach ($console as $csl)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4">
                                        {{ $csl->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $csl->id_produk }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $csl->nama }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $csl->harga }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $csl->stok }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $csl->ukuran }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $csl->deskripsi }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $csl->kategori_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $csl->nama }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-full h-auto">
                                            <a href = "{{ route('admin.editConsole', $csl->id) }}" class="p-2 bg-blue-400 rounded-md hover:bg-blue-200 text-black">Edit</a>
                                            <form action="{{route('admin.delete', $csl->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="px-6 py-2 bg-red-600 rounded-md text text-white" onclick="return confirm('Apakah anda yakin Ingin Hapus Data?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
