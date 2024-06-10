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
                <span class="font-normal text-sm text-white">Detail Data Laporan</span>
            </div>
            <div class="w-fit h-fit">
                <a href="{{url('/' . $url . '/laporan/')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                </a>
            </div>
        </div>
        <div class="w-full flex flex-wrap justify-center items-start gap-4 py-6">
            @if($data->bukti != null)
                <img src="{{ url($data->bukti) }}" class="w-full h-full md:w-1/3 md:h-1/6 rounded-lg">
            @else
                <img src="{{ asset('no-image.jpg') }}" class="w-full h-full md:w-1/3 md:h-1/6 rounded-lg">
            @endif
            <form method="POST" enctype="multipart/form-data" action="{{ url('/' . $url .'/laporan/update/' . $data->id) }}" class="w-full md:w-1/2 flex flex-col justify-end items-end gap-4 rounded-lg border px-4 py-8 shadow">
                @csrf
                {!! method_field('PUT') !!}
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <span class="font-medium text-base text-neutral-900">Tanggal</span>
                    <div class="w-full px-4 py-2 border rounded">
                        <span class="font-normal text-sm text-neutral-900">{{ $data->tanggal }}</span>
                    </div>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <span class="font-medium text-base text-neutral-900">Keterangan</span>
                    <div class="w-full px-4 py-2 border rounded flex flex-wrap">
                        <span class="font-normal text-sm text-neutral-900">{{ $data->keterangan }}</span>
                    </div>
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="status" class="block font-medium text-sm text-neutral-900">Status laporan<span class="font-medium text-sm text-red-600">*</span></label>
                    <select id="status" name="status" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                        <option class="font normal text-sm text-black" value="">Pilih Status Laporan</option>
                        @foreach($status as $value)
                            <option class="font normal text-sm text-black" value="{{ $value }}" {{ $value === $data->status ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
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
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
