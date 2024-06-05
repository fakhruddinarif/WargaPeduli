<nav class="fixed top-[60px] z-50 w-full bg-white border-b border-neutral-300">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end h-20 w-fit">
                <button id="toggle" data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-neutral-900 rounded-lg lg:hidden hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="{{ url('/') }}" class="flex ms-2 md:me-24">
                    <img src="{{ asset('logo-polinema.png') }}" class="h-8 me-3" alt="Logo Polinema" />
                    <span class="self-center text-base font-semibold sm:text-xl whitespace-nowrap">Warga Peduli</span>
                </a>
            </div>
            <div class="w-full flex flex-row justify-end sm:justify-between items-center px-2 py-3 sm:px-4">
                <div id="text-date-title" class="flex flex-col justify-center items-stretch gap-0 sm:gap-3">
                    <span class="font-medium text-xs text-neutral-500 md:text-sm">{{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</span>
                    <span class="font-semibold text-neutral-900 md:text-2xl text-xl">{{ $page }}</span>
                </div>
                <button id="user-dashboard" type="button" class="flex flex-row justify-between items-center gap-2 sm:gap-[14px] border-2 rounded-lg border-neutral-200 px-3 py-[14px]">
                    <div class="flex flex-col justify-center items-start w-full text-left">
                        <span class="font-semibold text-xs sm:text-base text-black">{{ \Illuminate\Support\Str::limit(\Illuminate\Support\Facades\Auth::user()->username, 10) }}</span>
                        <span class="font-medium text-xs text-neutral-400">{{ \Illuminate\Support\Facades\Auth::user()->level->nama }}</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#292d32" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                </button>
            </div>
        </div>
    </div>
</nav>
