
    <div id="modal-riwayat-laporan" class="hidden fixed inset-0 z-40 bg-neutral-600 bg-opacity-50  flex justify-center items-center  w-full gap-4 py-8 px-5">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl sm:max-w-4xl xs:max-w-full mt-[160px]">
            <div class="flex items-center justify-between p-4 bg-blue-500 rounded-sm">
                <h3 class="text-lg font-medium text-white">Data Riwayat Laporan</h3>
                <button id="close-button-riwayat-laporan" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-1 overflow-y-auto max-h-96 ">
                <div class="relative w-full overflow-x-auto shadow-md">
                <table class="table-auto w-full text-sm text-left rtl:text-right bg-neutral-200">
                    <thead class="text-sm font-normal text-black">
                        <tr class="md:table-row ">
                            <th scope="col" class="px-6 py-3">Tanggal</th>
                            <th scope="col" class="px-6 py-3">Keterangan</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($historyReport) > 0)
                            @foreach($historyReport as $value)
                                <tr class="bg-white border-b md:table-row">
                                    <td class="px-6 py-4">{{ date('d/m/Y', strtotime($value->tanggal)) }}</td>
                                    <td class="px-6 py-4"> {{ $value->keterangan }}</td>
                                    <td class="px-6 py-4">{{ $value->status }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-start gap-4">
                                            <button type="button" id="detail-riwayat-laporan-{{ $value->id }}" class="w-fit h-fit px-4 py-2 bg-blue-500 rounded-md">
                                                <span class="font-semibold text-white">Detail</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="w-full bg-white text-center py-4 font-medium text-sm">Tidak ada data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
    @include('rt.detail_laporan')
   <script>
       $(document).ready(function() {
           var detailRiwayatLaporan = $('[id^="detail-riwayat-laporan-"]');
           detailRiwayatLaporan.each(function() {
               $(this).click(function () {
                   var id = $(this).attr('id').replace('detail-riwayat-laporan-', '');
                   $.get('/rt/laporan/' + id, function (data) {
                       console.log(data);
                       $('#data-laporan-bukti').attr('src', data.bukti ? data.bukti : '/no-image.png');
                       $('#data-laporan-tanggal').text(data.tanggal ? data.tanggal : 'N/A');
                       $('#data-laporan-keterangan').text(data.keterangan ? data.keterangan : 'N/A');
                       $('#data-laporan-status').text(data.status ? data.status : 'N/A');
                   })
                   $('#modal-detail-riwayat-laporan-rt').removeClass('hidden');
                   $('#modal-riwayat-laporan').addClass('hidden');
                   $('#modal-riwayat-laporan').removeClass('center');
               });
           });
       });
        document.getElementById('close-button-detail-riwayat-laporan-rt').addEventListener('click', function() {
            var detail_riwayat_laporan = document.getElementById('modal-detail-riwayat-laporan-rt');
            detail_riwayat_laporan.classList.add('hidden');
            detail_riwayat_laporan.classList.remove('center');
        });
</script>
