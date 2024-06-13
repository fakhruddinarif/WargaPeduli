
    <div id="modal-riwayat-bansos" class="hidden fixed  z-40 inset-0 bg-neutral-600 bg-opacity-50  flex justify-center items-center  w-full gap-4 py-8 px-5">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl mb-72 mt-20">
            <div class="flex items-center justify-between p-4 bg-blue-500 rounded-sm">
                <h3 class="text-lg font-medium text-white">Data Riwayat Mendapatkan Bansos</h3>
                <button id="close-button-riwayat-bansos" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto max-h-96 ">
                <div class="relative w-full overflow-x-auto shadow-md mt-4">
                <table class="table-auto w-full text-sm text-left rtl:text-right bg-neutral-200">
                    <thead class="text-sm font-normal text-black">
                        <tr class="md:table-row ">
                            <th scope="col" class="px-6 py-3">NKK</th>
                            <th scope="col" class="px-6 py-3">Kepala Keluarga</th>
                            <th scope="col" class="px-6 py-3">Jenis Bansos</th>
                            <th scope="col" class="px-6 py-3">Tanggal Mulai</th>
                            <th scope="col" class="px-6 py-3">Tanggal Selesai</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                   <tbody>
                    @if(count($historyBansos) > 0)
                        @foreach($historyBansos as $value)
                            <tr class="bg-white border-b md:table-row">
                                <td class="px-6 py-4">{{ isset($value->user_id) ? $value->User->Keluarga->nkk : 'N/A' }}</td>
                                <td class="px-6 py-4">
                                    {{ isset($value->user_id) ? optional($value->User->Keluarga->Warga->where('status_keluarga', 'Kepala Keluarga')->first())->nama : 'N/A' }}
                                </td>                            
                                <td class="px-6 py-4">{{ isset($value->bansos_id) ? $value->BantuanSosial->jenis : 'N/A' }}</td>
                                <td class="px-6 py-4">{{ isset($value->bansos_id) ? date('d/m/Y', strtotime($value->BantuanSosial->tanggal_mulai)) : 'N/A' }}</td>
                                <td class="px-6 py-4">{{ isset($value->bansos_id) ? date('d/m/Y', strtotime($value->BantuanSosial->tanggal_selesai)) : 'N/A' }}</td>
                                <td class="px-6 py-4">{{ $value->status }}</td>
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
            </div>
        </div>
    </div>
