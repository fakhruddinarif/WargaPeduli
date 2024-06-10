@extends('layouts.app')
@section('template')
    @include('layouts.navigation')
    @include('layouts.navbar')
    <section id="content" class="bg-white flex flex-wrap justify-start items-start mt-[164px] w-full gap-4 py-8 px-5 overflow-y-scroll">
        @if (Session::has('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 text-center" role="alert">
                <span class="font-medium">{{ Session::get('error')}}</span>
            </div>
        @elseif(Session::has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 text-center" role="alert">
                <span class="font-medium">{{ Session::get('success')}}</span>
            </div>
        @endif
        <div class="w-full flex flex-col gap-4 items-start justify-start">
            <div class="flex flex-row justify-start items-center gap-2">
                <a href="{{ url($url . '/') }}" class="w-fit p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>
                </a>
                <h1 class="text-xl font-bold leading-tight tracking-tight text-neutral-900 md:text-2xl">
                    Profil
                </h1>
            </div>
            <div class="w-full flex flex-wrap justify-start items-start px-6 py-4 border gap-4 rounded border-2">
                <div class="w-full flex flex-wrap justify-center items-center gap-4 py-6">
                    @if($data[0]->kk != null)
                        <img src="{{ url($data[0]->kk) }}" class="w-full h-full md:w-1/3 md:h-1/6 rounded-lg">
                    @else
                        <img src="{{ asset('no-image.jpg') }}" class="w-full h-full md:w-1/3 md:h-1/6 rounded-lg">
                    @endif
                    <form action="{{ url($url . '/profil_update') }}" method="POST" class="w-full md:w-1/2 flex flex-col justify-end items-end gap-4 rounded-lg border px-4 py-8 shadow">
                        @csrf
                        {!! method_field('PUT') !!}
                        <div class="w-full gap-1 flex flex-col justify-center items-start">
                            <span class="font-medium text-base text-neutral-900">NKK</span>
                            <div class="w-full px-4 py-2 border rounded">
                                <span class="font-normal text-sm text-neutral-900">{{ $data[0]->nkk }}</span>
                            </div>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <span class="font-medium text-base text-neutral-900">Alamat</span>
                            <div class="w-full px-4 py-2 border rounded">
                                <span class="font-normal text-sm text-neutral-900">{{ $data[0]->alamat }}</span>
                            </div>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <span class="font-medium text-base text-neutral-900">RT</span>
                            <div class="w-full px-4 py-2 border rounded">
                                <span class="font-normal text-sm text-neutral-900">RT 0{{ $data[0]->nomor }}</span>
                            </div>
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="pendapatan" class="block font-medium text-sm text-neutral-900">Pendapatan<span class="font-normal text-xs text-neutral-900"> (Harap Diisi jika kosong)</span></label>
                            <input type="text" id="pendapatan" name="pendapatan" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Pendapatan" value="{{ $data[0]->pendapatan }}">
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="luas_bangunan" class="block font-medium text-sm text-neutral-900">Luas Bangunan<span class="font-normal text-xs text-neutral-900"> (Harap Diisi jika kosong)</span></label>
                            <input type="text" id="luas_bangunan" name="luas_bangunan" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Luas Bangunan" value="{{ $data[0]->luas_bangunan }}">
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="jumlah_tanggungan" class="block font-medium text-sm text-neutral-900">Jumlah Tanggungan<span class="font-normal text-xs text-neutral-900"> (Harap Diisi jika kosong)</span></label>
                            <input type="text" id="jumlah_tanggungan" name="jumlah_tanggungan" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Jumlah Tanggungan" value="{{ $data[0]->jumlah_tanggungan }}">
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="pajak_bumi" class="block font-medium text-sm text-neutral-900">Pajak Bumi<span class="font-normal text-xs text-neutral-900"> (Harap Diisi jika kosong)</span></label>
                            <input type="text" id="pajak_bumi" name="pajak_bumi" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Pajak Bumi" value="{{ $data[0]->pajak_bumi }}">
                        </div>
                        <div class="w-full gap-1 flex flex-col justify-start items-start">
                            <label for="tagihan_listrik" class="block font-medium text-sm text-neutral-900">Tagihan Listrik<span class="font-normal text-xs text-neutral-900"> (Harap Diisi jika kosong)</span></label>
                            <input type="text" id="tagihan_listrik" name="tagihan_listrik" class="input-number px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Tagihan Listrik" value="{{ $data[0]->tagihan_listrik }}">
                        </div>
                        <button type="submit" class="px-4 py-3 bg-blue-500 rounded-md">
                            <span class="font-medium text-sm text-white">Simpan</span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-start items-start px-6 py-4 border gap-4 rounded border-2">
                <span class="font-semibold text-xl text-neutral-900">Anggota Keluarga</span>
                @foreach($data as $value)
                    <div class="w-full flex flex-wrap justify-center items-center gap-4 py-6">
                        @if($value->ktp != null)
                            <img src="{{ url($value->ktp) }}" class="w-full h-full md:w-1/3 md:h-1/6 rounded-lg">
                        @else
                            <img src="{{ asset('no-image.jpg') }}" class="w-full h-full md:w-1/3 md:h-1/6 rounded-lg">
                        @endif
                        <div class="w-full md:w-1/2 flex flex-col justify-end items-end gap-4 rounded-lg border px-4 py-8 shadow">
                            <div class="w-full gap-1 flex flex-col justify-center items-start">
                                <span class="font-medium text-base text-neutral-900">NIK</span>
                                <div class="w-full px-4 py-2 border rounded">
                                    <span class="font-normal text-sm text-neutral-900">{{ $value->nik }}</span>
                                </div>
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-center items-start">
                                <span class="font-medium text-base text-neutral-900">Nama Lengkap</span>
                                <div class="w-full px-4 py-2 border rounded">
                                    <span class="font-normal text-sm text-neutral-900">{{ $value->nama }}</span>
                                </div>
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-center items-start">
                                <span class="font-medium text-base text-neutral-900">Jenis Kelamin</span>
                                <div class="w-full px-4 py-2 border rounded">
                                    <span class="font-normal text-sm text-neutral-900">{{ $value->jenis_kelamin }}</span>
                                </div>
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-center items-start">
                                <span class="font-medium text-base text-neutral-900">Tempat Lahir</span>
                                <div class="w-full px-4 py-2 border rounded">
                                    <span class="font-normal text-sm text-neutral-900">{{ $value->tempat_lahir }}</span>
                                </div>
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-center items-start">
                                <span class="font-medium text-base text-neutral-900">Tanggal Lahir</span>
                                <div class="w-full px-4 py-2 border rounded">
                                    <span class="font-normal text-sm text-neutral-900">{{ date('d-m-Y', strtotime($value->tanggal_lahir)) }}</span>
                                </div>
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-center items-start">
                                <span class="font-medium text-base text-neutral-900">Nama Ibu Kandung</span>
                                <div class="w-full px-4 py-2 border rounded">
                                    <span class="font-normal text-sm text-neutral-900">{{ $value->ibu_kandung }}</span>
                                </div>
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-center items-start">
                                <span class="font-medium text-base text-neutral-900">Status Keluarga</span>
                                <div class="w-full px-4 py-2 border rounded">
                                    <span class="font-normal text-sm text-neutral-900">{{ $value->status_keluarga }}</span>
                                </div>
                            </div>
                            <div class="w-full gap-1 flex flex-col justify-center items-start">
                                <span class="font-medium text-base text-neutral-900">Nomor Telepon</span>
                                <div class="w-full px-4 py-2 border rounded">
                                    <span class="font-normal text-sm text-neutral-900">{{ $value->telepon }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <button type="button" id="btn-add-warga" class="w-full px-4 py-3 bg-blue-500 shadow">
                    <span class="font-medium text-white text-sm">Tambah Anggota</span>
                </button>
            </div>
        </div>
        <div class="flex flex-col gap-4 justify-start items-start w-full border shadow px-4 py-4 rounded">
            <span class="font-semibold text-neutral-900 text-2xl">Detail Profil</span>
            <form method="POST" action="{{ url($url . '/change_profile') }}" class="w-full flex flex-col justify-end items-end gap-4">
                @csrf
                {!! method_field('PUT') !!}
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="username" class="block font-medium text-sm text-neutral-900">Username</label>
                    <input type="text" id="username" name="username" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Username" value="{{ $user->username }}">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="old_pass" class="block font-medium text-sm text-neutral-900">Password Lama</label>
                    <input type="password" id="old_pass" name="old_pass" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Password Lama" value="{{ $user->password }}">
                </div>
                <div class="w-full gap-1 flex flex-col justify-start items-start">
                    <label for="new_pass" class="block font-medium text-sm text-neutral-900">Password Baru</label>
                    <input type="password" id="new_pass" name="new_pass" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Password Baru">
                </div>
                <button type="submit" class="w-full px-6 py-3 bg-blue-500 rounded-md">
                    <span class="text-sm font-medium text-white">Simpan</span>
                </button>
            </form>
        </div>

            <div id="modal-add-warga" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative flex p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow border w-full py-6 h-full">
                        <button type="button" id="close-add-warga" class="absolute top-1 end-1 text-neutral-300 bg-transparent hover:bg-neutral-300 hover:text-neutral-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 flex flex-col gap-2 w-full justify-start items-start">
                            <form method="POST" action="{{ url($url . '/add_warga') }}" class="w-full flex flex-col gap-4 justify-start items-start">
                                @csrf
                                <div class="col-span-full w-full">
                                    <label for="dokumen" class="block text-sm font-medium leading-6 text-neutral-900">Dokumen Kartu Tanda Penduduk</label>
                                    <div id="dropzone" class="mt-2 flex justify-center rounded-lg border border-dashed border-neutral-900/25 px-6 py-10">
                                        <img id="preview" class="hidden w-full  rounded-lg">
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
                                <div class="w-full gap-1 flex flex-col justify-start items-start">
                                    <label for="nik" class="block font-medium text-sm text-neutral-900">Nomor Induk Kependudukan<span class="font-medium text-sm text-red-600">*</span></label>
                                    <input type="text" id="nik" name="nik" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Induk Kependudukan">
                                </div>
                                <div class="w-full gap-1 flex flex-col justify-start items-start">
                                    <label for="nama" class="block font-medium text-sm text-neutral-900">Nama Lengkap<span class="font-medium text-sm text-red-600">*</span></label>
                                    <input type="text" id="nama" name="nama" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Lengkap">
                                </div>
                                <div class="w-full gap-1 flex flex-col justify-start items-start">
                                    <label for="jenis_kelamin" class="block font-medium text-sm text-neutral-900">Jenis Kelamin<span class="font-medium text-sm text-red-600">*</span></label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2">
                                        <option class="font-normal text-sm text-black" value="">Pilih Jenis Kelamin</option>
                                        <option class="font-normal text-sm text-black" value="Laki-laki">Laki-laki</option>
                                        <option class="font-normal text-sm text-black" value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="w-full gap-1 flex flex-col justify-start items-start">
                                    <label for="tempat_lahir" class="block font-medium text-sm text-neutral-900">Tempat Lahir<span class="font-medium text-sm text-red-600">*</span></label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Tempat Lahir">
                                </div>
                                <div class="w-full gap-1 flex flex-col justify-start items-start">
                                    <label for="tanggal_lahir" class="block font-medium text-sm text-neutral-900">Tanggal Lahir<span class="font-medium text-sm text-red-600">*</span></label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2">
                                </div>
                                <div class="w-full gap-1 flex flex-col justify-start items-start">
                                    <label for="ibu_kandung" class="block font-medium text-sm text-neutral-900">Ibu Kandung<span class="font-medium text-sm text-red-600">*</span></label>
                                    <input type="text" id="ibu_kandung" name="ibu_kandung" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nama Ibu Kandung">
                                </div>
                                <div class="w-full gap-1 flex flex-col justify-start items-start">
                                    <label for="status_keluarga" class="block font-medium text-sm text-neutral-900">Status Keluarga<span class="font-medium text-sm text-red-600">*</span></label>
                                    <select id="status_keluarga" name="status_keluarga" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2">
                                        <option class="font-normal text-sm text-black" value="">Pilih Status Keluarga</option>
                                        <option class="font-normal text-sm text-black" value="Kepala Keluarga">Kepala Keluarga</option>
                                        <option class="font-normal text-sm text-black" value="Istri">Istri</option>
                                        <option class="font-normal text-sm text-black" value="Anak">Anak</option>
                                        <option class="font-normal text-sm text-black" value="Cucu">Cucu</option>
                                        <option class="font-normal text-sm text-black" value="Menantu">Menantu</option>
                                        <option class="font-normal text-sm text-black" value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="w-full gap-1 flex flex-col justify-start items-start">
                                    <label for="telepon" class="block font-medium text-sm text-neutral-900">Telepon</label>
                                    <input type="text" id="telepon" name="telepon" class="px-2 py-3 font-normal text-sm text-black rounded-lg w-full border-2" placeholder="Masukkan Nomor Telepon">
                                </div>
                                <button type="submit" class="w-full px-4 py-3 bg-blue-500">
                                    <span class="font-medium text-sm text-white">Simpan</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script>
        const modal = document.getElementById('modal-add-warga');
        const btn = document.getElementById('btn-add-warga');
        const close = document.getElementById('close-add-warga');
        btn.addEventListener('click', function() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            console.log('clicked')
        });
        close.addEventListener('click', function() {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        });
    </script>
@endsection
