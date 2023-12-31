@extends('layouts.global')
@section('title')
    Data Produk - Admin
@endsection

@section('content')
    <div class="w-full flex">
        @include('components.sidebarAdmin')
        <div class="w-full h-full p-5 flex flex-col bg-slate-900">
            <div class="m-4 p-5 bg-white rounded-lg drop-shadow-md">
                <p class="text-4xl font-bold mb-4">List Data Produk</p>
                <hr><br>
                <div class="w-full h-auto flex justify-start">
                    <a href= "{{route('produk.add')}}" class="px-4 py-2 bg-green-600 rounded-md text text-white">Tambah Data</a>
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
                                    ID Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stok Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis Produk
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
                            @foreach ($produk as $p)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4">
                                        {{ $p->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $p->id_produk }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $p->nama }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $p->harga }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $p->stok }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $p->jenis }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $p->platform }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <img src="{{asset('assets/images/produk/'.$p->gambar)}}" alt="" class="w-full">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class=" flex w-full h-auto">
                                            <a href="{{ route('produk.edit', $p->id) }}">
                                                <button class="px-4 py-2 bg-yellow-300 rounded-md text"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg></button>
                                            </a>
                                            <form action="{{route('produk.delete', $p->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" onclick="return confirm('Yakin Ingin Hapus {{$p->nama}} ?')"
                                                    class="px-4 py-2 bg-red-600 rounded-md text text-white"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg></button>
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
