  <div id="btn-keluarga" class="hidden fixed z-40 inset-0 bg-neutral-600 bg-opacity-50 flex justify-center items-center w-full mt-40">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl mt-10">
            <div class="flex justify-between items-center p-4 bg-blue-500 rounded-sm">
                <h3 class="text-lg font-medium text-white">Data Keluarga</h3>
                <button id="close-button" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-1 overflow-y-auto max-h-96">
                <livewire:keluarga-table />
                  @include('rt.rekomendasi')
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal_rekomendasi = document.getElementById('btn-rekomendasi');
        const modal = document.getElementById('btn-keluarga'); // assuming 'myModal' is the id of the other modal
        const openButton = document.getElementById('recommendation-button');
        const closeButton = document.getElementById('close-button-rekomendasi');
        const form = document.getElementById('recommendation-form');

        // Open the modal1 when the recommendation button is clicked
        openButton.addEventListener('click', function() {
            console.log('Open button clicked');
            modal.classList.add('hidden'); // hide the other modal
            modal_rekomendasi.classList.remove('hidden');
        });

        // Close the modal1 when the close button is clicked
        closeButton.addEventListener('click', function() {
            modal_rekomendasi.classList.add('hidden');
        });

    });
</script>