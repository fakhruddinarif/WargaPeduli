@extends('layouts.template')
@section('content')
    <div class="w-full flex flex-row justify-between items-center bg-blue-500 rounded-tr-lg rounded-tl-lg px-4 py-2">
        <div class="w-fit h-fit">
            <span class="font-normal text-sm text-white">Detail Data Bantuan Sosial</span>
        </div>
        <div class="w-fit h-fit">
            <a href="{{url('/admin/bansos/')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
            </a>
        </div>
    </div>

    <div class="w-full flex flex-col gap-4 mb- mt-4">
        <span class="font-semibold text-neutral-900 text-sm">Data Penerima Bantuan Sosial</span>
        <div class="w-full relative overflow-x-auto mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                <tr>
                    <th scope="col" class="px-6 py-3">NKK</th>
                    <th scope="col" class="px-6 py-3">Kepala Keluarga</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                    <th scope="col" class="px-6 py-3">RT</th>
                </tr>
                </thead>
                <tbody>
                @foreach($keluarga as $value)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">{{ $value->nkk }}</th>
                        <td class="px-6 py-4">{{ $value->nama }}</td>
                        <td class="px-6 py-4">{{ $value->alamat }}</td>
                        <td class="px-6 py-4">0{{ $value->nomor }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full flex flex-col gap-4 mb-4">
        <span class="font-semibold text-neutral-900 text-sm">Bobot dan Jenis Kriteria</span>
        <div class="w-full relative overflow-x-auto mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                <tr>
                    <th scope="col" class="px-6 py-3">Kriteria</th>
                    <th scope="col" class="px-6 py-3">Bobot</th>
                    <th scope="col" class="px-6 py-3">Jenis</th>
                </tr>
                </thead>
                <tbody>
                @for($i = 0; $i < count($criteria); $i++)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">{{ $column[$i] }}</th>
                        <td class="px-6 py-4">{{ $weight[$i] }}</td>
                        <td class="px-6 py-4">{{ $criteria[$i] }}</td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full flex flex-col gap-4 mb-4">
        <span class="font-semibold text-neutral-900 text-sm">Matriks Keputusan Awal (X)</span>
        <div class="w-full relative overflow-x-auto mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3">Pendapatan (C1)</th>
                    <th scope="col" class="px-6 py-3">Luas Bangunan (C2)</th>
                    <th scope="col" class="px-6 py-3">Jumlah Tanggungan (C3)</th>
                    <th scope="col" class="px-6 py-3">Pajak Bumi (C4)</th>
                    <th scope="col" class="px-6 py-3">Tagihan Listrik (C5)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">A{{ $key + 1 }}</td>
                        <td class="px-6 py-4">{{ $value->pendapatan }}</td>
                        <td class="px-6 py-4">{{ $value->luas_bangunan }}</td>
                        <td class="px-6 py-4">{{ $value->jumlah_tanggungan }}</td>
                        <td class="px-6 py-4">{{ $value->pajak_bumi }}</td>
                        <td class="px-6 py-4">{{ $value->tagihan_listrik }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full flex flex-col gap-4 mb-4">
        <span class="font-semibold text-neutral-900 text-sm">Mencari nilai Min Max tiap kriteria</span>
        <div class="w-full relative overflow-x-auto mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3">Pendapatan (C1)</th>
                    <th scope="col" class="px-6 py-3">Luas Bangunan (C2)</th>
                    <th scope="col" class="px-6 py-3">Jumlah Tanggungan (C3)</th>
                    <th scope="col" class="px-6 py-3">Pajak Bumi (C4)</th>
                    <th scope="col" class="px-6 py-3">Tagihan Listrik (C5)</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">Min</td>
                        @foreach($min as $value)
                        <td class="px-6 py-4">{{ $value }}</td>
                      @endforeach
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">Max</td>
                        @foreach($max as $value)
                            <td class="px-6 py-4">{{ $value }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full flex flex-col gap-4 mb-4">
        <span class="font-semibold text-neutral-900 text-sm">Menentukan nilai normalisasi matriks keputusan</span>
        <div class="w-full relative overflow-x-auto mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3">Pendapatan (C1)</th>
                    <th scope="col" class="px-6 py-3">Luas Bangunan (C2)</th>
                    <th scope="col" class="px-6 py-3">Jumlah Tanggungan (C3)</th>
                    <th scope="col" class="px-6 py-3">Pajak Bumi (C4)</th>
                    <th scope="col" class="px-6 py-3">Tagihan Listrik (C5)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($normalization as $key => $value)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">A{{ $key + 1 }}</td>
                        <td class="px-6 py-4">{{ $value['pendapatan'] }}</td>
                        <td class="px-6 py-4">{{ $value['luas_bangunan'] }}</td>
                        <td class="px-6 py-4">{{ $value['jumlah_tanggungan'] }}</td>
                        <td class="px-6 py-4">{{ $value['pajak_bumi'] }}</td>
                        <td class="px-6 py-4">{{ $value['tagihan_listrik'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full flex flex-col gap-4 mb-4">
        <span class="font-semibold text-neutral-900 text-sm">Menghitung Elemen Matriks Tertimbang (V)</span>
        <div class="w-full relative overflow-x-auto mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3">Pendapatan (C1)</th>
                    <th scope="col" class="px-6 py-3">Luas Bangunan (C2)</th>
                    <th scope="col" class="px-6 py-3">Jumlah Tanggungan (C3)</th>
                    <th scope="col" class="px-6 py-3">Pajak Bumi (C4)</th>
                    <th scope="col" class="px-6 py-3">Tagihan Listrik (C5)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($weightedNormalization as $key => $value)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">A{{ $key + 1 }}</td>
                        <td class="px-6 py-4">{{ $value['pendapatan'] }}</td>
                        <td class="px-6 py-4">{{ $value['luas_bangunan'] }}</td>
                        <td class="px-6 py-4">{{ $value['jumlah_tanggungan'] }}</td>
                        <td class="px-6 py-4">{{ $value['pajak_bumi'] }}</td>
                        <td class="px-6 py-4">{{ $value['tagihan_listrik'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full flex flex-col gap-4 mb-4">
        <span class="font-semibold text-neutral-900 text-sm">Menghitung Matriks Area Perkiraan Batas (G)</span>
        <div class="w-full relative overflow-x-auto mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3">Pendapatan (C1)</th>
                    <th scope="col" class="px-6 py-3">Luas Bangunan (C2)</th>
                    <th scope="col" class="px-6 py-3">Jumlah Tanggungan (C3)</th>
                    <th scope="col" class="px-6 py-3">Pajak Bumi (C4)</th>
                    <th scope="col" class="px-6 py-3">Tagihan Listrik (C5)</th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-semibold">G</td>
                    @foreach($limit as $value)
                        <td class="px-6 py-4">{{ $value }}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full flex flex-col gap-4 mb-4">
        <span class="font-semibold text-neutral-900 text-sm">Menghitung Elemen Matriks Jarak Alternatif (Q)</span>
        <div class="w-full relative overflow-x-auto mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3">Pendapatan (C1)</th>
                    <th scope="col" class="px-6 py-3">Luas Bangunan (C2)</th>
                    <th scope="col" class="px-6 py-3">Jumlah Tanggungan (C3)</th>
                    <th scope="col" class="px-6 py-3">Pajak Bumi (C4)</th>
                    <th scope="col" class="px-6 py-3">Tagihan Listrik (C5)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($distance as $key => $value)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">A{{ $key + 1 }}</td>
                        <td class="px-6 py-4">{{ $value['pendapatan'] }}</td>
                        <td class="px-6 py-4">{{ $value['luas_bangunan'] }}</td>
                        <td class="px-6 py-4">{{ $value['jumlah_tanggungan'] }}</td>
                        <td class="px-6 py-4">{{ $value['pajak_bumi'] }}</td>
                        <td class="px-6 py-4">{{ $value['tagihan_listrik'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-full flex flex-col gap-4 mb-4">
        <span class="font-semibold text-neutral-900 text-sm">Perangkingan</span>
        <div class="w-full relative overflow-x-auto mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                <tr>
                    <th scope="col" class="px-6 py-3">NKK</th>
                    <th scope="col" class="px-6 py-3">Kepala Keluarga</th>
                    <th scope="col" class="px-6 py-3">Skor</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rank as $key => $value)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">{{ $keluarga[$key]->nkk }}</td>
                        <td class="px-6 py-4">{{ $keluarga[$key]->nama }}</td>
                        <td class="px-6 py-4">{{ $value }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
