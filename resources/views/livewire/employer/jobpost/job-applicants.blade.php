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
                        <div x-data="{
                            filter: @entangle('filter'),
                            activeFilter: 'text-gray-900 bg-gray-400 active',
                            inactiveFilter: 'bg-white hover:text-gray-700 hover:bg-gray-50',
                        }" x-init="$wire.set('filter', filter)">
                            <div class="sm:hidden">
                                <label for="tabs" class="sr-only">Select Filter</label>
                                <select id="tabs"
                                    class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option>All ({{ $applicants['total'] }})</option>
                                    <option>Pending ({{ $applicants['pending'] }})</option>
                                    <option>Interested ({{ $applicants['interested'] }})</option>
                                    <option>Interview ({{ $applicants['interested'] }})</option>
                                    <option>Pending ({{ $applicants['hired'] }})</option>
                                </select>
                            </div>
                            <ul
                                class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow sm:flex mb-3">
                                <li class="w-full focus-within:z-10">
                                    <button wire:click.prevent='changeFilter("ALL")'
                                        :class="filter === 'ALL' ? activeFilter : inactiveFilter"
                                        class="inline-block w-full p-4 border border-gray-200 rounded-l-lg"
                                        aria-current="page">All ({{ $applicants['total'] }})</button>
                                </li>
                                <li class="w-full focus-within:z-10">
                                    <button wire:click.prevent='changeFilter("PENDING")' href="#"
                                        :class="filter === 'PENDING' ? activeFilter : inactiveFilter"
                                        class="inline-block w-full p-4 border border-gray-200">Pending
                                        ({{ $applicants['pending'] }})</button>
                                </li>
                                <li class="w-full focus-within:z-10">
                                    <button wire:click.prevent='changeFilter("INTERESTED")' href="#"
                                        :class="filter === 'INTERESTED' ? activeFilter : inactiveFilter"
                                        class="inline-block w-full p-4 border border-gray-200">Interested
                                        ({{ $applicants['interested'] }})</button>
                                </li>
                                <li class="w-full focus-within:z-10">
                                    <button wire:click.prevent='changeFilter("INTERVIEW")' href="#"
                                        :class="filter === 'INTERVIEW' ? activeFilter : inactiveFilter"
                                        class="inline-block w-full p-4 border border-gray-200">Interview
                                        ({{ $applicants['interested'] }})</button>
                                </li>
                                <li class="w-full focus-within:z-10">
                                    <button wire:click.prevent='changeFilter("HIRED")' href="#"
                                        :class="filter === 'HIRED' ? activeFilter : inactiveFilter"
                                        class="inline-block w-full p-4 border border-gray-200">Hired
                                        ({{ $applicants['hired'] }})</button>
                                </li>
                                <li class="w-full focus-within:z-10">
                                    <button wire:click.prevent='changeFilter("REJECTED")' href="#"
                                        :class="filter === 'REJECTED' ? activeFilter : inactiveFilter"
                                        class="inline-block w-full p-4 border border-gray-200 rounded-r-lg">Rejected
                                        ({{ $applicants['hired'] }})</button>
                                </li>
                            </ul>
                        </div>


                        <div
                            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 mx-1">
                            <div>

                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative ">
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
                                    <input wire:model.live.prevent='applicantSearch' type="text"
                                        id="table-search-users"
                                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Search applicants">
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
                                    <th scope="col" class="px-6 py-3">
                                        PESO Status
                                    </th>
                                    @if ($filter === 'ALL')
                                        <th scope="col" class="px-6 py-3">
                                            Status
                                        </th>
                                    @endif
                                    <th scope="col" class="px-6 py-3">
                                        Documents
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
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
                                @else
                                    @foreach ($applicants['list'] as $data)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row"
                                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                                <img class="w-10 h-10 rounded-full"
                                                    src="{{ asset('assets/img/peso-1.png') }}" alt="Jese image">
                                                <div class="ps-3 text-wrap">
                                                    <div class="text-base font-semibold">
                                                        <a href="#"
                                                            class="hover:text-blue-500">{{ $data->employee->fname }}
                                                            {{ $data->employee->mname }} {{ $data->employee->lname }}
                                                        </a>
                                                    </div>
                                                    <div class="text-gray-500 font-medium text-xs">Applied date:
                                                        {{ $data->created_at->format('F j, Y') }}
                                                    </div>
                                                </div>

                                            </th>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    @if ($data->peso_Status === 'PENDING')
                                                        <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2"></div>
                                                        Pending
                                                    @elseif($data->peso_Status === 'RECOMMENDED')
                                                        {
                                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                                                        Pending
                                                        }
                                                    @elseif($data->peso_Status === 'NOT')
                                                        {
                                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div>
                                                        Not Recommended
                                                        }
                                                    @endif
                                                </div>
                                            </td>
                                            @if ($filter === 'ALL')
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        @if ($data->applicant_Status === 'PENDING')
                                                            <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2">
                                                            </div>
                                                            Pending
                                                        @elseif($data->applicant_Status === 'INTERESTED')
                                                            {
                                                            <div class="h-2.5 w-2.5 rounded-full bg-purple-500 me-2">
                                                            </div>
                                                            Pending
                                                            }
                                                        @elseif($data->applicant_Status === 'INTERVIEW')
                                                            {
                                                            <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2">
                                                            </div>
                                                            Not Recommended
                                                            }
                                                        @elseif($data->applicant_Status === 'HIRED')
                                                            {
                                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2">
                                                            </div>
                                                            Not Recommended
                                                            }
                                                        @elseif($data->applicant_Status === 'REJECTED')
                                                            {
                                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2">
                                                            </div>
                                                            Not Recommended
                                                            }
                                                        @endif
                                                    </div>
                                                </td>
                                            @endif
                                            <td class="px-6 py-4">
                                                <div class="flex flex-row gap-4 items-center">
                                                    <div x-data="{ tooltip: 'Download Resume' }">
                                                        <button x-tooltip="tooltip" type="button"
                                                            class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div x-data="{ tooltip: 'Download Recommendation Letter' }">
                                                        <button x-tooltip="tooltip" type="button"
                                                            class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                                            </svg>

                                                        </button>
                                                    </div>


                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex flex-row gap-4 items-center">

                                                    <div x-data="{ tooltip: 'Interested' }">
                                                        <button x-tooltip="tooltip" type="button"
                                                            class="text-purple-700 border border-purple-700 hover:bg-purple-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <div x-data="{ tooltip: 'For Interview' }">
                                                        <button x-tooltip="tooltip" type="button"
                                                            class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <div x-data="{ tooltip: 'Hire' }">
                                                        <button x-tooltip="tooltip" type="button"
                                                            class="text-green-700 border border-green-700 hover:bg-green-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>

                                                        </button>
                                                    </div>

                                                    <div x-data="{ tooltip: 'Reject' }">
                                                        <button x-tooltip="tooltip" type="button"
                                                            class="text-red-700 border border-red-700 hover:bg-red-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>

                                                        </button>
                                                    </div>

                                                </div>


                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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
