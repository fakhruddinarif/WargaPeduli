 <div id="modal-detail-riwayat-bansos" class="hidden fixed inset-0 z-40 bg-neutral-600 bg-opacity-50  justify-center items-center w-full mt-40">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl xl:mt-20 mt-20 mx-auto">
            <div class="flex items-center justify-between p-4 bg-blue-500 rounded-sm">
                <h3 class="text-lg font-medium text-white">Detail riwayat bansos</h3>
                <button id="close-button-detail-riwayat-bansos" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
             <div class="w-full flex flex-col justify-center items-center gap-4 px-4 py-4">
                    <form method="POST" enctype="multipart/form-data" class="w-full flex flex-col justify-end items-end gap-4">
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="keluarga_id" class="block font-medium text-sm text-neutral-900">Nomor Kartu Keluarga<span class="font-medium text-sm text-red-600">*</span></label>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="nik" class="block font-medium text-sm text-neutral-900">Nomor Kartu Tanda Penduduk<span class="font-medium text-sm text-red-600">*</span></label>
                            <input type="text" id="nik" name="nik" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Tanda Penduduk">
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="nama" class="block font-medium text-sm text-neutral-900">Nama Lengkap<span class="font-medium text-sm text-red-600">*</span></label>
                            <input type="text" id="nama" name="nama" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="ibu_kandung" class="block font-medium text-sm text-neutral-900">Nama Ibu Kandung<span class="font-medium text-sm text-red-600">*</span></label>
                            <input type="text" id="ibu_kandung" name="ibu_kandung" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Alamat">
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="rt_id" class="block font-medium text-sm text-neutral-900">Rukun Tetangga<span class="font-medium text-sm text-red-600">*</span></label>
                            <select id="rt_id" name="rt_id" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2" {{ $url == 'admin' ? '' : 'disabled' }}>
                                <option class="font normal text-sm text-black" value="">Pilih Rukun Tetangga</option>
                                @foreach($rt as $value)
                                    <option class="font normal text-sm text-black" value="{{ $value->id }}" {{ $data->rt_id === $value->id ? 'selected' : '' }}>RT 0{{ $value->nomor }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="status_keluarga" class="block font-medium text-sm text-neutral-900">Status Keluarga<span class="font-medium text-sm text-red-600">*</span></label>
                            <select id="status_keluarga" name="status_keluarga" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2" {{ $url == 'admin' ? '' : 'disabled' }}>
                                <option class="font normal text-sm text-black" value="">Pilih Status Keluarga</option>
                                @foreach($status_keluarga as $value)
                                    <option class="font normal text-sm text-black" value="{{ $value }}" {{ $data->status_keluarga === $value ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($url == 'admin')
                            <div class="flex flex-row justify-between items-end w-full">
                                <button id="arsip" type="button" class="px-4 py-3 bg-indigo-600 rounded-md">
                                    <span class="font-medium text-sm text-white">Arsip</span>
                                </button>
                                <button type="submit" class="px-4 py-3 bg-blue-500 rounded-md">
                                    <span class="font-medium text-sm text-white">Simpan</span>
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
        </div>
    </div>
    