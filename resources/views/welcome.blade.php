@extends('layouts.app')
@section('template')
    @include('detailberita')
    @include('layouts.navigation')
    <nav class="fixed z-20 w-full bg-white mt-[60px] border-b-2">
        <div
            class="flex flex-row justify-between items-center w-full border-2 border-b-neutral-50 gap-8 md:gap-12 lg:gap-10 px-2 sm:px-4">
            <div class="flex justify-start items-center rtl:justify-end w-fit">
                 <a href="{{ url('/') }}" class="flex ms-2 md:me-24">
                    <img src="{{ asset('logo.png') }}" class="h-20 me-3 w-20" alt="Logo Polinema" />
                    <span class="ml-[-23px] mt-[-2px] self-center text-base font-semibold sm:text-xl whitespace-nowrap">WargaPeduli</span>
                </a>
            </div>
            <div class="flex flex-row justify-end items-center px-2 py-3 w-full sm:px-4 gap-2">
                <button type="button" id="pengajuan"
                        class="px-3 sm:px-5 py-2 w-fit bg-white border-blue-500 border-2 rounded-md">
                    <span class="font-medium text-base text-blue-500">Pengajuan</span>
                </button>
                <a href="{{ url('/login') }}" class="px-3 sm:px-5 py-2 w-fit bg-blue-500 border-2 rounded-md">
                    <span class="font-medium text-base text-white">Login</span>
                </a>
            </div>
        </div>
    </nav>
    @include('components.modals.modal_pengajuan')
    @include('components.modals.modal_pengajuan_penduduk')
    @include('components.modals.modal_pengajuan_alert')
    @include('components.modals.modal_detail_pengajuan_penduduk')
    <div class="w-full h-screen overflow-y-scroll">
      <div class="font-sans text-[#fff] mt-36 px-4 mx-4 ">
      @if(Session::has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    <span class="font-medium">{{ Session::get('success')}}</span>
                </div>
            @elseif(Session::has('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <span class="font-medium">{{ Session::get('error')}}</span>
                </div>
            @endif
        <div class="grid lg:grid-cols-2 items-center gap-y-6 bg-blue-500 rounded-md">
          <div class="max-lg:order-1 max-lg:text-center sm:p-12 p-4">
            <h2 id="animatedText" class="lg:text-5xl text-3xl font-bold mb-4 lg:!leading-[56px]"></h2>
            <p class="mt-4 text-xl leading-relaxed">WargaPeduli adalah sebuah sistem `e-gevorment` yang berfokus pada tingkat rukun warga dan dibawahnya.Pada sistem ini nantinya meliputi manajemen pendataan penduduk,manajemen bantuan sosial, manajemen pengaduan atau saran, dan informasi tentang kegiatan pada tingkat rukun warga dan dibawahnya.Sistem ini telah melalui wawancara dari bapak ketua warga dengan nama `Bapak Sukron` yang tinggal di `Jalan Kalpataru RT.04 RW.03 Kec.Jatimulyo Kec.Lowokwaru Kota Malang`.</p>
          </div>
        @php
          $images = ['2.jpg', '1.jpg', '3.jpg']; 
        @endphp
        <div class="lg:h-[440px] flex items-center">
          <img id="dynamicImage" src="{{ asset($images[0]) }}" class="w-full h-full object-cover" alt="Dining Experience" />
        </div>
        </div>
        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8 px-4 mb-12 mt-10 mx-auto">
          <div class="bg-gray-100 p-6 rounded-md shadow-[0_0px_8px_0px_rgba(34,46,165,0.2)] border-t-4 border-cyan-500 transition-all hover:-translate-y-4 relative">
            <svg class="w-12 mb-4 inline-block bg-white p-3 rounded-md" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#06b6d4"  strokeWidth={1.5} stroke="#06b6d4" viewBox="0 0 24 24">
                  <path stroke-linecap="round" strokeLinejoin="round" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            </svg>
            <h3 class="text-xl font-bold mb-2 text-[#06b6d4]">Jumlah Warga</h3>
            <p class="text-sm text-[#333]">700</p>
          </div>
          <div class="bg-gray-100 p-6 rounded-md shadow-[0_0px_8px_0px_rgba(34,46,165,0.2)] border-t-4 border-sky-500 transition-all hover:-translate-y-4 relative">
             <svg xmlns="http://www.w3.org/2000/svg" fill="#0ea5e9" viewBox="0 0 24 24" strokeWidth={1.5} stroke="#0ea5e9" class="w-12 mb-4 inline-block bg-white p-3 rounded-md" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
              </svg>
            <h3 class="text-xl font-bold mb-2 text-[#0ea5e9]">Jumlah Keluarga</h3>
            <p class="text-sm text-[#333]">900</p>
          </div>
          <div class="bg-gray-100 p-6 rounded-md shadow-[0_0px_8px_0px_rgba(34,46,165,0.2)] border-t-4 border-indigo-500 transition-all hover:-translate-y-4 relative">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-12 mb-4 inline-block bg-white p-3 rounded-md" strokeWidth={1.5} stroke="#6366f1" fill="#6366f1" aria-hidden="true">
              <path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
            </svg>
            <h3 class="text-xl font-bold mb-2 text-[#6366f1]">Jumlah Rukun Tertangga</h3>
            <p class="text-sm text-[#333]">900</p>
          </div>
          <div class="bg-gray-100 p-6 rounded-md shadow-[0_0px_8px_0px_rgba(34,46,165,0.2)] border-t-4 border-violet-500 transition-all hover:-translate-y-4 relative">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-12 mb-4 inline-block bg-white p-3 rounded-md" strokeWidth={1.5} stroke="#8b5cf6" fill="#8b5cf6" aria-hidden="true">
              <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/>
            </svg>
            <h3 class="text-xl font-bold mb-2 text-[#8b5cf6]">Jumlah Informasi</h3>
            <p class="text-sm text-[#333]">900</p>
          </div>
        </div>
      </div>   
      <div class="bg-white font-[sans-serif] mt-40">
        <div class="max-w-8xl mx-9">
          <div class="text-center">
            <h2 class="text-3xl font-extrabold text-[#333] inline-block relative after:absolute after:w-4/6 after:h-1 after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-blue-500 after:rounded-full">BERITA TERKINI</h2>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-10 mt-16 max-md:max-w-lg mx-auto lg:w-full">
            <div class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-4 transition-all duration-300">
              <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1" class="w-full h-60 object-cover" />
              <div class="p-6">
                <span class="text-sm block text-gray-400 mb-2">10 FEB 2023 | BY JOHN DOE</span>
                <h3 class="text-xl font-bold text-[#333]">A Guide to Igniting Your Imagination</h3>
                <hr class="my-6" />
                <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
                <a href="#" id="readMore" class="mt-4 inline-block text-blue-600 text-sm hover:underline read-more">Selengkapnya</a>
              </div>
            </div>
            <div class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-4 transition-all duration-300">
              <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1" class="w-full h-60 object-cover" />
              <div class="p-6">
                <span class="text-sm block text-gray-400 mb-2">10 FEB 2023 | BY JOHN DOE</span>
                <h3 class="text-xl font-bold text-[#333]">A Guide to Igniting Your Imagination</h3>
                <hr class="my-6" />
                <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
                <a href="#" class="mt-4 inline-block text-blue-600 text-sm hover:underline">Read More</a>
              </div>
            </div>
            <div class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-4 transition-all duration-300">
              <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1" class="w-full h-60 object-cover" />
              <div class="p-6">
                <span class="text-sm block text-gray-400 mb-2">10 FEB 2023 | BY JOHN DOE</span>
                <h3 class="text-xl font-bold text-[#333]">A Guide to Igniting Your Imagination</h3>
                <hr class="my-6" />
                <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
                <a href="#" class="mt-4 inline-block text-blue-600 text-sm hover:underline">Read More</a>
              </div>
            </div>
            <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8 px-4 mb-12 mt-10 mx-auto">
                <div
                    class="bg-gray-100 p-6 rounded-md shadow-[0_0px_8px_0px_rgba(34,46,165,0.2)] border-t-4 border-cyan-500 transition-all hover:-translate-y-4 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#06b6d4"
                         class="w-12 mb-4 inline-block bg-white p-3 rounded-md" viewBox="0 0 32 32">
                        <path
                            d="M28.068 12h-.128a.934.934 0 0 1-.864-.6.924.924 0 0 1 .2-1.01l.091-.091a2.938 2.938 0 0 0 0-4.147l-1.511-1.51a2.935 2.935 0 0 0-4.146 0l-.091.091A.956.956 0 0 1 20 4.061v-.129A2.935 2.935 0 0 0 17.068 1h-2.136A2.935 2.935 0 0 0 12 3.932v.129a.956.956 0 0 1-1.614.668l-.086-.091a2.935 2.935 0 0 0-4.146 0l-1.516 1.51a2.938 2.938 0 0 0 0 4.147l.091.091a.935.935 0 0 1 .185 1.035.924.924 0 0 1-.854.579h-.128A2.935 2.935 0 0 0 1 14.932v2.136A2.935 2.935 0 0 0 3.932 20h.128a.934.934 0 0 1 .864.6.924.924 0 0 1-.2 1.01l-.091.091a2.938 2.938 0 0 0 0 4.147l1.51 1.509a2.934 2.934 0 0 0 4.147 0l.091-.091a.936.936 0 0 1 1.035-.185.922.922 0 0 1 .579.853v.129A2.935 2.935 0 0 0 14.932 31h2.136A2.935 2.935 0 0 0 20 28.068v-.129a.956.956 0 0 1 1.614-.668l.091.091a2.935 2.935 0 0 0 4.146 0l1.511-1.509a2.938 2.938 0 0 0 0-4.147l-.091-.091a.935.935 0 0 1-.185-1.035.924.924 0 0 1 .854-.58h.128A2.935 2.935 0 0 0 31 17.068v-2.136A2.935 2.935 0 0 0 28.068 12ZM29 17.068a.933.933 0 0 1-.932.932h-.128a2.956 2.956 0 0 0-2.083 5.028l.09.091a.934.934 0 0 1 0 1.319l-1.511 1.509a.932.932 0 0 1-1.318 0l-.09-.091A2.957 2.957 0 0 0 18 27.939v.129a.933.933 0 0 1-.932.932h-2.136a.933.933 0 0 1-.932-.932v-.129a2.951 2.951 0 0 0-5.028-2.082l-.091.091a.934.934 0 0 1-1.318 0l-1.51-1.509a.934.934 0 0 1 0-1.319l.091-.091A2.956 2.956 0 0 0 4.06 18h-.128A.933.933 0 0 1 3 17.068v-2.136A.933.933 0 0 1 3.932 14h.128a2.956 2.956 0 0 0 2.083-5.028l-.09-.091a.933.933 0 0 1 0-1.318l1.51-1.511a.932.932 0 0 1 1.318 0l.09.091A2.957 2.957 0 0 0 14 4.061v-.129A.933.933 0 0 1 14.932 3h2.136a.933.933 0 0 1 .932.932v.129a2.956 2.956 0 0 0 5.028 2.082l.091-.091a.932.932 0 0 1 1.318 0l1.51 1.511a.933.933 0 0 1 0 1.318l-.091.091A2.956 2.956 0 0 0 27.94 14h.128a.933.933 0 0 1 .932.932Z"
                            data-original="#000000"/>
                        <path d="M16 9a7 7 0 1 0 7 7 7.008 7.008 0 0 0-7-7Zm0 12a5 5 0 1 1 5-5 5.006 5.006 0 0 1-5 5Z"
                              data-original="#000000"/>
                    </svg>
                    <h3 class="text-xl font-bold mb-2 text-[#06b6d4]">Jumlah Warga</h3>
                    <p class="text-sm text-[#333]">Tailor our product to suit your needs.</p>
                    <a href="javascript:void(0);"
                       class="text-blue-600 font-bold inline-block text-sm mt-2 hover:underline">Learn more</a>
                </div>
                <div
                    class="bg-gray-100 p-6 rounded-md shadow-[0_0px_8px_0px_rgba(34,46,165,0.2)] border-t-4 border-sky-500 transition-all hover:-translate-y-4 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#0ea5e9"
                         class="w-12 mb-4 inline-block bg-white p-3 rounded-md" viewBox="0 0 512.001 512.001">
                        <path
                            d="M271.029 0c-33.091 0-61 27.909-61 61s27.909 61 61 61 60-27.909 60-61-26.909-61-60-61zm66.592 122c-16.485 18.279-40.096 30-66.592 30-26.496 0-51.107-11.721-67.592-30-14.392 15.959-23.408 36.866-23.408 60v15c0 8.291 6.709 15 15 15h151c8.291 0 15-6.709 15-15v-15c0-23.134-9.016-44.041-23.408-60zM144.946 460.404 68.505 307.149c-7.381-14.799-25.345-20.834-40.162-13.493l-19.979 9.897c-7.439 3.689-10.466 12.73-6.753 20.156l90 180c3.701 7.423 12.704 10.377 20.083 6.738l19.722-9.771c14.875-7.368 20.938-25.417 13.53-40.272zM499.73 247.7c-12.301-9-29.401-7.2-39.6 3.9l-82 100.8c-5.7 6-16.5 9.6-22.2 9.6h-69.901c-8.401 0-15-6.599-15-15s6.599-15 15-15h60c16.5 0 30-13.5 30-30s-13.5-30-30-30h-78.6c-7.476 0-11.204-4.741-17.1-9.901-23.209-20.885-57.949-30.947-93.119-22.795-19.528 4.526-32.697 12.415-46.053 22.993l-.445-.361-21.696 19.094L174.28 452h171.749c28.2 0 55.201-13.5 72.001-36l87.999-126c9.9-13.201 7.2-32.399-6.299-42.3z"
                            data-original="#000000"/>
                    </svg>
                    <h3 class="text-xl font-bold mb-2 text-[#0ea5e9]">Jumlah Keluarga</h3>
                    <p class="text-sm text-[#333]">24/7 customer support for all your inquiries.</p>
                    <a href="javascript:void(0);"
                       class="text-blue-600 font-bold inline-block text-sm mt-2 hover:underline">Learn more</a>
                </div>
                <div
                    class="bg-gray-100 p-6 rounded-md shadow-[0_0px_8px_0px_rgba(34,46,165,0.2)] border-t-4 border-indigo-500 transition-all hover:-translate-y-4 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#6366f1"
                         class="w-12 mb-4 inline-block bg-white p-3 rounded-md" viewBox="0 0 24 24">
                        <g fill-rule="evenodd" clip-rule="evenodd">
                            <path
                                d="M17.03 8.97a.75.75 0 0 1 0 1.06l-4.2 4.2a.75.75 0 0 1-1.154-.114l-1.093-1.639L8.03 15.03a.75.75 0 0 1-1.06-1.06l3.2-3.2a.75.75 0 0 1 1.154.114l1.093 1.639L15.97 8.97a.75.75 0 0 1 1.06 0z"
                                data-original="#000000"/>
                            <path
                                d="M13.75 9.5a.75.75 0 0 1 .75-.75h2a.75.75 0 0 1 .75.75v2a.75.75 0 0 1-1.5 0v-1.25H14.5a.75.75 0 0 1-.75-.75z"
                                data-original="#000000"/>
                            <path
                                d="M3.095 3.095C4.429 1.76 6.426 1.25 9 1.25h6c2.574 0 4.57.51 5.905 1.845C22.24 4.429 22.75 6.426 22.75 9v6c0 2.574-.51 4.57-1.845 5.905C19.571 22.24 17.574 22.75 15 22.75H9c-2.574 0-4.57-.51-5.905-1.845C1.76 19.571 1.25 17.574 1.25 15V9c0-2.574.51-4.57 1.845-5.905zm1.06 1.06C3.24 5.071 2.75 6.574 2.75 9v6c0 2.426.49 3.93 1.405 4.845.916.915 2.419 1.405 4.845 1.405h6c2.426 0 3.93-.49 4.845-1.405.915-.916 1.405-2.419 1.405-4.845V9c0-2.426-.49-3.93-1.405-4.845C18.929 3.24 17.426 2.75 15 2.75H9c-2.426 0-3.93.49-4.845 1.405z"
                                data-original="#000000"/>
                        </g>
                    </svg>
                    <h3 class="text-xl font-bold mb-2 text-[#6366f1]">Performance</h3>
                    <p class="text-sm text-[#333]">Experience blazing-fast performance with our product.</p>
                    <a href="javascript:void(0);"
                       class="text-blue-600 font-bold inline-block text-sm mt-2 hover:underline">Learn more</a>
                </div>
                <div
                    class="bg-gray-100 p-6 rounded-md shadow-[0_0px_8px_0px_rgba(34,46,165,0.2)] border-t-4 border-violet-500 transition-all hover:-translate-y-4 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#8b5cf6"
                         class="w-12 mb-4 inline-block bg-white p-3 rounded-md" viewBox="0 0 682.667 682.667">
                        <defs>
                            <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                <path d="M0 512h512V0H0Z" data-original="#000000"/>
                            </clipPath>
                        </defs>
                        <g fill="none" stroke="#8b5cf6" stroke-linecap="round" stroke-linejoin="round"
                           stroke-miterlimit="10" stroke-width="40" clip-path="url(#a)"
                           transform="matrix(1.33 0 0 -1.33 0 682.667)">
                            <path
                                d="M256 492 60 410.623v-98.925C60 183.674 137.469 68.38 256 20c118.53 48.38 196 163.674 196 291.698v98.925z"
                                data-original="#000000"/>
                            <path d="M178 271.894 233.894 216 334 316.105" data-original="#000000"/>
                        </g>
                    </svg>
                    <h3 class="text-xl font-bold mb-2 text-[#8b5cf6]">Security</h3>
                    <p class="text-sm text-[#333]">Your data is protected by the latest security measures.</p>
                    <a href="javascript:void(0);"
                       class="text-blue-600 font-bold inline-block text-sm mt-2 hover:underline">Learn more</a>
                </div>
            </div>
        </div>
        <div class="bg-white font-[sans-serif] mt-40">
            <div class="max-w-8xl mx-9">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-[#333] inline-block relative after:absolute after:w-4/6 after:h-1 after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-blue-500 after:rounded-full">
                        BERITA TERKINI</h2>
                </div>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-10 mt-16 max-md:max-w-lg mx-auto lg:w-full">
                    <div
                        class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-4 transition-all duration-300">
                        <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1"
                             class="w-full h-60 object-cover"/>
                        <div class="p-6">
                            <span class="text-sm block text-gray-400 mb-2">10 FEB 2023 | BY JOHN DOE</span>
                            <h3 class="text-xl font-bold text-[#333]">A Guide to Igniting Your Imagination</h3>
                            <hr class="my-6"/>
                            <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae
                                ligula.</p>
                            <a href="#" id="readMore"
                               class="mt-4 inline-block text-blue-600 text-sm hover:underline read-more">Selengkapnya</a>
                        </div>
                    </div>
                    <div
                        class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-4 transition-all duration-300">
                        <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1"
                             class="w-full h-60 object-cover"/>
                        <div class="p-6">
                            <span class="text-sm block text-gray-400 mb-2">10 FEB 2023 | BY JOHN DOE</span>
                            <h3 class="text-xl font-bold text-[#333]">A Guide to Igniting Your Imagination</h3>
                            <hr class="my-6"/>
                            <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae
                                ligula.</p>
                            <a href="#" class="mt-4 inline-block text-blue-600 text-sm hover:underline">Read More</a>
                        </div>
                    </div>
                    <div
                        class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-4 transition-all duration-300">
                        <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1"
                             class="w-full h-60 object-cover"/>
                        <div class="p-6">
                            <span class="text-sm block text-gray-400 mb-2">10 FEB 2023 | BY JOHN DOE</span>
                            <h3 class="text-xl font-bold text-[#333]">A Guide to Igniting Your Imagination</h3>
                            <hr class="my-6"/>
                            <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae
                                ligula.</p>
                            <a href="#" class="mt-4 inline-block text-blue-600 text-sm hover:underline">Read More</a>
                        </div>
                    </div>
                    <div
                        class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-4 transition-all duration-300">
                        <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1"
                             class="w-full h-60 object-cover"/>
                        <div class="p-6">
                            <span class="text-sm block text-gray-400 mb-2">10 FEB 2023 | BY JOHN DOE</span>
                            <h3 class="text-xl font-bold text-[#333]">A Guide to Igniting Your Imagination</h3>
                            <hr class="my-6"/>
                            <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae
                                ligula.</p>
                            <a href="#" class="mt-4 inline-block text-blue-600 text-sm hover:underline">Read More</a>
                        </div>
                    </div>
                    <div
                        class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-2 transition-all duration-300">
                        <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1"
                             class="w-full h-60 object-cover"/>
                        <div class="p-6">
                            <span class="text-sm block text-gray-400 mb-2">10 FEB 2023 | BY JOHN DOE</span>
                            <h3 class="text-xl font-bold text-[#333]">A Guide to Igniting Your Imagination</h3>
                            <hr class="my-6"/>
                            <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae
                                ligula.</p>
                            <a href="#" class="mt-4 inline-block text-blue-600 text-sm hover:underline">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="bg-gray-50 sm:px-2 px-4 lg:gap-60 sm:gap-12 py-10 font-[sans-serif] flex flex-col sm:flex-row justify-start mt-40 ">
            <div class="max-w-3xl mx-9">
                <div class="text-center sm:w-1/2 md:ml-12 lg:ml-40 sm:ml-3">
                    <h2 class="text-3xl font-extrabold text-[#333] inline-block relative after:absolute after:w-4/6 after:h-1 after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-blue-500 after:rounded-full">
                        PENGUMUMAN</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-12 mt-16 max-md:max-w-lg mx-auto ">
                    <div
                        class="cursor-pointer rounded overflow-hidden group  bg-white outline-blue-500 hover:outline relative transition-all px-2 py-3">
                        <span class="text-sm block text-gray-400 mb-2">10 FEB 2023</span>
                        <h3 class="text-xl font-bold text-[#333] group-hover:text-blue-500 transition-all">A Guide to
                            Igniting Your Imagination</h3>
                        <div class="mt-4">
                            <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae
                                ligula.</p>
                        </div>
                    </div>
                    <div
                        class="cursor-pointer rounded overflow-hidden group bg-white outline-blue-500 hover:outline  relative transition-all px-2 py-3">
                        <span class="text-sm block text-gray-400 mb-2">10 FEB 2023</span>
                        <h3 class="text-xl font-bold text-[#333] group-hover:text-blue-500 transition-all">A Guide to
                            Igniting Your Imagination</h3>
                        <div class="mt-4">
                            <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae
                                ligula.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-3xl mx-9">
                <div class="text-center sm:w-1/2 sm:ml-40 md:ml-24 lg:ml-44  mt-8 sm:mt-0">
                    <h2 class="text-3xl font-extrabold text-[#333] inline-block relative after:absolute after:w-4/6 after:h-1 after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-blue-500 after:rounded-full">
                        KEGIATAN</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-12 mt-16 max-md:max-w-lg mx-auto  ">
                    <div
                        class="cursor-pointer rounded overflow-hidden group  bg-white outline-blue-500 hover:outline  relative transition-all px-2 py-3">
                        <span class="text-sm block text-gray-400 mb-2">10 FEB 2023</span>
                        <h3 class="text-xl font-bold text-[#333] group-hover:text-blue-500 transition-all">A Guide to
                            Igniting Your Imagination</h3>
                        <div class="mt-4">
                            <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae
                                ligula.</p>
                        </div>
                    </div>
                    <div
                        class="cursor-pointer rounded overflow-hidden group  bg-white outline-blue-500 hover:outline  relative transition-all px-2 py-3">
                        <span class="text-sm block text-gray-400 mb-2">10 FEB 2023</span>
                        <h3 class="text-xl font-bold text-[#333] group-hover:text-blue-500 transition-all">A Guide to
                            Igniting Your Imagination</h3>
                        <div class="mt-4">
                            <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Duis accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae
                                ligula.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="font-[sans-serif] text-[#333] mt-40">
          <div class="max-w-8xl mx-9">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-[#333] inline-block relative after:absolute after:w-4/6 after:h-1 after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-blue-500 after:rounded-full">OUR TEAM</h2>
            </div>
            <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-2 gap-x-8 gap-y-10 gap-96 max-md:justify-center mt-16">
              <div class="border rounded-md overflow-hidden max-md:max-w-[300px]">
                <img src="{{ asset('ilul.jpg') }}" class="w-full h-60 object-contain object-top bg-gray-300" />
                <div class="p-4">
                  <h4 class="text-2xl font-extrabold">Mochammad Cholilur Rokhman</h4>
                  <p class="text-xl mt-1 font-semibold">No. 18</p>
                  <p class="text-xl mt-1 font-semibold">2241720033</p>
                  <div class="space-x-4 mt-4">
                    <button type="button"
                      class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14px" fill="#fff" viewBox="0 0 155.139 155.139">
                        <path
                          d="M89.584 155.139V84.378h23.742l3.562-27.585H89.584V39.184c0-7.984 2.208-13.425 13.67-13.425l14.595-.006V1.08C115.325.752 106.661 0 96.577 0 75.52 0 61.104 12.853 61.104 36.452v20.341H37.29v27.585h23.814v70.761h28.48z"
                          data-original="#010002" />
                      </svg>
                    </button>
                    <button type="button"
                      class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-[#03a9f4] hover:bg-[#03a1f4] active:bg-[#03a9f4]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14px" fill="#fff" viewBox="0 0 512 512">
                        <path
                          d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z"
                          data-original="#03a9f4" />
                      </svg>
                    </button>
                  <button type="button" class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-pink-400 hover:bg-pink-500 active:bg-pink-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="14px" fill="#fff">
                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                    </svg>
                  </button>
                  </div>
                </div>
              </div>
              <div class="border rounded-md overflow-hidden max-md:max-w-[300px]">
                <img src="{{ asset('arip.jpg') }}" class="w-full h-60 object-contain object-top bg-gray-300" />
                <div class="p-4">
                  <h4 class="text-2xl font-extrabold">Muhammad Fakhruddin Arif</h4>
                  <p class="text-xl mt-1 font-semibold">No. 21</p>
                  <p class="text-xl mt-1 font-semibold">2241720033</p>
                  <div class="space-x-4 mt-4">
                    <button type="button"
                      class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14px" fill="#fff" viewBox="0 0 155.139 155.139">
                        <path
                          d="M89.584 155.139V84.378h23.742l3.562-27.585H89.584V39.184c0-7.984 2.208-13.425 13.67-13.425l14.595-.006V1.08C115.325.752 106.661 0 96.577 0 75.52 0 61.104 12.853 61.104 36.452v20.341H37.29v27.585h23.814v70.761h28.48z"
                          data-original="#010002" />
                      </svg>
                    </button>
                    <button type="button"
                      class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-[#03a9f4] hover:bg-[#03a1f4] active:bg-[#03a9f4]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14px" fill="#fff" viewBox="0 0 512 512">
                        <path
                          d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z"
                          data-original="#03a9f4" />
                      </svg>
                    </button>
                  <button type="button" class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-pink-400 hover:bg-pink-500 active:bg-pink-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="14px" fill="#fff">
                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                    </svg>
                  </button>
                  </div>
                </div>
              </div>
              <div class="border rounded-md overflow-hidden max-md:max-w-[300px]">
                <img src="{{ asset('ilul.jpg') }}" class="w-full h-60 object-contain object-top bg-gray-300" />
                <div class="p-4">
                  <h4 class="text-2xl font-extrabold">Mochammad Cholilur Rokhman</h4>
                  <p class="text-xl mt-1 font-semibold">No. 18</p>
                  <p class="text-xl mt-1 font-semibold">2241720033</p>
                  <div class="space-x-4 mt-4">
                    <button type="button"
                      class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14px" fill="#fff" viewBox="0 0 155.139 155.139">
                        <path
                          d="M89.584 155.139V84.378h23.742l3.562-27.585H89.584V39.184c0-7.984 2.208-13.425 13.67-13.425l14.595-.006V1.08C115.325.752 106.661 0 96.577 0 75.52 0 61.104 12.853 61.104 36.452v20.341H37.29v27.585h23.814v70.761h28.48z"
                          data-original="#010002" />
                      </svg>
                    </button>
                    <button type="button"
                      class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-[#03a9f4] hover:bg-[#03a1f4] active:bg-[#03a9f4]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14px" fill="#fff" viewBox="0 0 512 512">
                        <path
                          d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z"
                          data-original="#03a9f4" />
                      </svg>
                    </button>
                  <button type="button" class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-pink-400 hover:bg-pink-500 active:bg-pink-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="14px" fill="#fff">
                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                    </svg>
                  </button>
                  </div>
                </div>
              </div>
              <div class="border rounded-md overflow-hidden max-md:max-w-[300px]">
                <img src="{{ asset('hilya.jpg') }}" class="w-full h-60 object-contain object-top bg-gray-300" />
                <div class="p-4">
                  <h4 class="text-2xl font-extrabold">Hilyatul Jannah</h4>
                  <p class="text-xl mt-1 font-semibold">No. 28</p>
                  <p class="text-xl mt-1 font-semibold">2341728018</p>
                  <div class="space-x-4 mt-4">
                    <button type="button"
                      class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14px" fill="#fff" viewBox="0 0 155.139 155.139">
                        <path
                          d="M89.584 155.139V84.378h23.742l3.562-27.585H89.584V39.184c0-7.984 2.208-13.425 13.67-13.425l14.595-.006V1.08C115.325.752 106.661 0 96.577 0 75.52 0 61.104 12.853 61.104 36.452v20.341H37.29v27.585h23.814v70.761h28.48z"
                          data-original="#010002" />
                      </svg>
                    </button>
                    <button type="button"
                      class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-[#03a9f4] hover:bg-[#03a1f4] active:bg-[#03a9f4]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14px" fill="#fff" viewBox="0 0 512 512">
                        <path
                          d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z"
                          data-original="#03a9f4" />
                      </svg>
                    </button>
                  <button type="button" class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-pink-400 hover:bg-pink-500 active:bg-pink-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="14px" fill="#fff">
                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                    </svg>
                  </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <footer class="bg-white mt-28  dark:bg-blue-600">
        <div class="bg-blue-500 py-4">
          <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="flex flex-col items-center justify-between gap-2 md:flex-row">
              <div class="mb-3 text-center  md:mb-0 md:text-left mx-auto">
                <span class="font-bold uppercase tracking-widest text-gray-100">WargaPeduli</span>
                <p class="text-indigo-200">Subscribe to youtube kelompok 5</p>
              </div>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1760.181186461192!2d112.6278674897429!3d-7.9499599971348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629da4fc0dee3%3A0xa6cdb5f259d93312!2sJl.%20Kalpataru%20No.83A%2C%20RW.02%2C%20Jatimulyo%2C%20Kec.%20Lowokwaru%2C%20Kota%20Malang%2C%20Jawa%20Timur%2065141!5e0!3m2!1sid!2sid!4v1717936363149!5m2!1sid!2sid"
                class="h-[400px]  w-[100%] " style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8 bg-white dark:bg-blue-600">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
              <a href="" class="flex items-center">
                  <img src="{{ asset('logo.png') }}" class="h-20 me-3" alt="FlowBite Logo" />
                  <span class="ml-[-25px] self-center text-2xl font-semibold whitespace-nowrap dark:text-white">WargaPeduli</span>
              </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                  <ul class="text-white dark:text-white font-medium">
                      <li class="mb-4">
                          <a href="" class="hover:underline">Laravel</a>
                      </li>
                      <li>
                          <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                  <ul class="text-white dark:text-white font-medium">
                      <li class="mb-4">
                          <a href="https://github.com/themesberg/flowbite" class="hover:underline ">Github</a>
                      </li>
                      <li>
                          <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                  <ul class="text-white dark:text-white font-medium">
                      <li class="mb-4">
                          <a href="#" class="hover:underline">Privacy Policy</a>
                      </li>
                      <li>
                          <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-white lg:my-8" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-white sm:text-center dark:text-white">© 2024 <a href="" class="hover:underline">WargaPeduli™</a>. All Rights Reserved.
          </span>
          <div class="flex mt-4 sm:justify-center sm:mt-0">
              <a href="#" class="text-blue-900 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                  <span class="sr-only">Facebook page</span>
              </a>
              <a href="#" class="text-blue-900 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                        <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                    </svg>
                  <span class="sr-only">Discord community</span>
              </a>
              <a href="#" class="text-blue-900 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Twitter page</span>
              </a>
              <a href="#" class="text-blue-900 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="sr-only">GitHub account</span>
              </a>
              <a href="#" class="text-blue-900 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Dribbble account</span>
              </a>
          </div>
      </div>
      </footer>
    </div>
    <style>
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes colorChange {
            0% {
                color: white;
            }
            100% {
                color: #1e3a8a;
            }
        }

        @keyframes underline {
            0% {
                text-decoration: none;
            }
            100% {
                text-decoration: underline;
            }
        }
    </style>
    <script>
        const pengajuan = document.getElementById('pengajuan');
        const close = document.querySelectorAll('.close');

        pengajuan.addEventListener('click', () => {
            let popup = document.getElementById('modal-pengajuan');
            popup.classList.remove('hidden');
            popup.classList.add('flex');
            setTimeout(() => {
                popup.style.transform = 'translateY(0)';
                popup.style.opacity = '1';
            }, 50);
        });
        close.forEach((btn) => {
            btn.addEventListener('click', () => {
                let popup = document.getElementById('modal-pengajuan');
                setTimeout(() => {
                    popup.classList.add('hidden');
                    popup.classList.remove('flex');
                }, 150)
                popup.style.transform = '';
                popup.style.opacity = '';
            });
        });

        document.getElementById('cekPengajuan').addEventListener('click', function () {
            var modalPengajuan = document.getElementById('modal-pengajuan');
            var modalFormCek = document.getElementById('modal-form-cek');

            modalPengajuan.classList.add('hidden');
            modalFormCek.classList.remove('hidden');
            modalFormCek.classList.add('flex');
        });

        var images = @json($images);
        var imageIndex = 0;

        setInterval(function () {
            imageIndex = (imageIndex + 1) % images.length;
            document.getElementById('dynamicImage').src = "{{ asset('') }}" + images[imageIndex];
        }, 5000);

        document.getElementById('readMore').addEventListener('click', function () {
            var modal = document.getElementById('modal');
            modal.classList.remove('hidden');
            modal.classList.add('center');
        });

        document.getElementById('closeModal').addEventListener('click', function () {
            var modal = document.getElementById('modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
        document.getElementById('readMore').addEventListener('click', function () {
            document.getElementById('modal').style.display = 'block';
        });

        const textBefore = 'Selamat Datang di Website ';
        const textHighlight = 'WargaPeduli';
        const textContainer = document.getElementById('animatedText');
        let delay = 0;

        // Handle the text before "WargaPeduli"
        for (let i = 0; i < textBefore.length; i++) {
            const span = document.createElement('span');
            span.innerText = textBefore[i];
            span.style.animationDelay = `${delay}s`;
            span.style.animationName = 'fadeIn';
            span.style.animationDuration = '0.8s';
            span.style.animationFillMode = 'forwards';
            span.style.color = 'white'; // Default color

            textContainer.appendChild(span);
            delay += 0.1;
        }

        // Handle "WargaPeduli"
        for (let i = 0; i < textHighlight.length; i++) {
            const span = document.createElement('span');
            span.innerText = textHighlight[i];
            span.style.animationDelay = `${delay}s`;
            span.style.animationName = 'fadeIn, colorChange, underline';
            span.style.animationDuration = '0.8s, 0.8s';
            span.style.animationFillMode = 'forwards, forwards, forwards';
            span.style.color = 'white'; // Default color
            span.style.textDecoration = 'none'; // Default textDecoration

            textContainer.appendChild(span);
            delay += 0.1;
        }

        $(document).ready(function () {
            $('#daftar-pengajuan').click(function () {
                $('#form-pengajuan').removeClass('hidden');
                $('#form-pengajuan').addClass('flex');
                $('#modal-pengajuan').addClass('hidden');
            });
        });
    </script>
@endsection
