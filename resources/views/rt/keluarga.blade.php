  <div id="modal-keluarga" class="hidden fixed z-40 inset-0 bg-neutral-600 bg-opacity-50 flex justify-center items-center w-full mt-40">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl mb-80 mt-28" >
            <div class="flex justify-between items-center p-4 bg-blue-500 rounded-sm" >
                <h3 class="text-lg font-medium text-white">Data Keluarga</h3>
                <button id="close-button-keluarga" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-1 overflow-y-auto max-h-96">
                <livewire:keluarga-table />
                 
            </div>
        </div>
    </div>
     @include('rt.rekomendasi')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal_rekomendasi = document.getElementById('modal-rekomendasi');
        const modal_keluarga = document.getElementById('modal-keluarga');
        const openButtonKeluarga = document.getElementById('data-button-keluarga');
        const openButtonRekomendasi = document.getElementById('recommendation-button');
        const closeButtonKeluarga = document.getElementById('close-button-keluarga');                
        const closeButtonRekomendasi = document.getElementById('close-button-rekomendasi');

        // Open the modal_keluarga and close modal_rekomendasi when the data-button-keluarga is clicked
        openButtonKeluarga.addEventListener('click', function() {
            console.log('Open button clicked');
            modal_keluarga.classList.remove('hidden'); 
            modal_rekomendasi.classList.add('hidden');

        });

        // Open the modal_rekomendasi and close modal_keluarga when the recommendation-button is clicked
        openButtonRekomendasi.addEventListener('click', function() {
            console.log('p');
            modal_rekomendasi.classList.remove('hidden');
            modal_keluarga.classList.add('hidden'); 

        });

        // Close the modal_rekomendasi when the close button is clicked
        closeButtonRekomendasi.addEventListener('click', function() {
            modal_rekomendasi.classList.add('hidden');
        });

        // Close the modal_keluarga when the close button is clicked
        closeButtonKeluarga.addEventListener('click', function() {
            modal_keluarga.classList.add('hidden');
        });
    });
</script>