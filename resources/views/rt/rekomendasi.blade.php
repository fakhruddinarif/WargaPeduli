<div id="modal-rekomendasi" class="hidden fixed z-40 inset-0 bg-neutral-600 bg-opacity-50 flex justify-center items-center mt-[164px] w-full gap-4 py-8 px-5">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl mb-80 mt-28">
        <div class="flex justify-between items-center p-4 bg-blue-500 rounded-sm">
            <h3 class="text-lg font-medium text-white">Form Rekomendasi</h3>
            <button id="close-button-rekomendasi" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-4 overflow-y-auto max-h-96">
            <form id="recommendation-form" action="#" method="POST" class="space-y-4">
                <div>
                    <label for="jenis_bansos" class="block text-sm font-medium text-gray-700">Jenis Bansos</label>
                    <select name="jenis_bansos" id="jenis_bansos" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Pilih Jenis Bansos</option>
                        <option value="jenis_bansos">PKH</option>
                        <option value="jenis_bansos">Perikanan</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div id="additional-inputs" class="hidden">
                    <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="nkk" class="block font-normal text-sm text-[#1A1A1A]">NKK</label>
                            <input type="text" name="nkk" id="nkk" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="223132456374625">
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="rt" class="block font-normal text-sm text-[#1A1A1A]">RT</label>
                            <input type="text" name="rt" id="rt" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="6">
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="penghasilan" class="block font-normal text-sm text-[#1A1A1A]">Penghasilan</label>
                            <input type="number" name="penghasilan" id="penghasilan" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="10000">
                        </div>
                        <div class="flex flex-col justify-start items-start gap-2 w-full">
                            <label for="tanggungan" class="block font-normal text-sm text-[#1A1A1A]">Tanggungan Keluarga</label>
                            <input type="number" name="tanggungan" id="tanggungan" class="px-2 py-3 font-normal text-base text-black w-full rounded-lg border-2" value="4">
                        </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('jenis_bansos').addEventListener('change', function() {
        if (this.value) {
            document.getElementById('additional-inputs').classList.remove('hidden');
        } else {
            document.getElementById('additional-inputs').classList.add('hidden');
        }
    });
</script>
