<div class="w-full transition-transform">
    <div class="w-full flex flex-wrap justify-between items-center px-2 py-2 gap-3">
        <form class="w-full flex flex-wrap sm:flex-row justify-between items-center gap-3">
            <div class="relative justify-between items-center">
                <input wire:model.live.debounce.300ms="search" type="search" id="search-dropdown" class="block px-2 py-3 w-48 sm:w-72 z-20 text-sm text-neutral-900 bg-white rounded-lg border-2" placeholder="Cari NIK atau Nama" required />
                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-500 rounded-e-lg border border-blue-500">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
            @if($url == 'admin' || $url == 'rw')
                <div class="flex flex-row gap-2">
                    <a href="{{ url($url . '/penduduk/riwayat/warga') }}" class="w-fit px-4 py-3 bg-indigo-600 rounded-md">
                        <span class="text-sm font-medium text-white">Riwayat</span>
                    </a>
                    <select wire:model.live="rtFilter" name="rt" id="rt" class="w-24 px-2 py-3 border-2 rounded-lg text-sm font-medium text-neutral-900">
                        <option class="text-sm font-medium text-neutral-900" value="">Semua</option>
                        @foreach($rt as $value)
                            <option class="text-sm font-medium text-neutral-900" value="{{ $value->id }}">RT 0{{ $value->nomor }}</option>
                        @endforeach
                    </select>
                    <button class="{{ ($url == 'admin') ? 'create-penduduk' : 'download-penduduk'}} w-fit px-4 py-3 bg-blue-500 rounded-lg">
                        <span class="text-sm font-medium text-white">{{ ($url == 'admin') ? 'Tambah' : 'Download' }}</span>
                    </button>
                </div>
            @endif
        </form>
    </div>
    <div class="relative w-full overflow-x-auto shadow-md mt-4">
        <table class="w-full text-sm text-left rtl:text-right bg-neutral-200">
            <thead class="text-sm font-normal text-black">
            <tr>
                <th scope="col" class="px-6 py-3">NIK</th>
                <th scope="col" class="px-6 py-3">Nama</th>
                <th scope="col" class="px-6 py-3">Status Warga</th>
                <th scope="col" class="px-6 py-3">Status Keluarga</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @if(count($data) > 0)
                    @foreach($data as $key => $value)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-normal text-neutral-900 whitespace-nowrap">{{ $value->nik }}</th>
                            <td class="px-6 py-4">{{ $value->nama }}</td>
                            <td class="px-6 py-4"><span class="
                    @if($value->status_warga == 'Menetap')
                    bg-blue-500 text-white
                    @elseif($value->status_warga == 'Pendatang')
                    bg-yellow-400 text-white
                    @elseif($value->status_warga == 'Merantau')
                    bg-red-500 text-white
                    @else
                    bg-black text-white
                    @endif px-2 py-2 rounded-md">@if($value->status_warga != null) {{ $value->status_warga }} @else - @endif</span></td>
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
                @else
                    <tr>
                        <td colspan="5" class="w-full bg-white text-center py-4 font-medium text-sm">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="py-4 px-3">
        <div class="flex">
            <div class="flex space-x-4 items-center mb-3">
                <label class="w-32 text-sm font-medium text-neutral-900">Per Page</label>
                <select wire:model.live='perPage' class="px-2 py-3 bg-neutral-50 border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        {{ $data->links('vendor.livewire.tailwind') }}
    </div>
</div>
