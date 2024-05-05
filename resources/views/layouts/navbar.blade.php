<nav class="fixed z-20 w-full bg-white mt-[60px] border-b-2">
    <div class="flex flex-row justify-between items-center w-full border-2 border-[#F6F6F6] gap-8 md:gap-12 lg:gap-10 px-2 sm:px-4">
        <div class="flex justify-start items-center rtl:justify-end w-fit">
            <button id="toggle" data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-[#7F7F7F] rounded-lg xl:hidden">
                <span class="sr-only">Open sidebar</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#7f7f7f" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z"></path></svg>
            </button>
            <a href="{{ url('/') }}" class="flex flex-row justify-start items-center gap-3 lg:w-44 px-2 py-3">
                <img src="{{ asset('logo-polinema.png') }}" alt="logo-polinema" class="w-10 h-10">
                <span class="font-semibold text-sm text-[#1B1B1B] sm:text-base">Warga Peduli</span>
            </a>
        </div>
        <div class="flex flex-row justify-end sm:justify-between items-center px-2 py-3 w-full sm:px-4">
            <div id="text-date-title" class="flex flex-col justify-center items-stretch gap-0 sm:gap-3">
                <span class="font-medium text-xs text-[#6C6C6C] md:text-sm">{{ $date }}</span>
                <span class="font-semibold text-[#1B1B1B] md:text-[28px] text-xl">{{ $page }}</span>
            </div>
            <div class="flex flex-row justify-between items-center gap-2 sm:gap-[14px] border-2 rounded-lg border-[#EEEEEE] px-3 py-[14px]">
                <a href="{{ url("/akun") }}" class="flex flex-col justify-center items-start w-full text-left">
                    <span class="font-semibold text-xs sm:text-base text-black">Sutresno</span>
                    <span class="font-medium text-xs text-[#121212]/[40%]">Ketua Rukun Warga</span>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#292d32" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
            </div>
        </div>
    </div>
</nav>
