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

    <!-- Scripts -->
    @livewireStyles
    @livewireScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    @include('layouts.navigation')

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-application-logo style="width: 150px; height: 150px;" class="fill-current text-gray-500" />
            </a>
        </div>


        <div {{ $attributes }}
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            {{ $slot }}

        </div>
    </div>
    <script>
        // Listen for storage events
        window.addEventListener('storage', function(event) {
            if (event.key === 'user-logged-out' && event.newValue === 'true') {
                localStorage.removeItem('user-logged-out'); // Clean up
                window.location.href = '/'; // Redirect to the welcome page
            }
        });

        // Check local storage on page load
    </script>
    {{-- <script>
        function checkSessionOnLoad() {
            if (localStorage.getItem('user-logged-out')) {
                localStorage.removeItem('user-logged-out'); // Clean up
                window.location.href = '/'; // Redirect to the welcome page
            }
        }

        // Run check on page load
        checkSessionOnLoad();
    </script> --}}
</body>

</html>
