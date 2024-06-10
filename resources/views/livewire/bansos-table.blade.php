<div class="w-full transition-transform">
    <div class="w-full flex flex-wrap justify-between items-center px-2 py-2 gap-3">
        <form class="w-full flex flex-wrap sm:flex-row justify-between items-center gap-3">
            <div class="w-full flex flex-wrap justify-between items-center gap-4">
                <div class="flex flex-wrap justify-start items-center">
                    <a href="#" wire:click.prevent="setJenisFilter('')" class="{{ $jenisFilter == '' ? 'bg-white' : 'bg-blue-100' }} px-4 py-2 gap-1 bg-white border text-sm font-medium text-neutral-900">
                        Semua
                    </a>
                    @foreach($jenis as $value)
                        <a href="#" wire:click.prevent="setJenisFilter('{{ $value }}')" class="{{ $jenisFilter == $value ? 'bg-white' : 'bg-blue-100' }} px-4 py-2 gap-1 bg-white border text-sm font-medium text-neutral-900">
                            {{ $value }}
                        </a>
                    @endforeach
                </div>
                @if($url == 'admin')
                    <a href="{{ url('admin/bansos/create') }}" class="w-fit px-4 py-3 bg-blue-500 rounded-md">
                        <span class="text-sm font-medium text-white">Tambah</span>
                    </a>
                @endif
            </div>
        </form>
    </div>
    <div class="relative w-full overflow-x-auto shadow-md mt-4">
        <table class="w-full text-sm text-left rtl:text-right bg-neutral-200">
            <thead class="text-sm font-normal text-black">
            <tr>
                <th scope="col" class="px-6 py-3">Mulai</th>
                <th scope="col" class="px-6 py-3">Selesai</th>
                <th scope="col" class="px-6 py-3">Jenis</th>
                <th scope="col" class="px-6 py-3">Kapasitas</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @if(count($data) > 0)
                    @foreach($data as $key => $value)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-normal text-neutral-900 whitespace-nowrap">{{ date('d/m/Y', strtotime($value->tanggal_mulai)) }}</th>
                            <td class="px-6 py-4">{{ date('d/m/Y', strtotime($value->tanggal_selesai)) }}</td>
                            <td class="px-6 py-4">{{ $value->jenis }}</td>
                            <td class="px-6 py-4">{{ $value->kapasitas }}</td>
                            <td class="px-6 py-4 flex flex-wrap gap-4">
                                <a href="{{ url('/' . $url .'/bansos/' . $value->id) }}" class="mr-2 w-fit h-fit px-6 py-2 bg-blue-500 rounded-md">
                                    <span class="font-semibold text-white">Detail</span>
                                </a>
                                <button type="button" id="btn-{{ $value->id }}" class="prioritas w-fit h-fit px-4 py-2 bg-indigo-600 rounded-md">
                                    <span class="font-semibold text-white">Prioritas</span>
                                </button>
                                @if($url == 'rw')
                                    <a href="{{ url('/' . $url .'/bansos/pengajuan/' . $value->id) }}" class="mr-2 w-fit h-fit px-6 py-2 bg-amber-500 rounded-md">
                                        <span class="font-semibold text-white">Validasi</span>
                                    </a>
                                @endif
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
                <select wire:model.live='perPage' class="px-2 py-3 bg-neutral-100 border-2 text-neutral-900 text-sm rounded-lg focus:ring-blue-500">
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
    @foreach($data as $key => $value)
    @include('components.modals.modal_prioritas_bansos')
    @endforeach
</div>
