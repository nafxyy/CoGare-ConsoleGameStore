@extends('layouts.global')
@section('title')
    Data Gamepad - Admin
@endsection

@section('content')
    <div class="w-full h-screen flex">
        @include('components.sidebarAdmin')
        <div class="w-full flex flex-col bg-slate-900">
            <div class="h-full m-4 p-8 bg-white rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4">List Data Gamepad</p>
                <hr><br>
                <div class="w-full h-auto flex justify-start">
                    <a href= "{{route('gamepad.add')}}" class="px-4 py-2 bg-green-600 rounded-md text text-white">Tambah Data</a>
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
                                    ID Gamepad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Gamepad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga Gamepad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stok Gamepad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Platform
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Gambar
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gamepad as $gp)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4">
                                        {{ $gp->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $gp->id_gamepad }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $gp->nama }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $gp->harga }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $gp->stok }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $gp->platform }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $gp->gambar }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $gp->console_id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-full h-auto">
                                            <a href = "{{ route('gamepad.edit', $gp->id) }}" class="p-2 bg-blue-400 rounded-md hover:bg-blue-200 text-black">Edit</a>
                                            <form action="{{route('gamepad.delete', $gp->id)}}" method="post">
                                                @csrf
                                                <button type="submit" class="px-6 py-2 bg-red-600 rounded-md text text-white" onclick="return confirm('Apakah anda yakin Ingin Hapus Data?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
