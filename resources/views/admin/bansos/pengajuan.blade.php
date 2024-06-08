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
    <div class="w-full flex flex-col justify-center items-center rounded-lg border-2">
        <div class="w-full flex flex-row justify-between items-center bg-blue-500 rounded-tr-lg rounded-tl-lg px-4 py-2">
            <div class="w-fit h-fit">
                <span class="font-normal text-sm text-white">Detail Pengajuan Bantuan Sosial</span>
            </div>
            <div class="w-fit h-fit">
                <a href="{{url('/'. $url . '/bansos/')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                </a>
            </div>
        </div>
    </div>
    <div class="relative w-full overflow-x-auto shadow-md">
        <table class="w-full text-sm text-left rtl:text-right bg-neutral-200">
            <thead class="text-sm font-normal text-black">
            <tr>
                <th scope="col" class="px-6 py-3">NKK</th>
                <th scope="col" class="px-6 py-3">Alamat</th>
                <th scope="col" class="px-6 py-3">Kepala Keluarga</th>
                <th scope="col" class="px-6 py-3">RT</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @if(count($data) > 0)
                @foreach($data as $key => $value)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-normal text-neutral-900 whitespace-nowrap">{{ $value->nkk }}</th>
                        <td class="px-6 py-4">{{ $value->alamat }}</td>
                        <td class="px-6 py-4">{{ $value->nama }}</td>
                        <td class="px-6 py-4">0{{ $value->nomor }}</td>
                        <td class="px-6 py-4 flex flex-wrap gap-4">
                            <button type="button" id="detail-pengajuan" data-id="{{ $value->id }}" data-bansos="{{ $value->bansos_id }}" class="mr-2 w-fit h-fit px-4 py-2 bg-blue-500 rounded-md">
                                <span class="font-semibold text-white">Detail</span>
                            </button>
                            <form action="{{ url('/rw/bansos/' . $value->id . '/terima') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="mr-2 w-fit h-fit px-4 py-2 bg-green-500 rounded-md">
                                    <span class="font-semibold text-white">Terima</span>
                                </button>
                            </form>
                            <form action="{{ url('/rw/bansos/' . $value->id . '/tolak') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="mr-2 w-fit h-fit px-4 py-2 bg-red-500 rounded-md">
                                    <span class="font-semibold text-white">Tolak</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="w-full bg-white text-center py-4 font-medium text-sm">Tidak ada data</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    @include('components.modals.modal_detail_pengajuan')
    <script>
        function formatRupiah(angka, prefix){
            angka = String(angka); // Convert angka to a string
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa  = split[0].length % 3,
                rupiah  = split[0].substr(0, sisa),
                ribuan  = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
        document.querySelectorAll('#detail-pengajuan').forEach(button => {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var bansosId = this.getAttribute('data-bansos');
                fetch('/rw/bansos/pengajuan/' + bansosId + '/detail/' + id)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Add data to modal
                        document.querySelector('#modal-pengajuan .pendapatan').textContent = formatRupiah(data[0].pendapatan, 'Rp. ');
                        document.querySelector('#modal-pengajuan .luas_bangunan').textContent = data[0].luas_bangunan + ' m²';
                        document.querySelector('#modal-pengajuan .jumlah_tanggungan').textContent = data[0].jumlah_tanggungan + ' Orang';
                        document.querySelector('#modal-pengajuan .pajak_bumi').textContent = formatRupiah(data[0].pajak_bumi, 'Rp. ');
                        document.querySelector('#modal-pengajuan .tagihan_listrik').textContent = formatRupiah(data[0].tagihan_listrik, 'Rp. ');

                        // Add input-number class
                        document.querySelector('#modal-pengajuan .pendapatan').classList.add('input-number');
                        document.querySelector('#modal-pengajuan .pajak_bumi').classList.add('input-number');
                        document.querySelector('#modal-pengajuan .tagihan_listrik').classList.add('input-number');

                        // Show modal
                        var modal = document.querySelector('#modal-pengajuan');
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                    });
            });
        });
        document.querySelector('#close-pengajuan').addEventListener('click', function() {
            var modal = document.querySelector('#modal-pengajuan');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    </script>
@endsection
