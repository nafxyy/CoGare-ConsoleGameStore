@extends('layouts.global')

@section('title')
Log In | CoGare
@endsection

@section('content')
    <div class="flex bg-slate-800">
        <div class="flex flex-col w-full h-screen px-[10%] py-[8%]">
            <h1 class="text-lime-200 font-bold text-lg">CoGare</h1>
            <h1 class="text-white font-bold text-3xl pt-[5%]">Login now</h1>
            <p class="text-white font-semibold text-sm pt-[2%]">Hi, Welcome back 👋</p>
            <form action="{{route('login.action')}}" method="POST" class="pt-[10%]  flex flex-col">
                @csrf
                @if (session('error'))
                    <div class="w-[60%] relative mb-6">
                        <div class="p-2 rounded-sm bg-red-800">
                            <p class="text-white">
                                {{ session('error') }}
                            </p>
                        </div>
                    </div>
                @endif
                <p class="py-[2%] text-white font-medium">Email</p>
                <input type="text" name="username" placeholder="Enter your username" class="py-[1%] pl-[2%] rounded-sm w-[60%] focus:outline-none focus:ring ring-slate-900">
                <p class="py-[2%] text-white font-medium">Password</p>
                <input type="password" name="password" placeholder="Enter your password" class="py-[1%] pl-[2%] rounded-sm w-[60%] focus:outline-none focus:ring ring-slate-900">
                <a href="#" class="text-lime-200 py-[2%] hover:font-semibold">Forgot Password?</a>
                <button type="submit" class="w-[60%] bg-cyan-800 rounded-sm"><p class="py-[2%] font-bold text-lime-200">Login</p></button>
            </form>
        </div>
        <div class="flex flex-col w-full h-screen px-[10%] py-[8%]">
            <div class="w-full flex justify-between">
                <p></p>
                <a href="{{route('register')}}"><button class="bg-cyan-800 rounded-sm px-10 py-2 text-lime-200 font-bold">Register</button></a>
            </div>
            <div class="w-full h-full items-center">
                <img src="{{asset('assets/images/vector-stik.png')}}" alt="" class="w-[80%] py-[15%]">
            </div>

        </div>
    </div>
@endsection
