
    <div id="modal-detail-riwayat-laporan" class="hidden fixed inset-0 z-40 bg-neutral-600 bg-opacity-50 flex justify-center items-center  w-full gap-4 py-8 px-5">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl sm:max-w-4xl xs:max-w-full mt-[160px]">
            <div class="flex items-center justify-between p-4 bg-blue-500 rounded-sm">
                <h3 class="text-lg font-medium text-white">Detail Laporan</h3>
                <button id="close-button-detail-riwayat-laporan" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-1 overflow-y-auto max-h-96 border-2 rounded-xl">
                <div class="relative w-full overflow-x-auto shadow-md p-2 rounded-xl flex flex-col gap-4">
                    <div class="flex flex-col gap-2 w-full justify-start items-start">
                        <span class="font-medium text-base text-neutral-900">Bukti</span>
                        <img src="" id="data-laporan-bukti" class="w-96 h-64">
                    </div>
                    <div class="flex flex-col gap-2 w-full justify-start items-start">
                        <span class="font-medium text-base text-neutral-900">Tanggal</span>
                        <div class="rounded border w-full">
                            <span id="data-laporan-tanggal" class="font-normal text-sm text-neutral-900"></span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 w-full justify-start items-start">
                        <span class="font-medium text-base text-neutral-900">Keterangan</span>
                        <div class="rounded border w-full">
                            <textarea id="data-laporan-keterangan" class="font-normal text-sm text-neutral-900 px-4 py-3 w-full"></textarea>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 w-full justify-start items-start">
                        <span class="font-medium text-base text-neutral-900">Status</span>
                        <div class=" rounded border w-full">
                            <span id="data-laporan-status" class="font-normal text-sm text-neutral-900"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
