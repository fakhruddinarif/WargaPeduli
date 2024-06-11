@if(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">{{ Session::get('success')}}</span>
        </div>
    @elseif(Session::has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium">{{ Session::get('error')}}</span>
        </div>
    @endif
 <div id="pengajuan-penduduk" class="hidden fixed inset-0 z-40 bg-neutral-600 bg-opacity-50  justify-center items-center w-full mt-28">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl xl:mt-40 mt-20 mx-auto">
            <div class="flex items-center justify-between p-4 bg-blue-500 rounded-sm">
                <h3 class="text-lg font-medium text-white">Data Pengajuan Penduduk</h3>
                <button id="close-button-pengajuan" class="text-white">
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
                            <th scope="col" class="px-6 py-3">NKK</th>
                            <th scope="col" class="px-6 py-3">NIK</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Status Warga</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($pengajuan) > 0)
                            @foreach($pengajuan as $value)
                                <tr class="bg-white border-b md:table-row">
                                    <th scope="row" class="px-6 py-4 font-normal text-neutral-900 whitespace-nowrap">{{ $value->nkk != null ? $value->nkk : 'Tidak Ada' }}</th>
                                    <td class="px-6 py-4">{{ $value->nik }}</td>
                                    <td class="px-6 py-4">{{ $value->nama }}</td>
                                    <td class="px-6 py-4">{{ $value->status_warga }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-start gap-4">
                                            <button type="button" id="btn-{{ $value->id }}" data-id="{{ $value->id }}" class="w-fit h-fit px-4 py-2 bg-blue-500 rounded-md">
                                                <span class="font-semibold text-white">Detail</span>
                                            </button>
                                            <form action="{{ url($url . '/pengajuan/' . $value->id . '/terima') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="w-fit h-fit px-4 py-2 bg-green-500 rounded-md">
                                                    <span class="font-semibold text-white">Terima</span>
                                                </button>
                                            </form>
                                            <form action="{{ url($url . '/pengajuan/' . $value->id . '/tolak') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="w-fit h-fit px-4 py-2 bg-red-500 rounded-md">
                                                    <span class="font-semibold text-white">Tolak</span>
                                                </button>
                                            </form>
                                        </div>
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
            </div>
        </div>
    </div>

 <div id="detail-pengajuan" class="hidden flex fixed inset-0 z-40 bg-neutral-600 bg-opacity-50  justify-center items-center w-full mt-40">
     <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl xl:mt-20 mt-10 mx-auto">
         <div class="flex items-center justify-between p-4 bg-blue-500 rounded-sm">
             <h3 class="text-lg font-medium text-white">Detail Pengajuan Penduduk</h3>
             <button id="close-detail-pengajuan" class="text-white">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                     <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                 </svg>
             </button>
         </div>
         <div class="p-1 overflow-y-auto max-h-96 "></div>
     </div>
 </div>
<script>
    document.getElementById('pengajuan-penduduk').addEventListener('click', function() {
        this.style.display = 'none';
    });
    // $(document).ready(function() {
    //     // Mendapatkan referensi ke elemen modal
    //     var pengajuanPenduduk = $('#pengajuan-penduduk-detail');
    //     var detailPengajuan = $('#detail-pengajuan');

    //     // Mendapatkan semua tombol detail
    //     var detailButtons = $('[id^="btn-"]');

    //     // Menambahkan event listener ke setiap tombol detail
    //     detailButtons.each(function() {
    //         $(this).click(function() {
    //             // Menampilkan detail pengajuan dan menyembunyikan pengajuan penduduk
    //             detailPengajuan.removeClass('hidden');
    //             pengajuanPenduduk.addClass('hidden');
    //         });
    //     });

    //     // Menambahkan event listener ke tombol close-detail-pengajuan
    //     $('#close-detail-pengajuan').click(function() {
    //         // Menyembunyikan detail pengajuan dan menampilkan pengajuan penduduk
    //         detailPengajuan.addClass('hidden');
    //         pengajuanPenduduk.removeClass('hidden');
    //     });
    // });
</script>
