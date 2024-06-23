<div id="modal-rekomendasi" class="hidden fixed z-40 inset-0 bg-neutral-600 bg-opacity-50 flex justify-center items-center  w-full gap-4 py-8 px-5">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl sm:max-w-5xl xs:max-w-full mt-[160px]">
        <div class="flex justify-between items-center p-4 bg-blue-500 rounded-sm mx-auto">
            <h3 class="text-lg font-medium text-white">Pilih Bantuan Sosial</h3>
            <button id="close-button-rekomendasi" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-1 overflow-y-auto max-h-96">
            <div class="relative w-full overflow-x-auto shadow-md mt-4">
                <table class="w-full text-sm text-left rtl:text-right bg-neutral-200">
                    <thead class="text-sm font-normal text-black">
                    <tr>
                        <th scope="col" class="px-6 py-3">Jenis</th>
                        <th scope="col" class="px-6 py-3">Mulai</th>
                        <th scope="col" class="px-6 py-3">Selesai</th>
                        <th scope="col" class="px-6 py-3">Kapasitas</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($bansos) > 0)
                            @foreach($bansos as $value)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-normal text-neutral-900 whitespace-nowrap">{{ $value->jenis }}</th>
                                    <td class="px-6 py-4">{{ $value->tanggal_mulai }}</td>
                                    <td class="px-6 py-4">{{ $value->tanggal_selesai }}</td>
                                    <td class="px-6 py-4">{{ $value->kapasitas }}</td>
                                    <td class="px-6 py-4 flex flex-wrap gap-2">
                                        <button type="button" id="section-bansos-{{ $value->id }}" class="px-8 py-3 bg-green-500 rounded">
                                            <span class="font-semibold text-white text-sm">Pilih</span>
                                        </button>
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

<div id="modal-form-bansos" class="hidden fixed z-40 inset-0 bg-neutral-600 bg-opacity-50 flex justify-center items-center  w-full gap-4 py-8 px-5">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl mt-[160px] sm:max-w-5xl xs:max-w-full ">
        <div class="flex justify-between items-center p-4 bg-blue-500 rounded-sm">
            <h3 class="text-lg font-medium text-white">Form Pengajuan Bantuan Sosial</h3>
            <button id="close-button-form" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form method="POST" action="{{ url($url . '/bansos') }}" class="flex flex-col justify-start items-start gap-4 w-full px-4 py-4 overflow-y-auto max-h-96">
            @csrf
            <input type="hidden" id="bansos_id" name="bansos_id">
            <input type="hidden" id="user_id" name="user_id">
            <div class="w-full gap-1 flex flex-col justify-start items-start ">
                <label for="pendapatan" class="block font-medium text-sm text-neutral-900">Pendapatan</label>
                <input type="text" id="pendapatan" name="pendapatan" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Pendapatan">
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="luas_bangunan" class="block font-medium text-sm text-neutral-900">Luas Bangunan</label>
                <input type="text" id="luas_bangunan" name="luas_bangunan" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Luas Bangunan">
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="jumlah_tanggungan" class="block font-medium text-sm text-neutral-900">Jumlah Tanggungan</label>
                <input type="text" id="jumlah_tanggungan" name="jumlah_tanggungan" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Jumlah Tanggungan">
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="pajak_bumi" class="block font-medium text-sm text-neutral-900">Pajak Bumi</label>
                <input type="text" id="pajak_bumi" name="pajak_bumi" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Pajak Bumi">
            </div>
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label for="tagihan_listrik" class="block font-medium text-sm text-neutral-900">Tagihan Listrik</label>
                <input type="text" id="tagihan_listrik" name="tagihan_listrik" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Tagihan Listrik">
            </div>
            <button type="submit" class="w-full px-4 py-3 bg-blue-500 rounded">
                <span class="font-semibold text-white text-sm">Ajukan</span>
            </button>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        var recommendationButtons = $('[id^="recommendation-button-"]');
        var modalRekomendasi = $('#modal-rekomendasi');
        var modaFormBansos = $('#modal-form-bansos');
        var modalKeluarga = $('#modal-keluarga');
        var closeButtonRekomendasi = $('#close-button-rekomendasi');
        var sectionBansos = $('[id^="section-bansos-"]');
        var closeButtonForm = $('#close-button-form');

        closeButtonRekomendasi.on('click', function() {
            modalRekomendasi.addClass('hidden');
        });
        closeButtonForm.on('click', function() {
            modaFormBansos.addClass('hidden');
        });

        $('#close-button-keluarga').on('click', function() {
            $('#modal-keluarga').addClass('hidden');
        });

        recommendationButtons.on('click', function() {
            var keluargaId = $(this).data('id');
            modalRekomendasi.removeClass('hidden');
            modaFormBansos.addClass('hidden');
            modalKeluarga.addClass('hidden');
            $.ajax({
                url: 'rt/bansos/rekomendasi/' + keluargaId,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    $('#user_id').val(response[0].id);
                    $('#pendapatan').val(response[0].pendapatan);
                    $('#luas_bangunan').val(response[0].luas_bangunan);
                    $('#jumlah_tanggungan').val(response[0].jumlah_tanggungan);
                    $('#pajak_bumi').val(response[0].pajak_bumi);
                    $('#tagihan_listrik').val(response[0].tagihan_listrik);
                    $('.input-number').mask('000.000.000.000.000', {reverse: true});
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Tampilkan pesan error
                    console.error(textStatus, errorThrown);
                }
            });
        });

        sectionBansos.on('click', function() {
            var bansosId = $(this).attr('id').split('-')[2];
            $('#bansos_id').val(bansosId);
            modaFormBansos.removeClass('hidden');
            modalRekomendasi.addClass('hidden');
        });
    });

</script>
