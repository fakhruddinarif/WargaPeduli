@extends('layouts.app')
@section('template')
    @include('layouts.navigation')
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <section id="content" class="bg-white flex flex-wrap justify-start items-start mt-[164px] w-full gap-4 overflow-y-scroll py-8 px-5">
        <div class="flex flex-col justify-between items-center w-full">
            @yield('content')
        </div>
    </section>
    <script>
        const sidebar = document.getElementById('sidebar')
        const toggle = document.getElementById('toggle')
        const dateTitle = document.getElementById('text-date-title')
        const content = document.getElementById('content')

        let sidebarWidth = sidebar.offsetWidth;

        toggle.addEventListener('click', function () {
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                if (window.innerWidth >= 768) {
                    content.style.marginLeft = sidebarWidth + 'px';
                }
            }
            else {
                sidebar.classList.add('-translate-x-full');
                content.style.marginLeft = '0';
            }
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('-translate-x-full');
                content.style.marginLeft = sidebarWidth + 'px';
            }
            if (window.innerWidth < 640) {
                dateTitle.classList.add('hidden');
            }
            else {
                dateTitle.classList.remove('hidden');
            }
        });

        window.addEventListener('load', function () {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('-translate-x-full');
                content.style.marginLeft = sidebarWidth + 'px';
            }
            if (window.innerWidth < 640) {
                dateTitle.classList.add('hidden');
            }
            else {
                dateTitle.classList.remove('hidden');
            }
        });
    </script>
@endsection
