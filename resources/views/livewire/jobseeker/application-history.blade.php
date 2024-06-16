<div>
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
                    <input wire:model.live.prevent='search' type="text" id="table-search-users"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search for applications">
                </div>
                <div class="flex flex-row gap-3 mr-3">

                    <x-dropdown align="right" width="36">
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

                            <x-dropdown-link wire:click.prevent="updateFilter('All')" class="cursor-pointer">
                                All
                            </x-dropdown-link>
                            <x-dropdown-link wire:click.prevent="updateFilter('Pending')" class="cursor-pointer">
                                Pending
                            </x-dropdown-link>
                            <x-dropdown-link wire:click.prevent="updateFilter('Interview')" class="cursor-pointer">
                                Interview
                            </x-dropdown-link>
                            <x-dropdown-link wire:click.prevent="updateFilter('Others')" class="cursor-pointer">
                                Others
                            </x-dropdown-link>


                        </x-slot>
                    </x-dropdown>


                    <x-dropdown align="right" width="36">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                                <div>
                                    {{ $sort }}
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

                            <x-dropdown-link wire:click.prevent="updateSort('Newest')" class="cursor-pointer">
                                Newest
                            </x-dropdown-link>
                            <x-dropdown-link wire:click.prevent="updateSort('Oldest')" class="cursor-pointer">
                                Oldest
                            </x-dropdown-link>


                        </x-slot>
                    </x-dropdown>
                </div>

            </div>
            <div class="flex">
                @if ($applications->isEmpty())
                    <div class="flex w-full">
                        <div class="w-full rounded-lg p-10">
                            <div class="flex flex-col items-center justify-center w-full">
                                <div class="p-6 bg-gray-100 rounded-full">
                                    <svg class="w-24 h-24 text-black" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                    </svg>

                                </div>
                                <p class="text-xl font-bold text-black text-center mt-2">
                                    No Application Found!
                                </p>
                            </div>
                        </div>

                    </div>
                @else
                    <div class="flex flex-row sm:flex-col gap-4  sm:overflow-visible	 w-full" x-data="{
                        selectedJob: @entangle('selectedJob'),
                    }">
                        @foreach ($applications as $data)
                            <div class="relative flex flex-col sm:w-full">
                                <a class="cursor-pointer" wire:key='application-{{ $data->applicant_id }}'
                                    wire:click.prevent="updateSelection({{ $data->applicant_id }})">
                                    <div
                                        class="@if ($data->applicant_id == $selectedJob) bg-blue-300 @else bg-white @endif shadow rounded-lg p-6 flex flex-col  sm:hover:scale-105 sm:transition-transform">

                                        <div class="flex flex-row gap-4 w-full">

                                            <div class="hidden sm:flex flex-col">
                                                <img src="{{ asset('storage/' . $data->job_posting->company->company_img) }}"
                                                    class="flex w-[140px] h-[100px] bg-gray-300 object-cover rounded-lg shrink-0 grow-0">
                                                </img>
                                            </div>
                                            <div class="flex flex-col  w-full">
                                                <h1 class="text-3xl font-bold underline">
                                                    {{ $data->job_posting->job_Title }}
                                                </h1>
                                                <h1 class="text-l text-gray-600">
                                                    {{ $data->job_posting->company->business_Name }}</h1>
                                                <div class="flex flex-row">
                                                    <span
                                                        class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 border border-gray-500 ">
                                                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                                        </svg>
                                                        {{ $data->created_at->diffForHumans() }}
                                                    </span>
                                                </div>

                                            </div>
                                            <div class="flex flex-row ml-auto mr-0 mb-auto mt-0">

                                                @if ($data->applicant_Status == 'PENDING')
                                                    <span
                                                        class="inlineflex items-center rounded-md bg-yellow-200 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">PENDING</span>
                                                @elseif ($data->applicant_Status == 'INTERESTED')
                                                    <span
                                                        class="inlineflex items-center rounded-md bg-yellow-200 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">PENDING</span>
                                                @elseif ($data->applicant_Status == 'INTERVIEW')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-blue-200 px-2 py-1 text-sm font-medium text-blue-800 ring-1 ring-inset ring-blue-600/20">INTERVIEW</span>
                                                @elseif ($data->applicant_Status == 'HIRED')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-green-200 px-2 py-1 text-sm font-medium text-green-800 ring-1 ring-inset ring-green-600/20">HIRED</span>
                                                @elseif ($data->applicant_Status == 'REJECTED')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-red-200 px-2 py-1 text-sm font-medium text-red-800 ring-1 ring-inset ring-red-600/20">REJECTED</span>
                                                @endif

                                            </div>
                                            @if ($data->applicant_Notif == 1)
                                                <span
                                                    class="absolute bg-red-500 p-0.5 leading-none w-3.5 h-3.5 bg-red-500 border-2 border-white rounded-full -translate-y-1/2 translate-x-1/2 left-auto top-0 right-0"></span>
                                            @endif
                                        </div>

                                        <div class="flex flex-col w-full mt-4">
                                            <div class="flex flex-col md:flex-row">
                                                <div class="md:w-1/4 text-left">

                                                    <h3 class="text-sm"> <i class="fa-solid fa-location-dot"></i> SM
                                                        {{ $data->job_posting->company->barangay->municipality->municipality_Name }},
                                                        {{ $data->job_posting->company->barangay->municipality->province->province_Name }}
                                                    </h3>

                                                </div>
                                                <div class="md:w-1/4 text-left md:text-center">
                                                    <h3 class="text-sm"> <i class="fa-solid fa-graduation-cap"></i>
                                                        {{ $eduLevels[$data->job_posting->job_Edu] }}</h3>
                                                </div>
                                                <div class="md:w-1/4 text-left md:text-center">
                                                    <h3 class="text-sm"> <i class="fa-solid fa-briefcase"></i>
                                                        {{ $data->job_posting->job_Type == 1 ? 'Full Time' : 'Part Time' }}
                                                    </h3>
                                                </div>
                                                <div class="md:w-1/4 text-left md:text-center">
                                                    <h3 class="text-sm"> <i class="fa-solid fa-calendar"></i>
                                                        {{ $data->job_posting->created_at->format('F j, Y') }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach



                    </div>
                @endif
            </div>
            <div class="mt-2">
                {{ $applications->links() }}
            </div>
        </div>

        <div class="col-span-4 sm:col-span-7">
            @if ($applicationInfo)
                <div class="bg-white shadow rounded-lg p-6 flex flex-col">
                    <div class="flex flex-row">
                        <div class="flex flex-col w-full sm:w-auto">
                            <img src="{{ asset('storage/' . $applicationInfo->job_posting->company->company_img) }}"
                                class="flex w-[140px] h-[100px] bg-gray-300 object-cover rounded-lg shrink-0 grow-0">
                            </img>
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <h1 class="text-2xl sm:text-6xl  font-bold underline">
                                {{ $applicationInfo->job_posting->job_Title }}
                            </h1>
                            <h1 class="text-xl sm:text-3xl text-gray-600">
                                {{ $applicationInfo->job_posting->company->business_Name }}</h1>

                        </div>
                        <div class="flex flex-row ml-auto mr-0 mb-auto mt-0">
                            @if ($applicationInfo->applicant_Status == 'PENDING')
                                <span
                                    class="inlineflex items-center rounded-md bg-yellow-200 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">PENDING</span>
                            @elseif ($applicationInfo->applicant_Status == 'INTERESTED')
                                <span
                                    class="inlineflex items-center rounded-md bg-yellow-200 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">PENDING</span>
                            @elseif ($applicationInfo->applicant_Status == 'INTERVIEW')
                                <span
                                    class="inline-flex items-center rounded-md bg-blue-200 px-2 py-1 text-sm font-medium text-blue-800 ring-1 ring-inset ring-blue-600/20">INTERVIEW</span>
                            @elseif ($applicationInfo->applicant_Status == 'HIRED')
                                <span
                                    class="inline-flex items-center rounded-md bg-green-200 px-2 py-1 text-sm font-medium text-green-800 ring-1 ring-inset ring-green-600/20">HIRED</span>
                            @elseif ($applicationInfo->applicant_Status == 'REJECTED')
                                <span
                                    class="inline-flex items-center rounded-md bg-red-200 px-2 py-1 text-sm font-medium text-red-800 ring-1 ring-inset ring-red-600/20">REJECTED</span>
                            @endif
                        </div>
                    </div>
                    <hr class="mt-4">
                    <div class="flex flex-col mt-4">

                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">APPLICATION DETAIL</span>

                        <ul>


                            <div class="flex flex-row">
                                <li class="mb-2 font-bold">Resume:</li>
                                @if ($applicationInfo->applicant_Resume === 1)
                                    <p class="ms-4">AUTO-GENERATED</p>
                                @elseif($applicationInfo->applicant_Resume === 2)
                                    <p class="ms-4">Uploaded Resume</p>
                                @endif
                            </div>

                            <div class="flex flex-row">
                                <li class="mb-2 font-bold">Date Applied:</li>
                                <p class="ms-4">{{ $applicationInfo->created_at->format('F j, Y') }}</p>
                            </div>


                            <div class="flex flex-row">
                                <li class="mb-2 font-bold">Address:</li>
                                <p class="ms-4">
                                    {{ $applicationInfo->job_posting->job_Address }},
                                    {{ $applicationInfo->job_posting->barangay->barangay_Name }},
                                    {{ $applicationInfo->job_posting->barangay->municipality->municipality_Name }},
                                    {{ $applicationInfo->job_posting->barangay->municipality->province->province_Name }}
                                </p>
                            </div>

                            <div class="flex flex-row">
                                <li class="mb-2 font-bold">Date Applied:</li>
                                <p class="ms-4">{{ $applicationInfo->created_at->format('F j, Y') }}</p>
                            </div>

                            <div class="flex flex-row ">
                                <li class="mb-2 font-bold">PESO Status:</li>
                                <p class="ms-4">

                                    @if ($applicationInfo->peso_Status === 'PENDING')
                                        Pending
                                    @elseif($applicationInfo->peso_Status === 'RECOMMENDED')
                                        Recommended
                                    @elseif($applicationInfo->peso_Status === 'NOT')
                                        Not Recommended
                                    @endif

                                </p>
                            </div>


                        </ul>

                        @if ($applicationInfo->applicant_Status != 'INTERESTED' && $applicationInfo->company_Remarks)
                            <div class="flex flex-col  mt-2">
                                <h1 class="mb-2 font-bold">Company Remarks</h1>
                                <textarea id="message" rows="6"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 resize-none overflow-y-auto"
                                    placeholder="Company remarks..." maxlength="600" readonly>{{ $applicationInfo->company_Remarks }}</textarea>
                            </div>
                        @endif

                        {{-- BUTTON --}}
                        <div class="mt-6 flex flex-wrap gap-4 justify-center">
                            <div x-data="{ tooltip: 'View Job Posting' }">
                                <a wire:navigate
                                    href="{{ route('jobpost.show', ['id' => $applicationInfo->job_id]) }}"
                                    x-tooltip="tooltip" type="button"
                                    class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                      </svg>
                                      

                                </a>
                            </div>
                            <div x-data="{ tooltip: 'Download Resume' }">
                                <button {{-- x-on:click="openNewTab('{{ asset('storage/images/requirements/tXllyVuLtDR7W0X5cF6EdkZ9H1BWD2t4odWIFBpT.pdf') }}')" --}}
                                    wire:click.prevent='printResume({{ $applicationInfo->employee_id }}, {{ $applicationInfo->applicant_Resume }})'
                                    x-tooltip="tooltip" type="button"
                                    class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                                    </svg>
                                </button>
                            </div>
                            @if ($applicationInfo->peso_Status == 'RECOMMENDED')
                            <div x-data="{ tooltip: 'Download Recommendation Letter' }">
                                <button wire:click.prevent='printRecom({{ $applicationInfo->applicant_id }})'
                                    x-tooltip="tooltip" type="button"
                                    class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>

                                </button>
                            </div>
                            @endif
                        </div>

                    </div>



                </div>
            @endif
        </div>
    </div>

</div>
