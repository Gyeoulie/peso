<div wire:poll>
    <div class="container mx-auto py-8">

        <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">



            <div class="col-span-4 sm:col-span-12">

                <div class="bg-white overflow-hidden shadow-sm rounded-lg">


                    <div class="flex flex-row w-full h-full">
                        <div class="flex flex-row justify-center items-center h-full p-5 flex-shrink-0">
                            <img src="{{ asset('storage/' . $JobPost->company->company_img) }}" alt="Default I mage"
                                class="w-36 h-36    sm:w-48 sm:h-48 bg-gray-300 rounded object-contain">
                        </div>
                        <div class="flex flex-col w-full h-full sm:ml-5 py-5 sm:mt-5">

                            <div class="flex flex-row">
                                <h1 class=" text-4xl text-blue-500 sm:text-6xl font-bold">{{ $JobPost->job_Title }}
                                </h1>
                            </div>

                            <div class="flex-row sm:mt-5">
                                <h2 class="text-md sm:text-3xl font-semibold">{{ $JobPost->company->business_Name }}
                                </h2>
                            </div>


                            <div class="flex flex-col sm:flex-row sm:space-x-4  sm:mt-8">
                                <div class="">
                                    <h3 class="text-xs sm:text-lg text-blue-900"> <i
                                            class="fa-solid fa-location-dot"></i>
                                        {{ $JobPost->barangay->municipality->municipality_Name }},
                                        {{ $JobPost->barangay->municipality->province->province_Name }}
                                    </h3>
                                </div>

                                <div class="hidden md:flex items-center justify-center">
                                    <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                                </div>

                                <div class="">
                                    <h3 class="text-xs sm:text-lg text-blue-900"> <i
                                            class="fa-solid fa-graduation-cap"></i>
                                        {{ $eduLevels[$JobPost->job_Edu] }}
                                    </h3>
                                </div>
                                <div class="hidden sm:flex items-center justify-center">
                                    <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                                </div>

                                <div class="">
                                    <h3 class="text-xs sm:text-lg text-blue-900"> <i class="fa-solid fa-briefcase"></i>
                                        @if ($JobPost->job_Type == 1)
                                            Full Time
                                        @elseif ($JobPost->job_Type == 2)
                                            Part Time
                                        @endif
                                    </h3>
                                </div>

                                <div class="hidden sm:flex items-center justify-center">
                                    <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                                </div>

                                <div class="">
                                    <h3 class="text-xs sm:text-lg text-blue-900"> <i class="fa-solid fa-calendar"></i>
                                        {{ $JobPost->created_at->format('F j, Y') }}
                                    </h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>






            <div class="col-span-4 sm:col-span-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="flex flex-col w-full h-full p-5 space-y-2">

                        <div class="Job-Description">
                            <div class="flex flex-row w-full">
                                <h1 class="text-xl text-blue-900 font-bold">Job Description</h1>
                            </div>
                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">

                            <div class="p-2 no-tailwindcss-base">
                                {!! $JobPost->job_Description !!}

                            </div>
                        </div>

                        <div class="Job-Qualification">

                            <h1 class="text-xl text-blue-900 font-bold">Job Qualification</h1>


                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">

                            <div class="p-2 no-tailwindcss-base">
                                {!! $JobPost->job_Qualifications !!}
                            </div>
                        </div>

                        <div class="Job-Remarks">

                            <h1 class="text-xl text-blue-900 font-bold">Job Remarks</h1>


                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">

                            <div class="p-2 no-tailwindcss-base">
                                {!! $JobPost->job_Remarks !!}

                            </div>
                        </div>

                    </div>
                </div>




                {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="flex flex-col w-full h-full p-5">
    
    
                            <div class="About-Company">
    
                                <h1 class="text-xl text-blue-900 font-bold">About National University Baliwag</h1>
    
    
                                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">
    
                                <div class="mt-2">
                                    National University (NU) Baliwag is a distinguished institution of higher education
                                    situated
                                    in Baliwag, Bulacan, Philippines. Committed to academic excellence, innovation, and
                                    social
                                    responsibility, NU Baliwag aims to empower minds and transform lives through quality
                                    education and holistic development.
    
                                </div>
                            </div>
    
                        </div>
                    </div> --}}
            </div>


            <div class="col-span-4 sm:col-span-4">
                <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4">
                    <div class="flex flex-col w-full">

                        @if (auth()->user()->usertype >= 5)

                            @if ($JobPost->job_Status == 'PENDING')
                                <div class="bg-yellow-100 shadow rounded-lg p-6">
                                    <div class="flex flex-row items-center justify-between">
                                        <p class="text-yellow-700 font-bold text-xl">Application is Pending</p>
                                    </div>
                                </div>
                            @elseif($JobPost->job_Status == 'REJECTED')
                                <div class="bg-red-100 shadow rounded-lg p-6">
                                    <div class="flex flex-row items-center justify-between">
                                        <p class="text-red-700 font-bold text-xl">Application is Rejected</p>
                                    </div>
                                </div>


                                <div class="flex flex-col w-full mt-4">
                                    <x-input-label for="fname"> </i> PESO Remarks
                                    </x-input-label>
                                    <textarea id="message" rows="4" readonly
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="PESO Remarks">{{ $JobPost->peso_Remarks }}</textarea>
                                </div>
                            @endif

                            @if (auth()->user()->usertype >= 8 && auth()->user()->peso->municipality_id == $JobPost->peso_municipality_id)
                                <div class="flex flex-row items-center justify-center mt-2">
                                    <a wire:navigate
                                        href="{{ route('admin.jobpost.applicants', ['id' => $JobPost->job_id]) }}">
                                        <x-primary-button class="w-[350px] h-[40px] justify-center">

                                            View Job Applicants

                                        </x-primary-button>
                                    </a>
                                </div>
                            @endif
                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-4">
                        @endif

                        @if (auth()->user()->usertype >= 4 && auth()->user()->usertype < 5)
                            @if ($isApplied == false)
                                @if ($JobPost->job_Duration && \Carbon\Carbon::parse($JobPost->job_Duration)->isFuture())
                                    <div class="flex flex-row w-full items-center justify-center mt-2">
                                        <h1>Applicantion ends: <span
                                                class="text-red-500 text-md font-black">{{ $JobPost->job_Duration->format('F j, Y') }}</span>
                                        </h1>
                                    </div>
                                    <div class="flex flex-row items-center justify-center mt-2">
                                        <x-blue-button class="w-[350px] h-[40px] justify-center" x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'apply-modal')">
                                            Apply
                                        </x-blue-button>

                                    </div>
                                @else
                                    <div class="flex flex-row w-full items-center justify-center mt-2">
                                        <h1>Applicantion ended: <span
                                                class="text-red-500 text-md font-black">{{ $JobPost->job_Duration->format('F j, Y') }}</span>
                                        </h1>
                                    </div>
                                @endif
                            @else
                                <div class="flex flex-row w-full items-center justify-center mt-2">
                                    <h1 class="text-xl font-semibold text-blue-500">You have already applied for this
                                        job position.
                                    </h1>
                                </div>
                            @endif

                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-4">
                        @endif
                        <div class="flex flex-col w-full px-5 mt-5">

                            <ul>
                                <li class="mb-4">
                                    <div class="flex flex-row gap-4 w-full">
                                        <div class="flex flex-col">
                                            <svg class="w-10 h-10 text-blue-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                                            </svg>
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <div class="text-xl font-bold text-black">
                                                Date Posted
                                            </div>
                                            <div class="text-md font-medium">
                                                {{ $JobPost->created_at->format('F j, Y') }}
                                            </div>


                                        </div>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="flex flex-row gap-4 w-full">
                                        <div class="flex flex-col">
                                            <svg class="w-10 h-10 text-blue-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                                            </svg>

                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <div class="text-xl font-bold text-black">
                                                Location
                                            </div>
                                            <div class="text-md font-medium">
                                                {{ $JobPost->barangay->municipality->municipality_Name }},
                                                {{ $JobPost->barangay->municipality->province->province_Name }}
                                            </div>


                                        </div>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="flex flex-row gap-4 w-full">
                                        <div class="flex flex-col">
                                            <svg class="w-10 h-10 text-blue-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                    d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                            </svg>

                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <div class="text-xl font-bold text-black">
                                                Salary Range
                                            </div>
                                            <div class="text-md font-medium">
                                                ₱{{ number_format($JobPost->job_MinWage) }} -
                                                ₱{{ number_format($JobPost->job_MaxWage) }}

                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="flex flex-row gap-4 w-full">
                                        <div class="flex flex-col">
                                            <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                            </svg>

                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <div class="text-xl font-bold text-black">
                                                Education Level
                                            </div>
                                            <div class="text-md font-medium">
                                                {{ $eduLevels[$JobPost->job_Edu] }}
                                                {{-- @if ($JobPost->job_Edu == 1)
                                                        Highschool Graduate
                                                    @elseif ($JobPost->job_Edu == 2)
                                                        Master's Graduate
                                                    @endif --}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="flex flex-row gap-4 w-full">
                                        <div class="flex flex-col">
                                            <svg class="w-10 h-10 text-blue-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7H5a2 2 0 0 0-2 2v4m5-6h8M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m0 0h3a2 2 0 0 1 2 2v4m0 0v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6m18 0s-4 2-9 2-9-2-9-2m9-2h.01" />
                                            </svg>

                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <div class="text-xl font-bold text-black">
                                                Job Type
                                            </div>

                                            <div class="text-md font-medium ">
                                                @if ($JobPost->job_Type == 1)
                                                    Full Time
                                                @elseif ($JobPost->job_Type == 2)
                                                    Part Time
                                                @endif
                                            </div>

                                        </div>
                                </li>
                                <li class="mb-4">
                                    <div class="flex flex-row gap-4 w-full">
                                        <div class="flex flex-col">
                                            <svg class="w-10 h-10 text-blue-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z" />
                                            </svg>

                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <div class="text-xl font-bold text-black">
                                                Industry
                                            </div>
                                            <div class="text-md font-medium">
                                                {{ $JobPost->job_industry->industry_Title }}
                                            </div>


                                        </div>
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="flex flex-row gap-4 w-full">
                                        <div class="flex flex-col">

                                            <svg class="w-10 h-10 text-blue-500" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path
                                                    d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                                <line x1="13" y1="7" x2="13" y2="7.01" />
                                                <line x1="17" y1="7" x2="17" y2="7.01" />
                                                <line x1="17" y1="11" x2="17" y2="11.01" />
                                                <line x1="17" y1="15" x2="17" y2="15.01" />
                                            </svg>
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <div class="text-xl font-bold text-black">
                                                PESO Branch
                                            </div>

                                            <div class="text-md font-medium ">
                                                {{ $JobPost->municipality->municipality_Name }}

                                            </div>

                                        </div>
                                </li>
                                <li class="mb-4">
                                    <div class="flex flex-row gap-4 w-full">
                                        <div class="flex flex-col">

                                            <svg class="w-10 h-10 text-blue-500" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                            </svg>

                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <div class="text-xl font-bold text-black">
                                                Slots Left
                                            </div>

                                            <div class="text-md font-medium ">
                                                {{ $JobPost->slotsLeft }}

                                            </div>

                                        </div>
                                </li>


                            </ul>
                        </div>

                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4 mt-4">
                    <div class="flex flex-row w-full">
                        <h1 class="text-xl text-blue-900 font-bold">Job Tags</h1>
                    </div>
                    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">

                    <div class="flex-inline  rounded-lg p-1 mt-2 ">
                        @foreach ($JobPost->job_tags as $jobTag)
                            <span wire:key='jobTag-{{ $jobTag->job_positions->position_id }}'
                                class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                {{ $jobTag->job_positions->position_Title }}
                            </span>
                        @endforeach


                    </div>

                </div>
            </div>




        </div>


    </div>


    {{-- <div class="mobile-apply md:hidden mt-3">
                <div class="col-span-4 sm:col-span-12">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    
                        <div class="flex flex-col w-full h-full p-5">
                            <div class="flex flex-row space-x-2 ">
                                <div class="flex items-center justify-center ">
                                    <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                                </div>
                                <div class="w-1/2 justify-">
                                    <h3 class="text-md "> <i class="fa-solid fa-location-dot"></i>
                                        Baliuag, Bulacan
                                    </h3>
                                </div>
    
                                <div class="flex items-center justify-center">
                                    <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                                </div>
    
                                <div class="w-1/2">
                                    <h3 class="text-md "> <i class="fa-solid fa-graduation-cap"></i>
                                        Master's
                                        Graduate</h3>
                                </div>
                            </div>
                            <div class="flex flex-row space-x-2">
    
    
                                <div class="flex items-center justify-center">
                                    <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                                </div>
    
                                <div class="w-1/2">
                                    <h3 class="text-md "> <i class="fa-solid fa-briefcase"></i>
                                        Full Time
                                    </h3>
                                </div>
    
                                <div class="flex items-center justify-center">
                                    <i class="fa-solid fa-circle text-xs" style="font-size: 0.4rem;"></i>
                                </div>
    
                                <div class="w-1/2">
                                    <h3 class="text-md"><i class="fa-solid fa-money-bill"></i>
                                        ₱50,000 - ₱70,000
                                    </h3>
                                </div>
    
                            </div>
    
                            <div class="flex flex-col ml-auto mr-10 justify-center w-full mt-3 items-center md:hidden">
                                <button type="button"
                                    class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-10 border border-red-500 hover:border-transparent rounded "
                                    onclick="">
                                    Apply Now
                                </button>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div> --}}


    @if (auth()->user()->usertype <= 4)
        <x-modal name="apply-modal" focusable>
            <div class="w-full max-w-4xl px-6 py-6 items-center">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Application form') }}
                </h2>
                <hr>



                <div class="flex flex-col mt-2" x-data="{
                    selectedOption: @entangle('option'),
                    selected: 'bg-blue-300',
                    unselected: 'hover:bg-blue-300',
                    resumeExists: {{ auth()->user()->employee->resume ? 'true' : 'false' }}
                
                }">

                    <div class="text-center mt-4">
                        <span class="text-2xl">Choose the type of resume to pass for the application.</span>
                    </div>



                    <div class="flex flex-row w-full gap-4 sm:gap-24 justify-center items-center mt-8">


                        <div wire:click.prevent='updateOption(1)' @click="selectedOption = 1"
                            :class="selectedOption === 1 ? selected : unselected"
                            class="flex flex-col  w-[120px] h-[120px] sm:w-[150px] sm:h-[150px] p-2 rounded-lg border-2 border-blue-400 items-center justify-center gap-2 shadow-lg  cursor-pointer">

                            <div>
                                <svg class="h-10 w-10 sm:h-14 sm:w-14" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                            </div>

                            <div class="text-center"> <span class="font-bold">Auto Generated Resume</span>
                            </div>
                        </div>




                        <div wire:click.prevent='updateOption(2)' @click="selectedOption = 2"
                            :class="selectedOption === 2 ? selected : unselected"
                            class="flex flex-col w-[120px] h-[120px] sm:w-[150px] sm:h-[150px] p-2 rounded-lg border-2 border-blue-400 items-center justify-center  gap-2 shadow-lg cursor-pointer">

                            <div>
                                <svg class="h-10 w-10 sm:h-14 sm:w-14" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                </svg>


                            </div>

                            <div class="text-center"> <span class="font-bold">Uploaded Resume</span>
                            </div>
                        </div>


                    </div>

                    <div class="mt-4 mb-4 text-center">
                        <x-input-error :messages="$errors->get('option')" class="mt-2" />
                        <span x-show="selectedOption === 1" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90"
                            x-transition:enter-end="opacity-100 scale-100" x-cloak class="text-md text-blue-700">*The
                            automated resume generation process will utilize the
                            information provided in your profile/NSRP inputs.</span>


                        <span x-show="selectedOption === 2" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90"
                            x-transition:enter-end="opacity-100 scale-100" x-cloak class="text-md text-blue-700">*You
                            have to upload a resume if you haven't uploaded in
                            your
                            profile.</span>
                    </div>


                    <div class="flex flex-col w-full mt-2" x-show="selectedOption === 2 && !resumeExists"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-cloak>
                        <label class="block text-sm font-medium text-gray-900" for="file_input">Upload your
                            resume</label>
                        <input wire:model='resume'
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            aria-describedby="file_input_help" type="file">
                        <p class="mt-1 text-sm text-gray-500 0">PDF ONLY.</p>
                        <x-input-error :messages="$errors->get('resume')" class="mt-2" />
                    </div>








                </div>
                <div class="mt-6 flex justify-between">
                    <x-secondary-button wire:click.prevent='close' type="button">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    {{-- 
                <x-blue-button wire:click.prevent='createApplication()' type="button"
                    class="ml-auto mr-0 sm:mr-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 justify-center w-[100px]">Confirm

                </x-blue-button> --}}

                    <x-primary-button wire:click.prevent='apply' wire:loading.attr="disabled"
                        class="ms-3 w-[100px] flex justify-center" type="button" id="certAdd">
                        {{ __('Apply') }}
                        <div wire:loading.delay.long wire:target='apply' role="status">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-200 animate-spin fill-blue-600 ml-4"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </x-primary-button>
                </div>
            </div>
        </x-modal>
    @endif
</div>
