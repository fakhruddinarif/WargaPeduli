@extends('layouts.template')
@section('content')
    <div class="w-full">
        <form class="w-full flex flex-row justify-between items-center">
            <div class="relative justify-between items-center">
                <input type="search" id="search-dropdown" class="block px-4 py-2 sm:py-4 w-48 sm:w-72 z-20 text-sm text-gray-900 bg-white rounded-lg border-2" placeholder="Cari Laporan" required />
                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-[#0EA5E9] rounded-e-lg border border-[#0EA5E9]">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
            <select name="jenis" id="jenis" class="w-24 md:w-40 px-4 py-3 border-2 rounded-lg">
                <option value="">Semua</option>
                @for($i = 0; $i < 8; $i++)
                    <option value="{{ $i + 1 }}">RT 0{{ $i + 1 }}</option>
                @endfor
            </select>
        </form>
    </div>

    <div class="relative w-full overflow-x-auto shadow-md mt-4">
        <table class="w-full text-sm text-left rtl:text-right bg-[#EAEAEA]">
            <thead class="text-sm font-normal text-black">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Tanggal</th>
                <th scope="col" class="px-6 py-3">Nama</th>
                <th scope="col" class="px-6 py-3">Jenis Laporan</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @for($i = 0; $i < 20; $i++)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $i + 1 }}</td>
                    <th scope="row" class="px-6 py-4 font-normal text-[#323C47] whitespace-nowrap">05 - Mei - 2024</th>
                    <td class="px-6 py-4">Tatang Rahman</td>
                    <td class="px-6 py-4">Infrastruktur</td>
                    <td class="px-6 py-4">Selesai</td>
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
