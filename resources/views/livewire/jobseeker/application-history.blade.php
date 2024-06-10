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
                    <div class="flex flex-row sm:flex-col gap-4 overflow-y-auto sm:overflow-visible	 w-full"
                        x-data="{
                            selectedJob: @entangle('selectedJob'),
                        }">
                        @foreach ($applications as $data)
                            <div class="flex flex-col sm:w-full">
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
                                    <p class="ms-4">Uploaded Resume</p>
                                @elseif($applicationInfo->applicant_Resume === 2)
                                    <p class="ms-4">AUTO-GENERATED</p>
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
                                    placeholder="Company remarks..." maxlength="600" readonly></textarea>
                            </div>
                        @endif

                        {{-- BUTTON --}}
                        <div class="mt-6 flex flex-wrap gap-4 justify-center">
                            <a wire:navigate href="{{ route('jobpost.show', ['id' => $applicationInfo->job_id]) }}"
                                class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded">View
                                Job Posting</a>
                            <a href="#"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">View
                                Resume</a>
                        </div>

                    </div>



                </div>
            @endif
        </div>
    </div>

</div>
