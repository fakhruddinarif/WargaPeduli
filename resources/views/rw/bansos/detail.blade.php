@extends('layouts.template')
@section('content')
    <div class="w-full flex flex-col justify-center items-center">
        <div class="w-full flex flex-row justify-between items-center bg-[#0EA5E9] rounded-tr-lg rounded-tl-lg px-4 py-2">
            <div class="w-fit h-fit">
                <span class="font-normal text-sm text-white">Tambah Data Warga</span>
            </div>
            <div class="w-fit h-fit">
                <a href="{{url('/rw/bansos')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                </a>
            </div>
        </div>
        <form method="POST" action="" class="w-full border-2 p-4 rounded-b-lg">
            <div class="flex flex-col justify-start items-start gap-4 w-full">
                <div class="flex flex-row justify-start items-center w-full gap-8">
                    <div class="flex flex-col justify-center items-center w-[50%] gap-4">
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="kepala_keluarga" class="block font-normal text-sm text-[#1A1A1A]">Nama Ayah</label>
                            <input type="text" name="kepala_keluarga" id="kepala_keluarga" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="Supri">
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="nkk" class="block font-normal text-sm text-[#1A1A1A]">NKK</label>
                            <input type="text" name="nkk" id="nkk" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="223132456374625">
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="rt" class="block font-normal text-sm text-[#1A1A1A]">RT</label>
                            <input type="text" name="rt" id="rt" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="6">
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="penghasilan" class="block font-normal text-sm text-[#1A1A1A]">Penghasilan</label>
                            <input type="number" name="penghasilan" id="penghasilan" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="10000">
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="tanggungan" class="block font-normal text-sm text-[#1A1A1A]">Tanggungan Keluarga</label>
                            <input type="number" name="tanggungan" id="tanggungan" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="4">
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="jenis_bansos" class="block font-normal text-sm text-[#1A1A1A]">Jenis Bansos</label>
                            <input type="text" name="jenis_bansos" id="jenis_bansos" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="PKH">
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="status" class="block font-normal text-sm text-[#1A1A1A]">Status</label>
                            <select name="status" id="status" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2">
                                <option value="1">Terima</option>
                                <option value="2">Tolak</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col justify-start items-start gap-4 w-[50%]">
                        <span class="font-semibold text-sm text-[#1A1A1A]">Upload Kartu Keluarga</span>
                        <label for="file_kk" class="flex flex-col items-center justify-center w-full h-64 border-2 border-[#5E51D9]/[8%] border-dashed rounded-lg cursor-pointer bg-[#F6F6F6]">
                            <p class="mb-2 text-sm text-[#F6F6F6]"><span class="font-semibold">Klik untuk upload</span></p>
                            <p class="text-xs text-black">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            <input id="file_kk" type="file" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="flex flex-row items-start justify-start gap-4">
                    <button type="submit" class="w-fit px-12 py-3 bg-[#0EA5E9] border border-[#0EA5E9] rounded-lg">
                        <span class="font-semibold text-sm text-white">Terima</span>
                    </button>
                    <button class="w-fit px-12 py-3 rounded-lg border-red-600 border bg-white">
                        <span class="font-semibold text-sm text-red-600">Tolak</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
