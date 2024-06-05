<div id="modal-download" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="flex relative bg-white rounded-lg shadow border">
            <button id="close-download" type="button" class="absolute top-3 end-2.5 text-neutral-300 bg-transparent hover:bg-neutral-300 hover:text-neutral-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form action="{{ url('/rw/penduduk/download') }}" method="post" class="flex w-full flex-col gap-4 p-4 md:p-5 text-left">
                @csrf
                <div class="flex flex-col justify-start items-start gap-4">
                    <div class="w-full gap-1 flex flex-col justify-start items-start">
                        <label for="rt_id" class="block font-medium text-sm text-neutral-900">Rukun Tetangga (RT)</label>
                        <select id="rt_id" name="rt_id" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                            <option class="font normal text-sm text-black" value="">Semua</option>
                            @foreach($rt as $value)
                                <option class="text-sm font-medium text-neutral-900" value="{{ $value->id }}">RT 0{{ $value->nomor }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-fit flex flex-row justify-start items-start gap-2">
                        <input type="checkbox" id="nkk" name="nkk" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="nkk" class="ms-2 text-sm font-medium text-neutral-900">NKK (Nomor Kartu Keluarga)</label>
                    </div>
                    <div class="w-fit flex flex-row justify-start items-start gap-2">
                        <input type="checkbox" id="nik" name="nik" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="nik" class="ms-2 text-sm font-medium text-neutral-900">NIK (Nomor Induk Kependudukan)</label>
                    </div>
                    <div class="w-fit flex flex-row justify-start items-start gap-2">
                        <input type="checkbox" id="nama" name="nama" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="nama" class="ms-2 text-sm font-medium text-neutral-900">Nama Penduduk</label>
                    </div>
                    <div class="w-fit flex flex-row justify-start items-start gap-2">
                        <input type="checkbox" id="jenis_kelamin" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="jenis_kelamin" class="ms-2 text-sm font-medium text-neutral-900">Jenis Kelamin</label>
                    </div>
                    <div class="w-fit flex flex-row justify-start items-start gap-2">
                        <input type="checkbox" id="tempat_lahir" name="tempat_lahir" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="tempat_lahir" class="ms-2 text-sm font-medium text-neutral-900">Tempat Lahir</label>
                    </div>
                    <div class="w-fit flex flex-row justify-start items-start gap-2">
                        <input type="checkbox" id="tanggal_lahir" name="tanggal_lahir" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="tanggal_lahir" class="ms-2 text-sm font-medium text-neutral-900">Tanggal Lahir</label>
                    </div>
                    <div class="w-fit flex flex-row justify-start items-start gap-2">
                        <input type="checkbox" id="alamat" name="alamat" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="alamat" class="ms-2 text-sm font-medium text-neutral-900">Alamat</label>
                    </div>
                    <div class="w-fit flex flex-row justify-start items-start gap-2">
                        <input type="checkbox" id="ibu_kandung" name="ibu_kandung" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="ibu_kandung" class="ms-2 text-sm font-medium text-neutral-900">Ibu Kandung</label>
                    </div>
                    <div class="w-fit flex flex-row justify-start items-start gap-2">
                        <input type="checkbox" id="status_keluarga" name="status_keluarga" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="status_keluarga" class="ms-2 text-sm font-medium text-neutral-900">Status Keluarga</label>
                    </div>
                </div>
                <button type="submit" class="w-full px-4 py-3 rounded-md text-white bg-blue-500 font-medium text-sm">Download</button>
            </form>
        </div>
    </div>
</div>
