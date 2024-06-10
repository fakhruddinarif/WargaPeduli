<div class="w-full transition-transform">
    <div class="relative w-full overflow-x-auto shadow-md">
        <table class="w-full text-sm text-left rtl:text-right bg-neutral-200">
            <thead class="text-sm font-normal text-black">
            <tr>
                <th scope="col" class="px-6 py-3">NKK</th>
                <th scope="col" class="px-6 py-3">Kepala Keluarga</th>
                <th scope="col" class="px-6 py-3">Tanggal</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @if(count($data) > 0)
                @foreach($data as $key => $value)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-normal text-neutral-900 whitespace-nowrap">{{ $value->nkk }}</th>
                        <td class="px-6 py-4">{{ $value->nama }}</td>
                        <td class="px-6 py-4">{{ $value->tanggal }}</td>
                        <td class="px-6 py-4">{{ $value->status }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ url('/' . $url . '/penduduk/riwayat/keluarga/download/' . $value->id) }}" class=" w-fit px-6 py-3 bg-blue-500 rounded-md">
                                <span class="font-semibold text-white text-sm">Surat</span>
                            </a>
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
    <div class="py-4 px-3">
        @if(count($data))
            {{ $data->links('vendor.livewire.tailwind') }}
        @endif
    </div>
</div>
