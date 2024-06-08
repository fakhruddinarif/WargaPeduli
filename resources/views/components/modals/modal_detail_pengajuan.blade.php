<div id="modal-pengajuan" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="flex relative bg-white rounded-lg shadow border">
            <button id="close-pengajuan" type="button" class="absolute top-3 end-2.5 text-neutral-300 bg-transparent hover:bg-neutral-300 hover:text-neutral-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="bg-white w-full flex flex-col gap-4 p-4 md:p-5 text-left mt-4">
                <div class="flex flex-col gap-2 items-start justify-start w-full">
                    <span class="font-medium text-base text-neutral-900">Pendapatan</span>
                    <div class="w-full border-2 px-4 py-3 rounded-lg">
                        <span class="pendapatan font-normal text-neutral-900 text-sm"></span>
                    </div>
                </div>
                <div class="flex flex-col gap-2 items-start justify-start w-full">
                    <span class="font-medium text-base text-neutral-900">Luas Bangunan</span>
                    <div class="w-full border-2 px-4 py-3 rounded-lg">
                        <span class="luas_bangunan font-normal text-neutral-900 text-sm"></span>
                    </div>
                </div>
                <div class="flex flex-col gap-2 items-start justify-start w-full">
                    <span class="font-medium text-base text-neutral-900">Jumlah Tanggungan</span>
                    <div class="w-full border-2 px-4 py-3 rounded-lg">
                        <span class="jumlah_tanggungan font-normal text-neutral-900 text-sm"></span>
                    </div>
                </div>
                <div class="flex flex-col gap-2 items-start justify-start w-full">
                    <span class="font-medium text-base text-neutral-900">Pajak Bumi</span>
                    <div class="w-full border-2 px-4 py-3 rounded-lg">
                        <span class="pajak_bumi font-normal text-neutral-900 text-sm"></span>
                    </div>
                </div>
                <div class="flex flex-col gap-2 items-start justify-start w-full">
                    <span class="font-medium text-base text-neutral-900">Tagihan Listrik</span>
                    <div class="w-full border-2 px-4 py-3 rounded-lg">
                        <span class="tagihan_listrik font-normal text-neutral-900 text-sm"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
