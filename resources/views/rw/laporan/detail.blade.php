@extends('layouts.template')
@section('content')
    <div class="w-full flex flex-col justify-center items-center">
        <div class="w-full flex flex-row justify-between items-center bg-[#0EA5E9] rounded-tr-lg rounded-tl-lg px-4 py-2">
            <div class="w-fit h-fit">
                <span class="font-normal text-sm text-white">Detail Laporan</span>
            </div>
            <div class="w-fit h-fit">
                <a href="{{url('/rw/laporan')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                </a>
            </div>
        </div>
        <form method="POST" action="" class="w-full border-2 p-4 rounded-b-lg">
            <div class="flex flex-col justify-start items-start gap-4 w-full">
                <div class="flex flex-row justify-start items-center w-full gap-8">
                    <div class="flex flex-col justify-center items-center w-[50%] gap-4">
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="tanggal" class="block font-normal text-sm text-[#1A1A1A]">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="Supri">
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="nama" class="block font-normal text-sm text-[#1A1A1A]">Nama</label>
                            <input type="text" name="nama" id="nama" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="223132456374625">
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="rt" class="block font-normal text-sm text-[#1A1A1A]">RT</label>
                            <input type="text" name="rt" id="rt" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="6">
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="jenis_laporan" class="block font-normal text-sm text-[#1A1A1A]">Jenis Laporan</label>
                            <select name="jenis_laporan" id="jenis_laporan" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2">
                                <option value="1">P</option>
                                <option value="2">P</option>
                                <option value="3">P</option>
                                <option value="4">P</option>
                            </select>
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="keterangan" class="block font-normal text-sm text-[#1A1A1A]">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2">keren</textarea>
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="status" class="block font-normal text-sm text-[#1A1A1A]">Status</label>
                            <select name="status" id="status" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2">
                                <option value="1">Selesai</option>
                                <option value="2">Belum Selesai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-start justify-start gap-4">
                    <button type="submit" class="w-fit px-12 py-3 bg-[#0EA5E9] border border-[#0EA5E9] rounded-lg">
                        <span class="font-semibold text-sm text-white">Konfirmasi</span>
                    </button>
                    <button class="w-fit px-12 py-3 rounded-lg border-red-600 border bg-white">
                        <span class="font-semibold text-sm text-red-600">Hapus</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
