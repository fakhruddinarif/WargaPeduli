@if(Session::has('pengajuan'))
    <div tabindex="-1" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative flex p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow border w-full h-full py-6 px-4 flex flex-col justify-start items-start gap-4">
                <div class="py-4 md:py-5 flex flex-col gap-2 w-full justify-start items-start">
                    <div class="flex flex-row justify-start items-center gap-2">
                        <a href="{{ url('/') }}" class="w-fit p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>
                        </a>
                        <h1 class="text-base font-bold leading-tight tracking-tight text-neutral-900 md:text-lg">
                            Cek Pengajuan
                        </h1>
                    </div>
                    <span class="font-medium text-neutral-500 text-xs">ID: {{ \Illuminate\Support\Facades\Session::get('pengajuan.id') }}</span>
                </div>
                @if(\Illuminate\Support\Facades\Session::get('pengajuan.status') == 'Selesai' && \Illuminate\Support\Facades\Session::get('pengajuan.status_pengajuan') == 'Keluarga')
                    <div class="w-full flex flex-col justify-start items-start gap-2">
                        <span class="font-semibold text-neutral-900 text-sm">Username</span>
                        <div class="w-full px-4 py-2 border-2 rounded-lg">
                            <span class="font-medium text-neutral-600 text-sm">{{ \Illuminate\Support\Facades\Session::get('pengajuan.username') }}</span>
                        </div>
                    </div>
                    <div class="w-full flex flex-col justify-start items-start gap-2">
                        <span class="font-semibold text-neutral-900 text-sm">Password</span>
                        <div class="w-full px-4 py-2 border-2 rounded-lg">
                            <span class="font-medium text-neutral-600 text-sm">{{ \Illuminate\Support\Facades\Session::get('pengajuan.password') }}</span>
                        </div>
                    </div>
                @endif
                <div class="w-full flex flex-col justify-start items-start gap-2">
                    <span class="font-semibold text-neutral-900 text-sm">Status</span>
                    <div class="w-full px-4 py-2 border-2 rounded-lg">
                        <span class="font-medium text-neutral-600 text-sm">{{ \Illuminate\Support\Facades\Session::get('pengajuan.status') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
