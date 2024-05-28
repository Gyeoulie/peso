<div class="mx-10">

    <div class="container  py-8">

        {{-- GRID --}}
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">
            <div class="col-span-4 sm:col-span-12">

                {{-- TITLE --}}
                <h1 class="text-2xl font-bold">Job Posting \ Applicants List</h1>
            </div>

            {{-- COMPANY CONTAINER --}}
            <div class="col-span-4 px-2 sm:px-0">
                <div class="bg-white shadow rounded-lg p-6">

                    <div class="flex flex-col items-center">
                        {{-- COMPANY IMAGE --}}
                        <img src="{{ asset('storage/' . $jobpost->company->company_img) }}"
                            class="w-32 h-32 bg-gray-300 rounded-md mb-4 shrink-0">


                        </img>

                        <h1 class="text-xl font-bold">{{ $jobpost->company->bussines_Name }}
                        </h1>
                        <p class="text-gray-700">#IDNUMBER</p>

                        <div class="flex flex-row mt-6 justify-between w-full">
                            <p class="text-md text-gray-800">{{ $jobpost->company->company_Email }}</p>
                            <p class="text-sm text-gray-800">{{ $jobpost->company->company_Pnum }}</p>
                        </div>

                    </div>

                    {{-- DIVIDER --}}
                    <hr class="my-6 border-t border-gray-300">

                    <div class="flex flex-col">
                        {{-- JOB POSTING INFORMATION --}}
                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Job Posting
                            Details</span>

                        <ul>
                            <div class="flex flex-row justify-between">
                                <li class="mb-2 font-bold">Job Position:</li>
                                <p class="ms-4">{{ $jobpost->job_Title }}</p>
                            </div>

                            <div class="flex flex-row justify-between">
                                <li class="mb-2 font-bold">Industry:</li>
                                <p class="ms-4">{{ $jobpost->industry->industry_Title }}</p>
                            </div>

                            <div class="flex flex-row justify-between">
                                <li class="mb-2 font-bold">Education Attainment:</li>
                                <p class="ms-4">{{ $eduLevels[$jobpost->job_Edu] }}</p>
                            </div>

                            <div class="flex flex-row justify-between">
                                <li class="mb-2 font-bold">Salary Range:</li>
                                <p class="ms-4">₱{{ number_format($jobpost->job_MinWage) }} -
                                    ₱{{ number_format($jobpost->job_MaxWage) }}</p>
                            </div>

                            <div class="flex flex-row justify-between">
                                <li class="mb-2 font-bold">Address:</li>
                                <p class="ms-4">{{ $jobpost->job_Address }},
                                    {{ $jobpost->barangay->barangay_Name }},
                                    {{ $jobpost->barangay->municipality->municipality_Name }},
                                    {{ $jobpost->barangay->municipality->province->province_Name }}</p>
                            </div>

                        </ul>

                        {{-- JOB POST LINK --}}
                        <div class="mt-6 flex flex-wrap justify-center">
                            <a href="{{ route('admin.jobpost', ['id' => $jobpost->job_id]) }}"
                                class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded">View
                                Job Posting</a>
                        </div>

                    </div>

                </div>


                <div class="bg-white shadow rounded-lg p-6 mt-4">

                    <div class="flex flex-row w-full gap-4">

                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> </i> Job Position
                                Tags
                            </x-input-label>
                            {{-- JOB TAG CONTAINER --}}
                            <div id= "otherSkillRow" class="flex-inline p-1 mt-2">

                                @foreach ($jobpost->job_tags as $jobtags)
                                    {{-- JOB TAGS --}}
                                    <span
                                        class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 px-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500 ">
                                        {{ $jobtags->job_positions->position_Title }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>

                {{-- JOB QUALIFICATION CONTAINER --}}
                <div class="bg-white shadow rounded-lg p-6 mt-4">

                    <div class="flex flex-row w-full gap-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> Job Qualification
                            </x-input-label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 h-48"
                                placeholder="Write your thoughts here..." readonly>{{ $jobpost->job_Qualifications }}</textarea>
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
                            class="flex items-center  flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 mr-1">

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
                                    placeholder="Search for Applicants">
                            </div>
                        </div>

                        {{-- APPLICANT LIST TABLE --}}
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
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
                                @if ($jobApplicants->isEmpty())
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
                                                    No Applicants Found
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                @else
                                    @foreach ($jobApplicants as $applicants)
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <td class="px-6 py-4">
                                                <div class="text-base  font-semibold">
                                                    {{ $applicants->employee->fname }}
                                                    {{ $applicants->employee->mname }}
                                                    {{ $applicants->employee->lname }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-base font-semibold">
                                                    {{ $applicants->employee->address }},
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
                                                <div x-data="{ tooltip: 'Applicant Overview' }">
                                                    <a x-tooltip="tooltip" type="button"
                                                        class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                                clip-rule="evenodd" />
                                                        </svg>



                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    {{-- PAGINATION --}}
                    <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
                        aria-label="Table navigation">
                        <span
                            class="text-sm font-normal text-gray-500 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing
                            <span class="font-semibold text-gray-900">1-10</span> of <span
                                class="font-semibold text-gray-900">1000</span></span>
                        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 ">Previous</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">1</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page"
                                    class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">3</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">4</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">5</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 ">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


</div>
