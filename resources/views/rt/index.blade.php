@extends('layouts.app')
@section('template')
@include('rt.pengajuan')
@include('rt.keluarga')
@include('rt.riwayatbansos')
@include('rt.riwayatlaporan')
@include('layouts.navigation')
@include('layouts.navbar')
<section id="content" class="bg-white flex flex-wrap justify-start items-start mt-[164px] w-full gap-4 py-8 px-5 overflow-y-scroll" style="scrollbar-width: none; -ms-overflow-style: none;">
    <div class="w-full flex justify-center items-center">
        @if(Session::has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                <span class="font-medium">{{ Session::get('success')}}</span>
            </div>
        @elseif(Session::has('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                <span class="font-medium">{{ Session::get('error')}}</span>
            </div>
        @endif
    </div>
    <div class="flex flex-col justify-between items-center w-full gap-8">
        <div class="h-fit w-full lg:w-2/3 flex flex-col gap-4 bg-neutral-200/50 px-8 py-6 rounded-lg">
            <h1 class="text-neutral-900 text-4xl font-bold text-center">Selamat Datang Bapak RT 0{{ $nomor[0]->nomor }} Pada Halaman</h1>
            <h2 class="text-neutral-900 text-4xl font-bold text-center">Utama Website Warga Peduli</h2>
            <p class="text-center text-neutral-900">Kelola data pribadi, pengajuan bansos, <br> dan sampaikan keluhan anda dengan mudah disini</p>
        </div>
        <div>
            <div class="flex w-full flex-wrap justify-center items-center gap-4">
                <div class="flex flex-row w-fit px-4 py-3 md:px-8 md:py-6 gap-4 justify-center items-center transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl rounded-lg border">
                    <div class="w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#3b82f6" viewBox="0 0 24 24" strokeWidth={1.5} stroke="#fff"  class="bg-white rounded-lg sm:mt-0 w-32 h-32">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>
                    </div>
                    <div class="w-full flex flex-col justify-start items-start gap-4">
                        <div class="w-full px-2">
                            <h3 class="text-xl font-semibold whitespace-nowrap">Pengajuan</h3>
                            <span class="text-base text-neutral-600 font-normal whitespace-nowrap">Data Pengajuan Akun</span>
                        </div>
                        <button type="button" id="btn-pengajuan" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none px-4 py-3 rounded-md text-base w-fit">Selengkapnya</button>
                    </div>
                </div>

                <div class="flex flex-row w-fit px-4 py-3 md:px-8 md:py-6 gap-4 justify-center items-center transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl rounded-lg border">
                    <div class="w-full">
                        <svg class="bg-white rounded-lg sm:mt-0 w-32 h-32" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#3b82f6"  strokeWidth={1.5} stroke="#3b82f6" viewBox="0 0 24 24">
                            <path stroke-linecap="round" strokeLinejoin="round" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    </div>
                    <div class="w-full flex flex-col justify-start items-start gap-4">
                        <div class="w-full px-2">
                            <h3 class="text-xl font-semibold whitespace-nowrap">Data Warga</h3>
                            <span class="text-base text-neutral-600 font-normal whitespace-nowrap">Data Seluruh Wargaaa</span>
                        </div>
                        <button type="button" id="data-button-warga" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none px-4 py-3 rounded-md text-base w-fit">Selengkapnya</button>
                    </div>
                </div>
                <div class="flex flex-row w-fit px-4 py-3 md:px-8 md:py-6 gap-4 justify-center items-center transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl rounded-lg border">
                    <div class="w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#3b82f6" viewBox="0 0 24 24" strokeWidth={1.5} stroke="#3b82f6" class="bg-white rounded-lg w-32 h-32" aria-hidden="true">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </div>
                    <div class="w-full flex flex-col justify-start items-start gap-4">
                        <div class="w-full px-2">
                            <h3 class="text-xl font-semibold whitespace-nowrap">Data Keluarga</h3>
                            <span class="text-base text-neutral-600 font-normal whitespace-nowrap">Data Seluruh Keluarga</span>
                        </div>
                        <button type="button" id="data-button-keluarga" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none px-4 py-3 rounded-md text-base w-fit">Selengkapnya</button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="flex w-full flex-wrap justify-center items-center gap-4">
                <div class="flex flex-row w-fit px-4 py-3 md:px-8 md:py-6 gap-4 justify-center items-center transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl rounded-lg border">
                    <div class="w-full">
                        <svg class="bg-white rounded-lg sm:mt-0 w-32 h-32" viewBox="0 0 24 24" fill="#3b82f6" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h-2v-6h2v6zm4 0h-2v-4h2v4zm4 0h-2v-2h2v2z" fill="#3b82f6"/>
                        </svg>
                    </div>
                    <div class="w-full flex flex-col justify-start items-start gap-4">
                        <div class="w-full px-2">
                            <h3 class="text-xl font-semibold whitespace-nowrap">Riwayat Bansos</h3>
                            <span class="text-base text-neutral-600 font-normal whitespace-nowrap">Data Riwayat Bansos</span>
                        </div>
                        <button type="button" id="btn-riwayat-bansos" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none px-4 py-3 rounded-md text-base w-fit">Selengkapnya</button>
                    </div>
                </div>
                <div class="flex flex-row w-fit px-4 py-3 md:px-8 md:py-6 gap-4 justify-center items-center transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl rounded-lg border">
                    <div class="w-full">
                    <svg class="bg-white rounded-lg sm:mt-0 w-32 h-32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM3 19V5h18v14H3zm4-4h10v2H7v-2zm0-4h10v2H7v-2zm0-4h10v2H7V7z" fill="#3b82f6"/>
                    </svg>
                    </div>
                    <div class="w-full flex flex-col justify-start items-start gap-4">
                        <div class="w-full px-2">
                            <h3 class="text-xl font-semibold whitespace-nowrap">Riwayat Laporan</h3>
                            <span class="text-base text-neutral-600 font-normal whitespace-nowrap">Riwayat Laporan Anda</span>
                        </div>
                        <button type="button" id="btn-riwayat-laporan" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none px-4 py-3 rounded-md text-base w-fit">Selengkapnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Modal Penduduk -->
    <div id="modal-penduduk" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center  w-full gap-4 py-8 px-5">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl sm:max-w-4xl xs:max-w-full mt-[160px]">
            <div class="flex justify-between items-center p-4 bg-blue-500 rounded-sm">
                <h3 class="text-lg font-medium text-white">Data Penduduk</h3>
                <button id="close-button2" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-1 overflow-y-auto max-h-96">
                <livewire:warga-table />
            </div>
        </div>
    </div>

    <script>
         document.getElementById('btn-pengajuan').addEventListener('click', function() {
            var pengajuan = document.getElementById('pengajuan-penduduk');
            var detail = document.getElementById('detail-pengajuan');
            pengajuan.classList.remove('hidden');
            pengajuan.classList.add('center');
            detail.classList.add('hidden');
        });

        document.getElementById('close-button-pengajuan').addEventListener('click', function() {
            var pengajuan = document.getElementById('pengajuan-penduduk');
            pengajuan.classList.add('hidden');
        });

        document.getElementById('btn-pengajuan').addEventListener('click', function() {
            document.getElementById('pengajuan-penduduk').style.display = 'block';
        });

        // riwayat bansos
        document.getElementById('btn-riwayat-bansos').addEventListener('click', function() {
            var riwayat_bansos = document.getElementById('modal-riwayat-bansos');
            riwayat_bansos.classList.remove('hidden');
            riwayat_bansos.classList.add('center');
            document.getElementById('detail-pengajuan-penduduk').classList.add('hidden');
        });
        document.getElementById('close-button-riwayat-bansos').addEventListener('click', function() {
            var riwayat_bansos = document.getElementById('modal-riwayat-bansos');
            riwayat_bansos.classList.add('hidden');
            riwayat_bansos.classList.remove('center');
            document.getElementById('detail-pengajuan-penduduk').classList.add('hidden');
        });

        // riwayat laporan
        document.getElementById('btn-riwayat-laporan').addEventListener('click', function() {
            var riwayat_laporan = document.getElementById('modal-riwayat-laporan');
            riwayat_laporan.classList.remove('hidden');
            riwayat_laporan.classList.add('center');
            document.getElementById('detail-pengajuan-penduduk').classList.add('hidden');
        });

        document.getElementById('close-button-riwayat-laporan').addEventListener('click', function() {
            var riwayat_laporan = document.getElementById('modal-riwayat-laporan');
            riwayat_laporan.classList.add('hidden');
            riwayat_laporan.classList.remove('center');
            document.getElementById('detail-pengajuan-penduduk').classList.add('hidden');
        });

        //Warga
        document.getElementById('data-button-warga').addEventListener('click', function() {
            document.getElementById('modal-penduduk').classList.remove('hidden');
        });

        document.getElementById('close-button2').addEventListener('click', function() {
            document.getElementById('modal-penduduk').classList.add('hidden');
        });
    </script>
@endsection
