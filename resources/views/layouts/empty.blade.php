<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/PESO-Logo.png') }}">

    <title>{{ config('app.name', 'PESO') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- ICON --}}
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">

    {{-- FLOWBITE-CSS --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    {{-- TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-tooltip@1.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />


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
</body>

</html>
