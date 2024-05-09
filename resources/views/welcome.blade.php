@extends('layouts.app')
@section('template')
    @include('layouts.navigation')
    <nav class="fixed z-20 w-full bg-white mt-[60px] border-b-2">
        <div class="flex flex-row justify-between items-center w-full border-2 border-[#F6F6F6] gap-8 md:gap-12 lg:gap-10 px-2 sm:px-4">
            <div class="flex justify-start items-center rtl:justify-end w-fit">
                <a href="{{ url('/') }}" class="flex flex-row justify-start items-center gap-3 lg:w-44 px-2 py-3">
                    <img src="{{ asset('logo-polinema.png') }}" alt="logo-polinema" class="w-10 h-10">
                    <span class="font-semibold text-sm text-[#1B1B1B] sm:text-base">Warga Peduli</span>
                </a>
            </div>
            <div class="flex flex-row justify-end items-center px-2 py-3 w-full sm:px-4 gap-2">
                <button type="button" class="px-5 py-2 w-fit bg-green border-[#0EA5E9] border-2 rounded-md">
                    <span class="font-medium text-base text-[#0EA5E9]">Pengajuan</span>
                </button>
                <a href="login" class="px-5 py-2 w-fit bg-[#0EA5E9] border-2 rounded-md">
                    <span class="font-medium text-base text-white">Login</span>
                </a>
            </div>
        </div>
    </nav>
    <div class="w-full">
        <img src="{{ asset('laia-nunez.jpg') }}" class="object-cover h-[30rem] w-full">
    </div>
@endsection
