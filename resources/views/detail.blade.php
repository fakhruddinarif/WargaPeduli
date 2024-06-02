@extends('layouts.app')
@section('template')
    <section class="w-full bg-blue-500 overflow-y-scroll h-screen lg:py-8">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <div class="w-full flex flex-col justify-start items-start gap-1">
                        <div class="flex flex-row justify-start items-start gap-2">
                            <a href="{{ url('/') }}" class="w-fit p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000000" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>
                            </a>
                            <h1 class="text-xl font-bold leading-tight tracking-tight text-neutral-900 md:text-2xl">
                                Detail Pengajuan
                            </h1>
                        </div>
                        <span class="font-medium text-neutral-500 text-xs">ID: {{ $data->id }}</span>
                    </div>
                    <div class="w-full flex flex-col justify-start items-start gap-2">
                        @if($data->status_warga == 'Menetap')
                            <div class="w-full flex flex-col justify-start items-start gap-2">
                                <span class="font-semibold text-neutral-900 text-sm">Username</span>
                                <div class="w-full px-4 py-2 border-2 rounded-lg">
                                    <span class="font-medium text-neutral-600 text-sm">{{ $data->username }}</span>
                                </div>
                            </div>
                            <div class="w-full flex flex-col justify-start items-start gap-2">
                                <span class="font-semibold text-neutral-900 text-sm">Password</span>
                                <div class="w-full px-4 py-2 border-2 rounded-lg relative">
                                    <input id="password" type="password" class="font-medium text-neutral-600 text-sm w-full" value="{{ $data->password }}" readonly>
                                    <button id="togglePassword" type="button" class="absolute right-2 top-1/2 transform -translate-y-1/2">
                                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#a3a3a3" viewBox="0 0 256 256"><path d="M251,123.13c-.37-.81-9.13-20.26-28.48-39.61C196.63,57.67,164,44,128,44S59.37,57.67,33.51,83.52C14.16,102.87,5.4,122.32,5,123.13a12.08,12.08,0,0,0,0,9.75c.37.82,9.13,20.26,28.49,39.61C59.37,198.34,92,212,128,212s68.63-13.66,94.48-39.51c19.36-19.35,28.12-38.79,28.49-39.61A12.08,12.08,0,0,0,251,123.13Zm-46.06,33C183.47,177.27,157.59,188,128,188s-55.47-10.73-76.91-31.88A130.36,130.36,0,0,1,29.52,128,130.45,130.45,0,0,1,51.09,99.89C72.54,78.73,98.41,68,128,68s55.46,10.73,76.91,31.89A130.36,130.36,0,0,1,226.48,128,130.45,130.45,0,0,1,204.91,156.12ZM128,84a44,44,0,1,0,44,44A44.05,44.05,0,0,0,128,84Zm0,64a20,20,0,1,1,20-20A20,20,0,0,1,128,148Z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <div class="w-full flex flex-col justify-start items-start gap-2">
                            <span class="font-semibold text-neutral-900 text-sm">Status</span>
                            <div class="w-full px-4 py-2 border-2 rounded-lg">
                                <span class="font-medium text-neutral-600 text-sm">{{ $data->status }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<path d="M56.88,31.93A12,12,0,1,0,39.12,48.07l16,17.65C20.67,88.66,5.72,121.58,5,123.13a12.08,12.08,0,0,0,0,9.75c.37.82,9.13,20.26,28.49,39.61C59.37,198.34,92,212,128,212a131.34,131.34,0,0,0,51-10l20.09,22.1a12,12,0,0,0,17.76-16.14ZM128,188c-29.59,0-55.47-10.73-76.91-31.88A130.69,130.69,0,0,1,29.52,128c5.27-9.31,18.79-29.9,42-44.29l90.09,99.11A109.33,109.33,0,0,1,128,188Zm123-55.12c-.36.81-9,20-28,39.16a12,12,0,1,1-17-16.9A130.48,130.48,0,0,0,226.48,128a130.36,130.36,0,0,0-21.57-28.12C183.46,78.73,157.59,68,128,68c-3.35,0-6.7.14-10,.42a12,12,0,1,1-2-23.91c3.93-.34,8-.51,12-.51,36,0,68.63,13.67,94.49,39.52,19.35,19.35,28.11,38.8,28.48,39.61A12.08,12.08,0,0,1,251,132.88Z"></path>'; // Ganti dengan SVG mata tertutup
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<path d="M251,123.13c-.37-.81-9.13-20.26-28.48-39.61C196.63,57.67,164,44,128,44S59.37,57.67,33.51,83.52C14.16,102.87,5.4,122.32,5,123.13a12.08,12.08,0,0,0,0,9.75c.37.82,9.13,20.26,28.49,39.61C59.37,198.34,92,212,128,212s68.63-13.66,94.48-39.51c19.36-19.35,28.12-38.79,28.49-39.61A12.08,12.08,0,0,0,251,123.13Zm-46.06,33C183.47,177.27,157.59,188,128,188s-55.47-10.73-76.91-31.88A130.36,130.36,0,0,1,29.52,128,130.45,130.45,0,0,1,51.09,99.89C72.54,78.73,98.41,68,128,68s55.46,10.73,76.91,31.89A130.36,130.36,0,0,1,226.48,128,130.45,130.45,0,0,1,204.91,156.12ZM128,84a44,44,0,1,0,44,44A44.05,44.05,0,0,0,128,84Zm0,64a20,20,0,1,1,20-20A20,20,0,0,1,128,148Z"></path>'; // Ganti dengan SVG mata terbuka
            }
        });
    </script>
@endsection
