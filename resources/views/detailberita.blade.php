<style>
    @keyframes slide-down {
        0% {
            transform: translateY(-100%);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>

<div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="animation: slide-down 0.5s ease-out;">
    <div class="flex items-start justify-start min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left  shadow-xl transform transition-all sm:mt-36 sm:mb-3 sm:align-middle sm:max-w-4xl sm:w-full mt-32 mb- overflow-auto max-h-screen" id="modal">
            <div class="bg-white sm:px-3 sm:py-2 rounded-md ">
                <div class="bg-gray-50 px-2 py-2 flex justify-end">
                    <!-- Button close -->
                    <button type="button" class="text-gray-500 hover:text-gray-600" id="closeModal">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="bg-white py-1 sm:py-8 lg:py-1">
                    <div class="mx-auto max-w-screen-md px-4 md:px-8">
                        <h1 class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6 border-b-2 border-gray-900 pb-3">Judul</h1>
                        <div class="relative mb-6 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:mb-8">
                            <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600&h=350" loading="lazy" alt="Photo by Minh Pham" class="h-full w-full object-cover object-center" />
                        </div>
                        <p class="mb-6 text-gray-500 sm:text-lg md:mb-8">
                            This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated. It may be used to display a sample of fonts or generate text for testing. Filler text is dummy text which has no meaning however looks very similar to real text. The important factor when using filler text is that the text looks realistic otherwise it will not look very good.<br /><br />
                            This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is <a href="#" class="text-indigo-500 underline transition duration-100 hover:text-indigo-600 active:text-indigo-700">random</a> or otherwise generated. It may be used to display a sample of fonts or generate text for testing. Filler text is dummy text which has no meaning however looks very similar to real text.
                            This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated. It may be used to display a sample of fonts or generate text for testing. Filler text is dummy text which has no meaning however looks very similar to real text. The important factor when using filler text is that the text looks realistic otherwise it will not look very good.<br /><br />
                            This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is <a href="#" class="text-indigo-500 underline transition duration-100 hover:text-indigo-600 active:text-indigo-700">random</a> or otherwise generated. It may be used to display a sample of fonts or generate text for testing. Filler text is dummy text which has no meaning however looks very similar to real text.
                        </p>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('modal').addEventListener('click', function() {
        this.style.display = 'none';
    });
</script>