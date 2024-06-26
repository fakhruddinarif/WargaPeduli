@extends('layouts.template')
@section('content')
    @if(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">{{ Session::get('success')}}</span>
        </div>
    @elseif(Session::has('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                <span class="font-medium">{{ Session::get('error')}}</span>
            </div>
    @endif
    <div class="w-full flex flex-row justify-start items-center mb-4">
        <a href="{{ url('/'. $url .'/penduduk/?data=keluarga') }}"
           class="w-full px-4 py-3 {{ $keluarga ? 'bg-blue-500' : 'bg-white' }} rounded-l-lg border-y-2 border-l-2 text-center">
            <span class="text-sm font-medium {{ $keluarga ? 'text-white' : 'text-neutral-900' }}">Data Keluarga</span>
        </a>
        <a href="{{ url('/'. $url .'/penduduk/?data=warga') }}"
           class="w-full px-4 py-3 {{ $warga ? 'bg-blue-500' : 'bg-white' }} rounded-r-lg border-y-2 border-r-2 text-center">
            <span class="text-sm font-medium {{ $warga ? 'text-white' : 'text-neutral-900' }}">Data Warga</span>
        </a>
    </div>
    @if($keluarga)
        <livewire:keluarga-table/>
    @elseif($warga)
        <livewire:warga-table/>
    @endif
    @include('components.modals.modal_create_penduduk')
    @include('components.modals.modal_download_penduduk')
    <script>
        const createPenduduk = document.querySelectorAll('.create-penduduk');
        const close = document.querySelectorAll('.close');

        createPenduduk.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.preventDefault()
                let popup = document.getElementById('popup-create-penduduk');
                popup.classList.remove('hidden');
                popup.classList.add('flex');
                setTimeout(() => {
                    popup.style.transform = 'translateY(0)';
                    popup.style.opacity = '1';
                }, 50);
            });
        });

        close.forEach((btn) => {
            btn.addEventListener('click', () => {
                let popup = document.getElementById('popup-create-penduduk');
                setTimeout(() => {
                    popup.classList.add('hidden');
                    popup.classList.remove('flex');
                }, 150)
                popup.style.transform = '';
                popup.style.opacity = '';
            });
        });
        const downloadPenduduk = document.querySelectorAll('.download-penduduk');
        const closeDownload = document.getElementById('close-download');
        const modalDownload = document.getElementById('modal-download');

        downloadPenduduk.forEach((dp) => {
            dp.addEventListener('click', (e) => {
                e.preventDefault();
                if (modalDownload) {
                    modalDownload.classList.remove('hidden');
                    modalDownload.classList.add('flex');
                    setTimeout(() => {
                        modalDownload.style.transform = 'translateY(0)';
                        modalDownload.style.opacity = '1';
                    }, 50);
                }
            });
        });

        if (closeDownload) {
            closeDownload.addEventListener('click', () => {
                if (modalDownload) {
                    setTimeout(() => {
                        modalDownload.classList.add('hidden');
                        modalDownload.classList.remove('flex');
                    }, 150);
                    modalDownload.style.transform = '';
                    modalDownload.style.opacity = '';
                }
            });
        }
    </script>
@endsection
