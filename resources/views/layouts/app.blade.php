<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ str_replace('_', ' ', config('app.name', 'Warga Peduli')) }} </title>
    <link rel="icon" href="{{ asset('logo.png') }}">
    <!-- Stylesheet -->
    @vite ('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body class="w-dvw h-dvh overflow-hidden flex">
    @yield('template')
</body>
<script>
    $(document).ready(function(){
        // Validate input on keypress for nkk and nik
        $('#nkk, #nik').on('keypress', function(e) {
            var charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        });

        // Apply mask to input-number fields
        $('.input-number').mask('000.000.000.000.000', {reverse: true});

        // Select the form and add submit event listener
        $('form').on('submit', function(e) {
            // Prevent the form from submitting
            e.preventDefault();

            // Remove dots from input-number fields
            $('.input-number').each(function() {
                var value = $(this).val();
                value = value.replace(/\./g, '');
                $(this).val(value);
            });

            // Continue with form submission
            this.submit();
        });

        // Sidebar
        const sidebar = $('#sidebar');
        const toggle = $('#toggle');
        const dateTitle = $('#text-date-title');
        const content = $('#content');

        let sidebarWidth = sidebar.width();

        toggle.click(function () {
            if (sidebar.hasClass('-translate-x-full')) {
                sidebar.removeClass('-translate-x-full');
                if ($(window).width() >= 768) {
                    content.css('marginLeft', sidebarWidth + 'px');
                }
            }
            else {
                sidebar.addClass('-translate-x-full');
                content.css('marginLeft', '0');
            }
        });

        $(window).resize(function() {
            if ($(window).width() > 768) {
                sidebar.removeClass('-translate-x-full');
                content.css('marginLeft', sidebarWidth + 'px');
            }
            if ($(window).width() < 768) {
                dateTitle.addClass('hidden');
            }
            else {
                dateTitle.removeClass('hidden');
            }
        });

        $(window).on('load', function () {
            if ($(window).width() > 768) {
                sidebar.removeClass('-translate-x-full');
                content.css('marginLeft', sidebarWidth + 'px');
            }
            if ($(window).width() < 768) {
                dateTitle.addClass('hidden');
            }
            else {
                dateTitle.removeClass('hidden');
            }
        });

        // Drag and Drop
        var dropzone = $('#dropzone');
        var dokumen = $('#dokumen');
        var preview = $('#preview');
        var areaUpload = $('#area-upload');

        dropzone.on('dragover', function(event) {
            event.preventDefault();
            $(this).addClass('bg-blue-100');
        });

        dropzone.on('dragleave', function(event) {
            $(this).css('backgroundColor', 'initial');
        });

        dropzone.on('drop', function(event) {
            event.preventDefault();
            $(this).css('backgroundColor', 'initial');

            dokumen[0].files = event.originalEvent.dataTransfer.files;
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.attr('src', reader.result);
                preview.removeClass('hidden');
                areaUpload.addClass('hidden');
            };
            reader.readAsDataURL(dokumen[0].files[0]);
        });

        dokumen.on('change', function() {
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.attr('src', reader.result);
                preview.removeClass('hidden');
                areaUpload.addClass('hidden');
            };
            reader.readAsDataURL(dokumen[0].files[0]);
        });

        // Output
        var loadFile = function(event) {
            var output = $('#output');
            output.attr('src', URL.createObjectURL(event.target.files[0]));
            output.on('load', function() {
                URL.revokeObjectURL(output.attr('src')) // free memory
            });
        };

        // Delete With Modal
        var deleteButton = $('#delete-button');
        var deleteModal = $('#delete-modal');
        var closeModal = $('#close-modal');
        var closeModalBottom = $('#close-modal-bottom');

        deleteButton.on('click', function() {
            deleteModal.addClass('flex').removeClass('hidden');
        });
        closeModal.on('click', function() {
            deleteModal.removeClass('flex').addClass('hidden');
        });
        closeModalBottom.on('click', function() {
            deleteModal.removeClass('flex').addClass('hidden');
        });

        // Prioritas
        var prioritasButtons = $('.prioritas');
        prioritasButtons.each(function() {
            $(this).on('click', function() {
                var buttonId = $(this).attr('id').split('-')
                var modalId = 'popup-prioritas-' + buttonId[1];
                var modal = $('#' + modalId);
                modal.addClass('flex').removeClass('hidden');
            });
        });
        var closeButtons = $('.close');
        closeButtons.each(function() {
            $(this).on('click', function() {
                var buttonId = $(this).attr('id').split('-');
                var modalId = 'popup-prioritas-' + buttonId[1].replace('close-', '');
                console.log(modalId);
                var modal = $('#' + modalId);
                modal.addClass('hidden').removeClass('flex');
            });
        });
    });
</script>
</html>

