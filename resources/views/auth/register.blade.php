@extends('layouts.global')

@section('title')
    Register | CoGare
@endsection

@section('content')
    <div class="flex bg-slate-800">
        <div class="flex flex-col w-full h-screen px-[10%] py-[2%]">
            <div class="w-full">
                <h1 class="text-lime-200 font-bold text-lg py-[3%]">CoGare</h1>
                <a href="{{route('login')}}"><button
                        class="bg-cyan-800 rounded-sm px-10 py-2 text-lime-200 font-bold">Login</button></a>
            </div>
            <div class="w-full h-full items-center">
                <img src="{{ asset('assets/images/vector-stik.png') }}" alt="" class="w-[80%] py-[15%]">
            </div>
        </div>
        <div class="flex flex-col w-full h-screen px-[10%] pt-[2%]">

            <h1 class="text-white font-bold text-3xl pt-[1%]">Register now</h1>
            <p class="text-white font-semibold text-sm pt-[2%]">Come and join us👋</p>
            <form action="{{ route('register.action') }}" method="POST" class="pt-[2%]  flex flex-col" enctype="multipart/form-data">
                @csrf
                @if(session('success'))
                    <div class="w-[70%] relative mb-6">
                        <div class="p-2 rounded-sm bg-green-100 ring-1 ring-green-500">
                            <p class="text-green-500">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                @endif
                @if (session('error'))
                    <div class="w-[70%] relative mb-6">
                        <div class="p-2 rounded-sm bg-red-800">
                            <p class="text-white">
                                {{ session('error') }}
                            </p>
                        </div>
                    </div>
                @endif
                <input type="text" value="user" name="role" hidden>
                <p class="py-[2%] text-white font-medium">Full Name</p>
                <input type="text" name="nama_asli" placeholder="Enter your full name"
                    class="py-[1%] pl-[2%] rounded-sm w-[70%] focus:outline-none focus:ring ring-slate-900">
                <p class="py-[2%] text-white font-medium">Username</p>
                <input type="text" name="username" placeholder="Enter your username"
                    class="py-[1%] pl-[2%] rounded-sm w-[70%] focus:outline-none focus:ring ring-slate-900">
                <p class="py-[2%] text-white font-medium">Email</p>
                <input type="email" name="email" placeholder="Enter your email"
                    class="py-[1%] pl-[2%] rounded-sm w-[70%] focus:outline-none focus:ring ring-slate-900">
                <p class="py-[2%] text-white font-medium">Password</p>
                <input type="password" name="password" placeholder="Enter your password"
                    class="py-[1%] pl-[2%] rounded-sm w-[70%] focus:outline-none focus:ring ring-slate-900">
                <p class="py-[2%] text-white font-medium">Confirm Password</p>
                <input type="password" name="confirm_password" placeholder="Confirm your password"
                    class="py-[1%] pl-[2%] rounded-sm w-[70%] focus:outline-none focus:ring ring-slate-900">
                <p class="py-[2%] text-white font-medium">Foto Profil</p>
                <input type="file" name="foto_profil"
                    class="py-[1%] rounded-sm w-[70%] focus:outline-none focus:ring ring-slate-900">
                <a href="#" class="text-lime-200 py-[2%] hover:font-semibold">Forgot Password?</a>
                <button type="submit" class="w-[70%] bg-cyan-800 rounded-sm">
                    <p class="py-[2%] font-bold text-lime-200">Register</p>
                </button>
            </form>
        </div>
    </div>
@endsection
