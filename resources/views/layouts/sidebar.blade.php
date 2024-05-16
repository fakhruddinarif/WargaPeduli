<aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-full mt-[172px] bg-white border-r border-neutral-200 transition-transform -translate-x-full lg:translate-x-0" aria-label="Sidebar">
    <div class="flex flex-col justify-between items-center px-3 py-4 bg-white w-full">
        <ul class="font-medium w-full">
            <li class="flex flex-col justify-start p-3 gap-3 w-full rounded-lg {{ ($activeMenu == 'dashboard') ? 'bg-indigo-600/10 border-b-indigo-600' : 'bg-white' }}">
                <a href="{{ url('/admin/dashboard')  }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="{{ ($activeMenu == 'dashboard') ? '#4f46e5' : '#737373' }}" viewBox="0 0 256 256" aria-hidden="true"><path d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z"></path></svg>
                    <span class="font-semibold text-base {{ ($activeMenu == 'dashboard') ? 'text-indigo-600' : 'text-neutral-500' }}">Dashboard</span>
                </a>
            </li>
            <li class="flex flex-col justify-start p-3 gap-3 w-full rounded-lg {{ ($activeMenu == 'penduduk') ? 'bg-indigo-600/10 border-b-indigo-600' : 'bg-white' }}">
                <a href="{{ url('/admin/penduduk')  }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="{{ ($activeMenu == 'penduduk') ? '#4f46e5' : '#737373' }}" viewBox="0 0 256 256" aria-hidden="true"><path d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92ZM40,108a44,44,0,1,1,44,44A44.05,44.05,0,0,1,40,108Zm210.14,98.7a8,8,0,0,1-11.07-2.33A79.83,79.83,0,0,0,172,168a8,8,0,0,1,0-16,44,44,0,1,0-16.34-84.87,8,8,0,1,1-5.94-14.85,60,60,0,0,1,55.53,105.64,95.83,95.83,0,0,1,47.22,37.71A8,8,0,0,1,250.14,206.7Z"></path></svg>
                    <span class="font-medium text-base {{ ($activeMenu == 'penduduk') ? 'text-indigo-600' : 'text-neutral-500' }}">Penduduk</span>
                </a>
            </li>
            <li class="flex flex-col justify-start p-3 gap-3 w-full rounded-lg {{ ($activeMenu == 'bansos') ? 'bg-indigo-600/10 border-b-indigo-600' : 'bg-white' }}">
                <a href="{{ url('/admin/bansos')  }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="{{ ($activeMenu == 'bansos') ? '#4f46e5' : '#737373' }}" viewBox="0 0 256 256" aria-hidden="true"><path d="M223.68,66.15,135.68,18a15.88,15.88,0,0,0-15.36,0l-88,48.17a16,16,0,0,0-8.32,14v95.64a16,16,0,0,0,8.32,14l88,48.17a15.88,15.88,0,0,0,15.36,0l88-48.17a16,16,0,0,0,8.32-14V80.18A16,16,0,0,0,223.68,66.15ZM128,32l80.34,44-29.77,16.3-80.35-44ZM128,120,47.66,76l33.9-18.56,80.34,44ZM40,90l80,43.78v85.79L40,175.82Zm176,85.78h0l-80,43.79V133.82l32-17.51V152a8,8,0,0,0,16,0V107.55L216,90v85.77Z"></path></svg>
                    <span class="font-semibold text-base {{ ($activeMenu == 'bansos') ? 'text-indigo-600' : 'text-neutral-500' }}">Bantuan Sosial</span>
                </a>
            </li>
            <li class="flex flex-col justify-start p-3 gap-3 w-full rounded-lg {{ ($activeMenu == 'laporan') ? 'bg-indigo-600/10 border-b-indigo-600' : 'bg-white' }}">
                <a href="{{ url('/admin/laporan')  }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="{{ ($activeMenu == 'laporan') ? '#4f46e5' : '#737373' }}" viewBox="0 0 256 256" aria-hidden="true"><path d="M208,24H72A32,32,0,0,0,40,56V224a8,8,0,0,0,8,8H192a8,8,0,0,0,0-16H56a16,16,0,0,1,16-16H208a8,8,0,0,0,8-8V32A8,8,0,0,0,208,24Zm-8,160H72a31.82,31.82,0,0,0-16,4.29V56A16,16,0,0,1,72,40H200Z"></path></svg>
                    <span class="font-medium text-base {{ ($activeMenu == 'laporan') ? 'text-indigo-600' : 'text-neutral-500' }}">Laporan</span>
                </a>
            </li>
            <li class="flex flex-col justify-start p-3 gap-3 w-full rounded-lg {{ ($activeMenu == 'informasi') ? 'bg-indigo-600/10 border-b-indigo-600' : 'bg-white' }}">
                <a href="{{ url('/admin/informasi')  }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="{{ ($activeMenu == 'informasi') ? '#4746e5' : '#737373' }}" viewBox="0 0 256 256" aria-hidden="true"><path d="M184,72H40A16,16,0,0,0,24,88V200a16,16,0,0,0,16,16H184a16,16,0,0,0,16-16V88A16,16,0,0,0,184,72Zm0,128H40V88H184V200ZM232,56V176a8,8,0,0,1-16,0V56H64a8,8,0,0,1,0-16H216A16,16,0,0,1,232,56Z"></path></svg>
                    <span class="font-medium text-base {{ ($activeMenu == 'informasi') ? 'text-indigo-600' : 'text-neutral-500' }}">Informasi</span>
                </a>
            </li>
        </ul>
        <a href="" class="flex flex-row p-3 gap-2 w-full h-fit justify-start items-center cursor-pointer group rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#737373" viewBox="0 0 256 256"><path d="M124,216a12,12,0,0,1-12,12H48a12,12,0,0,1-12-12V40A12,12,0,0,1,48,28h64a12,12,0,0,1,0,24H60V204h52A12,12,0,0,1,124,216Zm108.49-96.49-40-40a12,12,0,0,0-17,17L195,116H112a12,12,0,0,0,0,24h83l-19.52,19.51a12,12,0,0,0,17,17l40-40A12,12,0,0,0,232.49,119.51Z"></path></svg>
            <span class="font-semibold text-base text-neutral-500">Keluar</span>
        </a>
    </div>
</aside>
