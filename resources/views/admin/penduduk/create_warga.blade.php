@extends('layouts.template')
@section('content')
    @if (Session::has('error'))
        <div class="w-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <ul>
                <li class="font-medium">{{ Session::get('error') }}</li>
            </ul>
        </div>
    @endif
    <div class="w-full flex flex-col justify-center items-center rounded-lg border-2">
        <div class="w-full flex flex-row justify-between items-center bg-blue-500 rounded-tr-lg rounded-tl-lg px-4 py-2">
            <div class="w-fit h-fit">
                <span class="font-normal text-sm text-white">Tambah Data Warga</span>
            </div>
            <div class="w-fit h-fit">
                <a href="{{ url('/admin/penduduk' . ($isCreateKeluarga ? '?create=keluarga' : '')) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                </a>
            </div>
        </div>
        <div class="w-full flex flex-col justify-center items-center gap-4 px-4 py-4">
            <form method="POST" enctype="multipart/form-data" action="{{ url('/admin/penduduk/warga' . ($isCreateKeluarga ? '?create=keluarga' : '')) }}" class="w-full flex flex-col justify-end items-end gap-4">
                @csrf
                <div class="relative w-full overflow-x-auto shadow-sm flex flex-row items-center gap-2">
                    <div id="button-form" class="flex flex-row items-center gap-2"></div>
                    <button type="button" onclick="addForm()" class="bg-blue-500 min-w-48 h-fit rounded-md px-2 py-4 text-left flex flex-row justify-center items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" viewBox="0 0 256 256"><path d="M128,20A108,108,0,1,0,236,128,108.12,108.12,0,0,0,128,20Zm0,192a84,84,0,1,1,84-84A84.09,84.09,0,0,1,128,212Zm52-84a12,12,0,0,1-12,12H140v28a12,12,0,0,1-24,0V140H88a12,12,0,0,1,0-24h28V88a12,12,0,0,1,24,0v28h28A12,12,0,0,1,180,128Z"></path></svg>
                        <span class="font-medium text-white text-sm">Tambah Data Warga</span>
                    </button>
                </div>
                @php
                    $i = $i ?? 0;
                @endphp
                <div id="form" class="w-full flex flex-col justify-end items-end gap-4"></div>
                <div class="flex flex-row justify-between items-end w-full">
                    @if($isCreateKeluarga)
                        <a href="{{url('/admin/penduduk/create/keluarga')}}" class="px-4 py-3 bg-blue-500 rounded-md">
                            <span class="font-medium text-sm text-white">Sebelumnya</span>
                        </a>
                    @endif
                    <button id="save-button" type="submit" class="px-4 py-3 bg-blue-500 rounded-md">
                        <span class="font-medium text-sm text-white">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    var i = 0;
    var now = 0;
    var oldData = @json(old());

    function checkElementExist(id) {
        var element = document.getElementById(id);
        if (element) {
            return true;
        }
        return false;
    }

    function changeBorderButton(n) {
        var previousButton = document.getElementById('warga' + now);
        var previousForm = document.getElementById('field-form' + now);
        if (previousButton) {
            previousButton.classList.remove('border-blue-500');
            previousButton.classList.remove('border-2');
        }
        if (previousForm) {
            previousForm.classList.add('hidden');
        }
        now = n;
        var currentButton = document.getElementById('warga' + n);
        var currentForm = document.getElementById('field-form' + n);
        if (currentButton) {
            currentButton.classList.add('border-blue-500');
            currentButton.classList.add('border-2');
        }
        if (currentForm) {
            currentForm.classList.remove('hidden');
            currentForm.classList.add('flex');
        }
    }

    function getNumberOfWargaElements() {
        var wargaElements = document.querySelectorAll('[id^="warga"]');
        return wargaElements.length;
    }

    function getOldData(key, i) {
        return oldData[key] && oldData[key][i - 1] !== null ? oldData[key][i - 1] : '';
    }

    function selectedData(key, i) {
        var oldKey = getOldData(key, i);
        var selectKey = document.getElementById(key + i);
        for (var j = 0; j < selectKey.options.length; j++) {
            if (selectKey.options[j].value == oldKey) {
                selectKey.options[j].selected = true;
                break;
            }
        }
    }
    function addForm() {
        i++;
        @php
        $i++
        @endphp

        var oldNik = getOldData('nik', i);
        var oldNama = getOldData('nama', i);
        var oldTempatLahir = getOldData('tempat_lahir', i);
        var oldTanggalLahir = getOldData('tanggal_lahir', i);
        var oldAlamat = getOldData('alamat', i);
        var oldIbuKandung = getOldData('ibu_kandung', i);
        var oldTelepon = getOldData('telepon', i);

        var buttonForm = document.getElementById('button-form');
        buttonForm.insertAdjacentHTML('beforeend', `
        <button onclick="changeBorderButton(`+i+`)" type="button" id="warga`+i+`" class="min-w-48 h-fit rounded-md px-2 py-4 text-left flex flex-col justify-start items-start border-2">
            <span id="text-nama`+i+`" class="text font-medium text-neutral-900 text-sm">---/---</span>
            <span id="text-status`+i+`" class="font-normal text-neutral-400 text-xs">---/---</span>
        </button>`);
        var form = document.getElementById('form');
        form.insertAdjacentHTML('beforeend', `
        <div id="field-form`+i+`" class="w-full flex flex-col justify-end items-end gap-4">
            <button onclick="removeData(`+i+`)" class="w-fit bg-red-500 px-4 py-3 font-medium text-white text-sm rounded-lg">Hapus</button>
            @if(!$isCreateKeluarga)
            <div class="w-full gap-1 flex flex-col justify-start items-start">
                <label class="block font-medium text-sm text-neutral-900">Nomor Kartu Keluarga</label>
                 <select id="keluarga_id`+i+`" name="keluarga_id[]" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                    <option class="font normal text-sm text-black" value="">Pilih Nomor Kartu Keluarga</option>
                    @foreach($keluarga as $value)
                        <option class="font normal text-sm text-black" value="{{ $value->id }}">{{ $value->nkk }} - {{ $value->nama }}</option>
                    @endforeach
                </select>
                @error('keluarga_id.' . $i - 1)
                    <span class="text-red-600 font-semibold text-xs">Nomor Kartu Keluarga harus diisi.</span>
                @enderror
            </div>
            @endif
            <div class="col-span-full w-full">
                <label class="block text-sm font-medium leading-6 text-neutral-900">Dokumen Kartu Tanda Penduduk</label>
                <div id="dropzone`+i+`" class="mt-2 flex justify-center rounded-lg border border-dashed border-neutral-900/25 px-6 py-10">
                    <img id="preview`+i+`" class="hidden w-[80%] md:w-[30%] h-[50%] rounded-lg">
                    <div id="area-upload`+i+`" class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                        </svg>
                    <div class="mt-4 flex text-sm leading-6 text-neutral-600">
                        <label class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Upload a file</span>
                            <input id="dokumen`+i+`" name="dokumen[]" type="file" class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs leading-5 text-neutral-600">PNG, JPG, GIF up to 2MB</p>
                </div>
            </div>
            @error('dokumen.' . $i - 1)
            <span class="text-xs font-semibold text-red-600">Dokumen gagal diunggah.</span>
            @enderror
        </div>
        <div class="w-full gap-1 flex flex-col justify-start items-start">
            <label class="block font-medium text-sm text-neutral-900">Nomor Induk Kependudukan<span class="font-medium text-sm text-red-600">*</span></label>
            <input type="text" id="nik`+i+`" name="nik[]" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Tanda Penduduk" value="`+ oldNik +`">
            @error('nik.' . $i - 1)
                <span class="text-red-600 font-semibold text-xs">NIK harus diisi.</span>
            @enderror
        </div>
        <div class="w-full gap-1 flex flex-col justify-start items-start">
            <label class="block font-medium text-sm text-neutral-900">Nama Lengkap<span class="font-medium text-sm text-red-600">*</span></label>
            <input type="text" id="nama`+i+`" name="nama[]" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Lengkap" value="`+ oldNama +`">
            @error('nama.' . $i - 1)
                <span class="text-red-600 font-semibold text-xs">Nama harus diisi.</span>
            @enderror
        </div>
        <div class="w-full gap-1 flex flex-col justify-start items-start">
            <label class="block font-medium text-sm text-neutral-900">Jenis Kelamin<span class="font-medium text-sm text-red-600">*</span></label>
            <select id="jenis_kelamin`+i+`" name="jenis_kelamin[]" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                <option class="font normal text-sm text-black" value="">Pilih Jenis Kelamin</option>
                @foreach($jenis_kelamin as $value)
                    <option class="font normal text-sm text-black" value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('jenis_kelamin.' . $i - 1)
                <span class="text-red-600 font-semibold text-xs">Jenis Kelamin harus diisi.</span>
            @enderror
        </div>
        <div class="w-full gap-1 flex flex-col justify-start items-start">
            <label class="block font-medium text-sm text-neutral-900">Tempat Lahir<span class="font-medium text-sm text-red-600">*</span></label>
            <input type="text" id="tempat_lahir`+i+`" name="tempat_lahir[]" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Tempat Lahir" value="`+ oldTempatLahir +`">
            @error('tempat_lahir.' . $i - 1)
                <span class="text-red-600 font-semibold text-xs">Tempat Lahir harus diisi.</span>
            @enderror
        </div>
        <div class="w-full gap-1 flex flex-col justify-start items-start">
            <label class="block font-medium text-sm text-neutral-900">Tanggal Lahir<span class="font-medium text-sm text-red-600">*</span></label>
            <input type="date" id="tanggal_lahir`+i+`" name="tanggal_lahir[]" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Tanggal Lahir" value="`+ oldTanggalLahir +`">
            @error('tanggal_lahir.' . $i - 1)
                <span class="text-red-600 font-semibold text-xs">Tanggal Lahir harus diisi.</span>
            @enderror
        </div>
         @if(!$isCreateKeluarga)
        <div class="w-full gap-1 flex flex-col justify-start items-start">
            <label class="block font-medium text-sm text-neutral-900">Alamat<span class="font-medium text-sm text-red-600">*</span></label>
            <input type="text" id="alamat`+i+`" name="alamat[]" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Alamat" value="`+ oldAlamat +`">
            @error('alamat.' . $i - 1)
                <span class="text-red-600 font-semibold text-xs">Alamat harus diisi.</span>
            @enderror
        </div>
        @endif
        <div class="w-full gap-1 flex flex-col justify-start items-start">
            <label class="block font-medium text-sm text-neutral-900">Nama Ibu Kandung<span class="font-medium text-sm text-red-600">*</span></label>
            <input type="text" id="ibu_kandung`+i+`" name="ibu_kandung[]" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Ibu Kandung"  value="`+ oldIbuKandung +`">
            @error('ibu_kandung.' . $i - 1)
                <span class="text-red-600 font-semibold text-xs">Nama Ibu Kandung harus diisi.</span>
            @enderror
        </div>
         @if(!$isCreateKeluarga)
        <div class="w-full gap-1 flex flex-col justify-start items-start">
            <label class="block font-medium text-sm text-neutral-900">Rukun Tetangga<span class="font-medium text-sm text-red-600">*</span></label>
            <select id="rt_id`+i+`" name="rt_id[]" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                <option class="font normal text-sm text-black" value="">Pilih Rukun Tetangga</option>
                @foreach($rt as $value)
                    <option class="font normal text-sm text-black" value="{{ $value->id }}">RT 0{{ $value->nomor }}</option>
                @endforeach
            </select>
            @error('rt_id.' . $i - 1)
                <span class="text-red-600 font-semibold text-xs">RT harus diisi.</span>
            @enderror
        </div>
      @endif
        <div class="w-full gap-1 flex flex-col justify-start items-start">
            <label class="block font-medium text-sm text-neutral-900">Status Keluarga<span class="font-medium text-sm text-red-600">*</span></label>
            <select id="status_keluarga`+i+`" name="status_keluarga[]" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                <option class="font normal text-sm text-black" value="">Pilih Status Keluarga</option>
                @foreach($status_keluarga as $value)
                    <option class="font normal text-sm text-black" value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('status_keluarga.' . $i - 1)
                <span class="text-red-600 font-semibold text-xs">Status Keluarga harus diisi.</span>
            @enderror
        </div>
        <div class="w-full gap-1 flex flex-col justify-start items-start">
            <label class="block font-medium text-sm text-neutral-900">Status Warga<span class="font-medium text-sm text-red-600">*</span></label>
            <select id="status_warga`+i+`" name="status_warga[]" class="px-2 py-3 font normal text-sm text-black rounded-lg w-full border-2">
                <option class="font normal text-sm text-black" value="">Pilih Status Warga</option>
                @foreach($status_warga as $value)
                    <option class="font normal text-sm text-black" value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('status_warga.' . $i - 1)
                <span class="text-red-600 font-semibold text-xs">Status Warga harus diisi.</span>
            @enderror
        </div>
        <div class="w-full gap-1 flex flex-col justify-start items-start">
            <label class="block font-medium text-sm text-neutral-900">Nomor Telepon</label>
            <input type="tel" id="telepon`+i+`" name="telepon[]" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Telepon" value="`+ oldTelepon +`">
            @error('telepon.' . $i - 1)
                <span class="text-red-600 font-semibold text-xs">Nomor telepon tidak sesuai.</span>
            @enderror
        </div>
    </div>`);
        selectedData('keluarga_id', i);
        selectedData('jenis_kelamin', i);
        selectedData('rt_id', i);
        selectedData('status_keluarga', i);
        selectedData('status_warga', i);

        var dokumen = document.getElementById('dokumen' + i);
        var preview = document.getElementById('preview' + i);
        var areaUpload = document.getElementById('area-upload' + i);

        dokumen.addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    areaUpload.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.classList.add('hidden');
                areaUpload.classList.remove('hidden');
            }
        });

        var dropzone = document.getElementById('dropzone' + i);

        dropzone.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('bg-blue-100');
        });

        dropzone.addEventListener('dragleave', function() {
            this.classList.remove('bg-blue-100');
        });

        dropzone.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('bg-blue-100');
            var file = e.dataTransfer.files[0];
            dokumen.files = e.dataTransfer.files;
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    areaUpload.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.classList.add('hidden');
                areaUpload.classList.remove('hidden');
            }
        });

        if (now === 0) {
            now = i;
            changeBorderButton(now);
        }

        if (getNumberOfWargaElements() == 1) {
            now = i;
            changeBorderButton(now);
        }

        if (getNumberOfWargaElements() > 1) {
            var currentForm = document.getElementById('field-form' + i);
            currentForm.classList.add('hidden');
        }

        var keluargaId = document.getElementById('keluarga_id' + i);
        keluargaId.addEventListener('change', function() {
            fetchKeluarga(keluargaId.value, i);
        });

        var textNama = document.getElementById('text-nama' + i);
        var nama = document.getElementById('nama' + i);
        var textStatus = document.getElementById('text-status' + i);
        var statusKeluarga = document.getElementById('status_keluarga' + i);

        nama.addEventListener('input', function() {
            textNama.innerText = nama.value === '' ? '---/---' : nama.value;
        });
        statusKeluarga.addEventListener('change', function() {
            textStatus.innerText = statusKeluarga.value === '' ? '---/---' : statusKeluarga.value;
        });
    }

    function fetchKeluarga(id, i) {
        fetch('/data-keluarga/' + id)
            .then(response => {
                if (!response.ok) {
                    throw new Error("HTTP error " + response.status);
                }
                return response.json();
            })
            .then(data => {
                // Lakukan sesuatu dengan data yang diterima
                var alamat = document.getElementById('alamat' + i);
                var statusWarga = document.getElementById('status_warga' + i);
                var rt = document.getElementById('rt_id' + i);
                alamat.value = data[0].alamat;
                statusWarga.value = data[0].status_warga;
                rt.value = data[0].rt_id;
            })
            .catch(function() {
                console.log("Fetch error");
            });
    }

    function removeData(id) {
        var fieldForm = document.getElementById('field-form' + id);
        var buttonWarga = document.getElementById('warga' + id);
        fieldForm.remove();
        buttonWarga.remove();

        if (id === i) {
            for (var j = id - 1; j >= 1; j--) {
                if (checkElementExist('warga' + j)) {
                    now = j;
                    break;
                }
            }
        } else if (id < i) {
            for (var j = id + 1; j <= i; j++) {
                if (checkElementExist('warga' + j)) {
                    now = j;
                    break;
                }
            }
        }
        changeBorderButton(now);
    }

    window.onload = function() {
        var oldData = @json(old());
        if (oldData) {
            for (var i = 0; i < oldData.nik.length; i++) {
                addForm();
            }
        }
    }
</script>
