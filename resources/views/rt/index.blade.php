@extends('layouts.app')
@section('template')
@include('layouts.navigation')
@include('layouts.navbar')
<div class="w-full relative bg-gray-300">
    <div class="absolute inset-0 flex justify-center items-center mb-[14rem]">
        <div class="w-[83%] h-[43%] flex flex-col justify-center items-center border bg-white rounded-lg mt-3">
            <h1 class="text-black text-4xl font-bold font-sans mb-2">Selamat Datang Pada Halaman</h1>
            <h2 class="text-black text-3xl font-bold font-sans text-center">Utama Website Warga Peduli</h2>
            <p class="text-center mt-6 text-gray-600 font-sans">Kelola data pribadi, pengajuan bansos, dan sampaikan <br> keluhan anda dengan mudah disini</p>
        </div>
    </div>
    <div class="flex flex-wrap justify-center items-center overflow-y-auto max-h-[30rem] mt-[40%] sm:mt-[25%] ">
        <div class="bg-white items-center w-[20rem] sm:max-w-xl h-[15rem] sm:h-[15rem] rounded-lg font-[sans-serif] overflow-hidden ml-2 mr-2 mt-6 transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl flex flex-col sm:flex-row">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6" class="bg-blue-300 rounded-xl ml-3 mt-3">
                <path strokeLinecap="round" strokeLinejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
            </svg>
            <div class="px-4 py-6">
                <h3 class="text-xl font-[sans-serif] font-semibold">Pengaduan Saran </h3>
                <p class="mt-2 text-sm text-gray-600">Laporkan Segala Bentuk Keluhan anda yang ada diwilayah sini </p>
                <div class="flex flex-wrap items-center cursor-pointer border rounded-lg w-full h-[25%] mt-3 ml-0">
                    <div class="flex-2">
                        <button id="btnpengaduan" class="text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none px-3 py-1 rounded-md">Pencet</button>
                    </div>
                </div>
            </div>
        </div> 
        <div class="bg-white items-center w-[20rem] h-[15rem] max-w-xl rounded-lg font-[sans-serif] overflow-hidden ml-2 mr-2 mt-6 transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl flex flex-col sm:flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6" class="bg-blue-300 rounded-xl ml-3 mt-3">
                <path strokeLinecap="round" strokeLinejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
            </svg>
            <div class="px-4 py-6">
                <h3 class="text-xl font-[sans-serif] font-semibold">Pengajuan Bansos</h3>
                <p class="mt-2 text-sm text-gray-600">Ajukan Bantuan Sosial untuk anda yang membutuhkan</p>
                <div class="flex flex-wrap items-center cursor-pointer border rounded-lg w-full mt-3 ml-0">
                    <div class="flex-1">
                        <button id="open-modal" class="text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none px-3 py-1 rounded-md">Pencet</button>
                    </div>
                </div>
            </div>
        </div> 
        <div class="bg-white items-center w-[20rem] h-[15rem] max-w-xl rounded-lg font-[sans-serif] overflow-hidden ml-2 mr-2 mt-6 transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl flex flex-col sm:flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6" class="bg-blue-300 rounded-xl ml-3 mt-3">
                <path strokeLinecap="round" strokeLinejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>
            <div class="px-4 py-6">
                <h3 class="text-xl font-[sans-serif] font-semibold">Pengajuan Bansos</h3>
                <p class="mt-2 text-sm text-gray-600">Ajukan Bantuan Sosial untuk anda yang membutuhkan</p>
                <div class="flex flex-wrap items-center cursor-pointer border rounded-lg w-full mt-3 ml-0">
                    <div class="flex-1">
                        <button id="btntableb" class="text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none px-3 py-1 rounded-md">Pencet</button>
                    </div>
                </div>
            </div>
        </div> 
        <div class="bg-white items-center w-[20rem] h-[15rem] max-w-xl rounded-lg font-[sans-serif] overflow-hidden ml-2 mr-2 mt-6 transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl flex flex-col sm:flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6" class="bg-blue-300 rounded-xl ml-3 mt-3">
                <path strokeLinecap="round" strokeLinejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>
            <div class="px-4 py-6">
                <h3 class="text-xl font-[sans-serif] font-semibold">Pengajuan Bansos</h3>
                <p class="mt-2 text-sm text-gray-600">Ajukan Bantuan Sosial untuk anda yang membutuhkan</p>
                <div class="flex flex-wrap items-center cursor-pointer border rounded-lg w-full  mt-3 ml-0">
                    <div class="flex-1">
                        <button id="btntable" class="text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none px-3 py-1 rounded-md">Pencet</button>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>


<!-- Modal Data Keluarga-->
<div id="datakeluarga" class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]" style="display: none;">
    <div class="w-full max-w-5xl bg-white shadow-lg rounded-md p-6 relative">
        <div class="flex flex-row w-full gap-1 justify-start items-center px-2 py-1 bg-blue-500 rounded-t-lg">
            <a href="{{ url('/') }}" class="px-2 py-3 content-center"></a>
            <span class="text-base font-semibold text-white">Data Keluarga</span>
        </div>
        <div class="flex flex-col w-full h-fit justify-center items-center border-2 rounded-b-lg gap-4 px-4 py-4">
            <div class="modal-body table-responsive w-full">
                <table class="table table-bordered cell-border" style="width: 100%" id="example">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>NKK</th>
                            <th>Nama</th>
                            <th>RT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger</td>
                            <td>Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td><button class="rekomendasi-button text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none px-3 py-1 rounded-md">Rekomendasi</button></td>
                        </tr>
                        <tr>
                            <td>Garrett</td>
                            <td>Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td><button class="rekomendasi-button text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none px-3 py-1 rounded-md">Rekomendasi</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="border-t flex justify-end pt-6 space-x-4">
            <button id="btncancel" type="button" class="px-6 py-2 rounded-md text-black text-sm border-none outline-none bg-gray-200 hover:bg-gray-300 active:bg-gray-200">Cancel</button>
        </div>
    </div>
</div>

<!-- Data penduduk -->
<div id="datapenduduk" class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]" style="display: none;">
    <div class="w-full max-w-5xl bg-white shadow-lg rounded-md p-6 relative">
        <div class="flex flex-row w-full gap-1 justify-start items-center px-2 py-1 bg-blue-500 rounded-t-lg">
            <a href="{{ url('/') }}" class="px-2 py-3 content-center"></a>
            <span class="text-base font-semibold text-white">Data penduduk</span>
        </div>
        <div class="flex flex-col w-full h-fit justify-center items-center border-2 rounded-b-lg gap-4 px-4 py-4">
            <div class="modal-body table-responsive w-full">
                <table class="table table-bordered cell-border" style="width: 100%" id="examplea">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>NKK</th>
                            <th>Nama</th>
                            <th>RT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger</td>
                            <td>Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td><button class="rekomendasi-button text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none px-3 py-1 rounded-md">Rekomendasi</button></td>
                        </tr>
                        <tr>
                            <td>Garrett</td>
                            <td>Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td><button class="rekomendasi-button text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none px-3 py-1 rounded-md">Rekomendasi</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="border-t flex justify-end pt-6 space-x-4">
            <button id="btncancela" type="button" class="px-6 py-2 rounded-md text-black text-sm border-none outline-none bg-gray-200 hover:bg-gray-300 active:bg-gray-200">Cancel</button>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>


<script>
    $(document).ready(function(){
        showmodaldatakeluarga();
        showmodaldatapenduduk();
    });

        //     function datatablependuduk() {
        //     $('#example').DataTable({
                //    ajax: 'path/to/your/data.json', // Specify your data source here
        //         columns: [
        //             { data: 'name' },
        //             { data: 'position' },
        //             { data: 'office' },
        //             { data: 'extn' },
        //             { data: 'start_date' }
        //         ],
        //         responsive: true,
        //         processing: true,
        //         serverSide: false,
        //         paging: true,

        //     });
        // }

        function showmodaldatakeluarga() {
            $('#btntable').click(function(){
                $.fn.dataTable.ext.errMode = 'none';
                $('#datakeluarga').fadeIn();
                $('#example').DataTable({
                //     ajax: 'path/to/your/data.json',
                //         columns: [
                //          { data: 'name' },
                //          { data: 'position' },
                //          { data: 'office' },
                //          { data: 'extn' },
                //          { data: 'start_date' }
                //    ],
                   responsive: true,
                   processing: true,
                   serverSide: false,
                   paging: true,
                });
            });

            $('#btncancel').click(function(){
                $('#datakeluarga').fadeOut();
            });

             $(document).on('click', '.rekomendasi-button', function() {
            // alert('Rekomendasi button clicked');
        });
        }
        function showmodaldatapenduduk() {
        $('#btntableb').click(function(){
            $.fn.dataTable.ext.errMode = 'none';
            $('#datapenduduk').fadeIn();
            $('#examplea').DataTable({
                // ajax: 'path/to/your/data.json', // Specify your data source here
                // columns: [
                //     { data: 'id' },
                //     { data: 'nkk' },
                //     { data: 'nama' },
                //     { data: 'rt' },
                //     { 
                //         data: null,
                //         render: function (data, type, row) {
                //             return '<button class="rekomendasi-button text-white bg-[#0EA5E9] hover:bg-[#006bff] focus:outline-none px-3 py-1 rounded-md">Rekomendasi</button>';
                //         }
                //     }
                // ],
                responsive: true,
                processing: true,
                serverSide: false,
                paging: true,
            });
        });

        $('#btncancela').click(function(){
            $('#datapenduduk').fadeOut();
        });

        $(document).on('click', '.rekomendasi-button', function() {
            // Handle button click event
        });
    }
</script>
@endsection