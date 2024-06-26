@extends('layouts.template')
@section('content')
    <div class="w-full flex flex-row justify-between items-center">
        <form>
            <div class="relative justify-between items-center">
                <input type="search" id="search-dropdown" class="block px-4 py-2 sm:py-4 w-48 sm:w-72 z-20 text-sm text-gray-900 bg-white rounded-lg border-2" placeholder="Cari Nama" required />
                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-[#0EA5E9] rounded-e-lg border border-[#0EA5E9]">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </form>
    </div>
    <div class="relative w-full overflow-x-auto shadow-md mt-4">
        <table class="w-full text-sm text-left rtl:text-right bg-[#EAEAEA]">
            <thead class="text-sm font-normal text-black">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">NKK</th>
                <th scope="col" class="px-6 py-3">Nama</th>
                <th scope="col" class="px-6 py-3">RT</th>
                <th scope="col" class="px-6 py-3">Jenis Bansos</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @for($i = 0; $i < 20; $i++)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $i + 1 }}</td>
                    <th scope="row" class="px-6 py-4 font-normal text-[#323C47] whitespace-nowrap">22417209000</th>
                    <td class="px-6 py-4">Tatang Rahman</td>
                    <td class="px-6 py-4">08</td>
                    <td class="px-6 py-4">PKH</td>
                    <td class="px-6 py-4">Ditolak</td>
                    <td class="px-6 py-4">
                        <a href="{{ url('/rw/bansos/detail') }}" class=" w-fit h-fit px-6 py-2 bg-[#0EA5E9] rounded-md">
                            <span class="font-semibold text-white">Detail</span>
                        </a>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
@endsection
