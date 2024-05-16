@extends('layouts.app')
@section('template')
    @include('layouts.navigation')
    <nav class="fixed z-20 w-full bg-white mt-[60px] border-b-2">
        <div class="flex flex-row justify-between items-center w-full border-2 border-b-neutral-50 gap-8 md:gap-12 lg:gap-10 px-2 sm:px-4">
            <div class="flex justify-start items-center rtl:justify-end w-fit">
                <a href="{{ url('/') }}" class="flex flex-row justify-start items-center gap-3 lg:w-44 px-2 py-3">
                    <img src="{{ asset('logo-polinema.png') }}" alt="logo-polinema" class="w-10 h-10">
                    <span class="font-semibold text-sm text-neutral-900 sm:text-base">Warga Peduli</span>
                </a>
            </div>
            <div class="flex flex-row justify-end items-center px-2 py-3 w-full sm:px-4 gap-2">
                <a href="{{ url('/pengajuan') }}" class="px-3 sm:px-5 py-2 w-fit bg-white border-blue-500 border-2 rounded-md">
                    <span class="font-medium text-base text-blue-500">Pengajuan</span>
                </a>
                <a href="{{ url('/login') }}" class="px-3 sm:px-5 py-2 w-fit bg-blue-500 border-2 rounded-md">
                    <span class="font-medium text-base text-white">Login</span>
                </a>
            </div>
        </div>
    </nav>
    <div class="w-full">
        <img src="{{ asset('laia-nunez.jpg') }}" class="w-full h-[30rem]">
        <div class="absolute top-[60%] left-1/2 -translate-x-1/2 -translate-y-1/2 bg-neutral-950/70 px-4 py-2">
            <span class="text-base font-medium text-white">Website Desa</span>
            <p class="text-sm font-normal text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, id!</p>
        </div>
    </div>
@endsection
