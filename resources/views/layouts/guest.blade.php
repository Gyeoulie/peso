<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PESO') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
{{-- 
    <style>
        .custom-btn {
            width: 5rem;
            height: 5rem;
            background-color: white;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border-radius: 9999px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.75rem;
            /* Equivalent to text-xs in Tailwind CSS */
            text-align: center;
            transition: background-color 0.3s;
        }

        .custom-btn:hover {
            background-color: #4299e1;
            /* Equivalent to bg-sky-700 in Tailwind CSS */
        }
    </style> --}}

</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-application-logo style="width: 150px; height: 150px;" class="fill-current text-gray-500" />
            </a>
        </div>
        {{-- <span class="text-5xl text-blue-500">Complete Details</span>
        <div class="flex flex-wrap space-x-8">
            <div class="custom-btn hover:bg-sky-700">Applicant Name</div>
            <div class="custom-btn">Personal Information</div>
            <div class="custom-btn">Employment Status</div>
            <div class="custom-btn">Job preferences</div>
            <div class="custom-btn">Language/Dialects</div>
            <div class="custom-btn">Educational Background</div>
            <div class="custom-btn">Certification/Training</div>
            <div class="custom-btn">Eligibility/License</div>
            <div class="custom-btn">Work experience</div>
            <div class="custom-btn">Other Skills</div>
            <div class="custom-btn">Certification/Authorization</div>
        </div> --}}
        
        <div {{ $attributes }}
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            {{ $slot }}

        </div>
    </div>
</body>

</html>
