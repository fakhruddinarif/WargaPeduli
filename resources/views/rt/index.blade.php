@extends('layouts.app')
@section('template')
@include('layouts.navigation')
@include('layouts.navbar')

<div class="w-full overflow-y-scroll" style="background-image: url('{{ asset('1.jpg') }}'); background-size: cover;">
    <div class="w-[75%] h-[30%] flex flex-col justify-center items-center bg-neutral-200 rounded-lg px-3 py-3 mt-[10%] mx-auto">
        <h1 class="text-black text-4xl font-bold font-sans mb-2">Selamat Datang Bapak RT Pada Halaman</h1>
        <h2 class="text-black text-4xl font-bold font-sans text-center mb-2">Utama Website Warga Peduli</h2>
        <p class="text-center mt-6">Kelola data pribadi, pengajuan bansos, <br> dan sampaikan keluhan anda dengan mudah disini</p>
    </div>
    <div class="flex  flex-wrap justify-center items-center mt-14">
        <div class="bg-neutral-200 sm:grid-cols-2 items-center w-[25rem] h-[15rem] max-w-xl rounded-lg font-[sans-serif] overflow-hidden ml-2 mr-6 mt-6 transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="#fff"  class="bg-blue-500 rounded-3xl ml-3 sm:mt-0 w-30 h-40">
                <path strokeLinecap="round" strokeLinejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
            </svg>
            <div class="px-4 py-6">
                <h3 class="text-xl font-[sans-serif] font-semibold ml-4">Pengajuan Akun</h3>
                <p class="mt-2 text-base text-gray-600 ml-4">Data Pengajuan Akun</p> 
                <div class="flex flex-wrap items-center cursor-pointer w-full mt-3 ml-0">
                    <div class="flex-1">
                        <button id="btnpengaduan" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none px-4 py-3 rounded-md ml-4 text-xl">Selengkapnya</button>
                    </div>
                </div>
            </div>
        </div> 
        <div class="bg-neutral-200 sm:grid-cols-2 items-center w-[25rem] h-[15rem] max-w-xl rounded-lg font-[sans-serif] overflow-hidden ml-2 mr-6 mt-6 transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl flex">
            <svg class="bg-blue-500 rounded-3xl ml-3 sm:mt-0 w-30 h-40" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"  strokeWidth={1.5} stroke="#fff" viewBox="0 0 24 24">
                <path stroke-linecap="round" strokeLinejoin="round" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            </svg>
            <div class="px-4 py-6">
                <h3 class="text-xl font-[sans-serif] font-semibold ml-4">Data Penduduk</h3>
                <p class="mt-2 text-base text-gray-600 ml-4">Data Seluruh Penduduk</p>
                <div class="flex flex-wrap items-center cursor-pointer w-full mt-3 ml-0">
                    <div class="flex-1">
                        <button id="data-button-warga" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none px-4 py-3 rounded-md ml-4 text-xl">Selengkapnya</button>
                    </div>
                </div>
            </div>
        </div> 
        <div class="bg-neutral-200 sm:grid-cols-2 items-center w-[25rem] h-[15rem] max-w-xl rounded-lg font-[sans-serif] overflow-hidden ml-2 mr-2 mt-6 transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl flex">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="#fff" class="bg-blue-500 rounded-3xl ml-3 sm:mt-0 w-30 h-40">
                <path strokeLinecap="round" strokeLinejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>
            <div class="px-4 py-6">
                <h3 class="text-xl font-[sans-serif] font-semibold ml-4">Data Keluarga</h3>
                <p class="mt-2 text-base text-gray-600 ml-4">Daftar Data Keluarga</p>
                <div class="flex flex-wrap items-center cursor-pointer w-full mt-3 ml-0">
                    <div class="flex-1">
                        <button id="data-button-keluarga" class="text-white bg-blue-500 hover:bg-blue-600 focus:outline-none px-4 py-3 rounded-md ml-4 text-xl">Selengkapnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center w-full mt-36">
    <div class="bg-white rounded-xl shadow-lg w-[90%] max-w-6xl">
        <div class="flex justify-between items-center p-4 bg-blue-500 rounded-sm">
            <h3 class="text-lg font-medium text-white">Data Keluarga</h3>
            <button id="close-button" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-1 overflow-y-auto max-h-[70vh]">
            <livewire:keluarga-table />
        </div>
    </div>
</div>

<div id="modal-penduduk" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center w-full mt-36">
    <div class="bg-white rounded-xl shadow-lg w-[90%] max-w-6xl fixed">
        <div class="flex justify-between items-center p-4 bg-blue-500 rounded-sm">
            <h3 class="text-lg font-medium text-white">Data Penduduk</h3>
            <button id="close-button1" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-1 overflow-y-auto max-h-[70vh]">
            <livewire:warga-table />
        </div>
    </div>
</div>

<script>
    document.getElementById('data-button-keluarga').addEventListener('click', function() {
        document.getElementById('myModal').classList.remove('hidden');
    });
    document.getElementById('data-button-warga').addEventListener('click', function() {
        document.getElementById('modal-penduduk').classList.remove('hidden');
    });

    document.getElementById('close-button').addEventListener('click', function() {
        document.getElementById('myModal').classList.add('hidden');
    });
    document.getElementById('close-button1').addEventListener('click', function() {
        document.getElementById('modal-penduduk').classList.add('hidden');
    });
    
</script>
@endsection