@extends('layouts.app')
@section('template')
@include('layouts.navigation')
<div class="font-[sans-serif] text-[#333] h-screen w-screen">
    <div class="min-w-screen min-h-screen flex fle-col items-center justify-center py-6 px-4">
        @if(Session::has('failed'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                <span class="font-medium">{{ Session::get('failed')}}</span>
            </div>
        @endif
        <div class="grid md:grid-cols-2 items-center gap-4 max-w-7xl w-full">
            <div class="lg:h-[400px] md:h-[300px] max-md:mt-10 ml-20">
                <img src="https://readymadeui.com/login-image.webp" class="w-full h-full object-cover" alt="Dining Experience" />
            </div>
            <form method="post" action="{{ url('/') }}" class="max-w-md border border-gray-300 rounded-md p-6 shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto ml-20">
                @csrf
                <div class="mb-5">
                    <h3 class="text-3xl font-extrabold">Sign in</h3>
                    <p class="text-sm mt-5 font-bold">Login Bro</p>
                </div>
                <div>
                    <label class="text-sm mb-2 block">Nomor KK mu piro</label>
                    <div class="relative flex items-center">
                        <input name="username" type="text" required class="w-full text-sm border border-gray-300 px-4 py-3 rounded-md outline-[#333]" placeholder="Enter user name" />
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                            <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                            <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <label class="text-sm mb-2 mt-2 block">Passwordmu Opo</label>
                    <div class="relative flex items-center">
                        <input name="password" type="password" required class="w-full text-sm border border-gray-300 px-4 py-3 rounded-md outline-[#333]" placeholder="Enter password" />
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                            <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded mt-3" />
                        <label for="remember-me" class="ml-3 block text-sm mt-3">
                            Remember me
                        </label>
                    </div>
                    <div class="text-sm mt-3">
                        <a href="#" class="text-blue-600 hover:underline">
                            Forgot your password?
                        </a>
                    </div>
                </div>
                <div class="mt-10">
                    <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none">
                        Log in
                    </button>
                </div>
                <p class="text-sm mt-10 text-center">Don't have an account
                    <a href="#" class="text-blue-600 hover:underline ml-1 whitespace-nowrap">Register here</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
