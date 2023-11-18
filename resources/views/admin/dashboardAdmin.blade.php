@extends('layouts.global')
@section('title')
Dashboard - Staff
@endsection

@section('content')
<div class="w-full h-full flex">
    @include('components.sidebarAdmin')
    <div class="w-full h-screen flex gap-4 flex-col p-5 bg-slate-900">
        <div class="h-full mx-4 p-8 bg-white rounded-lg drop-shadow-md">
            <p class="text-7xl font-bold pl-80 pt-72">Coming Soon</p>
        </div>
    </div>
</div>
@endsection
