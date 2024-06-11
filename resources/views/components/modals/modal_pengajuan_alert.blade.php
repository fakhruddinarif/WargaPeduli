@if(Session::has('success'))
    <div id="success" class="fixed inset-0 px-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
        <div class="w-full max-w-md bg-white shadow-lg rounded-md px-5 py-10 relative mx-auto text-center">
            <svg class="rounded-full bg-white absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="#16a34a" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
            <div class="mt-8">
                <h3 class="text-2xl font-semibold flex-1">Pengajuan Sukses</h3>
                <p class="text-sm text-gray-500 mt-2">Mohon ingat dan simpan ID pengajuan</p>
                <p class="text-sm text-gray-500">ID Pengajuan: <span class="font-semibold">{{ \Illuminate\Support\Facades\Session::get('success') }}</span></p>
                <a href="{{ url('/') }}" class="px-6 py-2.5 mt-8 w-full rounded text-white text-sm font-semibold border-none outline-none bg-green-600 hover:bg-green-700 block text-center">Selesai</a>
            </div>
        </div>
    </div>
@elseif(Session::has('error'))
    <div id="error" class="fixed inset-0 px-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
        <div class="w-full max-w-md bg-white shadow-lg rounded-md px-5 py-10 relative mx-auto text-center">
            <svg class="rounded-full bg-white absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="#b91c1c" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm37.66,130.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
            <div class="mt-8">
                <h3 class="text-2xl font-semibold flex-1">Pengajuan Gagal</h3>
                <p class="text-sm text-gray-500 mt-2">Mohon Maaf Pengajuan Anda Gagal</p>
                <p class="text-sm text-gray-500">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
                <a href="{{ url('/') }}" class="px-6 py-2.5 mt-8 w-full rounded text-white text-sm font-semibold border-none outline-none bg-red-700 hover:bg-green-800 block text-center">Selesai</a>
            </div>
        </div>
    </div>
@endif
