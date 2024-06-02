@extends('layouts.app')
@section('template')
    <section class="w-full bg-blue-500 overflow-y-scroll h-fit lg:py-8">
        <div class="flex flex-col items-center justify-start px-6 py-8 mx-auto md:h-screen lg:py-0">
            @if (Session::has('error'))
                <div class="w-fit p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <ul>
                        <li class="font-medium">{{ Session::get('error') }}</li>
                    </ul>
                </div>
            @elseif(Session::has('errors'))
                <div class="w-fit p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <ul>
                        @foreach(Session::get('errors')->all() as $error)
                            <li class="font-medium">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <div class="flex flex-row justify-start items-center gap-2">
                        <a href="{{ url('/') }}" class="w-fit p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>
                        </a>
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-neutral-900 md:text-2xl">
                            Pengajuan
                        </h1>
                    </div>
                    <form class="space-y-4 md:space-y-6" method="post" enctype="multipart/form-data" action="{{ url('/storePengajuan') }}">
                        @csrf
                        <div class="w-full flex flex-row justify-evenly items-center">
                            <div class="flex items-center">
                                <input id="menetap" type="radio" value="Menetap" name="status_warga" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 focus:ring-blue-500">
                                <label for="menetap" class="ms-2 text-sm font-medium text-neutral-900">Menetap</label>
                            </div>
                            <div class="flex items-center">
                                <input id="pendatang" type="radio" value="Pendatang" name="status_warga" class="w-4 h-4 text-blue-600 bg-neutral-100 border-neutral-300 focus:ring-blue-500">
                                <label for="pendatang" class="ms-2 text-sm font-medium text-neutral-900">Pendatang</label>
                            </div>
                        </div>
                        <div class="col-span-full w-full">
                            <label for="dokumen" class="block text-sm font-medium leading-6 text-neutral-900">Dokumen Kartu Kelaurga</label>
                            <div id="dropzone" class="mt-2 flex flex-col items-center gap-4 justify-center rounded-lg border border-dashed border-neutral-900/25 px-6 py-10">
                                <img id="preview" class="hidden w-3/4 h-3/4 rounded-lg">
                                <div id="area-upload" class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-neutral-600">
                                        <label for="dokumen" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="dokumen" name="dokumen" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-neutral-600">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>
                        </div>
                        <div id="form-pendatang" class="flex-wrap -mx-2 gap-4">
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="nik" class="block font-medium text-sm text-neutral-900">NIK<span class="font-medium text-sm text-red-600">*</span></label>
                                <input type="text" id="nik" name="nik" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Induk Kependudukan">
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="nama" class="block font-medium text-sm text-neutral-900">Nama Lengkap<span class="font-medium text-sm text-red-600">*</span></label>
                                <input type="text" id="nama" name="nama" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="jenis_kelamin" class="block font-medium text-sm text-neutral-900">Jenis Kelamin<span class="font-medium text-sm text-red-600">*</span></label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                                    <option class="font normal text-sm text-black" value="">Pilih Jenis Kelamin</option>
                                    <option class="font normal text-sm text-black" value="Laki-Laki">Laki-Laki</option>
                                    <option class="font normal text-sm text-black" value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="tempat_lahir" class="block font-medium text-sm text-neutral-900">Tempat Lahir<span class="font-medium text-sm text-red-600">*</span></label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Tempat Lahir">
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="tanggal_lahir" class="block font-medium text-sm text-neutral-900">Tanggal Lahir<span class="font-medium text-sm text-red-600">*</span></label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Tanggal Lahir">
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="alamat" class="block font-medium text-sm text-neutral-900">Alamat<span class="font-medium text-sm text-red-600">*</span></label>
                                <input type="text" id="alamat" name="alamat" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Alamat">
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="ibu_kandung" class="block font-medium text-sm text-neutral-900">Nama Ibu Kandung<span class="font-medium text-sm text-red-600">*</span></label>
                                <input type="text" id="ibu_kandung" name="ibu_kandung" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Ibu Kandung">
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="rt_id" class="block font-medium text-sm text-neutral-900">RT<span class="font-medium text-sm text-red-600">*</span></label>
                                <select id="rt_id" name="rt_id" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                                    <option class="font normal text-sm text-black" value="">Pilih RT</option>
                                    @foreach($rt as $value)
                                        <option class="font normal text-sm text-black" value="{{ $value->id }}">RT 0{{ $value->nomor }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="telepon" class="block font-medium text-sm text-neutral-900">Nomor Telepon<span class="font-medium text-sm text-red-600">*</span></label>
                                <input type="tel" id="telepon" name="telepon" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Telepon">
                            </div>
                        </div>

                        <div id="form-menetap" class="flex-wrap -mx-2 gap-4">
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="nkk" class="block font-medium text-sm text-neutral-900">NKK<span class="font-medium text-sm text-red-600">*</span></label>
                                <input type="text" id="nkk" name="nkk" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Kartu Keluarga">
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="nama" class="block font-medium text-sm text-neutral-900">Nama Kepala Keluarga<span class="font-medium text-sm text-red-600">*</span></label>
                                <input type="text" id="nama" name="nama" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Kepala Keluarga">
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="rt_id" class="block font-medium text-sm text-neutral-900">RT<span class="font-medium text-sm text-red-600">*</span></label>
                                <select id="rt_id" name="rt_id" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                                    <option class="font normal text-sm text-black" value="">Pilih RT</option>
                                    @foreach($rt as $value)
                                        <option class="font normal text-sm text-black" value="{{ $value->id }}">RT 0{{ $value->nomor }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="username" class="block font-medium text-sm text-neutral-900">Username<span class="font-medium text-sm text-red-600">*</span></label>
                                <input type="text" id="username" name="username" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-start items-start">
                                <label for="password" class="block font-medium text-sm text-neutral-900">Password<span class="font-medium text-sm text-red-600">*</span></label>
                                <input type="password" id="password" name="password" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Password">
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Pengajuan</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Sudah punya akun? <a href="{{ url('/login') }}" class="font-medium text-blue-600 hover:underline">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        var radioMenetap = document.getElementById('menetap');
        var radioPendatang = document.getElementById('pendatang');
        var labelDokumen = document.querySelector('label[for="dokumen"]');
        var formPendatang = document.getElementById('form-pendatang');
        var formMenetap = document.getElementById('form-menetap');

        radioMenetap.addEventListener('change', function() {
            if (this.checked) {
                labelDokumen.textContent = 'Dokumen Kartu Keluarga';
                formPendatang.classList.add('hidden');
                formMenetap.classList.remove('hidden');
                formMenetap.classList.add('flex');
            }
        });

        radioPendatang.addEventListener('change', function() {
            if (this.checked) {
                labelDokumen.textContent = 'Dokumen Kartu Tanda Penduduk';
                formMenetap.classList.add('hidden');
                formPendatang.classList.remove('hidden');
                formPendatang.classList.add('flex');
            }
        });

        // Set default value
        radioMenetap.checked = true;
        labelDokumen.textContent = 'Dokumen Kartu Keluarga';
        formPendatang.classList.add('hidden');
        formMenetap.classList.add('flex');

        var dropzone = document.getElementById('dropzone');
        var dokumen = document.getElementById('dokumen');
        var preview = document.getElementById('preview');
        var areaUpload = document.getElementById('area-upload');
        var dokumenChange = document.getElementById('dokumen-change');

        dropzone.ondragover = function(event) {
            event.preventDefault();
            this.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
        };

        dropzone.ondragleave = function(event) {
            this.style.backgroundColor = 'initial';
        };

        dropzone.ondrop = function(event) {
            event.preventDefault();
            this.style.backgroundColor = 'initial';

            dokumen.files = event.dataTransfer.files;
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.classList.remove('hidden');
                areaUpload.classList.add('hidden');
                dokumenChange.classList.remove('hidden');
            };
            reader.readAsDataURL(dokumen.files[0]);
        };

        dokumen.addEventListener('change', function() {
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.classList.remove('hidden');
                areaUpload.classList.add('hidden');
                dokumenChange.classList.remove('hidden');
            };
            reader.readAsDataURL(dokumen.files[0]);
        });

        // Output
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
