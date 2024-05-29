@extends('layouts.template')
@section('content')
    @if(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">{{ Session::get('success')}}</span>
        </div>
    @endif
    <livewire:laporan-table/>
@endsection
