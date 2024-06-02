@extends('layouts.app')
@section('template')
    @include('layouts.navigation')
    <nav class="fixed z-20 w-full bg-white mt-[60px] border-b-2">
        <div class="flex flex-row justify-between items-center w-full border-2 border-b-neutral-50 gap-8 md:gap-12 lg:gap-10 px-2 sm:px-4">
            <div class="flex justify-start items-center rtl:justify-end w-fit">
                <a href="{{ url('/') }}" class="flex flex-row justify-start items-center gap-3 lg:w-44 px-2 py-3">
                    <img src="{{ asset('logo-polinema.png') }}" alt="logo-polinema" class="w-10 h-10">
                    <span class="font-semibold text-sm text-neutral-900 sm:text-base">Warga Peduli</span>
                </a>
            </div>
            <div class="flex flex-row justify-end items-center px-2 py-3 w-full sm:px-4 gap-2">
                <button type="button" id="pengajuan" class="px-3 sm:px-5 py-2 w-fit bg-white border-blue-500 border-2 rounded-md">
                    <span class="font-medium text-base text-blue-500">Pengajuan</span>
                </button>
                <a href="{{ url('/login') }}" class="px-3 sm:px-5 py-2 w-fit bg-blue-500 border-2 rounded-md">
                    <span class="font-medium text-base text-white">Login</span>
                </a>
            </div>
        </div>
    </nav>
    @include('components.modals.modal_pengajuan')
    <div class="w-full h-screen overflow-y-scroll">
        <img src="{{ asset('laia-nunez.jpg') }}" class="w-full h-[35rem]">
        {{-- <div class="fixed top-[48%] left-1/2 -translate-x-1/2 -translate-y-1/2 bg-neutral-950/70 px-4 py-2">
            <span class="text-base font-medium text-white">Website Desa</span>
            <p class="text-sm font-normal text-white">
                Website desa adalah sebuah website yang dibuat untuk menampilkan informasi tentang suatu desa secara online
            </p>
        </div> --}}
        <div class="container mx-auto max-w-7xl">
            <div class="px-4 bg-white">
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Berita Terkini -->
                    <div class="w-full md:w-1/2">
                        <h1 class="text-2xl text-blue-500 mb-4 mt-8">Berita <strong>Terkini</strong></h1>
                        <hr class="w-[190%] h-0.5 mt-2 border-0 rounded bg-blue-500">
                        <div class="flex flex-col mb-8">
                            <div class="flex items-center">
                                <div class="bg-white mr-4 py-22 mt-14 rounded-md">
                                    <img src="{{ asset('laia-nunez.jpg') }}" class="w-[50rem] h-[13rem]">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h class="text-lg text-blue-500 mb-36 ml-5">Melakukan diagnosa jaringan</h>
                                    <p class="text-sm text-gray-400 font-normal ml-5">asndo</p>
                                </div>
                            </div>
                            <div class="bg-blue-500/90 w-[40%] h-[3rem] mt-7 px-6 py-3">
                                <h2 class="text-white mx-2">Mar 17, 2024</h2>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-white mr-4 py-22 mt-14 rounded-md">
                                    <img src="{{ asset('laia-nunez.jpg') }}" class="w-[50rem] h-[13rem]">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h2 class="text-lg text-blue-500 mb-36 ml-5">Melakukan diagnosa jaringan</h2>
                                    <p class="text-sm text-gray-400 font-normal ml-5">asndo</p>
                                </div>
                            </div>
                            <div class="bg-blue-500/90 w-[40%] h-[3rem] mt-7 px-6 py-3">
                                <h2 class="text-white mx-2">Mar 17, 2024</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Pengumuman -->
                    <div class="w-full md:w-1/2 ml-96">
                        <h1 class="text-2xl text-blue-500 mb-4 mt-8">Pengumuman</h1>
                        <hr class="w-[100%] h-0.5 mt-2 border-0 rounded bg-blue-500">
                        <div class="flex flex-col mb-8">
                            <div class="flex items-center">
                                <div class="mt-4 ml-0.25 bg-blue-800 rounded py-2">
                                    <span class="text-lg text-white mr-[10rem] text-center ml-6">Pengumuman penting desa</span>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="mt-4 ml-0.25 bg-blue-800 rounded py-2">
                                    <span class="text-lg text-white mr-[10rem] text-center ml-6">Pengumuman penting desa</span>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="mt-4 ml-0.25 bg-blue-800 rounded py-2">
                                    <span class="text-lg text-white mr-[10rem] text-center ml-6">Pengumuman penting desa</span>
                                </div>
                            </div>
                        </div>

                        <!-- Agenda Kegiatan -->
                        <h1 class="text-2xl text-blue-500 mb-4 mt-8">Agenda <Strong>Kegiatan</Strong></h1>
                        <hr class="w-[100%] h-0.5 mt-2 border-0 rounded bg-blue-500">
                        <div class="flex flex-col mb-8">
                            <div class="flex items-center">
                                <div class="mt-4 ml-0.25 bg-blue-800 rounded py-2">
                                    <span class="text-lg text-white mr-[10rem] text-center ml-6">Pengumuman penting desa</span>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="mt-4 ml-0.25 bg-blue-800 rounded py-2">
                                    <span class="text-lg text-white mr-[10rem] text-center ml-6">Pengumuman penting desa</span>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="mt-4 ml-0.25 bg-blue-800 rounded py-2">
                                    <span class="text-lg text-white mr-[10rem] text-center ml-6">Pengumuman penting desa</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const pengajuan = document.getElementById('pengajuan');
        const close = document.querySelectorAll('.close');

        pengajuan.addEventListener('click', () => {
            let popup = document.getElementById('modal-pengajuan');
            popup.classList.remove('hidden');
            popup.classList.add('flex');
            setTimeout(() => {
                popup.style.transform = 'translateY(0)';
                popup.style.opacity = '1';
            }, 50);
        });
        close.forEach((btn) => {
            btn.addEventListener('click', () => {
                let popup = document.getElementById('modal-pengajuan');
                setTimeout(() => {
                    popup.classList.add('hidden');
                    popup.classList.remove('flex');
                }, 150)
                popup.style.transform = '';
                popup.style.opacity = '';
            });
        });

        document.getElementById('cekPengajuan').addEventListener('click', function() {
            var modalPengajuan = document.getElementById('modal-pengajuan');
            var modalFormCek = document.getElementById('modal-form-cek');

            modalPengajuan.classList.add('hidden');
            modalFormCek.classList.remove('hidden');
            modalFormCek.classList.add('flex');
        });
    </script>
@endsection
