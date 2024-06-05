@extends('layouts.template')
@section('content')
    @if(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">{{ Session::get('success')}}</span>
        </div>
    @elseif(Session::has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium">{{ Session::get('error')}}</span>
        </div>
    @endif
    <div class="relative w-full overflow-x-auto shadow-md mt-4">
        <table class="w-full text-sm text-left rtl:text-right bg-neutral-200">
            <thead class="text-sm font-normal text-black">
            <tr>
                <th scope="col" class="px-6 py-3">NKK</th>
                <th scope="col" class="px-6 py-3">Alamat</th>
                <th scope="col" class="px-6 py-3">Kepala Keluarga</th>
                <th scope="col" class="px-6 py-3">RT</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @if(count($data) > 0)
                @foreach($data as $key => $value)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-normal text-neutral-900 whitespace-nowrap">{{ $value->nkk }}</th>
                        <td class="px-6 py-4">{{ $value->alamat }}</td>
                        <td class="px-6 py-4">{{ $value->nama }}</td>
                        <td class="px-6 py-4">0{{ $value->nomor }}</td>
                        <td class="px-6 py-4 flex flex-wrap gap-4">
                            <form action="{{ url('/rw/bansos/' . $value->id . '/terima') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="mr-2 w-fit h-fit px-4 py-2 bg-green-500 rounded-md">
                                    <span class="font-semibold text-white">Terima</span>
                                </button>
                            </form>
                            <form action="{{ url('/rw/bansos/' . $value->id . '/tolak') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="mr-2 w-fit h-fit px-4 py-2 bg-red-500 rounded-md">
                                    <span class="font-semibold text-white">Tolak</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="w-full bg-white text-center py-4 font-medium text-sm">Tidak ada data</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
