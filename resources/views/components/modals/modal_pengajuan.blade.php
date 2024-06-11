<div id="modal-pengajuan" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative flex p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow border w-full py-6">
            <button type="button" class="close absolute top-1 end-1 text-neutral-300 bg-transparent hover:bg-neutral-300 hover:text-neutral-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center flex flex-col gap-2 w-full justify-center items-center">
                <button id="cekPengajuan" type="button" data-modal-hide="popup-modal" class="w-full border text-white bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center justify-center">Cek Pengajuan</button>
                <button id="daftar-pengajuan" data-modal-hide="popup-modal" class="w-full border border-indigo-600 text-indigo-600 bg-white hover:bg-neutral-100 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center justify-center">Daftar Pengajuan</button>
            </div>
        </div>
    </div>
</div>

<div id="modal-form-cek" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative flex p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow border w-full py-4">
            <div class="p-4 md:p-5 text-center flex flex-col gap-2 w-full justify-start items-start">
                <div class="flex flex-row justify-start items-center gap-2">
                    <a href="{{ url('/') }}" class="w-fit p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>
                    </a>
                    <h1 class="text-base font-bold leading-tight tracking-tight text-neutral-900 md:text-lg">
                        Cek Pengajuan
                    </h1>
                </div>
                <form method="post" action="{{ url('checkPengajuan') }}" class="flex flex-col w-full justify-start items-start gap-4">
                    @csrf
                    <div class="w-full flex flex-col justify-start items-start gap-1">
                        <label for="id" class="font-medium text-neutral-900 text-sm">ID Pengajuan</label>
                        <input type="text" id="id" name="id" class="w-full px-4 py-3 border-2 rounded-lg text-neutral-900 font-normal text-sm" placeholder="Masukkan ID Pengajuan" required>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 px-4 py-2 rounded-sm">
                        <span class="font-medium text-white text-sm">Cek Pengajuan</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
