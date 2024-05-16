@extends('layouts.template')
@section('content')
    <div class="w-full flex flex-col justify-center items-center rounded-lg border-2">
        <div class="w-full flex flex-row justify-between items-center bg-blue-500 rounded-tr-lg rounded-tl-lg px-4 py-2">
            <div class="w-fit h-fit">
                <span class="font-normal text-sm text-white">Tambah Data Keluarga</span>
            </div>
            <div class="w-fit h-fit">
                <a href="{{url('/admin/penduduk/')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                </a>
            </div>
        </div>
        <div class="w-full flex flex-col justify-center items-center gap-4 px-4 py-4">
            <form method="POST" action="{{ url('/admin/penduduk/keluarga') }}" class="w-full flex flex-col justify-end items-end gap-4">
                @csrf
                <div class="col-span-full w-full">
                    <label for="dokumen-kk" class="block text-sm font-medium leading-6 text-neutral-900">Dokumen Kartu Keluarga</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-neutral-900/25 px-6 py-10">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-neutral-600">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs leading-5 text-neutral-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="nkk" class="block font-medium text-sm text-neutral-900">Nomor Kartu Keluarga<span class="font-medium text-sm text-red-600">*</span></label>
                    <input type="text" id="nkk" name="nkk" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Kartu Keluarga">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="nama" class="block font-medium text-sm text-neutral-900">Nama Lengkap<span class="font-medium text-sm text-red-600">*</span></label>
                    <input type="text" id="nama" name="nama" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="rt" class="block font-medium text-sm text-neutral-900">Rukun Tetangga<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="rt" name="rt" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                        <option class="font normal text-sm text-black" value="">Pilih Rukun Tetangga</option>
                        @for($i = 0; $i < 8; $i++)
                            <option class="font normal text-sm text-black" value="{{ $i + 1 }}">RT {{ $i + 1 }}</option>
                        @endfor
                    </select>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="username" class="block font-medium text-sm text-neutral-900">Username</label>
                    <input type="text" id="username" name="username" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Username">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="password" class="block font-medium text-sm text-neutral-900">Password</label>
                    <input type="password" id="password" name="password" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Username">
                </div>
                <button type="submit" class="px-4 py-3 bg-blue-500 rounded-md">
                    <span class="font-medium text-sm text-white">Selanjutnya</span>
                </button>
            </form>
        </div>
    </div>
@endsection
