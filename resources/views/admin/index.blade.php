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
    <div class="w-full flex flex-row justify-center items-center gap-4 mb-4">
        <div class="w-full flex flex-col justify-start items-start bg-neutral-200/50 px-4 py-4 rounded-lg gap-2">
            <div class="px-2 py-2 w-fit rounded-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#7f7f7f" viewBox="0 0 256 256"><path d="M234.38,210a123.36,123.36,0,0,0-60.78-53.23,76,76,0,1,0-91.2,0A123.36,123.36,0,0,0,21.62,210a12,12,0,1,0,20.77,12c18.12-31.32,50.12-50,85.61-50s67.49,18.69,85.61,50a12,12,0,0,0,20.77-12ZM76,96a52,52,0,1,1,52,52A52.06,52.06,0,0,1,76,96Z"></path></svg>
            </div>
            <span class="text-sm md:text-base font-medium text-neutral-500">Jumlah Warga</span>
            <span class="text-base md:text-2xl font-bold text-black">{{ $countResident }} Orang</span>
        </div>
        <div class="w-full flex flex-col justify-start items-start bg-neutral-200/50 px-4 py-4 rounded-lg gap-2">
            <div class="px-2 py-2 w-fit rounded-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#7f7f7f" viewBox="0 0 256 256"><path d="M125.18,156.94a64,64,0,1,0-82.36,0,100.23,100.23,0,0,0-39.49,32,12,12,0,0,0,19.35,14.2,76,76,0,0,1,122.64,0,12,12,0,0,0,19.36-14.2A100.33,100.33,0,0,0,125.18,156.94ZM44,108a40,40,0,1,1,40,40A40,40,0,0,1,44,108Zm206.1,97.67a12,12,0,0,1-16.78-2.57A76.31,76.31,0,0,0,172,172a12,12,0,0,1,0-24,40,40,0,1,0-10.3-78.67,12,12,0,1,1-6.16-23.19,64,64,0,0,1,57.64,110.8,100.23,100.23,0,0,1,39.49,32A12,12,0,0,1,250.1,205.67Z"></path></svg>
            </div>
            <span class="text-sm md:text-base font-medium text-neutral-500">Jumlah Keluarga</span>
            <span class="text-base md:text-2xl font-bold text-black">{{ $countFamily }} Keluarga</span>
        </div>
    </div>
    <div class="w-full flex flex-row justify-center items-center gap-4 mb-4">
        <div class="w-full flex flex-col justify-start items-start bg-neutral-200/50 px-4 py-4 rounded-lg gap-2">
            <div class="px-2 py-2 w-fit rounded-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#7f7f7f" viewBox="0 0 256 256"><path d="M210.78,39.25l-130.25-23A16,16,0,0,0,62,29.23l-29.75,169a16,16,0,0,0,13,18.53l130.25,23h0a16,16,0,0,0,18.54-13l29.75-169A16,16,0,0,0,210.78,39.25ZM178.26,224h0L48,201,77.75,32,208,55ZM89.34,58.42a8,8,0,0,1,9.27-6.48l83,14.65a8,8,0,0,1-1.39,15.88,8.36,8.36,0,0,1-1.4-.12l-83-14.66A8,8,0,0,1,89.34,58.42ZM83.8,89.94a8,8,0,0,1,9.27-6.49l83,14.66A8,8,0,0,1,174.67,114a7.55,7.55,0,0,1-1.41-.13l-83-14.65A8,8,0,0,1,83.8,89.94Zm-5.55,31.51A8,8,0,0,1,87.52,115L129,122.29a8,8,0,0,1-1.38,15.88,8.27,8.27,0,0,1-1.4-.12l-41.5-7.33A8,8,0,0,1,78.25,121.45Z"></path></svg>
            </div>
            <span class="text-sm md:text-base font-medium text-neutral-500">Laporan Baru</span>
            <span class="text-base md:text-2xl font-bold text-black">{{ $countReportWaiting }} Laporan</span>
        </div>
        <div class="w-full flex flex-col justify-start items-start bg-neutral-200/50 px-4 py-4 rounded-lg gap-2">
            <div class="px-2 py-2 w-fit rounded-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#7f7f7f" viewBox="0 0 256 256"><path d="M210.78,39.25l-130.25-23A16,16,0,0,0,62,29.23l-29.75,169a16,16,0,0,0,13,18.53l130.25,23h0a16,16,0,0,0,18.54-13l29.75-169A16,16,0,0,0,210.78,39.25ZM178.26,224h0L48,201,77.75,32,208,55ZM89.34,58.42a8,8,0,0,1,9.27-6.48l83,14.65a8,8,0,0,1-1.39,15.88,8.36,8.36,0,0,1-1.4-.12l-83-14.66A8,8,0,0,1,89.34,58.42ZM83.8,89.94a8,8,0,0,1,9.27-6.49l83,14.66A8,8,0,0,1,174.67,114a7.55,7.55,0,0,1-1.41-.13l-83-14.65A8,8,0,0,1,83.8,89.94Zm-5.55,31.51A8,8,0,0,1,87.52,115L129,122.29a8,8,0,0,1-1.38,15.88,8.27,8.27,0,0,1-1.4-.12l-41.5-7.33A8,8,0,0,1,78.25,121.45Z"></path></svg>
            </div>
            <span class="text-sm md:text-base font-medium text-neutral-500">Laporan Diproses </span>
            <span class="text-base md:text-2xl font-bold text-black">{{ $countReportProcessing }} Laporan</span>
        </div>
    </div>
    @if($url == 'admin')
        @if(count($pengajuan) > 0)
            <div class="w-full flex flex-col justify-start items-start gap-4">
                <span class="font-semibold text-xl text-neutral-900">Pengajuan Penduduk</span>
                <div class="relative w-full overflow-x-auto shadow-md mt-4">
                    <table class="w-full text-sm text-left rtl:text-right bg-neutral-200">
                        <thead class="text-sm font-normal text-black">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">NKK</th>
                            <th scope="col" class="px-6 py-3">NIK</th>
                            <th scope="col" class="px-6 py-3">Status Warga</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($pengajuan as $key => $value)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-normal text-neutral-900 whitespace-nowrap">{{ $value->nama }}</th>
                                    <td class="px-6 py-4">{{ ($value->nkk != null) ? $value->nkk : "N/A" }}</td>
                                    <td class="px-6 py-4">{{ $value->nik }}</td>
                                    <td class="px-6 py-4">{{ $value->status_warga }}</td>
                                    <td class="px-6 py-4">
                                        <form method="POST" action="{{ url($url . '/pengajuan/penduduk/' . $value->id) }}">
                                            @csrf
                                            <button type="submit" class="w-fit px-6 py-3 rounded bg-green-500">
                                                <span class="font-semibold text-white">Proses</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endif
    <div class="flex flex-wrap w-full justify-evenly items-center mt-10">
        <div id="chart-amount" class="w-fit lg:w-1/3"></div>
        <div id="chart-age" class="w-fit lg:w-1/2"></div>
    </div>
    <script>
        var optionsAmount = {
            series: [{
                name: 'Jumlah Warga',
                data: @json($amount)
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: @json($rt),
                tickAmount: @json($rt).length,
                labels: {
                    rotate: -45,
                },
            },
            yaxis: {
                title: {
                    text: 'Jumlah Warga'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " warga"
                    }
                }
            }
        };

        var data = @json($age);
        var labels = Object.keys(data);
        var series = Object.values(data);
        var optionsAge = {
            series: series,
            chart: {
                type: 'pie',
                width: '100%',
                height: 350
            },
            labels: labels,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: '100%'
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            tooltip: {
                y: {
                    formatter: function(value) {
                        return value + " warga";
                    }
                }
            },
            legend: {
                position: 'bottom'
            }
        };

        var chartAmount = new ApexCharts(document.querySelector("#chart-amount"), optionsAmount);
        var chartAge = new ApexCharts(document.querySelector("#chart-age"), optionsAge);
        chartAmount.render();
        chartAge.render();
    </script>
@endsection
