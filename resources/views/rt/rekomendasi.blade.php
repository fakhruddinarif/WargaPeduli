<div id="btn-rekomendasi" class="hidden fixed z-40 inset-0 bg-neutral-600 bg-opacity-50 flex justify-center items-center w-full mt-40">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-6xl mt-10">
        <div class="flex justify-between items-center p-4 bg-blue-500 rounded-sm">
            <h3 class="text-lg font-medium text-white">Form Rekomendasi</h3>
            <button id="close-button-rekomendasi" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-4 overflow-y-auto max-h-96">
            <form id="recommendation-form" action="#" method="POST" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="recommendation" class="block text-sm font-medium text-gray-700">Recommendation</label>
                    <textarea name="recommendation" id="recommendation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4" required></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
