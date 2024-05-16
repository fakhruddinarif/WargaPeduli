@extends('layouts.template')
@section('content')
    <div class="w-full flex flex-col justify-center items-center rounded-lg border-2">
        <div class="w-full flex flex-row justify-between items-center bg-[#0EA5E9] rounded-tr-lg rounded-tl-lg px-4 py-2">
            <div class="w-fit h-fit">
                <span class="font-normal text-sm text-white">Tambah Data Keluarga atau Warga</span>
            </div>
            <div class="w-fit h-fit">
                <a href="{{url('/admin/penduduk')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                </a>
            </div>
        </div>
        <div class="w-full flex flex-col justify-center items-center gap-4 px-1 py-4">
            <div class="w-full  flex flex-row justify-center items-center rounded-lg gap-1">
                <button class="w-full bg-[#0EA5E9] py-2 rounded-sm" type="button">
                    <span class="font-medium text-base text-white">Data Keluarga</span>
                </button>
                <button class="w-full bg-[#0EA5E9] py-2 rounded-sm" type="button">
                    <span class="font-medium text-base text-white">Data Keluarga</span>
                </button>
            </div>
            <form method="POST" action="" class="w-full flex flex-col justify-start items-start gap-4 px-2">
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="nik" class="block font-medium text-base text-[#1A1A1A]">Nomor Kartu Keluarga<span class="font-medium text-base text-red-600">*</span></label>
                    <input type="text" id="nik" name="nik" class="px-2 py-3 font-normal text-base text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Kartu Keluarga">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="nama" class="block font-medium text-base text-[#1A1A1A]">Nama Lengkap<span class="font-medium text-base text-red-600">*</span></label>
                    <input type="text" id="nama" name="nama" class="px-2 py-3 font-normal text-base text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Lengkap">
                </div>
            </form>
        </div>
    </div>
@endsection
