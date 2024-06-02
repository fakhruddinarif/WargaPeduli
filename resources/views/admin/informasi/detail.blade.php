@extends('layouts.template')
@section('content')
    @if (Session::has('errors'))
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
    @elseif(Session::has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium">{{ Session::get('error')}}</span>
        </div>
    @endif
    <div class="w-full flex flex-col justify-center items-center rounded-lg border-2">
        <div class="w-full flex flex-row justify-between items-center bg-blue-500 rounded-tr-lg rounded-tl-lg px-4 py-2">
            <div class="w-fit h-fit">
                <span class="font-normal text-sm text-white">Detail Data Informasi</span>
            </div>
            <div class="w-fit h-fit">
                <a href="{{url('/admin/informasi/')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                </a>
            </div>
        </div>
        <div class="w-full flex flex-col justify-center items-center gap-4 px-4 py-4">
            <form method="POST" enctype="multipart/form-data" action="{{ url('/admin/informasi/update/' . $data->id) }}" class="w-full flex flex-col justify-end items-end gap-4">
                @csrf
                {!! method_field('PUT') !!}
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="judul" class="block font-medium text-sm text-neutral-900">Judul<span class="font-medium text-sm text-red-600">*</span></label>
                    <input type="text" id="judul" name="judul" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Judul" value="{{ $data->judul }}">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="keterangan" class="block font-medium text-sm text-neutral-900">Keterangan<span class="font-medium text-sm text-red-600">*</span></label>
                    <textarea id="keterangan" name="keterangan" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Keterangan">{{ $data->keterangan }}</textarea>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="jenis" class="block font-medium text-sm text-neutral-900">Jenis Informasi<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="jenis" name="jenis" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                        <option class="font normal text-sm text-black" value="">Pilih Jenis Informasi</option>
                        @foreach($jenis as $value)
                            <option class="font normal text-sm text-black" value="{{ $value }}" {{ $value === $data->jenis ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="gambar" class="block font-medium text-sm text-neutral-900">Gambar<span class="font-medium text-sm text-red-600">*</span></label>
                    <input class="w-full px-2 py-3 text-sm text-neutral-900 border border-neutral-300 rounded-lg cursor-pointer bg-neutral-50 focus:outline-none" id="gambar" name="gambar" type="file">
                    @if($data->gambar)
                        <div class="w-full flex justify-center items-center mt-4">
                            <img id="output" class="w-96 h-48 rounded-lg" src="{{ $data->gambar }}" />
                        </div>
                    @endif
                </div>
                <div class="w-full flex flex-row justify-between">
                    <button id="delete-button" type="button" class="px-4 py-3 bg-red-500 rounded-md">
                        <span class="font-medium text-sm text-white">Hapus</span>
                    </button>
                    <button type="submit" class="px-4 py-3 bg-blue-500 rounded-md">
                        <span class="font-medium text-sm text-white">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @include('components.modals.modal_delete')
@endsection
