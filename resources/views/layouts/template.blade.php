@extends('layouts.app')
@section('template')
    @include('layouts.navigation')
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <section class="bg-white flex flex-wrap justify-start items-start mt-[164px] w-full gap-4 overflow-y-scroll py-8 px-5">
        <div class="flex flex-col justify-between items-center w-full">
            @yield('content')
        </div>
    </section>
    <script>
        const sidebar = document.getElementById('sidebar')
        const toggle = document.getElementById('toggle')
        const dateTitle = document.getElementById('text-date-title')

        toggle.addEventListener('click', function () {
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
            }
            else {
                sidebar.classList.add('hidden');
            }
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth > 1024) {
                sidebar.classList.remove('hidden');
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
