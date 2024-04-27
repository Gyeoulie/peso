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


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 flex flex-col min-h-screen">
    {{-- < class=""> --}}
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
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
    


    <div class="flex flex-row">
        @include('dashboard.admin_partials.admin-navbar')

        <div class="container mx-10 py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">
                <div class="col-span-4 sm:col-span-12">
                    <h1 class="text-2xl font-bold">Job Posting Overview</h1>
                </div>
                <div class="col-span-4 sm:col-span-12">
                    <div class="bg-white shadow rounded-lg p-6 flex flex-col">

                        <div class="flex flex-row w-full justify-end">
                            <h1 class="text-sm font-light ml-auto mr-5 mt-1 mb-auto">April 28, 2024</h1>
                        </div>
                        <div class="flex flex-row w-full items-center">
                            <img src="https://randomuser.me/api/portraits/men/94.jpg"
                                class="w-32 h-32 bg-gray-300 rounded-lg shrink-0">

                            </img>
                            <div class="flex flex-col ml-4">
                                <h1 class="text-xl sm:text-3xl font-bold">National University</h1>
                                <p class="text-sm sm:text-lg text-gray-700">SM Baliwag
                                    Complex, Doña
                                    Remedios Trinidad, Highway, Brgy. Pagala, Baliuag, Bulacan 3006</p>
                            </div>
                            <h1 class="hidden sm:block text-lg font-light ml-auto mr-5 mt-1 mb-auto">April 28, 2024</h1>
                        </div>

                    </div>
                </div>

                <div class="col-span-4 sm:col-span-6">
                    <div class="bg-white shadow rounded-lg p-6 flex flex-col">

                        <h1 class="text-3xl font-bold">Job Posting Description</h1>
                        <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">
                            <div class="flex flex-col w-full">

                                <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                    Title
                                </x-input-label>
                                <x-text-input id="fname" class="block mt-1 w-full" type="text"
                                    name="fnamePost" />
                            </div>
                            <div class="flex flex-col w-full">

                                <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                    Industry
                                </x-input-label>
                                <x-text-input id="fname" class="block mt-1 w-full" type="text"
                                    name="fnamePost" />
                            </div>

                        </div>


                        <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">
                            <div class="flex flex-col ml w-full">
                                <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i>
                                    Educational Attainment
                                </x-input-label>
                                <select id="suffix" name="suffixPost" class="block mt-1 w-full rounded">
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="mr">None</option>
                                    <option value="mrs">Full-Time</option>
                                    <option value="ms">Contractual/Part-Time</option>

                                </select>
                            </div>

                            <div class="flex flex-col sm:flex-col ml w-full">
                                <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Employment Type
                                </x-input-label>
                                <select id="suffix" name="suffixPost" class="block mt-1 w-full rounded">
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="mr">None</option>
                                    <option value="mrs">Full-Time</option>
                                    <option value="ms">Contractual/Part-Time</option>

                                </select>
                            </div>

                        </div>

                        <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">
                            <div class="flex flex-col w-full">

                                <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Wage Range
                                </x-input-label>
                                <x-text-input id="fname" class="block mt-1 w-full" type="text"
                                    name="fnamePost" />
                            </div>

                            <div class="flex flex-col w-full">

                                <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                    Posting Duration
                                </x-input-label>
                                <x-text-input id="fname" class="block mt-1 w-full" type="text"
                                    name="fnamePost" />
                            </div>
                            <div class="flex flex-col w-1/3">

                                <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job Slots
                                </x-input-label>
                                <x-text-input id="fname" class="block mt-1 w-full" type="text"
                                    name="fnamePost" />

                            </div>

                        </div>



                    </div>
                </div>


                {{-- peso accept --}}
                <div class="hidden sm:block col-span-4 sm:col-span-6">
                    <div class="bg-white shadow rounded-lg p-6 flex flex-col">
                        <h1 class="text-3xl font-bold">PESO Evaluation Form</h1>
                        <div class="flex flex-row mt-4 w-full gap-4">
                            <div class="flex flex-col w-full">
                                <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Remarks
                                </x-input-label>
                                <textarea id="message" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Write your thoughts here..."></textarea>
                            </div>
                        </div>

                        <div class="flex flex-row w-full justify-end mt-4">
                            <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none" style="width: 100px;">Reject</button>
                            <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none" style="width: 100px;">Approve</button>
                        </div>
                    </div>
                </div>



                <div class="col-span-4 sm:col-span-6">
                    <div class="bg-white shadow rounded-lg p-6 flex flex-col">

                        <h1 class="text-3xl font-bold">Job Posting Details</h1>
                        <div class="flex flex-row mt-4 w-full gap-4">
                            <div class="flex flex-col w-full">
                                <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                    Description
                                </x-input-label>
                                <textarea id="message" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Write your thoughts here..."></textarea>
                            </div>
                        </div>
                        <div class="flex flex-row mt-4 w-full gap-4">
                            <div class="flex flex-col w-full">
                                <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                    Qualification
                                </x-input-label>
                                <textarea id="message" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Write your thoughts here..."></textarea>
                            </div>
                        </div>
                        <div class="flex flex-row mt-4 w-full gap-4">
                            <div class="flex flex-col w-full">
                                <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                    Company Remarks
                                </x-input-label>
                                <textarea id="message" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Write your thoughts here..."></textarea>
                            </div>
                        </div>


                        <div class="sm:hidden col-span-4 sm:col-span-6">
                            <div class="bg-white shadow rounded-lg p-6 flex flex-col">
                                <h1 class="text-3xl font-bold">PESO Evaluation Form</h1>
                                <div class="flex flex-row mt-4 w-full gap-4">
                                    <div class="flex flex-col w-full">
                                        <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Remarks
                                        </x-input-label>
                                        <textarea id="message" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Write your thoughts here..."></textarea>
                                    </div>
                                </div>
        
                                <div class="flex flex-row w-full justify-end mt-4">
                                    <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none" style="width: 100px;">Reject</button>
                                    <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none" style="width: 100px;">Approve</button>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>










    </div>



</body>
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

</html>
