<div class="container mx-auto py-8">
    <style>
        #QrScanner {
            position: relative;
            /* Adjust as needed */
            width: 100%;
            /* Make sure it fits within the modal */
            height: 400px;
            /* Set a specific height if necessary */
            z-index: 10;
            /* Ensure it's above the modal background but below other modal content */
        }
    </style>
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

        <div class="col-span-4 sm:col-span-12">

            {{-- TITLE --}}
            <h1 class="text-2xl font-bold">Training \ Training List \ Registrants</h1>
        </div>


        <div class="col-span-4 px-2 sm:px-0">
            <div class="bg-white shadow rounded-lg p-6">

                <div class="flex flex-col justify-center items-center">
                    {{-- COMPANY IMAGE --}}
                    {{-- <img src="{{ asset('storage/' . $programInfo->program_pubmat) }}"
                        class="w-32 h-32 bg-gray-300 rounded-md mb-4  shrink-0 object-cover shadow-xl">


                    </img> --}}

                    <h1 class="text-3xl text-blue-500 font-bold text-center">{{ $programInfo->program_Title }}
                    </h1>

                    <div class="flex flex-row mt-6 justify-between w-full">
                        <p class="text-md text-gray-800">{{ $programInfo->program_Type }}</p>
                        <p class="text-sm text-gray-800">{{ $programInfo->created_at->format('F j, Y') }}</p>
                    </div>

                </div>

                {{-- DIVIDER --}}
                <hr class="my-6 border-t border-gray-300">

                <div class="flex flex-col">
                    {{-- JOB POSTING INFORMATION --}}
                    <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Event
                        Details</span>



                    <ul>
                        <div class="flex flex-row justify-between">
                            <li class="mb-2 font-bold">Program Host:</li>
                            <p class="ms-4">{{ $programInfo->program_Host }}</p>
                        </div>
                        <div class="flex flex-row justify-between">
                            <li class="mb-2 font-bold">Slots Remaining:</li>
                            <p class="ms-4">10</p>
                        </div>
                        <div class="flex flex-row justify-between">
                            <li class="mb-2 font-bold">Registratin Deadline:</li>
                            <p class="ms-4">{{ $programInfo->program_Deadline->format('F j, Y') }}</p>
                        </div>

                        @if ($programInfo->program_Datetime)
                            <div class="flex flex-row justify-between">
                                <li class="mb-2 font-bold">Program Date:</li>
                                <span>
                                    <p class="ms-4">{{ $programInfo->program_Datetime > format('F j, Y') }}</p>
                                    <p class="ms-4">{{ $programInfo->program_Datetime->format('g:i A') }}</p>
                                </span>

                            </div>
                        @endif
                        <div class="flex flex-row justify-between">
                            <li class="mb-2 font-bold">Industry Tag</li>
                            <p class="ms-4">{{ $programInfo->job_industry->industry_Title }}</p>
                        </div>

                        <div class="flex flex-row justify-between">
                            <li class="mb-2 font-bold">Program Status:</li>
                            <p class="ms-4">{{ $programInfo->program_Status }}</p>
                        </div>

                        <div class="flex flex-row justify-between">
                            <li class="mb-2 font-bold">Location:</li>
                            <p class="ms-4">{{ $programInfo->program_Location }}</p>
                        </div>

                    </ul>

                    {{-- JOB POST LINK --}}
                    <div class="mt-6 flex flex-wrap justify-center">
                        <a wire:navigate href="{{ route('admin-view-training', ['id' => $programInfo->program_id]) }}"
                            class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded">View Training Details</a>
                    </div>

                </div>

            </div>


            <div class="bg-white shadow rounded-lg p-6 mt-4">

                <div class="flex flex-row w-full gap-4">

                    <div class="flex flex-col w-full">
                        <x-input-label for="fname"> </i> Job Position
                            Tags
                        </x-input-label>
                        <hr class="h-px my-4  bg-gray-200 border-0 dark:bg-gray-700">

                        {{-- JOB TAG CONTAINER --}}
                        <div id= "otherSkillRow" class="flex-inline p-1 mt-2">

                            @foreach ($programInfo->program_tags as $jobtags)
                                <span
                                    class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 px-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500 ">
                                    {{ $jobtags->job_positions->position_Title }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>


        </div>



        {{-- CONTAINER FOR TABS --}}
        <div class="col-span-4 sm:col-span-8 px-2 sm:px-0" x-data="{
            selectedJobseeker: @entangle('selectedJobseeker')
        }">
            {{-- APPLICATION LIST CONTAINER --}}
            <div x-show="!selectedJobseeker" class="bg-white shadow rounded-lg p-6"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100">
                <div class="flex flex-row justify-between">
                    <h1 class="text-lg sm:text-2xl font-bold mb">Registrant List</h1>
                    {{-- <h1 class="text-lg sm:text-2xl font-bold mb">Registered: {{ $programInfo->program_reg_count }}</h1> --}}
                    <x-primary-button wire:click.prevent='scanQr'>QR Code</x-primary-button>

                </div>
                <hr class="h-px my-4  bg-gray-200 border-0 dark:bg-gray-700">

                <div class="relative ">
                    <div class="flex flex-col sm:flex-row justify-between gap-2 w-full">
                        <div
                            class="flex items-center flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 mr-1 p-1">

                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>

                                {{-- SEARCH --}}
                                <input wire:model.live='search' type="text" id="table-search-users"
                                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Search for Applicants">
                            </div>
                        </div>

                        <div class="flex flex-row gap-2">
                            <x-dropdown align="left" width="[150px]">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                                        <div>
                                            {{ $filter }}
                                        </div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>


                                <x-slot name="content">
                                    <x-slot name="contentClasses">
                                        max-h-[300px] bg-white
                                    </x-slot>

                                    <x-dropdown-link class="cursor-pointer" wire:click.prevent="changeFilter('All')">
                                        All
                                    </x-dropdown-link>
                                    <x-dropdown-link class="cursor-pointer"
                                        wire:click.prevent="changeFilter('Registered')">
                                        Registered
                                    </x-dropdown-link>
                                    <x-dropdown-link class="cursor-pointer"
                                        wire:click.prevent="changeFilter('Completed')">
                                        Completed
                                    </x-dropdown-link>
                                    <x-dropdown-link class="cursor-pointer" wire:click.prevent="changeFilter('Others')">
                                        Others
                                    </x-dropdown-link>




                                </x-slot>
                            </x-dropdown>
                            <x-dropdown align="left" width="[150px]">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                                        <div>
                                            {{ $sortDate === 'ASC' ? 'Oldest' : ($sortDate == 'DESC' ? 'Newest' : 'Sort by Date') }}

                                        </div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-slot name="contentClasses">
                                        max-h-[300px] bg-white
                                    </x-slot>

                                    <x-dropdown-link class="cursor-pointer" wire:click.prevent="updateSort('DESC')">
                                        Newest
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <x-dropdown-link class="cursor-pointer" wire:click.prevent="updateSort('ASC')">
                                        Oldest
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </div>

                    </div>

                    {{-- APPLICANT LIST TABLE --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Registered Date
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($programRegistrants->isEmpty())
                                    <tr>
                                        <td colspan="6">
                                            <div class="flex flex-col justify-center items-center mt-20 mb-20">
                                                <div class="flex  bg-gray-100 rounded-full p-1">
                                                    <svg class="w-16 h-16 text-black" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M21 21l-3.5-3.5m0 0a7 7 0 1 1-9-10.5 7 7 0 0 1 9 10.5z" />
                                                    </svg>
                                                </div>

                                                <div class="text-center text-black text-xl font-semibold mt-2">
                                                    No Registrants Found
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                @else
                                    @foreach ($programRegistrants as $data)
                                        <tr wire:key='reg-{{ $data->program_reg_id }}'
                                            class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row"
                                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                                <img class="w-10 h-10 rounded-full"
                                                    src="{{ asset('storage/' . $data->employee->pimg) }}"
                                                    alt="user-{{ $data->employee->employee_id }}">
                                                <div class="ps-3 text-wrap">
                                                    <div class="text-base font-semibold">{{ $data->employee->fname }}
                                                        {{ $data->employee->lname }}
                                                    </div>
                                                    <div class="font-normal text-gray-500 text-sm uppercase">
                                                        {{ $data->employee->barangay->barangay_Name }},
                                                        {{ $data->employee->barangay->municipality->municipality_Name }}
                                                    </div>
                                                </div>

                                            </th>
                                            <td class="px-6 py-4">
                                                <div class="flex flex-col  text-base  uppercase">
                                                    <span> {{ $data->created_at->format('g:i A') }}</span>
                                                    <span> {{ $data->created_at->format('F j, Y') }}</span>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4">
                                                <div class="text-base text-sm">

                                                    @if ($data->program_reg_Status == 'REGISTERED')
                                                        <span
                                                            class="inline-flex items-center rounded-md bg-yellow-200 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">REGISTERED</span>
                                                    @elseif ($data->program_reg_Status == 'COMPLETED')
                                                        <span
                                                            class="inline-flex items-center rounded-md bg-green-200 px-2 py-1 text-sm font-medium text-green-800 ring-1 ring-inset ring-green-600/20">COMPLETED</span>
                                                    @elseif ($data->program_reg_Status == 'REJECTED')
                                                        <span
                                                            class="inline-flex items-center rounded-md bg-red-200 px-2 py-1 text-sm font-medium text-red-800 ring-1 ring-inset ring-red-600/20">REJECTED</span>
                                                    @endif

                                                </div>
                                            </td>
                                            <td class="px-6 py-4 ">
                                                <div x-data="{ tooltip: 'View Information' }">
                                                    <button
                                                        wire:click.prevent="getJobseeker({{ $data->program_reg_id }})"
                                                        x-tooltip="tooltip" type="button"
                                                        class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- PAGINATION --}}

                <div>
                    {{ $programRegistrants->links('vendor.livewire.tailwind') }}
                </div>
            </div>



            <div x-show="selectedJobseeker" class="bg-white shadow rounded-lg p-6 flex flex-col"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100" x-cloak>
                @if ($selectedJobseeker)
                    <div class="flex flex-row items-center gap-4">
                        <button @click="selectedJobseeker = null">
                            <div class="flex items-center rounded-full hover:bg-gray-300 transition-transform p-1">
                                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </div>
                        </button>
                        <h2 class="text-lg sm:text-2xl font-bold">Job Seeker Information</h2>

                    </div>
                    <div class="px-2">
                        <div class="flex flex-row mt-2">
                            <div class="flex flex-col items-center">
                                <img src="{{ asset('storage/' . $jobseekerInfo->employee->pimg) }}"
                                    class="flex w-[190px] h-[150px] bg-gray-300 object-cover rounded-lg shrink-0 grow-0">
                                </img>
                            </div>
                            <div class="flex flex-col ml-4  justify-center">
                                <h1 class="text-2xl sm:text-4xl  font-bold">
                                    {{ $jobseekerInfo->employee->fname }} {{ $jobseekerInfo->employee->mname }}
                                    {{ $jobseekerInfo->employee->lname }}
                                </h1>
                                <h1 class="text-lg text-gray-600">
                                    {{ $jobseekerInfo->employee->barangay->municipality->municipality_Name }},
                                    {{ $jobseekerInfo->employee->barangay->municipality->province->province_Name }}
                                </h1>

                            </div>
                            <div class="hidden sm:flex flex-row ml-auto mr-0 mb-auto mt-0">
                                @if ($isMatch === true)
                                    <span
                                        class="inlineflex items-center rounded-md bg-green-200 px-2 py-1 text-sm font-medium text-green-800 ring-1 ring-inset ring-green-600/20">MATCHES</span>
                                @else
                                    <span
                                        class="inlineflex items-center rounded-md bg-yellow-200 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">NOT
                                        MATCH</span>
                                @endif
                            </div>
                        </div>
                        <hr class="mt-4">
                        <div class="flex flex-col mt-4">

                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Jobseeker
                                Details</span>

                            <ul>

                                <div class="flex flex-row">
                                    <li class="mb-2 font-bold">Date Registered:</li>
                                    <p class="ms-4">
                                        {{ $jobseekerInfo->created_at->format('F j, Y') }}
                                    </p>
                                </div>
                                <div class="flex flex-row ">
                                    <li class="mb-2 font-bold">Employment Status:</li>
                                    <p class="ms-4">
                                        @if ($jobseekerInfo->employee->empstatus == 1)
                                            Employed
                                        @else
                                            Unemployed
                                        @endif



                                    </p>
                                </div>
                                @if ($jobseekerInfo->responded_at)
                                    <div class="flex flex-row ">
                                        <li class="mb-2 font-bold">Confirmed Date:</li>
                                        <p class="ms-4">
                                            <span> {{ $jobseekerInfo->responded_at->format('g:i A') }}</span>
                                            <span> {{ $jobseekerInfo->responded_at->format('F j, Y') }}</span>
                                        </p>
                                    </div>
                                @endif


                                <div class="flex flex-row ">
                                    <p class="ms-4">

                                        {{-- @if ($applicantInfo->peso_Status === 'PENDING')
                                        Pending
                                    @elseif($applicantInfo->peso_Status === 'RECOMMENDED')
                                        Recommended
                                    @elseif($applicantInfo->peso_Status === 'REJECT')
                                        Not Recommended
                                    @endif --}}

                                    </p>
                                </div>
                                <div class="flex flex-col w-full mt-1">
                                    <li class="mb-1 font-bold">Industry Preference:</li>
                                    {{-- BADGE CONTAINER --}}
                                    <div id= "otherSkillRow" class="flex-inline p-1">
                                        {{-- BADGE --}}

                                        @foreach ($jobseekerInfo->employee->industry_preference as $industryPref)
                                            <span wire:key='skills-{{ $industryPref->industry_preference_id }}'
                                                class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-2 ps-3 pe-3 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                {{ $industryPref->job_industry->industry_Title }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="flex flex-col w-full mt-1">
                                    <li class="mb-1 font-bold">Job Preference:</li>
                                    {{-- BADGE CONTAINER --}}
                                    <div id= "otherSkillRow" class="flex-inline p-1">
                                        {{-- BADGE --}}

                                        @foreach ($jobseekerInfo->employee->job_preference as $jobPref)
                                            <span wire:key='skills-{{ $jobPref->job_preference_id }}'
                                                class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-2 ps-3 pe-3 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                {{ $jobPref->job_positions->position_Title }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flex flex-col w-full mt-1">
                                    <li class="mb-1 font-bold">Skills:</li>
                                    {{-- BADGE CONTAINER --}}
                                    <div id= "otherSkillRow" class="flex-inline p-1">
                                        {{-- BADGE --}}

                                        @foreach ($jobseekerInfo->employee->skills as $empSkills)
                                            <span wire:key='skills-{{ $empSkills->skills_id }}'
                                                class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-2 ps-3 pe-3 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                {{ $empSkills->skill_Type }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>


                            </ul>

                            @if ($jobseekerInfo->program_reg_Status == 'REGISTERED')
                                <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                    <div x-data="{ tooltip: 'View Resume' }">
                                        <x-danger-button
                                            wire:click.prevent="confirmReg('REJECTED', {{ $jobseekerInfo->program_reg_id }})"
                                            x-tooltip="tooltip" type="button">Reject</x-danger-button>


                                    </div>

                                    <div x-data="{ tooltip: 'View Recommendation Letter' }">

                                        <x-green-button
                                            wire:click.prevent="confirmReg('COMPLETED', {{ $jobseekerInfo->program_reg_id }})"
                                            x-tooltip="tooltip" type="button">Confirm</x-green-button>
                                    </div>

                                </div>
                            @endif

                            <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                <div x-data="{ tooltip: 'View Profile' }">
                                    <a a wire:navigate
                                        href="{{ route('jobseeker.profile', ['id' => $jobseekerInfo->employee->employee_id]) }}"
                                        x-tooltip="tooltip" type="button"
                                        class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">

                                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                @endif
            </div>
        </div>






    </div>


    <x-modal name="qr-scanner-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Scan a QR Code') }}
            </h2>
            <hr>
            <div class="flex flex-col w-full h-full items-center my-4">
                <div id="QrScanner" class="flex h-full"></div>
            </div>
            <div class="mt-6 flex justify-between">
                <x-secondary-button wire:click.prevent='qrStop'>
                    {{ __('Cancel') }}
                </x-secondary-button>


            </div>
        </div>
    </x-modal>
</div>


<script>
    let qrCodeScanner = null;

    Livewire.on('startScanner', () => {
        // Initialize the Html5Qrcode instance if not already initialized
        if (!qrCodeScanner) {
            qrCodeScanner = new Html5Qrcode("QrScanner");

            qrCodeScanner.start({
                    facingMode: "environment"
                }, // Camera facing mode
                {
                    fps: 10, // Frames per second to scan the QR code
                    qrbox: {
                        width: 250,
                        height: 250
                    } // Size of the scanning box
                },
                (decodedText, decodedResult) => {
                    console.log("QR Code detected: ", decodedText);
                    Livewire.dispatch('qrCodeScanned', {
                        decodedText: decodedText
                    });

                    // Stop the scanner after a successful scan
                    qrCodeScanner.stop().then(() => {
                        console.log("QR Code scanner stopped.");
                        qrCodeScanner = null; // Clear the reference to the instance

                        // Trigger closing the modal
                        window.dispatchEvent(new CustomEvent('close-modal'));
                    }).catch((err) => {
                        console.error("Error stopping the QR code scanner:", err);
                    });
                },
                (errorMessage) => {
                    console.warn("QR Code scanning error:", errorMessage);
                }
            ).catch((err) => {
                console.error("Error starting the QR code scanner:", err);
            });
        }
    });

    Livewire.on('endScanner', () => {
        console.log('Stopping QR scanner');

        // Stop the QR scanner if it's running
        if (qrCodeScanner) {
            qrCodeScanner.stop().then(() => {
                console.log("QR Code scanner stopped.");
                qrCodeScanner = null; // Clear the reference to the instance

                // Trigger closing the modal
                window.dispatchEvent(new CustomEvent('close-modal', {
                    detail: 'qr-scanner-modal' // Assuming $name holds the modal name
                }));
            }).catch((err) => {
                console.error("Error stopping the QR code scanner:", err);
            });
        }
    });

    // Listen for the close-modal event and handle it
    window.addEventListener('close-modal', () => {
        document.querySelector('[x-data]').__x.$data.open = false;
    });
</script>
