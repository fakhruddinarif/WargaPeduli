
    <div id="modal-detail-riwayat-laporan-rt" class="hidden fixed inset-0 z-40 bg-neutral-600 bg-opacity-50  justify-center items-center w-full mt-40">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl xl:mt-20 mt-20 mx-auto">
            <div class="flex items-center justify-between p-4 bg-blue-500 rounded-sm mx-auto">
                <h3 class="text-lg font-medium text-white">Detail Laporan</h3>
                <button id="close-button-detail-riwayat-laporan-rt" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-1 overflow-y-auto max-h-96 border-2 rounded-xl">
                <div class="relative w-full overflow-x-auto shadow-md p-2 rounded-xl"> 
                    <form>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-1 md:gap-1"> 
                            <div class="col-span-1">
                                <label for="nama" class="block font-medium text-sm text-neutral-900 mb-2 mt-2">Nama</label>
                                <input type="text" name="nama" id="nama" value="John Doe" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2"> 
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-1 md:gap-1"> 
                            <div class="col-span-1">
                                <label for="tanggal" class="block font-medium text-sm text-neutral-900 mb-2 mt-2">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" value="2022-01-01" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2"> 
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-1 md:gap-1"> 
                            <div class="col-span-1">
                                <label for="keterangan" class="block font-medium text-sm text-neutral-900 mb-2 mt-2">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2">Ini adalah keterangan dummy</textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-1 md:gap-1"> 
                            <div class="col-span-1">
                                <label for="status" class="block font-medium text-sm text-neutral-900">Status laporan</label>
                                <select id="status" name="status" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                                    <option class="font normal text-sm text-black" value="">Pilih Status Laporan</option>
                                    <option class="font normal text-sm text-black" value="Diterima" selected>Diterima</option>
                                    <option class="font normal text-sm text-black" value="Ditolak">Ditolak</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-1 md:gap-1 w-full flex flex-wrap justify-center items-center"> 
                            <div class="col-span-1">
                                <label for="gambar" class="block font-medium text-sm text-neutral-900 mb-2 mt-2">Bukti</label>
                                <img src="{{ asset('no-image.jpg') }}" class="w-full h-full md:w-1/3 md:h-1/6 rounded-lg">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
