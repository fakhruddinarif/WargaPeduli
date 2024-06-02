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
@endsection
