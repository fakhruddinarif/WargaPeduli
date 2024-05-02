<nav class="fixed z-20 w-full bg-white mt-[60px] border-b-2">
    <div class="flex flex-row justify-between items-center border-2 border-[#F6F6F6]">
        <a href="{{ url('/') }}" class="flex flex-row justify-center items-center gap-3 w-64 p-6">
            <img src="{{ asset('logo-polinema.png') }}" alt="logo-polinema" class="w-10 h-10">
            <span class="font-semibold text-base text-[#1B1B1B]">Peduli Warga</span>
        </a>
        <div class="flex flex-row justify-between items-center px-12 py-6 w-full">
            <div class="flex flex-col justify-center items-center gap-3">
                <span class="font-medium text-sm text-[#6C6C6C]">22 April 2024</span>
                <span class="font-semibold text-[28px] text-[#1B1B1B]">Bansos</span>
            </div>
            <div class="flex flex-row justify-between items-center gap-[14px] border-2 rounded-lg border-[#EEEEEE] px-3 py-[14px]">
                <a href="{{ url("/akun") }}" class="flex flex-col justify-center items-start w-full text-left">
                    <span class="font-semibold text-base text-black">Sutresno</span>
                    <span class="font-medium text-xs text-[#121212]/[40%]">Admin</span>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#292d32" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
            </div>
        </div>
    </div>
</nav>
