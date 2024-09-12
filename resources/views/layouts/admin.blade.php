<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/PESO-Logo.png') }}">


    <title>{{ config('app.name', 'PESO') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">


    <link href="https://fonts.bunny.net/css?family=ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <link href="https://pagecdn.io/lib/easyfonts/fonts.css" rel="stylesheet" />

    {{-- TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-tooltip@1.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />

    {{-- SUMMERNOTE --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode"></script>

    <!-- Scripts -->
    @livewireScripts
    @livewireStyles
    @vite(['resources/css/app.css'])
    @livewireChartsScripts
</head>

<body class="font-sans antialiased bg-gray-100 flex flex-col min-h-screen">
    {{-- < class=""> --}}
    @include('layouts.navigation')

    <!-- Page Heading -->
    {{-- @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <div class="sm:hidden text-center">
        <button
            class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
            type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
            aria-controls="drawer-navigation">
            Admin Navigation
        </button>
    </div>

 --}}

    <div class="flex flex-row">
        @include('admin.admin_partials.admin-navbar')




        {{ $slot }}




    </div>










</body>
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

</html>
