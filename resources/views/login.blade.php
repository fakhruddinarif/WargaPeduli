@extends('layouts.app')
@section('template')
    <section class="w-full bg-neutral-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            @if (Session::has('error'))
                <div class="w-fit p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <ul>
                        <li class="font-medium">{{ Session::get('error') }}</li>
                    </ul>
                </div>
            @endif
            <a href="#" class="flex items-center mb-6 text-2xl font-bold  text-gray-900">
                <img class="w-8 h-8 mr-2" src="{{ asset('logo.png') }}" alt="logo">
                WargaPeduli
            </a>
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <div class="flex flex-row justify-start items-center gap-2">
                        <a href="{{ url('/') }}" class="w-fit p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>
                        </a>
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-neutral-900 md:text-2xl">
                            Login
                        </h1>
                    </div>
                    <form class="space-y-4 md:space-y-6" method="post" action="{{ url('/') }}">
                        @csrf
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-neutral-900">Username</label>
                            <input type="text" name="username" id="username" class="bg-neutral-50 border border-neutral-300 text-neutral-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3" placeholder="Masukkan username" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-neutral-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-neutral-50 border border-neutral-300 text-neutral-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-3" required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-neutral-300 rounded bg-neutral-50 focus:ring-3 focus:ring-blue-300">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-neutral-500">Ingat Saya</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-blue-500 hover:underline">Lupa Password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Tidak punya akun? <a href="{{ url('/pengajuan') }}" class="font-medium text-blue-600 hover:underline">Pengajuan</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
