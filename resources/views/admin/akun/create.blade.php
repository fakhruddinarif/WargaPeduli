@extends('layouts.template')
@section('content')
    @if (Session::has('error'))
        <div class="w-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium">{{ Session::get('error') }}</span>
        </div>
    @endif
    <div class="w-full flex flex-col justify-center items-center rounded-lg border-2">
        <div class="w-full flex flex-row justify-between items-center bg-blue-500 rounded-tr-lg rounded-tl-lg px-4 py-2">
            <div class="w-fit h-fit">
                <span class="font-normal text-sm text-white">Tambah Data Akun</span>
            </div>
            <div class="w-fit h-fit">
                <a href="{{url('/admin/akun/')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                </a>
            </div>
        </div>
        <div class="w-full flex flex-col justify-center items-center gap-4 px-4 py-4">
            <form method="POST" enctype="multipart/form-data" action="{{ url('/admin/akun/') }}" class="w-full flex flex-col justify-end items-end gap-4">
                @csrf
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="username" class="block font-medium text-sm text-neutral-900">Username<span class="font-medium text-sm text-red-600">*</span></label>
                    <input type="text" id="username" name="username" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Username">
                    @error('username')
                        <span class="text-red-600 font-semibold text-xs">Username harus diisi.</span>
                    @enderror
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="password" class="block font-medium text-sm text-neutral-900">Password<span class="font-medium text-sm text-red-600">*</span></label>
                    <input type="password" id="password" name="password" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Password">
                    @error('password')
                        <span class="text-red-600 font-semibold text-xs">Password harus diisi.</span>
                    @enderror
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="level_id" class="block font-medium text-sm text-neutral-900">Level<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="level_id" name="level_id" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                        <option class="font normal text-sm text-black" value="">Pilih Level</option>
                        @foreach($level as $value)
                            <option class="font normal text-sm text-black" value="{{ $value->id }}">{{ $value->nama }}</option>
                        @endforeach
                    </select>
                    @error('level_id')
                        <span class="text-red-600 font-semibold text-xs">Level harus diisi.</span>
                    @enderror
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="keluarga_id" class="block font-medium text-sm text-neutral-900">Nomor Kartu Keluarga<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="keluarga_id" name="keluarga_id" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                        <option class="font normal text-sm text-black" value="">Pilih NKK</option>
                        @foreach($keluarga as $value)
                            <option class="font normal text-sm text-black" value="{{ $value->id }}">{{ $value->nkk }} - {{ $value->nama }}</option>
                        @endforeach
                    </select>
                    @error('keluarga_id')
                        <span class="text-red-600 font-semibold text-xs">NKK harus diisi.</span>
                    @enderror
                </div>
                <button type="submit" class="px-4 py-3 bg-blue-500 rounded-md">
                    <span class="font-medium text-sm text-white">Simpan</span>
                </button>
            </form>
        </div>
    </div>
@endsection
