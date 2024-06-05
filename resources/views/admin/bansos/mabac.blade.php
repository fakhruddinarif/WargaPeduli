@extends('layouts.template')
@section('content')
    <div class="w-full flex flex-row justify-between items-center bg-blue-500 rounded-tr-lg rounded-tl-lg px-4 py-2">
        <div class="w-fit h-fit">
            <span class="font-normal text-sm text-white">Detail Data Bantuan Sosial</span>
        </div>
        <div class="w-fit h-fit">
            <a href="{{url('/' . $url .'/bansos/')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
            </a>
        </div>
    </div>

    @if($number == 1)
        <div class="w-full flex flex-col gap-4 mb- mt-4">
            @if(!$values->isEmpty())
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
            @else
                <div class="w-full flex justify-center items-center bg-white rounded-lg p-4">
                    <span class="font-medium text-sm text-neutral-700">Data tidak tersedia</span>
                </div>
            @endif
        </div>
    @elseif($number == 2)
        <div class="w-full flex flex-col gap-4 mb- mt-4">
            <span class="font-semibold text-neutral-900 text-sm">Data Kriteria Penerima Bantuan Sosial</span>
            <div class="w-full relative overflow-x-auto mb-4">
                <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                    <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                    <tr>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3">Pendapatan</th>
                        <th scope="col" class="px-6 py-3">Luas Bangunan</th>
                        <th scope="col" class="px-6 py-3">Jumlah Tanggungan</th>
                        <th scope="col" class="px-6 py-3">Pajak Bumi</th>
                        <th scope="col" class="px-6 py-3">Tagihan Listrik</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($values as $key => $value)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">A{{ $key + 1 }}</th>
                            <td class="px-6 py-4">Rp.{{ number_format($value->pendapatan, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">{{ $value->luas_bangunan }}/m<sup>2</sup></td>
                            <td class="px-6 py-4">{{ $value->jumlah_tanggungan }} Orang</td>
                            <td class="px-6 py-4">Rp.{{ number_format($value->pajak_bumi, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">Rp.{{ number_format($value->tagihan_listrik, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @elseif($number == 3)
        <div class="w-full flex flex-col gap-4 mb- mt-4">
            <span class="font-semibold text-neutral-900 text-sm">Pembobotan dan Kriteria</span>
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
                    @foreach($weight as $key => $value)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">{{ $column[$key] }}</th>
                            <td class="px-6 py-4">{{ $value }}</td>
                            <td class="px-6 py-4">{{ $criteria[$key] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-full flex flex-wrap justify-start items-start gap-8">
                <div class="w-fit relative overflow-x-auto mb-4">
                    <table class="w-fit text-sm text-left rtl:text-right text-neutral-500">
                        <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                        <tr>
                            <th colspan="2" class="px-6 py-3">Pendapatan</th>
                        </tr>
                        <tr>
                            <th scope="col" class="px-6 py-3">Kondisi</th>
                            <th scope="col" class="px-6 py-3">Skor</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > Rp. 3.500.000  </th>
                                <td class="px-6 py-4">1</td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > Rp. 2.500.000 - ≤ Rp. 3.500.000  </th>
                                <td class="px-6 py-4">2</td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > Rp. 1.500.000 - ≤ Rp. 2.500.000  </th>
                                <td class="px-6 py-4">3</td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > Rp. 1.000.000 - ≤ Rp. 1.500.000  </th>
                                <td class="px-6 py-4">4</td>
                            </tr>
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> ≤ Rp. 1.000.000  </th>
                                <td class="px-6 py-4">5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-fit relative overflow-x-auto mb-4">
                    <table class="w-fit text-sm text-left rtl:text-right text-neutral-500">
                        <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                        <tr>
                            <th colspan="2" class="px-6 py-3">Luas Bangunan</th>
                        </tr>
                        <tr>
                            <th scope="col" class="px-6 py-3">Kondisi</th>
                            <th scope="col" class="px-6 py-3">Skor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > 35/m<sup>2</sup>  </th>
                            <td class="px-6 py-4">1</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > 30/m<sup>2</sup> - ≤ 35/m<sup>2</sup>  </th>
                            <td class="px-6 py-4">2</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > 20/m<sup>2</sup> - ≤ 30/m<sup>2</sup>  </th>
                            <td class="px-6 py-4">3</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > 12/m<sup>2</sup> - ≤ 20/m<sup>2</sup>  </th>
                            <td class="px-6 py-4">4</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> ≤ 12/m<sup>2</sup>  </th>
                            <td class="px-6 py-4">5</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-fit relative overflow-x-auto mb-4">
                    <table class="w-fit text-sm text-left rtl:text-right text-neutral-500">
                        <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                        <tr>
                            <th colspan="2" class="px-6 py-3">Jumlah Tanggungan</th>
                        </tr>
                        <tr>
                            <th scope="col" class="px-6 py-3">Kondisi</th>
                            <th scope="col" class="px-6 py-3">Skor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> 1 Orang  </th>
                            <td class="px-6 py-4">1</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> 2 Orang  </th>
                            <td class="px-6 py-4">2</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> 3 Orang  </th>
                            <td class="px-6 py-4">3</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> 4 Orang  </th>
                            <td class="px-6 py-4">4</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > 5 Orang  </th>
                            <td class="px-6 py-4">5</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-fit relative overflow-x-auto mb-4">
                    <table class="w-fit text-sm text-left rtl:text-right text-neutral-500">
                        <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                        <tr>
                            <th colspan="2" class="px-6 py-3">Pajak Bumi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="px-6 py-3">Kondisi</th>
                            <th scope="col" class="px-6 py-3">Skor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > Rp.120.000  </th>
                            <td class="px-6 py-4">1</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > Rp. 75.000 - ≤ Rp. 120.000  </th>
                            <td class="px-6 py-4">2</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > Rp. 50.000 - ≤ Rp. 75.000  </th>
                            <td class="px-6 py-4">3</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > Rp. 20.000 - ≤ Rp. 50.000  </th>
                            <td class="px-6 py-4">4</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> ≤ Rp. 20.000  </th>
                            <td class="px-6 py-4">5</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-fit relative overflow-x-auto mb-4">
                    <table class="w-fit text-sm text-left rtl:text-right text-neutral-500">
                        <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                        <tr>
                            <th colspan="2" class="px-6 py-3">Tagihan Listrik</th>
                        </tr>
                        <tr>
                            <th scope="col" class="px-6 py-3">Kondisi</th>
                            <th scope="col" class="px-6 py-3">Skor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > Rp. 150.000  </th>
                            <td class="px-6 py-4">1</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > Rp. 125.000 - ≤ Rp. 150.000  </th>
                            <td class="px-6 py-4">2</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > Rp. 100.000 - ≤ Rp. 125.000  </th>
                            <td class="px-6 py-4">3</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> > Rp. 70.000 - ≤ Rp. 100.000  </th>
                            <td class="px-6 py-4">4</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap"> ≤ Rp. 70.000  </th>
                            <td class="px-6 py-4">5</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @elseif($number == 4)
        <div class="w-full flex flex-col gap-4 mb- mt-4">
            <span class="font-semibold text-neutral-900 text-sm">Penilaian Alternatif untuk Setiap Kriteria</span>
            <div class="w-full relative overflow-x-auto mb-4">
                <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                    <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                    <tr>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3">Pendapatan</th>
                        <th scope="col" class="px-6 py-3">Luas Bangunan</th>
                        <th scope="col" class="px-6 py-3">Jumlah Tanggungan</th>
                        <th scope="col" class="px-6 py-3">Pajak Bumi</th>
                        <th scope="col" class="px-6 py-3">Tagihan Listrik</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $value)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">A{{ $key + 1 }}</th>
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
    @elseif($number == 5)
        <div class="w-full flex flex-col gap-4 mb- mt-4">
            <span class="font-semibold text-neutral-900 text-sm">Normalisasi Matriks Keputusan (X)</span>
            <div class="w-full relative overflow-x-scroll mb-4">
                <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                    <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                    <tr>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3">Pendapatan</th>
                        <th scope="col" class="px-6 py-3">Luas Bangunan</th>
                        <th scope="col" class="px-6 py-3">Jumlah Tanggungan</th>
                        <th scope="col" class="px-6 py-3">Pajak Bumi</th>
                        <th scope="col" class="px-6 py-3">Tagihan Listrik</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">Min</th>
                            @foreach($min as $value)
                                <td class="px-6 py-4">{{ $value }}</td>
                            @endforeach
                        </tr>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">Max</th>
                            @foreach($max as $value)
                                <td class="px-6 py-4">{{ $value }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="w-full flex flex-col justify-start items-start gap-4">
                <img src="{{ asset('mabac-x.png') }}" class="w-48 h-44">
                <div class="w-full relative overflow-x-auto mb-4">
                    <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                        <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                        <tr>
                            <th scope="col" class="px-6 py-3"></th>
                            <th scope="col" class="px-6 py-3">Pendapatan</th>
                            <th scope="col" class="px-6 py-3">Luas Bangunan</th>
                            <th scope="col" class="px-6 py-3">Jumlah Tanggungan</th>
                            <th scope="col" class="px-6 py-3">Pajak Bumi</th>
                            <th scope="col" class="px-6 py-3">Tagihan Listrik</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($normalization as $key => $value)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">A{{ $key + 1 }}</th>
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
        </div>
    @elseif($number == 6)
        <div class="w-full flex flex-col gap-4 mb- mt-4">
            <span class="font-semibold text-neutral-900 text-sm">Menghitung Elemen Matriks Tertimbang (V)</span>
            <img src="{{ asset('mabac-v.png') }}" class="w-60 h-32">
            <div class="w-full relative overflow-x-auto mb-4">
                <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                    <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                    <tr>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3">Pendapatan</th>
                        <th scope="col" class="px-6 py-3">Luas Bangunan</th>
                        <th scope="col" class="px-6 py-3">Jumlah Tanggungan</th>
                        <th scope="col" class="px-6 py-3">Pajak Bumi</th>
                        <th scope="col" class="px-6 py-3">Tagihan Listrik</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($weightedNormalization as $key => $value)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">A{{ $key + 1 }}</th>
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
    @elseif($number == 7)
        <div class="w-full flex flex-col gap-4 mb- mt-4">
            <span class="font-semibold text-neutral-900 text-sm">Menghitung Matriks Area Perkiraan Batas (G)</span>
            <img class="w-64 h-44" src="{{ asset('mabac-g.png') }}">
            <div class="w-full relative overflow-x-scroll mb-4">
                <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                    <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                    <tr>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3">Pendapatan</th>
                        <th scope="col" class="px-6 py-3">Luas Bangunan</th>
                        <th scope="col" class="px-6 py-3">Jumlah Tanggungan</th>
                        <th scope="col" class="px-6 py-3">Pajak Bumi</th>
                        <th scope="col" class="px-6 py-3">Tagihan Listrik</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">G</th>
                        @foreach($limit as $value)
                            <td class="px-6 py-4">{{ $value }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-full flex flex-col gap-4 mb- mt-4">
            <span class="font-semibold text-neutral-900 text-sm">Menghitung Elemen Matriks Jarak Alternatif (Q)</span>
            <img class="w-32 h-16" src="{{ asset('mabac-q.png') }}">
            <div class="w-full relative overflow-x-auto mb-4">
                <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                    <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                    <tr>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3">Pendapatan</th>
                        <th scope="col" class="px-6 py-3">Luas Bangunan</th>
                        <th scope="col" class="px-6 py-3">Jumlah Tanggungan</th>
                        <th scope="col" class="px-6 py-3">Pajak Bumi</th>
                        <th scope="col" class="px-6 py-3">Tagihan Listrik</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($distance as $key => $value)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">A{{ $key + 1 }}</th>
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
    @elseif($number == 8)
        <div class="w-full flex flex-col gap-4 mb- mt-4">
            @if($url == 'admin')
                <span class="font-semibold text-neutral-900 text-sm">Perangkingan</span>
                <img class="w-64 h-32" src="{{ asset('mabac-rank.png') }}">
            @endif
            @if($url == 'rw')
                <div class="w-full flex flex-row justify-end items-end">
                    <a href="{{ url('/' . $url .'/bansos/mabac/download/' . $bansos->id) }}" class="w-fit px-4 py-2 bg-blue-500 border-blue-500 border-2 rounded-md"><span class="font-medium text-white text-sm">Download</span></a>
                </div>
            @endif
            <div class="w-full relative overflow-x-scroll mb-4">
                <table class="w-full text-sm text-left rtl:text-right text-neutral-500">
                    <thead class="text-xs text-neutral-700 uppercase bg-neutral-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">Ranking</th>
                        <th scope="col" class="px-6 py-3">NKK</th>
                        <th scope="col" class="px-6 py-3">Kepala Keluarga</th>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <th scope="col" class="px-6 py-3">RT</th>
                        <th scope="col" class="px-6 py-3">Skor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $rankNumber = 1;
                    @endphp
                    @foreach($rank as $key => $value)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-neutral-900 whitespace-nowrap">{{ $rankNumber++ }}</th>
                            <td class="px-6 py-4">{{ $keluarga[$key]->nkk }}</td>
                            <td class="px-6 py-4">{{ $keluarga[$key]->nama }}</td>
                            <td class="px-6 py-4">{{ $keluarga[$key]->alamat }}</td>
                            <td class="px-6 py-4">0{{ $keluarga[$key]->nomor }}</td>
                            <td class="px-6 py-4">{{ $value }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <div class="flex flex-row @if($number == 1 && !$values->isEmpty())
        justify-end
    @elseif($number == 8)
        justify-start
    @else
        justify-between
    @endif w-full items-end">
        @if($number > 1 && $url == 'admin' && !$values->isEmpty())
            <a href="{{ url('/admin/bansos/mabac/' . $bansos->id . '/' . ($number - 1)) }}" class="w-fit px-4 py-2 bg-white border-blue-500 border-2 rounded-md"><span class="font-medium text-blue-500 text-sm">Sebelumnya</span></a>
        @endif
        @if($number < 8 && !$values->isEmpty() && $url == 'admin')
                <a href="{{ url('/admin/bansos/mabac/' . $bansos->id . '/' . ($number + 1)) }}" class="w-fit px-4 py-2 bg-blue-500 rounded-md"><span class="font-medium text-white text-sm">Berikutnya</span></a>
        @endif
            @if($url ==  'rw')
                @if($number == 1 && !$values->isEmpty())
                    <a href="{{ url('/' . $url .'/bansos/mabac/' . $bansos->id . '/' . 8) }}" class="w-fit px-4 py-2 bg-green-500 rounded-md"><span class="font-medium text-white text-sm">Rangking</span></a>
                @elseif($number == 8)
                    <a href="{{ url('/' . $url .'/bansos/mabac/' . $bansos->id . '/' . 1) }}" class="w-fit px-4 py-2 bg-white border-blue-500 border-2 rounded-md"><span class="font-medium text-blue-500 text-sm">Kembali</span></a>
                @endif
            @endif
    </div>
@endsection
