 <div id="pengajuan-penduduk" class="hidden fixed inset-0 z-40 bg-neutral-600 bg-opacity-50  justify-center items-center w-full mt-40">
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
                                    <th scope="row" class="px-6 py-4 font-normal text-neutral-900 whitespace-nowrap">{{ $value->nkk != null ? $value->nkk : 'N/A' }}</th>
                                    <td class="px-6 py-4">{{ $value->nik }}</td>
                                    <td class="px-6 py-4">{{ $value->nama }}</td>
                                    <td class="px-6 py-4">{{ $value->status_warga }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-start gap-4">
                                            <button type="button" id="btn-pengajuan{{ $value->id }}" class="w-fit h-fit px-4 py-2 bg-blue-500 rounded-md">
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

 <div id="detail-pengajuan-penduduk" class="hidden flex fixed inset-0 z-40 bg-neutral-600 bg-opacity-50  justify-center items-center w-full">
     <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl mt-40 mx-auto">
         <div class="flex items-center justify-between p-4 bg-blue-500 rounded-sm">
             <h3 class="text-lg font-medium text-white">Detail Pengajuan Penduduk</h3>
             <button id="close-detail-pengajuan" class="text-white">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                     <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                 </svg>
             </button>
         </div>
         <div class="p-1 overflow-y-auto max-h-96 px-4 py-4 flex flex-col gap-4">
             <div class="flex flex-col gap-2 w-full justify-start items-start">
                 <span class="font-medium text-base text-neutral-900">Dokumen Kartu Keluarga</span>
                 <img id="data-pengajuan-dokumen-kk" src="/no-images.jpg" class="w-96 h-64">
             </div>
             <div class="flex flex-col gap-2 w-full justify-start items-start">
                 <span class="font-medium text-base text-neutral-900">NKK</span>
                 <div class="px-4 py-3 rounded border w-full">
                     <span id="data-pengajuan-nkk" class="font-normal text-sm text-neutral-900"></span>
                 </div>
             </div>
             <div class="flex flex-col gap-2 w-full justify-start items-start">
                 <span class="font-medium text-base text-neutral-900">Dokumen Kartu Tanda Penduduk</span>
                 <img src="" id="data-pengajuan-dokumen-ktp" class="w-96 h-64">
             </div>
             <div class="flex flex-col gap-2 w-full justify-start items-start">
                 <span class="font-medium text-base text-neutral-900">NIK</span>
                 <div class="px-4 py-3 rounded border w-full">
                     <span id="data-pengajuan-nik" class="font-normal text-sm text-neutral-900"></span>
                 </div>
             </div>
             <div class="flex flex-col gap-2 w-full justify-start items-start">
                 <span class="font-medium text-base text-neutral-900">Nama</span>
                 <div class="px-4 py-3 rounded border w-full">
                     <span id="data-pengajuan-nama" class="font-normal text-sm text-neutral-900"></span>
                 </div>
             </div>
             <div class="flex flex-col gap-2 w-full justify-start items-start">
                 <span class="font-medium text-base text-neutral-900">Alamat</span>
                 <div class="px-4 py-3 rounded border w-full">
                     <span id="data-pengajuan-alamat" class="font-normal text-sm text-neutral-900"></span>
                 </div>
             </div>
             <div class="flex flex-col gap-2 w-full justify-start items-start">
                 <span class="font-medium text-base text-neutral-900">RT</span>
                 <div class="px-4 py-3 rounded border w-full">
                     <span id="data-pengajuan-rt" class="font-normal text-sm text-neutral-900"></span>
                 </div>
             </div>
             <div class="flex flex-col gap-2 w-full justify-start items-start">
                 <span class="font-medium text-base text-neutral-900">Status Warga</span>
                 <div class="px-4 py-3 rounded border w-full">
                     <span id="data-pengajuan-status-warga" class="font-normal text-sm text-neutral-900"></span>
                 </div>
             </div>
             <div class="flex flex-col gap-2 w-full justify-start items-start">
                 <span class="font-medium text-base text-neutral-900">Telepon</span>
                 <div class="px-4 py-3 rounded border w-full">
                     <span id="data-pengajuan-telepon" class="font-normal text-sm text-neutral-900"></span>
                 </div>
             </div>
         </div>
     </div>
 </div>
<script>
    document.getElementById('pengajuan-penduduk').addEventListener('click', function() {
        this.style.display = 'none';
    });
    $(document).ready(function() {
        // Mendapatkan referensi ke elemen modal
        var pengajuanPenduduk = $('#pengajuan-penduduk');
        var detailPengajuan = $('#detail-pengajuan-penduduk');

        // Mendapatkan semua tombol detail
        var detailButtons = $('[id^="btn-pengajuan"]');

        // Menambahkan event listener ke setiap tombol detail
        detailButtons.each(function() {
            $(this).click(function() {
                var id = $(this).attr('id').replace('btn-pengajuan', '');
                // Menampilkan detail pengajuan dan menyembunyikan pengajuan penduduk
                detailPengajuan.removeClass('hidden');
                pengajuanPenduduk.addClass('hidden');
                $.get('/rt/pengajuan/' + id, function(data) {
                    // Menggunakan data pengajuan di sini
                    console.log(data);
                    $('#data-pengajuan-dokumen-kk').attr('src', data.dokumen_kk ? data.dokumen_kk : '/no-image.jpg');
                    $('#data-pengajuan-nkk').text(data.nkk ? data.nkk : 'N/A');
                    $('#data-pengajuan-dokumen-ktp').attr('src', data.dokumen_ktp ? data.dokumen_ktp : '/no-image.jpg');
                    $('#data-pengajuan-nik').text(data.nik ? data.nik : 'N/A');
                    $('#data-pengajuan-nama').text(data.nama ? data.nama : 'N/A');
                    $('#data-pengajuan-alamat').text(data.alamat ? data.alamat : 'N/A');
                    $('#data-pengajuan-rt').text(data.nomor ?  'RT 0' + data.nomor : 'N/A');
                    $('#data-pengajuan-status-warga').text(data.status_warga ? data.status_warga : 'N/A');
                    $('#data-pengajuan-telepon').text(data.telepon ? data.telepon : 'N/A');
                });
            });
        });

        $('#close-button-pengajuan').click(function() {
            // Menyembunyikan pengajuan penduduk
            pengajuanPenduduk.addClass('hidden');
            pengajuanPenduduk.css('display', '');
        });

        // Menambahkan event listener ke tombol close-detail-pengajuan
        $('#close-detail-pengajuan').click(function() {
            // Menyembunyikan detail pengajuan dan menampilkan pengajuan penduduk
            detailPengajuan.addClass('hidden');
        });

        // Menambahkan event listener ke tombol btn-pengajuan
        $('#btn-pengajuan').click(function(e) {
            // Menampilkan pengajuan penduduk dan menyembunyikan detail pengajuan
            pengajuanPenduduk.removeClass('hidden');
            detailPengajuan.addClass('hidden');
        });
    });
</script>
