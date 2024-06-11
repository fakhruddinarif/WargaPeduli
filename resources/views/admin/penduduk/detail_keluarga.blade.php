@extends('layouts.template')
@section('content')
    @if (Session::has('error'))
        <div class="w-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <ul>
                @foreach(Session::get('errors')->all() as $error)
                    <li class="font-medium">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">{{ Session::get('success')}}</span>
        </div>
    @endif
<div class="w-full flex flex-col justify-center items-center rounded-lg border-2">
    <div class="w-full flex flex-row justify-between items-center bg-blue-500 rounded-tr-lg rounded-tl-lg px-4 py-2">
        <div class="w-fit h-fit">
            <span class="font-normal text-sm text-white">Detail Data Keluarga</span>
        </div>
        <div class="w-fit h-fit">
            <a href="{{url($url == 'admin' || $url =='rw' ? '/' . $url . '/penduduk/' : '/' . $url)}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
            </a>
        </div>
    </div>
    <div class="w-full flex flex-col justify-center items-center gap-4 px-4 py-4">
        <form method="POST" action="{{ url('/admin/penduduk/update/keluarga/' . $data->id) }}" enctype="multipart/form-data" class="w-full flex flex-col justify-end items-end gap-4">
            @csrf
            {!! method_field('PUT') !!}
            <div class="col-span-full w-full">
                <label for="dokumen" class="block text-sm font-medium leading-6 text-neutral-900">Dokumen Kartu Keluarga</label>
                <div id="dropzone" class="mt-2 flex flex-col items-center gap-4 justify-center rounded-lg border border-dashed border-neutral-900/25 px-6 py-10">
                    @if($data->dokumen)
                        @if($url == 'admin')
                            <img src="{{ asset($data->dokumen) }}" alt="Dokumen Kartu Keluarga" id="preview" class="w-[80%] md:w-[30%] h-[50%] rounded-lg">
                            <label for="dokumen" class="relative cursor-pointer rounded-md font-semibold text-white px-4 py-2 bg-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-white focus-within:ring-offset-2">
                                <span>Change a file</span>
                                <input id="dokumen" name="dokumen" type="file" class="sr-only">
                            </label>
                        @else
                            <img src="{{ asset($data->dokumen) }}" alt="Dokumen Kartu Keluarga" id="preview" class="w-[80%] md:w-[30%] h-[50%] rounded-lg">
                        @endif
                    @else
                        @if($url == 'admin')
                            <div id="area-upload" class="text-center">
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
                        @else
                            <img src="{{ asset('no-image.jpg') }}" class="w-[80%] md:w-[30%] h-[50%] rounded-lg">
                        @endif
                    @endif
                </div>
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="nkk" class="block font-medium text-sm text-neutral-900">Nomor Kartu Keluarga<span class="font-medium text-sm text-red-600">*</span></label>
                <input type="text" id="nkk" name="nkk" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Kartu Keluarga" value="{{ $data->nkk }}" {{ $url == 'admin' ? '' : 'readonly' }}>
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="pendapatan" class="block font-medium text-sm text-neutral-900">Pendapatan</label>
                <input type="text" id="pendapatan" name="pendapatan" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Pendapatan" value="{{ $data->pendapatan }}" {{ $url == 'admin' ? '' : 'readonly' }}>
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="luas_bangunan" class="block font-medium text-sm text-neutral-900">Luas Bangunan</label>
                <input type="text" id="luas_bangunan" name="luas_bangunan" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Luas Bangunan" value="{{ $data->luas_bangunan }}" {{ $url == 'admin' ? '' : 'readonly' }}>
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="jumlah_tanggungan" class="block font-medium text-sm text-neutral-900">Jumlah Tanggungan</label>
                <input type="text" id="jumlah_tanggungan" name="jumlah_tanggungan" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Jumlah Tanggungan" value="{{ $data->jumlah_tanggungan }}" {{ $url == 'admin' ? '' : 'readonly' }}>
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="pajak_bumi" class="block font-medium text-sm text-neutral-900">Pajak Bumi</label>
                <input type="text" id="pajak_bumi" name="pajak_bumi" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Pajak Bumi" value="{{ $data->pajak_bumi }}" {{ $url == 'admin' ? '' : 'readonly' }}>
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="tagihan_listrik" class="block font-medium text-sm text-neutral-900">Tagihan Listrik</label>
                <input type="text" id="tagihan_listrik" name="tagihan_listrik" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Tagihan Listrik" value="{{ $data->tagihan_listrik }}" {{ $url == 'admin' ? '' : 'readonly' }}>
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
                                <td class="px-6 py-4">{{ ($value->telepon != null) ? $value->telepon : "N/A" }}</td>
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
                                    <a href="{{ url('/' . $url . '/penduduk/warga/' . $value->id) }}" class=" w-fit h-fit px-6 py-2 bg-blue-500 rounded-md">
                                        <span class="font-semibold text-white">Detail</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if($url == 'admin')
                <div class="flex flex-row justify-between items-end w-full">
                    <button id="arsip" type="button" class="px-4 py-3 bg-indigo-600 rounded-md">
                        <span class="font-medium text-sm text-white">Arsip</span>
                    </button>
                    <button type="submit" class="px-4 py-3 bg-blue-500 rounded-md">
                        <span class="font-medium text-sm text-white">Simpan</span>
                    </button>
                </div>
            @endif
        </form>
    </div>

    <div id="modal-arsip" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative flex p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow border w-full py-6">
                <button type="button" class="close absolute top-1 end-1 text-neutral-300 bg-transparent hover:bg-neutral-300 hover:text-neutral-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center flex flex-col gap-2 w-full justify-center items-center">
                    <form action="{{ url('/admin/penduduk/arsip/keluarga/' . $data->id) }}" enctype="multipart/form-data" method="post" class="w-full flex flex-col gap-4 justify-center items-center">
                        @csrf
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="status" class="block font-medium text-sm text-neutral-900">Status<span class="font-medium text-sm text-red-600">*</span></label>
                            <select id="status" name="status" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                                <option class="font normal text-sm text-black" value="">Pilih Status</option>
                                <option class="font normal text-sm text-black" value="Pindah">Pindah</option>
                                <option class="font normal text-sm text-black" value="Meninggal">Meninggal</option>
                                <option class="font normal text-sm text-black" value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label class="block font-medium text-sm text-neutral-900" for="surat">Surat<span class="font-medium text-sm text-red-600">*</span></label>
                            <input class="w-full text-sm text-neutral-900 px-4 py-3 border border-neutral-300 rounded-lg cursor-pointer bg-neutral-50 focus:outline-none" id="surat" name="surat" type="file">
                        </div>
                        <button type="submit" class="w-full px-4 py-3 bg-blue-500">
                            <span class="font-semibold text-white text-base rounded-lg">Simpan</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function() {
            // Show modal
            $('#arsip').click(function() {
                $('#modal-arsip').removeClass('hidden').addClass('flex');
            });

            // Hide modal
            $('.close').click(function() {
                $('#modal-arsip').addClass('hidden').removeClass('flex');
            });
        });
    </script>
@endsection
