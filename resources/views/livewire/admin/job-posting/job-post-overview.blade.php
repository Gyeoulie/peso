<div wire:poll class="md:mx-10">
    <div class="container py-8">

        <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

            <div class="col-span-4 sm:col-span-12">
                {{-- TITLE --}}
                <h1 class="text-2xl font-bold">Job Posting / Job Posting Overview</h1>

            </div>



            {{-- FIRST CONTAINER --}}
            <div class="col-span-4 sm:col-span-12">
                <div class="bg-white shadow rounded-lg p-6 flex flex-col">

                    {{-- PHONE DATE (SMALL SCREEN) --}}
                    <div class="hidden flex flex-row w-full justify-end">
                        <h1 class="text-sm font-light ml-auto mr-5 mt-1 mb-auto">April 28, 2024</h1>
                    </div>

                    <div class="flex flex-row w-full">

                        <div class="flex flex-row w-full items-center">
                            {{-- IMG --}}
                            <img src="{{ asset('storage/' . $jobpost->company->company_img) }}"
                                class="w-32 h-32 bg-gray-300 rounded-lg shrink-0">
                            </img>

                            <div class="flex flex-col ml-4 w-full">
                                <h1 class="text-xl sm:text-3xl font-bold">{{ $jobpost->company->business_Name }}</h1>
                                <p class="text-sm sm:text-lg text-gray-700 uppercase">
                                    {{ $jobpost->company->company_Address }},
                                    {{ $jobpost->barangay->barangay_Name }},
                                    {{ $jobpost->barangay->municipality->municipality_Name }},
                                    {{ $jobpost->barangay->municipality->province->province_Name }}</p>

                                <div class="flex">
                                    @if ($jobpost->job_Status == 'PENDING')
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-sm font-medium px-2.5 py-.5 sm:text-md sm:font-semibold me-2 sm:px-10 sm:py-2 rounded-lg ">PENDING</span>
                                    @elseif($jobpost->job_Status == 'ACTIVE')
                                        <span
                                            class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-.5 sm:text-md sm:font-semibold me-2 sm:px-10 sm:py-2 rounded-lg ">ACTIVE</span>
                                    @else
                                        <span
                                            class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-.5 sm:text-md sm:font-semibold me-2 sm:px-10 sm:py-22 rounded-lg ">{{ $jobpost->job_Status }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-col sm:w-full ">
                            {{-- WEB DATE --}}
                            <h1 class="hidden sm:flex text-lg font-light ml-auto mr-2 mb-auto">
                                {{ $jobpost->created_at->format('F j, Y') }}</h1>
                            {{-- WEB BUTTONS --}}
                            @if ($jobpost->job_Status == 'PENDING')
                                <div class="hidden sm:flex flex-row w-full justify-end">
                                    <x-danger-button class="w-[100px] justify-center me-2 mb-2" type="button"
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'reject-modal')">Reject</x-danger-button>
                                    <x-blue-button type="button" class="w-[100px] justify-center me-2 mb-2"
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'approve-modal')">Approve</x-blue-button>
                                </div>
                            @endif
                        </div>

                    </div>
                    @if ($jobpost->job_Status == 'PENDING')
                        {{-- MOBILE BUTTONS (SMALL SCREEN) --}}
                        <div class="sm:hidden flex flex-row w-full mt-4 justify-center space-x-4">
                            <button type="button"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'reject-modal')">Reject</button>
                            <button type="button"
                                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'approve-modal')">Approve</button>
                        </div>
                    @endif
                </div>

            </div>

            {{-- SECOND CONTAINER FOR JOB DESCRIPTION --}}
            <div class="col-span-4 sm:col-span-6">
                <div class="bg-white shadow rounded-lg p-6 flex flex-col">

                    <h1 class="text-3xl font-bold">Job Posting Description</h1>



                    <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">

                        <div class="flex flex-col w-full">
                            <x-input-label for="title"> <i class="fa-solid fa-briefcase"></i> Job
                                Title
                            </x-input-label>
                            <x-text-input id="title" class="block mt-1 w-full" type="text"
                                value="{{ $jobpost->job_Title }}" readonly />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="industry" class="flex flex-row items-center gap-1"> <svg class="w-5 h-5"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4.5 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5h-.75V3.75a.75.75 0 0 0 0-1.5h-15ZM9 6a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm-.75 3.75A.75.75 0 0 1 9 9h1.5a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM9 12a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm3.75-5.25A.75.75 0 0 1 13.5 6H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM13.5 9a.75.75 0 0 0 0 1.5H15A.75.75 0 0 0 15 9h-1.5Zm-.75 3.75a.75.75 0 0 1 .75-.75H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM9 19.5v-2.25a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.75.75h-4.5A.75.75 0 0 1 9 19.5Z"
                                        clip-rule="evenodd" />
                                </svg>Job Industry
                            </x-input-label>
                            <x-text-input id="industry" class="block mt-1 w-full" type="text"
                                value="{{ $jobpost->job_industry->industry_Title }}" readonly />
                        </div>

                    </div>


                    <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">

                        <div class="flex flex-col ml w-full">
                            <x-input-label for="education" class="flex flex-row items-center gap-1"> <svg
                                    class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                    <path
                                        d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                                    <path
                                        d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                                </svg>

                                Educational Attainment
                            </x-input-label>
                            <x-text-input id="education" class="block mt-1 w-full" type="text"
                                value=" {{ $eduLevels[$jobpost->job_Edu] }}" readonly />
                        </div>

                        <div class="flex flex-col sm:flex-col ml w-full">
                            <x-input-label for="type"> <i class="fa-solid fa-briefcase"></i> Employment Type
                            </x-input-label>
                            <x-text-input id="type" class="block mt-1 w-full" type="text"
                                value="{{ $jobpost->job_Type == 1 ? 'Full Time' : 'Part Time' }}" readonly />
                        </div>

                    </div>

                    <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">

                        <div class="flex flex-col w-full">
                            <x-input-label for="wage" class="flex flex-row items-center gap-1"><svg class="w-5 h-5"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                                    <path fill-rule="evenodd"
                                        d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z" />
                                </svg>
                                Wage Range
                            </x-input-label>
                            <x-text-input id="wage" class="block mt-1 w-full" type="text" name="fnamePost"
                                value="₱{{ number_format($jobpost->job_MinWage) }} - ₱{{ number_format($jobpost->job_MaxWage) }}"
                                readonly />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="duration" class="flex flex-row items-center gap-1"> <svg
                                    class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                                    <path fill-rule="evenodd"
                                        d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Job
                                Posting Duration
                            </x-input-label>
                            <x-text-input id="duration" class="block mt-1 w-full" type="text"
                                value=" {{ $jobpost->job_Duration->format('F j, Y') }}" readonly />
                        </div>

                        <div class="flex flex-col w-1/3">
                            <x-input-label for="slots" class="flex flex-row items-center gap-1"><svg
                                    class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                        clip-rule="evenodd" />
                                </svg>

                                Job Slots
                            </x-input-label>
                            <x-text-input id="slots" class="block mt-1 w-full" type="text"
                                value=" {{ $jobpost->job_Slots }}" readonly />
                        </div>

                    </div>

                </div>


                {{-- CONTAINER FOR JOB TAGS --}}
                <div class="bg-white shadow rounded-lg p-6 flex flex-col mt-4">
                    {{-- TITLE --}}
                    <h1 class="text-3xl font-bold">Job Posting Tags</h1>

                    <div class="flex flex-row mt-4 w-full gap-4">

                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> </i> Job Position
                                Tags
                            </x-input-label>
                            {{-- BADGE CONTAINER --}}
                            <div id= "otherSkillRow" class="flex-inline border border-gray-300 rounded-lg p-1 mt-2">

                                {{-- BADGE --}}
                                @foreach ($jobpost->job_tags as $jobTag)
                                    <span
                                        class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        {{ $jobTag->job_positions->position_Title }}
                                    </span>
                                @endforeach

                            </div>
                        </div>

                    </div>

                </div>


                {{-- CONTAINER FOR DESCRIPTIONS --}}
                <div class="bg-white shadow rounded-lg p-6 flex flex-col mt-4">

                    <h1 class="text-3xl font-bold">Job Posting Details</h1>

                    <div class="flex flex-row mt-4 w-full gap-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> </i> Job
                                Description
                            </x-input-label>
                            <textarea id="message" rows="8" readonly
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                placeholder="Write your thoughts here...">{{ $jobpost->job_Description }}</textarea>
                        </div>
                    </div>

                    <div class="flex flex-row mt-4 w-full gap-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                Qualification
                            </x-input-label>
                            <textarea id="message" rows="8" readonly
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                placeholder="Write your thoughts here...">{{ $jobpost->job_Qualifications }}</textarea>
                        </div>
                    </div>

                    <div class="flex flex-row mt-4 w-full gap-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                Company Remarks
                            </x-input-label>
                            <textarea id="message" rows="8" readonly
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                placeholder="Write your thoughts here...">{{ $jobpost->job_Remarks }}</textarea>
                        </div>
                    </div>

                </div>


            </div>


            {{-- WEB REQUIREMENT CONTAINER --}}
            <div class="col-span-4 sm:col-span-6">
                <div class="bg-white shadow rounded-lg p-6 flex flex-col">

                    {{-- TITLE --}}
                    <h1 class="text-3xl font-bold">Requirements</h1>



                    @foreach ($jobpost->requirements_passed->chunk(2) as $chunk)
                        <div class="flex flex-row mt-4 w-full gap-2">
                            @foreach ($chunk as $req)
                                <div wire:key='req-{{ $req->req_passed_id }}' class="flex flex-col w-1/2">
                                    <form wire:key='formreq-{{ $req->req_passed_id }}'  action="{{ route('view.requirement') }}" method="POST" target="_blank">
                                        @csrf
                                        <input type="hidden" name="req_passed_id"
                                            value="{{ $req->req_passed_id }}">

                                        <button {{-- wire:click.prevent="downloadPDF('{{ $req->req_passed_id }}')" --}} type="submit"
                                            class="text-blue-900 bg-blue-400 hover:bg-blue-100 border border-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2">
                                            <i class="fa-solid fa-file-contract me-2"></i>
                                            {{-- {{ $req->req_passed_Input }} --}}
                                            {{ $req->requirement->requirement_Title }}
                                            <svg class="ml-auto mr-0 w-6 h-6 " xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                            </svg>

                                        </button>
                                    </form>
                                </div>
                            @endforeach

                        </div>
                    @endforeach

                </div>

                @if (($jobpost->job_Status == 'ACTIVE' || $jobpost->job_Status == 'REJECTED') && $jobpost->peso_Remarks)
                    <div class="bg-white shadow rounded-lg p-6 flex flex-col mt-4">

                        <h1 class="text-3xl font-bold">PESO Remarks</h1>


                        <div class="flex flex-col mt-4 w-full">

                            <textarea id="message" rows="6" readonly
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                placeholder="Write your thoughts here...">{{ $jobpost->peso_Remarks }}</textarea>
                        </div>

                    </div>
                @endif



                <div class="bg-white shadow rounded-lg p-6 flex flex-col mt-4 ">
                    <h1 class="text-3xl font-bold mb-3">Matched Applicants</h1>
                    <div class="max-h-[500px] overflow-y-auto">

                        <div>

                            @if ($matchingEmployees->isEmpty())
                                <div class="flex flex-col justify-center items-center mt-20 mb-20">
                                    <div class="flex  bg-gray-100 rounded-full p-1">

                                        <svg class="w-24 h-24 text-black" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                        </svg>

                                    </div>

                                    <div class="text-center text-black text-xl font-semibold mt-5">
                                        No Matched Applicants
                                    </div>
                                </div>

                        </div>
                    @else
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-4">
                            @foreach ($matchingEmployees as $data)
                                <div wire:key='jobseeker-{{ $data->employee_id }}'
                                    class="flex flex-col items-center justify-center py-4 px-4 max-w-sm mx-auto bg-blue-50 rounded-xl shrink-0 grow-0 w-full hover:bg-blue-200 transition-colors duration-300">
                                    <img class="flex mx-auto w-[100px] h-[100px] object-cover rounded-full sm:mx-0 sm:grow-0 sm:shrink-0 shadow-xl"
                                        src="{{ asset('storage/' . $data->pimg) }}"
                                        alt="jobseeker-{{ $data->employee_id }}">
                                    <div
                                        class="flex flex-col items-center justify-center text-center  sm:text-left mt-2">
                                        <div class="space-y-0.5">
                                            <p class="text-lg text-black text-center font-semibold">
                                                {{ $data->fname }}
                                                {{ $data->mname ?? '' }}
                                                {{ $data->lname }}@if (!empty($data->suffix))
                                                    , {{ $data->suffix }}
                                                @endif
                                            </p>
                                            <p class="text-slate-500 text-center font-medium">
                                                {{ $data->empstatus == 1 ? 'Employed' : 'Unemployed' }}
                                            </p>
                                        </div>
                                        <a wire:navigate
                                            href="{{ route('jobseeker.profile', ['id' => $data->employee_id]) }}"
                                            class="mt-2 px-4 py-1 text-sm text-blue-600  bg-blue-300 font-semibold rounded-full border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">Profile</a>
                                    </div>
                                </div>
                            @endforeach


                        </div>


                        @endif

                    </div>

                </div>
            </div>









        </div>

        {{-- APPROVE MODAL --}}
        <x-modal name="approve-modal" focusable>
            <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to approve?') }}
                </h2>
                <hr>
                <div class="flex flex-col mt-2">
                    <div class="flex flex-col mt-2 w-full">
                        <x-input-label :value="__('Remarks')" />
                        <textarea wire:model='remarks' id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                            placeholder="Write your remarks here..."></textarea>
                        <x-input-error :messages="$errors->get('remarks')" class="mt-2" />
                    </div>

                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button wire:click.prevent="close('approve-modal')" type="button">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button
                        wire:click.prevent="updateJob({{ $jobpost->job_id }}, 'ACTIVE', 'approve-modal')"
                        wire:loading.attr="disabled" class="ms-3" type="button">


                        {{ __('Approve Job Posting') }}

                        <div wire:loading.delay.long wire:target='updateJob' role="status">
                            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin fill-blue-600 ml-4"
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




        {{-- REJECT MODAL --}}
        <x-modal name="reject-modal" focusable>
            <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to reject?') }}
                </h2>
                <hr>
                <div class="flex flex-col mt-2">
                    <div class="flex flex-col mt-2 w-full">
                        <x-input-label :value="__('Remarks')" />
                        <textarea wire:model='remarks' id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                            placeholder="Write your thoughts here..."></textarea>
                        <x-input-error :messages="$errors->get('remarks')" class="mt-2" />
                    </div>

                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button wire:click.prevent="close('reject-modal')" type="button">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button wire:loading.attr="disabled"
                        wire:click.prevent="updateJob({{ $jobpost->job_id }}, 'REJECTED', 'reject-modal')"
                        class="ms-3" type="button">
                        {{ __('Reject Application') }}
                        <div wire:loading.delay.long wire:target='updateJob' role="status">
                            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin fill-blue-600 ml-4"
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
                    </x-danger-button>
                </div>
            </div>
        </x-modal>




    </div>
