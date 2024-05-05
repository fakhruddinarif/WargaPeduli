@extends('layouts.template')
@section('content')
    <div class="flex flex-row justify-between items-center w-full border-2 rounded-lg px-2 py-2">
        <div class="flex flex-row items-center w-fit">
            <button class="w-fit px-4 py-2 border-2 rounded-l-lg bg-[#0EA5E9]">
                <span class="font-semibold text-sm lg:text-base text-white">Data Keluarga</span>
            </button>
            <button class="w-fit px-4 py-2 border-2 rounded-r-lg bg-neutral-200">
                <span class="font-semibold text-sm lg:text-base text-black">Data Penduduk</span>
            </button>
        </div>
        <div class="flex flex-row items-center gap-1">
            <form class="flex flex-row items-center gap-1">
                <div class="relative justify-between items-center">
                    <input type="search" id="search-dropdown" class="block px-4 py-2 sm:py-4 w-36 sm:w-44 z-20 text-sm text-gray-900 bg-white rounded-lg border-2" placeholder="Cari Nama" required />
                    <button type="submit" class="absolute top-0 end-0 p-2 text-sm font-medium h-full text-white bg-[#0EA5E9] rounded-e-lg border border-[#0EA5E9]">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
                <select name="rt" id="rt" class="lg:w-32 xl:w-40 px-4 py-3 border-2 rounded-lg">
                    <option value="">Semua</option>
                    @for($i = 0; $i < 8; $i++)
                        <option value="{{ $i + 1 }}">RT 0{{ $i + 1 }}</option>
                    @endfor
                </select>
            </form>
            <div class="flex justify-center items-center w-fit h-fit rounded-lg bg-[#0EA5E9]">
                <a href="{{ url('penduduk/create') }}" class="py-3 px-5 xl:px-10">
                    <span class="font-medium text-sm text-white">Tambah</span>
                </a>
            </div>
        </div>
    </div>

    <div class="relative w-full overflow-x-auto shadow-md mt-4">
        <table class="w-full text-sm text-left rtl:text-right bg-[#EAEAEA]">
            <thead class="text-sm font-normal text-black">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">NKK</th>
                <th scope="col" class="px-6 py-3">Kepala Keluarga</th>
                <th scope="col" class="px-6 py-3">Jumlah Penduduk</th>
                <th scope="col" class="px-6 py-3">Alamat</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @for($i = 0; $i < 20; $i++)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $i + 1 }}</td>
                    <th scope="row" class="px-6 py-4 font-normal text-[#323C47] whitespace-nowrap">22417209000</th>
                    <td class="px-6 py-4">Tatang Rahman</td>
                    <td class="px-6 py-4">8</td>
                    <td class="px-6 py-4">Jalan Mawar No. 93 Kota Malang</td>
                    <td class="px-6 py-4">
                        <a href="{{ url('bansos/detail') }}" class=" w-fit h-fit px-6 py-2 bg-[#0EA5E9] rounded-md">
                            <span class="font-semibold text-white">Detail</span>
                        </a>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
@endsection
