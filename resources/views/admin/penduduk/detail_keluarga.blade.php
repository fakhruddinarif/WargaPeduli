@extends('layouts.template')
@section('content')
<div class="w-full flex flex-col justify-center items-center rounded-lg border-2">
    <div class="w-full flex flex-row justify-between items-center bg-blue-500 rounded-tr-lg rounded-tl-lg px-4 py-2">
        <div class="w-fit h-fit">
            <span class="font-normal text-sm text-white">Detail Data Keluarga</span>
        </div>
        <div class="w-fit h-fit">
            <a href="{{url('/admin/penduduk/')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
            </a>
        </div>
    </div>
    <div class="w-full flex flex-col justify-center items-center gap-4 px-4 py-4">
        <form method="PUT" action="{{ url('/admin/penduduk/keluarga' . $data->id) }}" enctype="multipart/form-data" class="w-full flex flex-col justify-end items-end gap-4">
            @csrf
            <div class="col-span-full w-full">
                <label for="dokumen" class="block text-sm font-medium leading-6 text-neutral-900">Dokumen Kartu Tanda Penduduk</label>
                <div id="dropzone" class="mt-2 flex justify-center rounded-lg border border-dashed border-neutral-900/25 px-6 py-10">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                        </svg>
                        <div class="mt-4 flex text-sm leading-6 text-neutral-600">
                            <label for="dokumen" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="dokumen" name="dokumen" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs leading-5 text-neutral-600">PNG, JPG, GIF up to 2MB</p>
                    </div>
                </div>
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="nkk" class="block font-medium text-sm text-neutral-900">Nomor Kartu Keluarga<span class="font-medium text-sm text-red-600">*</span></label>
                <input type="text" id="nkk" name="nkk" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Tanda Penduduk" value="{{ $data->nkk }}">
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="pendapatan" class="block font-medium text-sm text-neutral-900">Pendapatan</label>
                <select id="pendapatan" name="pendapatan" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                    <option class="font normal text-sm text-black" value="">Pilih Pendapatan</option>
                    @foreach($pendapatan as $key => $value)
                        <option class="font normal text-sm text-black" value="{{ $key }}" {{ $data->pendapatan === $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="luas_bangunan" class="block font-medium text-sm text-neutral-900">Luas Bangunan</label>
                <select id="luas_bangunan" name="luas_bangunan" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                    <option class="font normal text-sm text-black" value="">Pilih Luas Bangunan</option>
                    @foreach($luas_bangunan as $key => $value)
                        <option class="font normal text-sm text-black" value="{{ $key }}" {{ $data->luas_bangunan === $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="jumlah_tanggungan" class="block font-medium text-sm text-neutral-900">Jumlah Tanggungan</label>
                <select id="jumlah_tanggungan" name="jumlah_tanggungan" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                    <option class="font normal text-sm text-black" value="">Pilih Jumlah Tanggungan</option>
                    @foreach($jumlah_tanggungan as $key => $value)
                        <option class="font normal text-sm text-black" value="{{ $key }}" {{ $data->jumlah_tanggungan === $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="pajak_bumi" class="block font-medium text-sm text-neutral-900">Pajak Bumi</label>
                <select id="pajak_bumi" name="pajak_bumi" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                    <option class="font normal text-sm text-black" value="">Pilih Pajak Bumi</option>
                    @foreach($pajak_bumi as $key => $value)
                        <option class="font normal text-sm text-black" value="{{ $key }}" {{ $data->pajak_bumi === $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="tagihan_listrik" class="block font-medium text-sm text-neutral-900">Tagihan Listrik</label>
                <select id="tagihan_listrik" name="tagihan_listrik" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                    <option class="font normal text-sm text-black" value="">Pilih Tagihan Listrik</option>
                    @foreach($tagihan_listrik as $key => $value)
                        <option class="font normal text-sm text-black" value="{{ $key }}" {{ $data->tagihan_listrik === $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <span class="font-semibold text-sm text-neutral-900">Anggota Keluarga</span>
                <div class="relative w-full overflow-x-auto shadow-md mt-4">
                    <table class="w-full text-sm text-left rtl:text-right bg-neutral-200">
                        <thead class="text-sm font-normal text-black">
                        <tr>
                            <th scope="col" class="px-6 py-3">NIK</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Telepon</th>
                            <th scope="col" class="px-6 py-3">Status Keluarga</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data->warga as $key => $value)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-normal text-neutral-900 whitespace-nowrap">{{$value->nik }}</th>
                                <td class="px-6 py-4">{{ $value->nama }}</td>
                                <td class="px-6 py-4">{{ ($value->telepon != null) ? $value->telepon : "Belum diatur" }}</td>
                                <td class="px-6 py-4"><span class="
                                @if($value->status_keluarga == 'Kepala Keluarga')
                                bg-blue-500 text-white
                                @elseif($value->status_keluarga == 'Istri')
                                bg-pink-500 text-white
                                @elseif($value->status_keluarga == 'Anak')
                                bg-teal-500 text-white
                                @elseif($value->status_keluarga == 'Menantu')
                                bg-cyan-500 text-white
                                @elseif($value->status_keluarga == 'Cucu')
                                bg-fuchsia-600 text-white
                                @else
                                bg-violet-500 text-white
                                @endif
                                px-2 py-2 rounded-md">{{ $value->status_keluarga }}</span></td>
                                <td class="px-6 py-4">
                                    <a href="{{ url('/admin/penduduk/warga/' . $value->id) }}" class=" w-fit h-fit px-6 py-2 bg-blue-500 rounded-md">
                                        <span class="font-semibold text-white">Detail</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex flex-row justify-between items-end w-full">
                <button type="submit" class="px-4 py-3 bg-blue-500 rounded-md">
                    <span class="font-medium text-sm text-white">Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection