@extends('layouts.global')

@section('title')
Log In - CoGare
@endsection

@section('content')
    <div class="flex bg-slate-800">
        <div class="flex flex-col w-full h-screen px-[10%] py-[3%]">
            <h1 class="text-lime-200 font-bold text-lg">CoGare</h1>
            <h1 class="text-white font-bold text-3xl pt-[5%]">Login now</h1>
            <p class="text-white font-semibold text-sm pt-[2%]">Hi, Welcome back 👋</p>
            <form action="" method="POST" class="pt-[5%]  flex flex-col">
                <p class="py-[2%] text-white font-medium">Email</p>
                <input type="text" name="email" placeholder="Enter your email" class="py-[1%] pl-[2%] rounded-sm w-[60%]">
                <p class="py-[2%] text-white font-medium">Password</p>
                <input type="password" name="password" placeholder="Enter your password" class="py-[1%] pl-[2%] rounded-sm w-[60%]">
                <a href="#" class="text-lime-200 py-[2%] hover:font-semibold">Forgot Password?</a>
                <button type="submit" class="w-[60%] bg-cyan-800 rounded-sm"><p class="py-[2%] font-bold text-lime-200">Login</p></button>
            </form>
        </div>
        <div class="flex flex-col w-full h-screen">
            
        </div>
    </div>
@endsection
