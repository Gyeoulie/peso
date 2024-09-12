<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/PESO-Logo.png') }}">


    <title>{{ config('app.name', 'PESO') }}</title>

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
     <link href="https://fonts.bunny.net/css?family=ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet" />
 
     {{-- ICONS --}}
     <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">
 
     {{-- FLOWBITE --}}
     <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
     <!-- TOOLTIP -->
     <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
     {{-- SUMMERNOTE --}}
     <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
 
     {{-- SUMMERNOTE --}}
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
         integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
     </script>
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
     {{-- ALPINE TOOLTIP --}}
     <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-tooltip@1.x.x/dist/cdn.min.js" defer></script>
 
     <link href="https://pagecdn.io/lib/easyfonts/fonts.css" rel="stylesheet" />
 
     {{-- QR CODE --}}
     <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
     <script src="https://unpkg.com/html5-qrcode"></script>
 
     {{-- CHARTS --}}
     <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
     @livewireChartsScripts



    @livewireStyles
    @livewireScripts
    @vite(['resources/css/app.css'])
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-100">

    {{-- <div class="flex w-full justify-center">
        <a href="/">
            <x-application-logo style="width: 150px; height: 150px;" class="fill-current text-gray-500" />
        </a>
    </div> --}}




    {{ $slot }}


    {{-- SCRIPTS --}}

    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        // Listen for storage events
        // window.addEventListener('storage', function(event) {
        //     if (event.key === 'user-logged-out' && event.newValue === 'true') {
        //         localStorage.removeItem('user-logged-out'); // Clean up
        //         window.location.href = '/'; // Redirect to the welcome page
        //     }
        // });
        window.addEventListener('storage', function(event) {
            if (event.key === 'user-logged-out') {
                localStorage.removeItem('user-logged-out'); // Clean up
                window.location.href = '/'; // Redirect to the welcome page
            }
        });


        // Check local storage on page load
        function checkSessionOnLoad() {
            if (localStorage.getItem('user-logged-out')) {
                localStorage.removeItem('user-logged-out'); // Clean up
                window.location.href = '/'; // Redirect to the welcome page
            }
        }

        // Run check on page load
        // checkSessionOnLoad();
    </script>


</body>

</html>
