@extends('layouts.template')
@section('content')
    @if (Session::has('error'))
        <div class="w-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium">{{ Session::get('success')}}</span>
        </div>
    @elseif(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">{{ Session::get('success')}}</span>
        </div>
    @endif
    <div class="w-full flex flex-col justify-center items-center rounded-lg border-2">
        <div class="w-full flex flex-row justify-between items-center bg-blue-500 rounded-tr-lg rounded-tl-lg px-4 py-2">
            <div class="w-fit h-fit">
                <span class="font-normal text-sm text-white">Detail Data Warga</span>
            </div>
            <div class="w-fit h-fit">
                <a href="{{url($url == 'admin' || $url =='rw' ? '/' . $url . '/penduduk/' : '/' . $url)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                </a>
            </div>
        </div>
        <div class="w-full flex flex-col justify-center items-center gap-4 px-4 py-4">
            <form method="POST" action="{{ url('/admin/penduduk/update/warga/' . $data->id) }}" enctype="multipart/form-data" class="w-full flex flex-col justify-end items-end gap-4">
                @csrf
                {!! method_field('PUT') !!}
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="keluarga_id" class="block font-medium text-sm text-neutral-900">Nomor Kartu Keluarga<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="keluarga_id" name="keluarga_id" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2" {{ $url == 'admin' ? '' : 'disabled' }}>
                        <option class="font normal text-sm text-black" value="">Pilih Nomor Kartu Keluarga</option>
                        @foreach($keluarga as $value)
                            <option class="font normal text-sm text-black" value="{{ $value->id }}" {{ $data->keluarga_id === $value->id ? 'selected' : '' }}>{{ $value->nkk }} - {{$value->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-full w-full">
                    <label for="dokumen" class="block text-sm font-medium leading-6 text-neutral-900">Dokumen Kartu Tanda Penduduk</label>
                    <div id="dropzone" class="mt-2 flex flex-col items-center gap-4 justify-center rounded-lg border border-dashed border-neutral-900/25 px-6 py-10">
                        @if($data->dokumen != null)
                            @if($url == 'admin')
                                <img src="{{asset($data->dokumen)}}" alt="Dokumen Kartu Tanda Penduduk" id="preview" class="w-[80%] md:w-[30%] h-[50%] rounded-lg">
                                <label for="dokumen" class="relative cursor-pointer rounded-md font-semibold text-white px-4 py-2 bg-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-white focus-within:ring-offset-2">
                                    <span>Change a file</span>
                                    <input id="dokumen" name="dokumen" type="file" class="sr-only">
                                </label>
                            @else
                                <img src="{{asset($data->dokumen)}}" alt="Dokumen Kartu Tanda Penduduk" id="preview" class="w-[80%] md:w-[30%] h-[50%] rounded-lg">
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
                    <label for="nik" class="block font-medium text-sm text-neutral-900">Nomor Kartu Tanda Penduduk<span class="font-medium text-sm text-red-600">*</span></label>
                    <input type="text" id="nik" name="nik" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Tanda Penduduk" value="{{ $data->nik }}" {{ $url == 'admin' ? '' : 'readonly' }}>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="nama" class="block font-medium text-sm text-neutral-900">Nama Lengkap<span class="font-medium text-sm text-red-600">*</span></label>
                    <input type="text" id="nama" name="nama" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Lengkap" value="{{ $data->nama }}" {{ $url == 'admin' ? '' : 'readonly' }}>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="jenis_kelamin" class="block font-medium text-sm text-neutral-900">Jenis Kelamin<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2" {{ $url == 'admin' ? '' : 'disabled' }}>
                        <option class="font normal text-sm text-black" value="">Pilih Jenis Kelamin</option>
                        @foreach($jenis_kelamin as $value)
                            <option class="font normal text-sm text-black" value="{{ $value }}" {{ $data->jenis_kelamin === $value ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="tempat_lahir" class="block font-medium text-sm text-neutral-900">Tempat Lahir<span class="font-medium text-sm text-red-600">*</span></label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" value="{{ $data->tempat_lahir }}" placeholder="Masukkan Tempat Lahir" {{ $url == 'admin' ? '' : 'readonly' }}>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="tanggal_lahir" class="block font-medium text-sm text-neutral-900">Tanggal Lahir<span class="font-medium text-sm text-red-600">*</span></label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" value="{{ $data->tanggal_lahir }}" placeholder="Masukkan Tanggal Lahir" {{ $url == 'admin' ? '' : 'readonly' }}>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="alamat" class="block font-medium text-sm text-neutral-900">Alamat<span class="font-medium text-sm text-red-600">*</span></label>
                    <input type="text" id="alamat" name="alamat" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" value="{{ $data->alamat }}" placeholder="Masukkan Alamat" {{ $url == 'admin' ? '' : 'readonly' }}>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="ibu_kandung" class="block font-medium text-sm text-neutral-900">Nama Ibu Kandung<span class="font-medium text-sm text-red-600">*</span></label>
                    <input type="text" id="ibu_kandung" name="ibu_kandung" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Alamat" value="{{ $data->ibu_kandung}}" {{ $url == 'admin' ? '' : 'readonly' }}>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="rt_id" class="block font-medium text-sm text-neutral-900">Rukun Tetangga<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="rt_id" name="rt_id" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2" {{ $url == 'admin' ? '' : 'disabled' }}>
                        <option class="font normal text-sm text-black" value="">Pilih Rukun Tetangga</option>
                        @foreach($rt as $value)
                            <option class="font normal text-sm text-black" value="{{ $value->id }}" {{ $data->rt_id === $value->id ? 'selected' : '' }}>RT 0{{ $value->nomor }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="status_keluarga" class="block font-medium text-sm text-neutral-900">Status Keluarga<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="status_keluarga" name="status_keluarga" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2" {{ $url == 'admin' ? '' : 'disabled' }}>
                        <option class="font normal text-sm text-black" value="">Pilih Status Keluarga</option>
                        @foreach($status_keluarga as $value)
                            <option class="font normal text-sm text-black" value="{{ $value }}" {{ $data->status_keluarga === $value ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="status_warga" class="block font-medium text-sm text-neutral-900">Status Warga<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="status_warga" name="status_warga" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2" {{ $url == 'admin' ? '' : 'disabled' }}>
                        <option class="font normal text-sm text-black" value="">Pilih Status Warga</option>
                        @foreach($status_warga as $value)
                            <option class="font normal text-sm text-black" value="{{ $value }}" {{ $data->status_warga === $value ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="telepon" class="block font-medium text-sm text-neutral-900">Nomor Telepon<span class="font-medium text-sm text-red-600">*</span></label>
                    <input type="tel" id="telepon" name="telepon" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Telepon" value="{{ $data->telepon }}" {{ $url == 'admin' ? '' : 'readonly' }}>
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
                        <form action="{{ url('/admin/penduduk/arsip/warga/' . $data->id) }}" enctype="multipart/form-data" method="post" class="w-full flex flex-col gap-4 justify-center items-center">
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
            $('.close').click(function() {
                $('#modal-arsip').addClass('hidden').removeClass('flex');
            });
        });
    </script>
@endsection
