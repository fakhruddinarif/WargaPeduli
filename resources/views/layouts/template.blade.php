@extends('layouts.app')
@section('template')
    @component('layouts.navigation')
    @endcomponent
    @component('layouts.navbar')
    @endcomponent
    @component('layouts.sidebar')
    @endcomponent
    <section class="bg-white flex flex-wrap justify-start items-start mt-[164px] w-full gap-4 overflow-y-scroll py-8 px-5">
        <div class="flex flex-col justify-between items-center w-full">
            @yield('content')
        </div>
    </section>
@endsection
