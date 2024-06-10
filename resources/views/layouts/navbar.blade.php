<nav class="fixed top-[60px] z-50 w-full bg-white border-b border-neutral-300">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end h-20 w-fit">
                @if($url == 'admin' || $url == 'rw')
                    <button id="toggle" data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-neutral-900 rounded-lg lg:hidden hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                @endif
                <a href="{{ url('/') }}" class="flex ms-2 md:me-24">
                    <img src="{{ asset('logo-polinema.png') }}" class="h-8 me-3" alt="Logo Polinema" />
                    <span class="self-center text-base font-semibold sm:text-xl whitespace-nowrap">Warga Peduli</span>
                </a>
            </div>
            <div class="w-full flex flex-row justify-end {{ $url == 'admin' || $url == 'rw' ? 'sm:justify-between' : '' }} items-center px-2 py-3 sm:px-4">
                @if($url == 'admin' || $url == 'rw')
                    <div id="text-date-title" class="flex flex-col justify-center items-stretch gap-0 sm:gap-3">
                        <span class="font-medium text-xs text-neutral-500 md:text-sm">{{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</span>
                        <span class="font-semibold text-neutral-900 md:text-2xl text-xl">{{ $page }}</span>
                    </div>
                @endif
                <div class="flex items-center">
                    <div class="flex items-center ms-3 relative">
                        <div>
                            <button id="user-dashboard" type="button" class="relative flex flex-row justify-between items-center gap-2 sm:gap-[14px] border-2 rounded-lg border-neutral-200 px-3 py-[14px]">
                                <div class="flex flex-col justify-center items-start w-full text-left">
                                    <span class="font-semibold text-xs sm:text-base text-black">{{ \Illuminate\Support\Str::limit(\Illuminate\Support\Facades\Auth::user()->username, 10) }}</span>
                                    <span class="font-medium text-xs text-neutral-400">{{ \Illuminate\Support\Facades\Auth::user()->level->nama }}</span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#292d32" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                            </button>
                        </div>
                        <div class="z-50 hidden absolute w-fit top-2/3 my-6 text-base list-none bg-white divide-y divide-neutral-100 shadow" id="dropdown-user">
                            <ul class="py-1" role="none">
                                <li class="py-2 px-4 hover:bg-neutral-100">
                                    <a href="{{ url($url . '/profil') }}" class="flex flex-row justify-start items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#737373" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120Zm97.76,66.41a79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75,88,88,0,1,1,131.52,0Z"></path></svg>
                                        <span class="font-semibold text-sm text-neutral-500">Profil</span>
                                    </a>
                                </li>
                                <li class="py-2 px-4 hover:bg-neutral-100">
                                    <a href="{{ url('/logout') }}" class="flex flex-row justify-start items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#737373" viewBox="0 0 256 256"><path d="M124,216a12,12,0,0,1-12,12H48a12,12,0,0,1-12-12V40A12,12,0,0,1,48,28h64a12,12,0,0,1,0,24H60V204h52A12,12,0,0,1,124,216Zm108.49-96.49-40-40a12,12,0,0,0-17,17L195,116H112a12,12,0,0,0,0,24h83l-19.52,19.51a12,12,0,0,0,17,17l40-40A12,12,0,0,0,232.49,119.51Z"></path></svg>
                                        <span class="font-semibold text-sm text-neutral-500">Keluar</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
    // Dapatkan elemen dengan id 'user-dashboard' dan 'dropdown-user'
    var userDashboard = document.getElementById('user-dashboard');
    var dropdownUser = document.getElementById('dropdown-user');

    // Tambahkan event listener 'click' ke 'user-dashboard'
    userDashboard.addEventListener('click', function() {
        // Ubah properti CSS 'display' dari 'dropdown-user'
        if (dropdownUser.style.display === 'none' || dropdownUser.style.display === '') {
            dropdownUser.style.display = 'block';
        } else {
            dropdownUser.style.display = 'none';
        }
    });
</script>
