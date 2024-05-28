<div class="sm:mx-10">
    <div class="container py-8">

        <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">


            <div class="col-span-4 sm:col-span-12">

                {{-- TITLE --}}
                <h1 class="text-2xl font-bold">Job Posting \ Applicants List</h1>
            </div>

            {{-- ALERT MESSAGE FOR MATCH --}}
            <div class="col-span-4 sm:col-span-12">

                <div class="bg-green-100 shadow rounded-lg p-6">
                    <div class="flex flex-row items-center justify-between">
                        <p class="text-green-700 font-bold text-xl">This job matches applicant's preferences</p>
                        <svg class="w-9 h-9 sm:w-9 sm:h-9 text-green-700 me-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                    </div>
                </div>

                <div class="bg-red-100 shadow rounded-lg p-6">
                    <div class="flex flex-row items-center justify-between">
                        <p class="text-red-700 font-bold  text-xl">This job doesn't match applicant's
                            preferences
                        </p>
                        <svg class="w-9 h-9 sm:w-10 sm:h-10 text-red-700 me-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

            </div>

            {{-- COMPANY CONTAINER --}}
            <div class="col-span-4 px-2 sm:px-0">
                <div class="bg-white shadow rounded-lg p-6">

                    <div class="flex flex-col items-center">
                        {{-- IMAGE --}}
                        <img src="https://randomuser.me/api/portraits/men/94.jpg"
                            class="w-32 h-32 bg-gray-300 rounded-md mb-4 shrink-0">
                        </img>

                        <h1 class="text-xl font-bold">{{ $applicant->job_posting->company->bussines_Name }}</h1>
                        <p class="text-gray-700">#IDNUMBER</p>

                        <div class="flex flex-row mt-6 justify-between w-full">
                            <p class="text-md text-gray-800">{{ $applicant->job_posting->company->company_Email }}</p>
                            <p class="text-sm text-gray-800">{{ $applicant->job_posting->company->company_Pnum }}</p>
                        </div>

                    </div>

                    <hr class="my-6 border-t border-gray-300">

                    <div class="flex flex-col">
                        {{-- JOB POSTING INFORMATION --}}
                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Job Posting
                            Details</span>

                        <ul>
                            <div class="flex flex-row">
                                <li class="mb-2 font-bold">Job Position:</li>
                                <p class="ms-4">{{ $applicant->job_posting->job_Title }}</p>
                            </div>

                            <div class="flex flex-row">
                                <li class="mb-2 font-bold">Industry:</li>
                                <p class="ms-4">{{ $applicant->job_posting->job_industry->industry_Title }}</p>
                            </div>

                            <div class="flex flex-row">
                                <li class="mb-2 font-bold">Education Attainment:</li>
                                <p class="ms-4">{{ $eduLevels[$applicant->job_posting->job_Edu] }}</p>
                            </div>

                            <div class="flex flex-row">
                                <li class="mb-2 font-bold">Salary Range:</li>
                                <p class="ms-4">20,000 - 50,000</p>
                            </div>

                            <div class="flex flex-row">
                                <li class="mb-2 font-bold">Address:</li>
                                <p class="ms-4">SM Baliwag
                                    Complex, Doña
                                    Remedios Trinidad, Highway, Brgy. Pagala, Baliuag, Bulacan 3006</p>
                            </div>

                        </ul>

                        <div class="mt-6 flex flex-wrap justify-center">
                            <a href="#" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded">View
                                Job Posting</a>
                        </div>

                    </div>

                </div>

                {{-- TAGS CONTAINER --}}
                <div class="bg-white shadow rounded-lg p-6 mt-4">
                    <div class="flex flex-row w-full gap-4">

                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> </i> Job Position
                                Tags
                            </x-input-label>
                            {{-- BADGE CONTAINER --}}
                            <div id= "otherSkillRow" class="flex-inline p-1 mt-2">

                                {{-- BADGE --}}
                                <span
                                    class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500 ">
                                    Professor
                                </span>

                            </div>
                        </div>

                    </div>

                </div>


                {{-- JOB QUALIFICATION CONTAINER --}}
                <div class="bg-white shadow rounded-lg p-6 mt-4">

                    <div class="flex flex-row w-full gap-4">

                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> </i> Job Position
                                Tags
                            </x-input-label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Write your thoughts here..." disabled></textarea>
                        </div>

                    </div>

                </div>

            </div>






            <div class="col-span-4 sm:col-span-8 px-2 sm:px-0">
                {{-- CONTAINER FOR APPLICANT INFORMATION --}}
                <div class="bg-white shadow rounded-lg p-6">
                    <h1 class="text-2xl font-bold mb-7">Applicant Information</h1>

                    {{-- PHONE DATE (SMALL SCREEN) --}}
                    <div class="sm:hidden flex flex-row w-full justify-end">
                        <h1 class="text-sm font-light ml-auto mr-5 mt-1 mb-auto">April 28, 2024</h1>
                    </div>

                    <div class="flex flex-row w-full">
                        <div class="flex flex-row w-full items-center">
                            {{-- IMG --}}
                            <img src="https://randomuser.me/api/portraits/men/94.jpg"
                                class="w-32 h-32 bg-gray-300 rounded-lg shrink-0">
                            </img>

                            <div class="flex flex-col ml-4 w-full">
                                <h1 class="text-xl sm:text-3xl font-bold">John Rafael V. Facun</h1>
                                <p class="text-sm sm:text-lg text-gray-700">#APPLICANTID</p>
                            </div>

                        </div>

                        <div class="flex flex-col w-full ">
                            {{-- WEB DATE --}}
                            <h1 class="hidden sm:block text-lg font-light ml-auto mr-2 mb-auto">April 28, 2024
                            </h1>
                            {{-- WEB BUTTONS --}}
                            <div class="hidden sm:flex flex-row w-full justify-end">
                                <button type="button"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none"
                                    style="width: 100px;" x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'reject-modal')">Reject</button>
                                <button type="button"
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none"
                                    style="width: 100px;" x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'recommendation-modal')">Approve</button>
                            </div>
                        </div>

                    </div>

                    {{-- MOBILE BUTTONS (SMALL SCREEN) --}}
                    <div class="sm:hidden flex flex-row w-full mt-4 justify-center space-x-4">
                        <button type="button"
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'reject-modal')">Reject</button>
                        <button type="button"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'recommendation-modal')">Approve</button>
                    </div>

                    <hr class="my-6 border-t border-gray-300">

                    <div class="flex flex-row">

                        <div class="flex flex-col w-full">
                            <ul>
                                <div class="flex flex-row">
                                    <li class="mb-2 font-bold">Status:</li>
                                    <p class="ms-4">UNEMPLOYED</p>
                                </div>

                                <div class="flex flex-row">
                                    <li class="mb-2 font-bold">Birthdate:</li>
                                    <p class="ms-4">July 1, 1990</p>
                                </div>

                                <div class="flex flex-row">
                                    <li class="mb-2 font-bold">Gender:</li>
                                    <p class="ms-4">Male</p>
                                </div>
                                <div class="flex flex-row">
                                    <li class="mb-2 font-bold">Contact:</li>
                                    <p class="ms-4">09123456789</p>
                                </div>
                                <div class="flex flex-row">
                                    <li class="mb-2 font-bold">Email:</li>
                                    <p class="ms-4">sample@email.com</p>
                                </div>

                                <div class="flex flex-row">
                                    <li class="mb-2 font-bold">Address:</li>
                                    <p class="ms-4">SM Baliwag
                                        Complex, Doña
                                        Remedios Trinidad, Highway, Brgy. Pagala, Baliuag, Bulacan 3006</p>
                                </div>
                            </ul>

                        </div>


                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> </i> Job Position
                                Tags
                            </x-input-label>
                            {{-- BADGE CONTAINER --}}
                            <div id= "otherSkillRow" class="flex-inline p-1 mt-2">

                                {{-- BADGE --}}
                                <span
                                    class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500 ">
                                    Professor
                                </span>
                                <span
                                    class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500 ">
                                    Professor
                                </span>
                                <span
                                    class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500 ">
                                    Professor
                                </span>
                            </div>
                        </div>


                    </div>

                    {{-- BUTTONS --}}
                    <div class="flex flex-row mt-4 justify-center w-full">
                        <div class="mt-6 flex flex-wrap gap-4 justify-center">
                            <a href="#" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded">View
                                NSRP</a>
                            <a href="#"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">View
                                Resume</a>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>


    {{-- RECOMMENDATION BUTTON MODAL --}}
    <x-modal name="recommendation-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to recommend?') }}
            </h2>
            <hr>
            <div class="flex flex-col mt-2">

                <div class="flex flex-col ">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                        Recommendation Letter</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                        aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 0" id="file_input_help">PDF Only</p>
                </div>

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="eligibilityType" :value="__('Remarks')" />
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                </div>

            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button type="button">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3" type="button" id="eligibilityAdd">
                    {{ __('Confirm Recommendation') }}
                </x-primary-button>
            </div>
        </div>
    </x-modal>


    {{-- REJECT MODAL --}}
    <x-modal name="reject-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to Reject?') }}
            </h2>
            <hr>
            <div class="flex flex-col mt-2">

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="eligibilityType" :value="__('Remarks')" />
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                </div>

            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button type="button">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" type="button" id="eligibilityAdd">
                    {{ __('Reject') }}
                </x-danger-button>
            </div>
        </div>
    </x-modal>



</div>
