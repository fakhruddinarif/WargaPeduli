@extends('layouts.app')
@section('template')
@include('layouts.navigation')
@include('layouts.navbar')

<section id="content" class="bg-white flex flex-wrap justify-start items-start mt-[164px] w-full gap-4 py-8 px-5 overflow-y-scroll">
    <div class="w-full flex justify-center items-center">
        @if(Session::has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                <span class="font-medium">{{ Session::get('success')}}</span>
            </div>
        @elseif(Session::has('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                <span class="font-medium">{{ Session::get('error')}}</span>
            </div>
        @elseif (Session::has('errors'))
            <div class="w-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                <ul>
                    @foreach(Session::get('errors')->all() as $error)
                        <li class="font-medium">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="flex flex-col justify-between items-center w-full gap-8">
        <div class="h-fit w-full lg:w-2/3 flex flex-col gap-4 bg-neutral-200/50 px-8 py-6 rounded-lg">
            <h1 class="text-neutral-900 text-4xl font-bold text-center">Selamat Datang Pada Halaman</h1>
            <h2 class="text-neutral-900 text-4xl font-bold text-center">Utama Website Warga Peduli</h2>
            <p class="text-center text-neutral-900">Kelola data pribadi, pengajuan bansos, <br> dan sampaikan keluhan anda dengan mudah disini</p>
        </div>
        <div class="flex w-full flex-wrap justify-center items-center gap-4">
            <div class="flex flex-row w-fit px-4 py-3 md:px-8 md:py-6 gap-4 justify-center items-center transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl rounded-lg border">
                <div class="w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#3b82f6" viewBox="0 0 24 24" strokeWidth={1.5} stroke="#fff" class="bg-white rounded-3xl w-32 h-32">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                </div>
                <div class="w-full flex flex-col justify-center items-center gap-4">
                    <div class="w-full px-2">
                        <h3 class="text-xl font-semibold whitespace-nowrap">Pengaduan</h3>
                        <span class="text-base text-neutral-600 font-normal whitespace-nowrap">Laporkan Kendalamu</span>
                    </div>
                    <button type="button" id="btnpengaduan" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none px-4 py-3 rounded-md text-base w-full">Selengkapnya</button>
                </div>
            </div>
            <div class="flex flex-row w-fit px-4 py-3 md:px-8 md:py-6 gap-4 justify-center items-center transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl rounded-lg border">
                <div class="w-full">
                    <svg class="bg-white rounded-3xl w-32 h-32" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                    <g fill="#3b82f6" stroke="#3b82f6" stroke-width="2">
                        <rect x="2" y="10" width="30" height="40" rx="4" ry="4" fill="#3b82f6"></rect>
                        <path d="M14,2 H50 a2,2 0 0,1 2,2 V52 a2,2 0 0,1 -2,2 H14 a2,2 0 0,1 -2,-2 V4 a2,2 0 0,1 2,-2 z" fill="#E0E0E0"></path>
                        <path d="M14 16 H50" stroke="#3b82f6"></path>
                        <path d="M14 24 H50" stroke="#3b82f6"></path>
                        <path d="M14 32 H36" stroke="#3b82f6"></path>
                        <path d="M8 16 L2 22 L8 28" stroke="#FFF" fill="none"></path>
                        <path d="M8 22 H36" stroke="#FFF" fill="none"></path>
                    </g>
                </svg>
                </div>
                <div class="w-full flex flex-col justify-center items-center gap-4">
                    <div class="w-full px-2">
                        <h3 class="text-xl font-semibold whitespace-nowrap">Pengajuan Bansos</h3>
                        <span class="text-base text-neutral-600 font-normal whitespace-nowrap">Ajukan Bantuan Sosial</span>
                    </div>
                    <button type="button" id="open-modal" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none px-4 py-3 rounded-md text-base w-full">Selengkapnya</button>
                </div>
            </div>
            <div class="flex flex-row w-fit px-4 py-3 md:px-8 md:py-6 gap-4 justify-center items-center transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl rounded-lg border">
                <div class="w-full">
                    <svg class="bg-white rounded-lg sm:mt-0 w-32 h-32" viewBox="0 0 24 24" fill="#3b82f6" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h-2v-6h2v6zm4 0h-2v-4h2v4zm4 0h-2v-2h2v2z" fill="#3b82f6"/>
                    </svg>
                </div>
                <div class="w-full flex flex-col justify-center items-center gap-4">
                    <div class="w-full px-2">
                        <h3 class="text-xl font-semibold whitespace-nowrap">Riwayat Bansos</h3>
                        <span class="text-base text-neutral-600 font-normal whitespace-nowrap">Riwayat Bantuan Sosial</span>
                    </div>
                    <button type="button" id="riwayat-bansos" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none px-4 py-3 rounded-md text-base w-full">Selengkapnya</button>
                </div>
            </div>
            <div class="flex flex-row w-fit px-4 py-3 md:px-8 md:py-6 gap-4 justify-center items-center transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl rounded-lg border">
                <div class="w-full">
                    <svg class="bg-white rounded-lg sm:mt-0 w-32 h-32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM3 19V5h18v14H3zm4-4h10v2H7v-2zm0-4h10v2H7v-2zm0-4h10v2H7V7z" fill="#3b82f6"/>
                    </svg>
                </div>
                <div class="w-full flex flex-col justify-center items-center gap-4">
                    <div class="w-full px-2">
                        <h3 class="text-xl font-semibold whitespace-nowrap">Riwayat Laporan</h3>
                        <span class="text-base text-neutral-600 font-normal whitespace-nowrap">Riwayat Laporan Anda</span>
                    </div>
                    <button type="button" id="riwayat-laporan" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none px-4 py-3 rounded-md text-base w-full">Selengkapnya</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal Pengaduan -->
<div id="modalpengaduan" class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]" style="display: none;">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6 relative">
        <div class="flex flex-row w-full gap-1 justify-start items-center px-2 py-1 bg-blue-500 rounded-t-lg">
            <a href="{{ url('/') }}" class="px-2 py-3 content-center"></a>
            <span class="text-base font-semibold text-white">Pengisian Laporan Warga</span>
        </div>
        <div class="flex flex-col w-full h-fit justify-center items-center border-2 rounded-b-lg gap-4 px-4 py-4">
            <form method="POST" enctype="multipart/form-data" action="{{ url($url . '/create_laporan') }}" class="w-full flex flex-col justify-end items-end gap-4">
                @csrf
                <div class="col-span-full w-full">
                    <label for="bukti" class="block text-sm font-medium leading-6 text-neutral-900">Foto Laporan</label>
                    <div id="dropzone" class="mt-2 flex justify-center rounded-lg border border-dashed border-neutral-900/25 px-6 py-10">
                        <img id="preview" class="hidden w-full rounded-lg">
                        <div id="area-upload" class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-neutral-600">
                                <label for="bukti" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="bukti" name="bukti" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs leading-5 text-neutral-600">PNG, JPG, GIF up to 2MB</p>
                        </div>
                    </div>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="keterangan" class="block font-medium text-sm text-neutral-900">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Keterangan"></textarea>
                </div>
                <div class="border-t flex justify-end pt-6 space-x-4">
                    <button id="btncancel" type="button" class="px-6 py-2 rounded-md text-black text-sm border-none outline-none bg-gray-200 hover:bg-gray-300 active:bg-gray-200">Cancel</button>
                    <button id="btnsave" type="submit" class="px-6 py-2 rounded-md text-white text-sm border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Bansos -->
<div id="modalbansos" class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]" style="display: none;">
    <div class="w-full max-w-xl bg-white shadow-lg rounded-md p-6 relative">
        <div class="flex flex-row w-full gap-1 justify-start items-center px-2 py-1 bg-blue-500 rounded-t-lg">
            <a href="{{ url('/') }}" class="px-2 py-3 content-center"></a>
            <span class="text-base font-semibold text-white mr-80">Pengajuan Bansos</span>
            <button id="btncancelb" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col w-full h-fit justify-center items-center border-2 rounded-b-lg gap-2 px-4 py-2">
            <div class="relative w-full overflow-x-auto shadow-md mt-4">
                <div class="relative w-full overflow-x-auto shadow-md mt-4">
                    <table class="w-full text-sm text-left rtl:text-right bg-neutral-200">
                        <thead class="text-sm font-normal text-black">
                        <tr>
                            <th scope="col" class="px-6 py-3">Jenis</th>
                            <th scope="col" class="px-6 py-3">Mulai</th>
                            <th scope="col" class="px-6 py-3">Selesai</th>
                            <th scope="col" class="px-6 py-3">Kapasitas</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($bansos) > 0)
                            @foreach($bansos as $key => $value)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-normal text-neutral-900 whitespace-nowrap">{{ $value->jenis }}</th>
                                    <td class="px-6 py-4">{{ date('d/m/Y', strtotime($value->tanggal_mulai)) }}</td>
                                    <td class="px-6 py-4">{{ date('d/m/Y', strtotime($value->tanggal_selesai)) }}</td>
                                    <td class="px-6 py-4">{{ $value->kapasitas }}</td>
                                    <td class="px-6 py-4 flex flex-wrap gap-4">
                                        <button type="button" id="btn-{{ $value->id }}" class="w-full px-8 py-3 bg-blue-500 rounded-md">
                                            <span class="text-sm font-medium text-white">Pilih</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="w-full bg-white text-center py-4 font-medium text-sm">Tidak ada data</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="form-bansos" class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]" style="display: none;">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-md p-6 relative">
        <div class="flex flex-row w-full gap-1 justify-start items-center px-2 py-1 bg-blue-500 rounded-t-lg">
            <span class="text-base font-semibold text-white">Form Pengajuan Bansos</span>
        </div>
        <div class="flex flex-col w-full h-fit justify-center items-center border-2 rounded-b-lg gap-4 px-4 py-4">
            <form method="POST" action="{{ url($url . '/bansos/pengajuan') }}" class="w-full flex flex-col justify-end items-end gap-4">
                @csrf
                <input type="hidden" id="bansos_id" name="bansos_id">
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="pendapatan" class="block font-medium text-sm text-neutral-900">Pendapatan</label>
                    <input type="text" id="pendapatan" name="pendapatan" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Pendapatan" value="{{ $keluarga->pendapatan }}">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="luas_bangunan" class="block font-medium text-sm text-neutral-900">Luas Bangunan</label>
                    <input type="text" id="luas_bangunan" name="luas_bangunan" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Luas Bangunan" value="{{ $keluarga->luas_bangunan }}">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="jumlah_tanggungan" class="block font-medium text-sm text-neutral-900">Jumlah Tanggungan</label>
                    <input type="text" id="jumlah_tanggungan" name="jumlah_tanggungan" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Jumlah Tanggungan" value="{{ $keluarga->jumlah_tanggungan }}">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="pajak_bumi" class="block font-medium text-sm text-neutral-900">Pajak Bumi</label>
                    <input type="text" id="pajak_bumi" name="pajak_bumi" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Pajak Bumi" value="{{ $keluarga->pajak_bumi }}">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="tagihan_listrik" class="block font-medium text-sm text-neutral-900">Tagihan Listrik</label>
                    <input type="text" id="tagihan_listrik" name="tagihan_listrik" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Tagihan Listrik" value="{{ $keluarga->tagihan_listrik }}">
                </div>
                <div class="border-t flex justify-end pt-6 space-x-4">
                    <button id="cancel-form" type="button" class="px-6 py-2 rounded-md text-black text-sm border-none outline-none bg-gray-200 hover:bg-gray-300 active:bg-gray-200">Cancel</button>
                    <button type="submit" class="px-6 py-2 rounded-md text-white text-sm border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Riwayat Bansos -->

    <div id="modal-riwayat-bansos" class="hidden fixed inset-0 z-40 bg-neutral-600 bg-opacity-50  flex justify-center items-center  w-full gap-4 py-8 px-5">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl mb-40 mt-28">
            <div class="flex items-center justify-between p-4 bg-blue-500 rounded-sm">
                <h3 class="text-lg font-medium text-white">Data Riwayat Bansos</h3>
                <button id="close-riwayat-bansos" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-1 overflow-y-auto max-h-96 ">
                <div class="relative w-full overflow-x-auto shadow-md">
                <table class="table-auto w-full text-sm text-left rtl:text-right bg-neutral-200">
                    <thead class="text-sm font-normal text-black">
                        <tr class="md:table-row ">
                            <th scope="col" class="px-6 py-3">NKK</th>
                            <th scope="col" class="px-6 py-3">Kepala Keluarga</th>
                            <th scope="col" class="px-6 py-3">Jenis Bansos</th>
                            <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                            <th scope="col" class="px-6 py-3">Tanggal Selesai</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($historyBansos) > 0)
                            @foreach($historyBansos as $value)
                                <tr class="bg-white border-b md:table-row">
                                    <td class="px-6 py-4">{{ isset($value->user_id) ? $value->User->Keluarga->nkk : 'N/A' }}</td>
                                    <td class="px-6 py-4">
                                        {{ isset($value->user_id) ? optional($value->User->Keluarga->Warga->where('status_keluarga', 'Kepala Keluarga')->first())->nama : 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4">{{ isset($value->bansos_id) ? $value->BantuanSosial->jenis : 'N/A' }}</td>
                                    <td class="px-6 py-4">{{ isset($value->bansos_id) ? date('d/m/Y', strtotime($value->BantuanSosial->tanggal_mulai)) : 'N/A' }}</td>
                                    <td class="px-6 py-4">{{ isset($value->bansos_id) ? date('d/m/Y', strtotime($value->BantuanSosial->tanggal_selesai)) : 'N/A' }}</td>
                                    <td class="px-6 py-4">{{ $value->status }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="w-full bg-white text-center py-4 font-medium text-sm">Tidak ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

<!-- Modal Riwayat Laporan -->

    <div id="modal-riwayat-laporan" class="hidden fixed inset-0 z-40 bg-neutral-600 bg-opacity-50  flex justify-center items-center  w-full gap-4 py-8 px-5">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl mb-40 mt-28">
            <div class="flex items-center justify-between p-4 bg-blue-500 rounded-sm">
                <h3 class="text-lg font-medium text-white">Data Riwayat Laporan</h3>
                <button id="close-riwayat-laporan" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-1 overflow-y-auto max-h-96 ">
                <div class="relative w-full overflow-x-auto shadow-md">
                <table class="table-auto w-full text-sm text-left rtl:text-right bg-neutral-200">
                    <thead class="text-sm font-normal text-black">
                        <tr class="md:table-row ">
                            <th scope="col" class="px-6 py-3">Tanggal</th>
                            <th scope="col" class="px-6 py-3">Keterangan</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                     <tbody>
                        @if(count($historyReport) > 0)
                            @foreach($historyReport as $value)
                                <tr class="bg-white border-b md:table-row">
                                    <td class="px-6 py-4">{{ date('d/m/Y', strtotime($value->tanggal)) }}</td>
                                    <td class="px-6 py-4"> {{ $value->keterangan }}</td>
                                    <td class="px-6 py-4">{{ $value->status }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-start gap-4">
                                            <button type="button" id="detail-riwayat-laporan-{{ $value->id }}" class="w-fit h-fit px-4 py-2 bg-blue-500 rounded-md">
                                                <span class="font-semibold text-white">Detail</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="w-full bg-white text-center py-4 font-medium text-sm">Tidak ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
    @include('warga.detail_riwayat_laporan')




    <script>
        $(document).ready(function(){
            showmodalbansos();
            showmodalpengaduan();

            var dropzone = $('#dropzone');
            var fileInput = $('#bukti'); // Mengubah id ini menjadi 'bukti'
            var preview = $('#preview');

            dropzone.on('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).addClass('dragging');
            });

            dropzone.on('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('dragging');
            });

            dropzone.on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('dragging');

                var files = e.originalEvent.dataTransfer.files;
                fileInput.prop('files', files);

                showImagePreview(files[0]);
            });

            fileInput.on('change', function(e) {
                showImagePreview(e.target.files[0]);
            });

            function showImagePreview(file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.attr('src', e.target.result);
                    preview.removeClass('hidden');
                    $('#area-upload').addClass('hidden');
                }
                reader.readAsDataURL(file);
            }

            $('[id^=btn-]').on('click', function() {
                // Mengambil id dari tombol yang ditekan dan menyimpannya ke dalam elemen input hidden
                var id = this.id.replace('btn-', '');
                $('#bansos_id').val(id);
                console.log(id);

                // Menampilkan form bansos dan menghilangkan modal bansos
                $('#modalbansos').fadeOut();
                $('#form-bansos').fadeIn();
            });

            $('#cancel-form').click(function () {
               $('#form-bansos').fadeOut();
            });

            var detailRiwayatLaporan = $('[id^=detail-riwayat-laporan-]');
            detailRiwayatLaporan.on('click', function() {
                var detail = $('#modal-detail-riwayat-laporan');
                var modal = $('#modal-riwayat-laporan');
                detail.removeClass('hidden');
                detail.addClass('center');
                modal.addClass('hidden');

                var id = $(this).attr('id').replace('detail-riwayat-laporan-', '');
                $.get('/warga/laporan/' + id, function (data) {
                    console.log(data);
                    $('#data-laporan-bukti').attr('src', data.bukti ? data.bukti : '/no-image.png');
                    $('#data-laporan-tanggal').text(data.tanggal ? data.tanggal : 'N/A');
                    $('#data-laporan-keterangan').text(data.keterangan ? data.keterangan : 'N/A');
                    $('#data-laporan-status').text(data.status ? data.status : 'N/A');
                });
            });
        });

        document.getElementById('close-button-detail-riwayat-laporan').addEventListener('click', function() {
            var detail_riwayat_bansos = document.getElementById('modal-detail-riwayat-laporan');
            detail_riwayat_bansos.classList.add('hidden');
            detail_riwayat_bansos.classList.remove('center');
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
        document.getElementById('riwayat-bansos').addEventListener('click', function() {
            var riwayat_bansos = document.getElementById('modal-riwayat-bansos');
            riwayat_bansos.classList.remove('hidden');
        });
        document.getElementById('close-riwayat-bansos').addEventListener('click', function() {
            var riwayat_bansos = document.getElementById('modal-riwayat-bansos');
            riwayat_bansos.classList.add('hidden');
        });

         // riwayat laporan
        document.getElementById('riwayat-laporan').addEventListener('click', function() {
            var riwayat_laporan = document.getElementById('modal-riwayat-laporan');
            riwayat_laporan.classList.remove('hidden');
            riwayat_laporan.classList.add('center');
        });

        document.getElementById('close-riwayat-laporan').addEventListener('click', function() {
            var riwayat_laporan = document.getElementById('modal-riwayat-laporan');
            riwayat_laporan.classList.add('hidden');
            riwayat_laporan.classList.remove('center');
        });

        //detail
        document.getElementById('detail-riwayat-laporan').addEventListener('click', function() {
            var detail_riwayat_laporan = document.getElementById('modal-detail-riwayat-laporan');
            var riwayat_laporan = document.getElementById('modal-riwayat-laporan');
            detail_riwayat_laporan.classList.remove('hidden');
            riwayat_laporan.classList.add('hidden');
            riwayat_laporan.classList.remove('center');
        });
        document.getElementById('close-button-detail-riwayat-laporan').addEventListener('click', function() {
            var detail_riwayat_bansos = document.getElementById('modal-detail-riwayat-laporan');
            detail_riwayat_bansos.classList.add('hidden');
            detail_riwayat_bansos.classList.remove('center');
        });
    </script>
@endsection








