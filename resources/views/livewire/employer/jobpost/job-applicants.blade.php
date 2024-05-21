<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Applicants') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-4 sm:grid-cols-12 mt-4 mx-8 p-0 sm:p-6 gap-5">
        <div class="col-span-4 sm:col-span-5">

            <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>

                    {{-- SEARCH --}}
                    <input type="text" id="table-search-users"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search for applications">
                </div>
                <div>

                    {{-- DROP DOWN BUTTON --}}
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5"
                        type="button">
                        <span class="sr-only">Action button</span>
                        Filter
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownActionButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Reward</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Promote</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Activate
                                    account</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete
                                User</a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="">
                <tbody class="">
                    @if ($jobs->isEmpty())
                        <tr>
                            <div class="w-full bg-white shadow rounded-lg p-10">
                                <div class="flex flex-col items-center justify-center  ">
                                    <div class="p-6 bg-gray-100 rounded-full">
                                        <svg class="w-24 h-24 text-black" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                        </svg>

                                    </div>
                                    <p class="text-xl font-bold text-black text-center mt-2">
                                        No Job Posting Found!
                                    </p>
                                </div>
                            </div>

                        </tr>
                    @else
                        @foreach ($jobs as $data)
                            <tr>
                                <a wire:click.prevent='getJob({{ $data->job_id }})' class="cursor-pointer">
                                    <div
                                        class="bg-white shadow rounded-lg p-6 flex flex-col mb-4 hover:scale-105 transition-transform">

                                        <div class="flex flex-row">

                                            <div class="flex flex-col  w-full">
                                                <h1 class="text-3xl font-bold underline">{{ $data->job_Title }}</h1>
                                                <h1 class="text-l text-gray-600">{{ $data->company->bussines_Name }}
                                                </h1>
                                                <div class="flex flex-row">

                                                </div>

                                            </div>
                                            <div class="flex w-full justify-end  ml-auto mr-0 mb-auto mt-0">
                                                <span
                                                    class="bg-gray-100 text-gray-800 text-md font-medium   items-center px-2.5 py-0.5 rounded me-2 border border-gray-500 ">
                                                    PESO {{ $data->municipality->municipality_Name }}
                                                </span>
                                            </div>
                                        </div>


                                        <div class="flex flex-row">
                                            <p class="mb-2 font-bold">Applicants:</p>
                                            <p class="ms-4">{{ $data->job_applicants_count }}</p>
                                        </div>


                                        <div class="flex flex-col w-full mt-4">
                                            <div class="flex flex-col md:flex-row">
                                                <div class="md:w-1/4 text-left">

                                                    <h3 class="text-sm uppercase"> <i
                                                            class="fa-solid fa-location-dot"></i>
                                                        {{ $data->barangay->municipality->municipality_Name }},
                                                        {{ $data->barangay->municipality->province->province_Name }}
                                                </div>
                                                <div class="md:w-1/4 text-left md:text-center uppercase">
                                                    <h3 class="text-sm"> <i class="fa-solid fa-graduation-cap"></i>
                                                        {{ $eduLevels[$data->job_Edu] }}</h3>
                                                </div>
                                                <div class="md:w-1/4 text-left md:text-center">
                                                    <h3 class="text-sm uppercase"> <i class="fa-solid fa-briefcase"></i>
                                                        {{ $data->job_Type == 1 ? 'Full Time' : 'Part Time' }}
                                                    </h3>
                                                </div>
                                                <div class="md:w-1/4 text-left md:text-center">
                                                    <h3 class="text-sm uppercase"> <i class="fa-solid fa-calendar"></i>
                                                        {{ $data->created_at->format('F j, Y') }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>

        <div class="col-span-4 sm:col-span-7">
            @if ($applicants)
                <div class="bg-white shadow rounded-lg p-6 flex flex-col">


                    <div class="relative overflow-x-auto ">
                        <div class="sm:hidden">
                            <label for="tabs" class="sr-only">Select Filter</label>
                            <select id="tabs"
                                class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option>All</option>
                                <option>Pending (2)</option>
                                <option>Interested (2)</option>
                                <option>Pending (1)</option>
                            </select>
                        </div>
                        <ul
                            class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex mb-3">
                            <li class="w-full focus-within:z-10">
                                <a href="#"
                                    class="inline-block w-full p-4 text-gray-900 bg-gray-400 border border-gray-200 rounded-s-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none"
                                    aria-current="page">All ({{ $applicants['total'] }})</a>
                            </li>
                            <li class="w-full focus-within:z-10">
                                <a href="#"
                                    class="inline-block w-full p-4 bg-white border border-gray-200  hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none ">Pending
                                    ({{ $applicants['pending'] }})</a>
                            </li>
                            <li class="w-full focus-within:z-10">
                                <a href="#"
                                    class="inline-block w-full p-4 bg-white border border-gray-200  hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none ">Interested
                                    ({{ $applicants['interested'] }})</a>
                            </li>
                            <li class="w-full focus-within:z-10">
                                <a href="#"
                                    class="inline-block w-full p-4 bg-white border border-gray-200  hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none">
                                    Hired({{ $applicants['hired'] }})</a>
                            </li>

                        </ul>

                        <div
                            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">
                            <div>

                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>

                                    {{-- SEARCH --}}
                                    <input type="text" id="table-search-users"
                                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Search for users">
                                </div>
                            </div>

                            {{-- DROP DOWN BUTTON --}}
                            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction2"
                                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5"
                                type="button">
                                <span class="sr-only">Action button</span>
                                Sort by Date
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownAction2"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownActionButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Newest to
                                            Oldest</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Oldest to
                                            Newest</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- TABLE --}}
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-1/4">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-1/6">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-1/6">
                                        Date Applied
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-1/6">
                                        View
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($applicants['list']) && count($applicants['list']) === 0)
                                    <tr>
                                        <td colspan="4">
                                            <div class="flex flex-col items-center justify-center mt-10">
                                                <div class="p-6 bg-gray-100 rounded-full">
                                                    <svg class="w-24 h-24 text-black" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2"
                                                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                                    </svg>

                                                </div>
                                                <p class="text-xl font-bold text-black text-center mt-2 mb-20">
                                                    No Applicants Found
                                                </p>
                                            </div>

                                        </td>
                                    </tr>
                                @endif
                                @foreach ($applicants['list'] as $data)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ asset('assets/img/peso-1.png') }}" alt="Jese image">
                                            <div class="ps-3 text-wrap">
                                                <div class="text-base font-semibold">{{ $data->employee->fname }}
                                                    {{ $data->employee->mname }} {{ $data->employee->lname }}
                                                </div>
                                            </div>

                                        </th>

                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                                                {{ $data->applicant_Status }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-base font-semibold">
                                                {{ $data->created_at->format('F j, Y') }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="font-medium text-blue-600 hover:underline">View
                                                Info</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- pagination --}}
                    <div>

                    </div>


                </div>
            @endif
        </div>
    </div>
