@extends('layouts.app')
@section('template')
@include('layouts.navigation')
@include('layouts.navbar')

<div class="w-full relative bg-gray-300">
    <img src="{{ asset('1.jpg') }}" class="object-cover h-[32rem] w-full">
        <div class="absolute top-10 left-0 h-1/2 w-full flex justify-center items-center">
          <h1 class="text-gray-700 text-4xl font-bold">Selamat Datang Ilul</h1>
        </div>
  <div class="flex  flex-wrap justify-center items-center">
    <div class="bg-white sm:grid-cols-2 items-center w-[20rem] h-[15rem] max-w-xl rounded-lg font-[sans-serif] overflow-hidden ml-2 mr-2 mt-6 transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl flex">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6" class="bg-blue-300 rounded-3xl ml-3">
        <path strokeLinecap="round" strokeLinejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
      </svg>
      <div class="px-4 py-6">
          <h3 class="text-xl font-[sans-serif] font-semibold">Pengaduan Saran</h3>
            <p class="mt-2 text-sm text-gray-600">Laporkan Segala Bentuk Keluhan anda yang ada diwilayah sini </p>
          <div class="flex flex-wrap items-center cursor-pointer border rounded-lg w-full mt-3 ml-0">
            <div class="flex-1">
               <button id="btnpengaduan" class="text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none px-3 py-1 rounded-md">Pencet</button>
            </div>
          </div>
        </div>
      </div> 
    <div class="bg-white sm:grid-cols-2 items-center w-[20rem] h-[15rem] max-w-xl rounded-lg font-[sans-serif] overflow-hidden ml-2 mr-2 mt-6 transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl flex">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6" class="bg-blue-300 rounded-3xl ml-3">
        <path strokeLinecap="round" strokeLinejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
      </svg>
      <div class="px-4 py-6">
          <h3 class="text-xl font-[sans-serif] font-semibold">Pengajuan Bansos</h3>
            <p class="mt-2 text-sm text-gray-600">Ajukan Bantuan Sosial untuk anda yang membutuhkan</p>
          <div class="flex flex-wrap items-center cursor-pointer border rounded-lg w-full mt-3 ml-0">
            <div class="flex-1">
               <button id="open-modal" class="text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none px-3 py-1 rounded-md">Pencet</button>
            </div>
          </div>
        </div>
      </div> 
    <div class="bg-white sm:grid-cols-2 items-center w-[20rem] h-[15rem] max-w-xl rounded-lg font-[sans-serif] overflow-hidden ml-2 mr-2 mt-6 transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl flex">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6" class="bg-blue-300 rounded-3xl ml-3">
        <path strokeLinecap="round" strokeLinejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
      </svg>
      <div class="px-4 py-6">
          <h3 class="text-xl font-[sans-serif] font-semibold">Data Keluarga Pribadi</h3>
            <p class="mt-2 text-sm text-gray-600">Jika Ingin Melihat Data Keluarga anda bisa melihatnya disini</p>
          <div class="flex flex-wrap items-center cursor-pointer border rounded-lg w-full mt-3 ml-0">
            <div class="flex-1">
               <button href="#" class="text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none px-3 py-1 rounded-md">Pencet</button>
            </div>
          </div>
        </div>
      </div> 
  </div> 
</div>

<!-- Modal Pengaduan -->
<div id="modalpengaduan" class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]" style="display: none;">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6 relative">
        <div class="flex flex-row w-full gap-1 justify-start items-center px-2 py-1 bg-blue-500 rounded-t-lg">
            <a href="{{ url('/') }}" class="px-2 py-3 content-center"></a>
            <span class="text-base font-semibold text-white">Laporkan masalahmu</span>
        </div>
        <div class="flex flex-col w-full h-fit justify-center items-center border-2 rounded-b-lg gap-4 px-4 py-4">
            <form method="POST" action="{{ url('/') }}" class="w-full flex flex-col justify-end items-end gap-4">
                @csrf
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="username" class="block font-medium text-sm text-neutral-900">Username</label>
                    <input type="text" id="username" name="username" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="rt_id" class="block font-medium text-sm text-neutral-900">Rukun Tetangga<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="rt_id" name="rt_id" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2">
                        <option class="font-normal text-sm text-black" value="">Pilih Rukun Tetangga</option>
                        @for($i = 0; $i < 8; $i++)
                            <option class="font-normal text-sm text-black" value="{{ $i + 1 }}">RT 0{{ $i + 1 }}</option>
                        @endfor
                    </select>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="keterangan" class="block font-medium text-sm text-neutral-900">Masukkan Keterangan</label>
                    <textarea id="keterangan" name="keterangan" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Keterangan"></textarea>
                </div>
            </form>
        </div>
        <div class="border-t flex justify-end pt-6 space-x-4">
            <button id="btncancel" type="button" class="px-6 py-2 rounded-md text-black text-sm border-none outline-none bg-gray-200 hover:bg-gray-300 active:bg-gray-200">Cancel</button>
            <button id="btnsave" type="button" class="px-6 py-2 rounded-md text-white text-sm border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">Kirim</button>
        </div>
    </div>
</div>

<!-- Modal Bansos -->
<div id="modalbansos" class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]" style="display: none;">
    <div class="w-full max-w-xl bg-white shadow-lg rounded-md p-6 relative">
        <div class="flex flex-row w-full gap-1 justify-start items-center px-2 py-1 bg-blue-500 rounded-t-lg">
            <a href="{{ url('/') }}" class="px-2 py-3 content-center"></a>
            <span class="text-base font-semibold text-white">Pengajuan Bansos</span>
        </div>
        <div class="flex flex-col w-full h-fit justify-center items-center border-2 rounded-b-lg gap-2 px-4 py-4">
            <form method="POST" action="{{ url('/') }}" class="w-full flex flex-col justify-end items-end gap-2">
                @csrf
                <div class="w-full flex flex-row gap-2">
                    <div class="flex-1 flex flex-col gap-1 justify-start items-start">
                        <label for="nkk" class="block font-medium text-sm text-neutral-900">NKK</label>
                        <input type="text" id="nkk" name="nkk" class="px-2 py-2 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan NKK">
                    </div>
                    <div class="flex-1 flex flex-col justify-start items-start gap-1">
                        <span class="font-semibold text-sm text-[#1A1A1A]">Upload Kartu Keluarga</span>
                        <label for="file_kk" class="flex flex-col items-center justify-center w-full h-32 border-2 border-[#5E51D9]/[8%] border-dashed rounded-lg cursor-pointer bg-[#F6F6F6]">
                            <p class="mb-2 text-sm text-black"><span class="font-semibold">Klik untuk upload</span></p>
                            <p class="text-xs text-black">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            <input id="file_kk" type="file" class="hidden">
                        </label>
                    </div>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="username" class="block font-medium text-sm text-neutral-900">Username</label>
                    <input type="text" id="username" name="username" class="px-2 py-2 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="ibu_kandung" class="block font-medium text-sm text-neutral-900">Nama Ibu Kandung</label>
                    <input type="text" id="ibu_kandung" name="ibu_kandung" class="px-2 py-2 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Ibu Kandung">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="rt_id" class="block font-medium text-sm text-neutral-900">Rukun Tetangga<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="rt_id" name="rt_id" class="px-2 py-2 font-normal text-sm text-black rounded-lg w-full border-2">
                        <option class="font-normal text-sm text-black" value="">Pilih Rukun Tetangga</option>
                        @for($i = 0; $i < 8; $i++)
                            <option class="font-normal text-sm text-black" value="{{ $i + 1 }}">RT 0{{ $i + 1 }}</option>
                        @endfor
                    </select>
                </div>
            </form>
        </div>
        <div class="border-t flex justify-end pt-4 space-x-4">
            <button id="btncancelb" type="button" class="px-4 py-2 rounded-md text-black text-sm border-none outline-none bg-gray-200 hover:bg-gray-300 active:bg-gray-200">Cancel</button>
            <button id="btnsaveb" type="button" class="px-4 py-2 rounded-md text-white text-sm border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">Kirim</button>
        </div>
    </div>
</div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function(){
            showmodalbansos();
            showmodalpengaduan();
        });

        function showmodalbansos(){
            $('#open-modal').click(function(){
                $('#modalbansos').fadeIn();
            });

            $('#btncancelb').click(function(){
                $('#modalbansos').fadeOut();
            });

            $('#btnsaveb').click(function(){
                $('#modalbansos').fadeOut();
            });
        }

        function showmodalpengaduan(){
            $('#btnpengaduan').click(function(){
                $('#modalpengaduan').fadeIn();
            });

            $('#btncancel').click(function(){
                $('#modalpengaduan').fadeOut();
            });

            $('#btnsave').click(function(){
                $('#modalpengaduan').fadeOut();
            });
        }

    </script>

@endsection
      







