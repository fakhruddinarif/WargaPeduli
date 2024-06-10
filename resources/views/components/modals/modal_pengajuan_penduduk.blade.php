<div id="form-pengajuan" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative flex p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow border w-full h-full py-6">
            <div class="p-4 md:p-5 flex flex-col gap-2 w-full justify-start items-start">
                <div class="flex flex-row justify-start items-center gap-2">
                    <a href="{{ url('/') }}" class="w-fit p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>
                    </a>
                    <h1 class="text-base font-bold leading-tight tracking-tight text-neutral-900 md:text-lg">
                        Pengajuan Penduduk
                    </h1>
                </div>
                <form method="post" action="{{ url('/storePengajuan') }}" enctype="multipart/form-data" class="flex flex-col w-full justify-start items-start gap-4">
                    @csrf
                    <div class="w-full flex flex-row justify-evenly items-center">
                        <div class="flex items-center">
                            <input id="menetap" type="radio" value="Menetap" name="status_warga" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 focus:ring-blue-500" checked>
                            <label for="menetap" class="ms-2 text-sm font-medium text-neutral-900">Menetap</label>
                        </div>
                        <div class="flex items-center">
                            <input id="pendatang" type="radio" value="Pendatang" name="status_warga" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 focus:ring-blue-500">
                            <label for="pendatang" class="ms-2 text-sm font-medium text-neutral-900">Pendatang</label>
                        </div>
                    </div>
                    <div id="form-keluarga" class="w-full flex flex-col justify-start items-end gap-4">
                        <div class="col-span-full w-full">
                            <label for="dokumen_kk" class="block text-sm font-medium leading-6 text-neutral-900">Dokumen Kartu Keluarga</label>
                            <div id="dropzone_kk" class="mt-2 flex justify-center rounded-lg border border-dashed border-neutral-900/25 px-6 py-10">
                                <img id="preview_kk" class="hidden w-full rounded-lg">
                                <div id="area-upload_kk" class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-neutral-600">
                                        <label for="dokumen_kk" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="dokumen_kk" name="dokumen_kk" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-neutral-600">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex flex-col justify-start items-start gap-2">
                            <label for="nkk" class="block font-medium text-sm text-neutral-900">NKK</label>
                            <input type="text" id="nkk" name="nkk" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Kartu Keluarga">
                        </div>
                        <button type="button" id="next-form" class="w-fit bg-blue-500 px-4 py-2 rounded-sm">
                            <span class="font-medium text-white text-sm">Selanjutnya</span>
                        </button>
                    </div>
                    <div id="form-warga" class="w-full flex flex-col justify-start items-start gap-4">
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label class="block font-medium text-sm text-neutral-900">RT<span class="font-medium text-sm text-red-600">*</span></label>
                            <select id="rt_id" name="rt_id" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2" required>
                                <option class="font normal text-sm text-black" value="">Pilih RT</option>
                                @foreach($rt as $value)
                                    <option class="font normal text-sm text-black" value="{{ $value->id }}">RT 0{{ $value->nomor }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-full w-full">
                            <label for="dokumen_ktp" class="block text-sm font-medium leading-6 text-neutral-900">Dokumen Kartu Tanda Penduduk</label>
                            <div id="dropzone_ktp" class="mt-2 flex justify-center rounded-lg border border-dashed border-neutral-900/25 px-6 py-10">
                                <img id="preview_ktp" class="hidden w-full rounded-lg">
                                <div id="area-upload_ktp" class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-neutral-600">
                                        <label for="dokumen_ktp" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="dokumen_ktp" name="dokumen_ktp" type="file" class="sr-only" required>
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-neutral-600">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="nik" class="block font-medium text-sm text-neutral-900">Nomor Induk Kependudukan<span class="font-medium text-sm text-red-600">*</span></label>
                            <input type="text" id="nik" name="nik" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Induk Kependudukan" required>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="nama" class="block font-medium text-sm text-neutral-900">Nama Kepala Keluarga</label>
                            <input type="text" id="nama" name="nama" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Kepala Keluarga" required>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="jenis_kelamin" class="block font-medium text-sm text-neutral-900">Jenis Kelamin<span class="font-medium text-sm text-red-600">*</span></label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" required>
                                <option class="font-normal text-sm text-black" value="">Pilih Jenis Kelamin</option>
                                <option class="font-normal text-sm text-black" value="Laki-laki">Laki-laki</option>
                                <option class="font-normal text-sm text-black" value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="tempat_lahir" class="block font-medium text-sm text-neutral-900">Tempat Lahir<span class="font-medium text-sm text-red-600">*</span></label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Tempat Lahir" required>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="tanggal_lahir" class="block font-medium text-sm text-neutral-900">Tanggal Lahir<span class="font-medium text-sm text-red-600">*</span></label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" required>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="alamat" class="block font-medium text-sm text-neutral-900">Alamat<span class="font-medium text-sm text-red-600">*</span></label>
                            <input type="text" id="alamat" name="alamat" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Alamat" required>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="ibu_kandung" class="block font-medium text-sm text-neutral-900">Ibu Kandung<span class="font-medium text-sm text-red-600">*</span></label>
                            <input type="text" id="ibu_kandung" name="ibu_kandung" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Ibu Kandung" required>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="telepon" class="block font-medium text-sm text-neutral-900">Telepon</label>
                            <input type="text" id="telepon" name="telepon" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Telepon">
                        </div>
                        <div class="w-full flex flex-row justify-between items-center">
                            <button type="button" id="prev-form" class="w-fit bg-white border border-blue-500 px-4 py-2 rounded-sm">
                                <span class="font-medium text-blue-500 text-sm">Sebelumnya</span>
                            </button>
                            <button type="submit" class="w-fit bg-blue-500 px-4 py-2 rounded-sm">
                                <span class="font-medium text-white text-sm">Simpan</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Menyembunyikan form-keluarga dan form-warga pada awal
        $('#form-warga').addClass('hidden');

        // Event listener untuk radio button status_warga
        $('input[type=radio][name=status_warga]').change(function() {
            if (this.value == 'Menetap') {
                $('#form-keluarga').removeClass('hidden');
                $('#form-warga').addClass('hidden');
                $('#prev-form').removeClass('hidden');
                $('label[for="nama"]').text('Nama Kepala Keluarga');
                $('#nama').attr('placeholder', 'Masukkan Nama Kepala Keluarga');
            }
            else if (this.value == 'Pendatang') {
                $('#form-warga').removeClass('hidden');
                $('#form-keluarga').addClass('hidden');
                $('#prev-form').addClass('hidden');
                $('label[for="nama"]').text('Nama Lengkap');
                $('#nama').attr('placeholder', 'Masukkan Nama Lengkap');
            }
        });

        // Event listener untuk tombol next-form
        $('#next-form').click(function() {
            $('#form-keluarga').addClass('hidden');
            $('#form-warga').removeClass('hidden');
        });

        // Event listener untuk tombol prev-form
        $('#prev-form').click(function() {
            $('#form-keluarga').removeClass('hidden');
            $('#form-warga').addClass('hidden');
        });

        ['kk', 'ktp'].forEach((type) => {
            let dropzone = $(`#dropzone_${type}`);
            let input = $(`#dokumen_${type}`);
            let preview = $(`#preview_${type}`);
            let areaUpload = $(`#area-upload_${type}`);

            dropzone.on('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropzone.addClass('bg-blue-100');
            });

            dropzone.on('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropzone.removeClass('bg-blue-100');
            });

            dropzone.on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropzone.removeClass('bg-blue-100');

                let file = e.originalEvent.dataTransfer.files[0];
                input.prop('files', e.originalEvent.dataTransfer.files);

                let reader = new FileReader();
                reader.onload = function(e) {
                    preview.attr('src', e.target.result);
                    preview.removeClass('hidden');
                    areaUpload.addClass('hidden');
                };
                reader.readAsDataURL(file);
            });
        });
    });
</script>
