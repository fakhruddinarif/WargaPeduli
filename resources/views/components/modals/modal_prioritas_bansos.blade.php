<div id="popup-prioritas-{{ $value->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow border">
            <button type="button" id="close-{{ $value->id }}" class="close absolute top-3 end-2.5 text-neutral-300 bg-transparent hover:bg-neutral-300 hover:text-neutral-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <h3 class="mb-5 text-base font-normal text-neutral-500">Apa yang metode anda gunakan?</h3>
                <a href="{{ url('/' . $url .'/bansos/mabac/' . $value->id) }}" data-modal-hide="popup-modal" class="mr-2 border text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">MABAC</a>
                <a href="{{ url('/' . $url .'/bansos/saw/' . $value->id) }}" data-modal-hide="popup-modal" class="border border-indigo-600 text-indigo-600 bg-white hover:bg-neutral-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">SAW</a>
            </div>
        </div>
    </div>
</div>
