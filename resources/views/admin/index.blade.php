@extends('layouts.template')
@section('content')
    <div class="w-full flex flex-row justify-center items-center gap-4">
        <div class="w-full flex flex-col justify-start items-start bg-neutral-200 px-4 py-4 rounded-lg gap-2">
            <div class="px-2 py-2 w-fit rounded-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#7f7f7f" viewBox="0 0 256 256"><path d="M234.38,210a123.36,123.36,0,0,0-60.78-53.23,76,76,0,1,0-91.2,0A123.36,123.36,0,0,0,21.62,210a12,12,0,1,0,20.77,12c18.12-31.32,50.12-50,85.61-50s67.49,18.69,85.61,50a12,12,0,0,0,20.77-12ZM76,96a52,52,0,1,1,52,52A52.06,52.06,0,0,1,76,96Z"></path></svg>
            </div>
            <span class="text-base font-medium text-neutral-500">Jumlah Warga</span>
            <span class="text-2xl font-bold text-black">{{ $countResident }} Orang</span>
        </div>
        <div class="w-full flex flex-col justify-start items-start bg-neutral-200 px-4 py-4 rounded-lg gap-2">
            <div class="px-2 py-2 w-fit rounded-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#7f7f7f" viewBox="0 0 256 256"><path d="M125.18,156.94a64,64,0,1,0-82.36,0,100.23,100.23,0,0,0-39.49,32,12,12,0,0,0,19.35,14.2,76,76,0,0,1,122.64,0,12,12,0,0,0,19.36-14.2A100.33,100.33,0,0,0,125.18,156.94ZM44,108a40,40,0,1,1,40,40A40,40,0,0,1,44,108Zm206.1,97.67a12,12,0,0,1-16.78-2.57A76.31,76.31,0,0,0,172,172a12,12,0,0,1,0-24,40,40,0,1,0-10.3-78.67,12,12,0,1,1-6.16-23.19,64,64,0,0,1,57.64,110.8,100.23,100.23,0,0,1,39.49,32A12,12,0,0,1,250.1,205.67Z"></path></svg>
            </div>
            <span class="text-base font-medium text-neutral-500">Jumlah Keluarga</span>
            <span class="text-2xl font-bold text-black">{{ $countFamily }} Keluarga</span>
        </div>
    </div>
@endsection
