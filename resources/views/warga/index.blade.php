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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#3b82f6" viewBox="0 0 24 24" strokeWidth={1.5} stroke="#fff" class="bg-white rounded-3xl w-30 h-40">
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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#3b82f6" viewBox="0 0 24 24" strokeWidth={1.5} stroke="#fff" class="bg-blue-500 rounded-3xl ml-3 sm:mt-0 w-30 h-40">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#3b82f6" viewBox="0 0 24 24" strokeWidth={1.5} stroke="#fff" class="bg-blue-500 rounded-3xl ml-3 sm:mt-0 w-30 h-40">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#3b82f6" viewBox="0 0 24 24" strokeWidth={1.5} stroke="#fff" class="bg-blue-500 rounded-3xl ml-3 sm:mt-0 w-30 h-40">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                    </svg>
                </div>
                <div class="w-full flex flex-col justify-center items-center gap-4">
                    <div class="w-full px-2">
                        <h3 class="text-xl font-semibold whitespace-nowrap">Riwayat Laporan</h3>
                        <span class="text-base text-neutral-600 font-normal whitespace-nowrap">Laporan Uhuyy</span>
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
                    <input type="text" id="keterangan" name="keterangan" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Keterangan">
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
            <span class="text-base font-semibold text-white">Pengajuan Bansos</span>
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








