<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'PESO') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<style>
    .highlighted-section {
        background-color: #428bca;
        /* Change the background color to highlight */
        /* Add any other styling for highlighting */
    }
</style>
<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:;">
        @csrf
        <a :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();" id="logout-link"
            class="ml-4 font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Logout</a>

    </form>

</div>

<body class="font-sans">
    <div class="min-h-screen flex flex-col text-gray-900 antialiased bg-gray-100">
        <div class="flex flex-col justify-center items-center">
            <a href="/">
                <x-application-logo style="width: 150px; height: 150px;" class="fill-current text-gray-500" />
            </a>

            <h1 class="text-3xl p-6">Enconde your Company Profile</h1>
        </div>

        <div class="flex flex-row justify-center mb-10">
            <ul class="border border-gray-200 rounded overflow-hidden shadow-md">
                <li
                    class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out highlighted-section">
                    Employer Details</li>
                <li
                    class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                    Contact Details</li>
                <li
                    class="section-item px-4 py-2 bg-white hover:bg-sky-100 hover:text-sky-900 border-b last:border-none border-gray-200 transition-all duration-300 ease-in-out">
                    Certification And Authorization</li>
            </ul>
            <div class="w-full max-w-7xl px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form id="registrationForm" method="POST" action="{{ route('postEmployer') }}"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- APPLICANT NAME --}}
                    <div class="section employerDetails-section" style="display: block" id="section-1">
                        @include('fill.partials.employer-details')
                    </div>


                    {{-- //PERSONAL INFORMATION --}}
                    <div class="section comapnyContact-section" style="display: none;" id="section-2">
                        @include('fill.partials.company-contact')

                    </div>

                    {{-- employment status --}}
                    <div class="section employmentStatus-section" style="display: none;" id="section-3">
                        @include('fill.partials.confirm-company')
                    </div>



                </form>
            </div>

        </div>
        {{-- dont delete --}}
    </div>

    </div>

</body>















<script>
    // Function to switch to the next section
    function nextSection(sectionnum) {
        // Hide all sections
        var allSections = document.querySelectorAll('[id^="section-"]');
        for (var i = 0; i < allSections.length; i++) {
            allSections[i].style.display = 'none';
        }

        // Show the specified section
        var sectionToShow = document.getElementById('section-' + sectionnum);
        if (sectionToShow) {
            sectionToShow.style.display = 'block'; // or 'flex', 'grid', etc. depending on your layout

            // Highlight the current section in the list
            highlightCurrentSection(sectionnum);
        }
    }

    // Function to highlight the current section in the list
    function highlightCurrentSection(sectionnum) {
        // Remove highlighting from all list items
        var allSections = document.querySelectorAll('.section-item');
        for (var i = 0; i < allSections.length; i++) {
            allSections[i].classList.remove('highlighted-section');
        }

        // Add highlighting to the current section item
        var currentSectionItem = document.querySelector('.section-item:nth-child(' + sectionnum + ')');
        if (currentSectionItem) {
            currentSectionItem.classList.add('highlighted-section');
        }
    }
</script>
