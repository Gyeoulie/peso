<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PESO') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">


    <link href="https://fonts.bunny.net/css?family=ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />


    <link href="https://pagecdn.io/lib/easyfonts/fonts.css" rel="stylesheet" />

    <!-- Scripts -->
    @livewireScripts
    @livewireStyles
    @vite(['resources/css/app.css'])
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

</html>
