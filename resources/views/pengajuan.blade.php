@extends('layouts.app')
@section('template')
@include('layouts.navigation')
    <div class="flex flex-col justify-center items-center w-full rounded-lg mx-auto max-w-80 sm:max-w-xl px-4 py-4">
        <div class="flex flex-row w-full gap-1 justify-start items-center px-2 py-1 bg-blue-500 rounded-t-lg">
            <a href="{{ url('/') }}" class="px-2 py-3 content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>
            </a>
            <span class="text-base font-semibold text-white">Pengajuan</span>
        </div>
        <div class="flex flex-col w-full h-fit justify-center items-center border-2 rounded-b-lg gap-4 px-4 py-4">
            <form method="POST" action="{{ url('/pengajuan') }}" class="w-full flex flex-col justify-end items-end gap-4">
                @csrf
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="nkk" class="block font-medium text-sm text-neutral-900">NKK</label>
                    <input type="text" id="nkk" name="nkk" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan NKK">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="username" class="block font-medium text-sm text-neutral-900">Username</label>
                    <input type="text" id="username" name="username" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Username">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="password" class="block font-medium text-sm text-neutral-900">Password</label>
                    <input type="password" id="password" name="password" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Password">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="rt_id" class="block font-medium text-sm text-neutral-900">Rukun Tetangga<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="rt_id" name="rt_id" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                        <option class="font normal text-sm text-black" value="">Pilih Rukun Tetangga</option>
                        @for($i = 0; $i < 8; $i++)
                            <option class="font normal text-sm text-black" value="{{ $i + 1 }}">RT 0{{ $i + 1 }}</option>
                        @endfor
                    </select>
                </div>
                <button type="submit" class="w-full px-4 py-3 bg-blue-500 rounded-md">
                    <span class="font-medium text-sm text-white">Simpan</span>
                </button>
            </form>
        </div>
    </div>
@endsection
