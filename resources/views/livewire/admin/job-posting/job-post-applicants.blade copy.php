<div class="md:mx-10">
    <div class="container py-8">


        {{-- GRID --}}
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-4">

            <div class="col-span-4 sm:col-span-12">
                {{-- TITLE --}}
                <h1 class="text-2xl font-bold">Job Posting \ Applicants List</h1>
            </div>

            {{-- FIRST CONTAINER --}}
            <div class="col-span-4 sm:col-span-4">
                <div class="bg-white shadow rounded-lg p-6 flex flex-col">



                    <div class="flex flex-col items-center w-full">
                        {{-- COMPANY IMAGE --}}
                        <img src="https://randomuser.me/api/portraits/men/94.jpg"
                            class="w-32 h-32 bg-gray-300 rounded-md mb-4 shrink-0">
                        </img>

                        <h1 class="text-xl font-bold">{{ $jobpost->first()->company->business_Name }}
                        </h1>
                        <p class="text-gray-700">#IDNUMBER</p>

                        <div class="flex flex-row mt-6 justify-between w-full">
                            <p class="text-md text-gray-800">{{ $jobpost->first()->company->company_Email }}</p>
                            <p class="text-sm text-gray-800">{{ $jobpost->first()->company->company_Pnum }}</p>
                        </div>

                    </div>

                    {{-- DIVIDER --}}
                    <hr class="my-6 border-t border-gray-300">

                    <div class="flex flex-col w-full">
                        {{-- JOB POSTING INFORMATION --}}
                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Job Posting
                            Details</span>

                        <ul class="w-full">
                            <div class="flex flex-row justify-between">
                                <li class="mb-2 font-bold">Job Position:</li>
                                <p class="ms-4">{{ $jobpost->first()->job_Title }}</p>
                            </div>

                            <div class="flex flex-row justify-between">
                                <li class="mb-2 font-bold">Industry:</li>
                                <p class="ms-4">{{ $jobpost->first()->industry->industry_Title }}</p>
                            </div>

                            <div class="flex flex-row justify-between">
                                <li class="mb-2 font-bold">Education Attainment:</li>
                                <p class="ms-4">{{ $eduLevels[$jobpost->first()->job_Edu] }}</p>
                            </div>

                            <div class="flex flex-row justify-between">
                                <li class="mb-2 font-bold">Salary Range:</li>
                                <p class="ms-4">₱{{ number_format($jobpost->first()->job_MinWage) }} -
                                    ₱{{ number_format($jobpost->first()->job_MaxWage) }}</p>
                            </div>

                            <div class="flex flex-row justify-between">
                                <li class="mb-2 font-bold">Address:</li>
                                <p class="ms-4">{{ $jobpost->first()->job_Address }},
                                    {{ $jobpost->first()->barangay->barangay_Name }},
                                    {{ $jobpost->first()->barangay->municipality->municipality_Name }},
                                    {{ $jobpost->first()->barangay->municipality->province->province_Name }}</p>
                            </div>

                        </ul>

                        {{-- JOB POST LINK --}}
                        <div class="mt-6 flex flex-wrap justify-center">
                            <a href="#" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded">View
                                Job Posting</a>
                        </div>

                    </div>

                </div>


                <div class="bg-white shadow rounded-lg p-6 flex flex-col w-full mt-4">

                    <div class="flex flex-row w-full gap-4">

                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> Job Position
                                Tags
                            </x-input-label>
                            {{-- JOB TAG CONTAINER --}}
                            <div id= "otherSkillRow" class="flex-inline p-1 mt-2">
                                @foreach ($jobpost->first()->job_tags as $jobtags)
                                    {{-- JOB TAGS --}}
                                    <span
                                        class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500 ">
                                        {{ $jobtags->job_positions->position_Title }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>

                {{-- JOB QUALIFICATION CONTAINER --}}
                <div class="bg-white shadow rounded-lg p-6 flex flex-col w-full mt-4">

                    <div class="flex flex-row w-full gap-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> Job Qualification
                            </x-input-label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 h-48"
                                placeholder="Write your thoughts here..." readonly>{{ $jobpost->first()->job_Qualifications }}</textarea>
                        </div>
                    </div>

                </div>

            </div>





            {{-- CONTAINER FOR TABS --}}
            <div class="col-span-4 sm:col-span-8 px-2 sm:px-0">

                {{-- APPLICATION LIST CONTAINER --}}
                <div class="bg-white shadow rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-7">Applicant List</h1>

                    <div class="relative overflow-x-auto">
                        <div
                            class="flex items-center justify-end flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 mr-1">

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
                                <input type="text" id="table-search-users"
                                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Search for Applications">
                            </div>
                        </div>

                        {{-- APPLICANT LIST TABLE --}}
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Jobseeker ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date Applied
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($jobpost->first()->job_applicants as $applicants)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">

                                            <div class="ps-3 text-wrap">
                                                <div class="text-base font-semibold">564</div>

                                            </div>

                                        </th>
                                        <td class="px-6 py-4">
                                            <div class="text-base  font-semibold">{{ $applicants->employee->fname }}
                                                {{ $applicants->employee->mname }} {{ $applicants->employee->lname }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-base font-semibold">{{ $applicants->employee->address }},
                                                {{ $applicants->employee->barangay->barangay_Name }},
                                                {{ $applicants->employee->barangay->municipality->municipality_Name }},
                                                {{ $applicants->employee->barangay->municipality->province->province_Name }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2"></div>
                                                {{ $applicants->applicant_Status }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-base">{{ $applicants->created_at->format('F j, Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="#" class="font-medium text-blue-600 hover:underline "><i
                                                    class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- PAGINATION --}}
                    <div></div>






                </div>
            </div>
        </div>





    </div>
</div>
