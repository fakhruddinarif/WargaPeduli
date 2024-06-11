
    @if(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">{{ Session::get('success')}}</span>
        </div>
    @elseif(Session::has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium">{{ Session::get('error')}}</span>
        </div>
    @endif
    <div id="pengajuan-penduduk" class="hidden fixed inset-0 z-40 bg-neutral-600 bg-opacity-50  justify-center items-center w-full mt-40">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl xl:mt-40 mt-20 mx-auto">
            <div class="flex items-center justify-between p-4 bg-blue-500 rounded-sm">
                <h3 class="text-lg font-medium text-white">Data Pengajuan Akun</h3>
                <button id="close-button-pengajuan" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-1 overflow-y-auto max-h-96 ">
                <div class="relative w-full overflow-x-auto shadow-md">
                <table class="table-auto w-full text-sm text-left rtl:text-right bg-neutral-200">
                    <thead class="text-sm font-normal text-black">
                        <tr class="md:table-row ">
                            <th scope="col" class="px-6 py-3">NKK</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Status Keluarga</th>
                            <th scope="col" class="px-6 py-3">RT</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b md:table-row">
                            <th scope="row" class="px-6 py-4 font-normal text-neutral-900 whitespace-nowrap">1234567890</th>
                            <td class="px-6 py-4">Jl. Pahlawan No. 123, Jakarta</td>
                            <td class="px-6 py-4">John Doe</td>
                            <td class="px-6 py-4">081234567890</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-start gap-4">
                                    <button type="button" class="w-fit h-fit px-4 py-2 bg-blue-500 rounded-md">
                                        <span class="font-semibold text-white">Detail</span>
                                    </button>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="w-fit h-fit px-4 py-2 bg-green-500 rounded-md">
                                            <span class="font-semibold text-white">Terima</span>
                                        </button>
                                    </form>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="w-fit h-fit px-4 py-2 bg-red-500 rounded-md">
                                            <span class="font-semibold text-white">Tolak</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
   
<script>
    document.getElementById('pengajuan-penduduk').addEventListener('click', function() {
        this.style.display = 'none';
    });
</script>
