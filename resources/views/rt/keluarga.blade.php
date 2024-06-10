  <div id="myModal" class="hidden fixed z-40 inset-0 bg-neutral-600 bg-opacity-50 flex justify-center items-center w-full mt-40">
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
        const modal1 = document.getElementById('myModal1');
        const modal = document.getElementById('myModal'); // assuming 'myModal' is the id of the other modal
        const openButton = document.getElementById('recommendation-button');
        const closeButton = document.getElementById('close-button1');
        const form = document.getElementById('recommendation-form');

        // Debugging: Check if elements are found
        console.log('Modal1:', modal1);
        console.log('Modal:', modal);
        console.log('Open Button:', openButton);
        console.log('Close Button:', closeButton);

        // Open the modal1 when the recommendation button is clicked
        openButton.addEventListener('click', function() {
            console.log('Open button clicked');
            modal.classList.add('hidden'); // hide the other modal
            modal1.classList.remove('hidden');
        });

        // Close the modal1 when the close button is clicked
        closeButton.addEventListener('click', function() {
            modal1.classList.add('hidden');
        });

        // Optional: Close the modal1 when clicking outside of the modal content
        window.addEventListener('click', function(event) {
            if (event.target == modal1) {
                modal1.classList.add('hidden');
            }
        });

        // Handle form submission (optional: customize as needed)
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            // Add form submission logic here
            alert('Form submitted');
            modal1.classList.add('hidden');
        });
    });
</script>