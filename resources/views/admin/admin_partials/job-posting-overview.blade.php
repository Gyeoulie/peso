<x-admin-layout>

    <div class="container mx-10 py-8">
        {{-- GRID --}}
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-4  p- sm:p-0">
            <div class="col-span-4 sm:col-span-12">

                {{-- TITLE --}}
                <h1 class="text-2xl font-bold">Job Posting Overview</h1>
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
                            <img src="https://randomuser.me/api/portraits/men/94.jpg"
                                class="w-32 h-32 bg-gray-300 rounded-lg shrink-0">
                            </img>

                            <div class="flex flex-col ml-4 w-full">
                                <h1 class="text-xl sm:text-3xl font-bold">National University</h1>
                                <p class="text-sm sm:text-lg text-gray-700">SM Baliwag
                                    Complex, Doña
                                    Remedios Trinidad, Highway, Brgy. Pagala, Baliuag, Bulacan 3006</p>
                            </div>

                        </div>

                        <div class="flex flex-col w-full ">
                            {{-- WEB DATE --}}
                            <h1 class="hidden sm:block text-lg font-light ml-auto mr-2 mb-auto">April 28, 2024</h1>

                            {{-- WEB BUTTONS --}}
                            <div class="hidden sm:flex flex-row w-full justify-end">
                                <button type="button"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none"
                                    style="width: 100px;" x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'reject-modal')">Reject</button>
                                <button type="button"
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none"
                                    style="width: 100px;" x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'approve-modal')">Approve</button>
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
                            x-on:click.prevent="$dispatch('open-modal', 'approve-modal')">Approve</button>
                    </div>

                </div>

            </div>

            {{-- SECOND CONTAINER FOR JOB DESCRIPTION --}}
            <div class="col-span-4 sm:col-span-6">
                <div class="bg-white shadow rounded-lg p-6 flex flex-col">

                    <h1 class="text-3xl font-bold">Job Posting Description</h1>

                    <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">

                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                Title
                            </x-input-label>
                            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fnamePost" />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                Industry
                            </x-input-label>
                            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fnamePost" />
                        </div>

                    </div>


                    <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">

                        <div class="flex flex-col ml w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i>
                                Educational Attainment
                            </x-input-label>
                            <select id="suffix" name="suffixPost" class="block mt-1 w-full rounded">
                                <option value="" disabled selected>Select Type</option>
                                <option value="mr">None</option>
                                <option value="mrs">Full-Time</option>
                                <option value="ms">Contractual/Part-Time</option>
                            </select>
                        </div>

                        <div class="flex flex-col sm:flex-col ml w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Employment Type
                            </x-input-label>
                            <select id="suffix" name="suffixPost" class="block mt-1 w-full rounded">
                                <option value="" disabled selected>Select Type</option>
                                <option value="mr">None</option>
                                <option value="mrs">Full-Time</option>
                                <option value="ms">Contractual/Part-Time</option>
                            </select>
                        </div>

                    </div>

                    <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">

                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Wage Range
                            </x-input-label>
                            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fnamePost" />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                Posting Duration
                            </x-input-label>
                            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fnamePost" />
                        </div>

                        <div class="flex flex-col w-1/3">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job Slots
                            </x-input-label>
                            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fnamePost" />
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
                                <span
                                    class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500 ">
                                    Professor
                                    <button type="button"
                                        class="flex-shrink-0 size-4 inline-flex items-center justify-center rounded-full hover:bg-blue-200 focus:outline-none focus:bg-blue-200 focus:text-blue-500 dark:hover:bg-blue-900">
                                        <span class="sr-only">Remove badge</span>
                                        <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M18 6 6 18" />
                                            <path d="m6 6 12 12" />
                                        </svg>
                                    </button>
                                </span>

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
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Write your thoughts here..."></textarea>
                        </div>
                    </div>

                    <div class="flex flex-row mt-4 w-full gap-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                Qualification
                            </x-input-label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Write your thoughts here..."></textarea>
                        </div>
                    </div>

                    <div class="flex flex-row mt-4 w-full gap-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                Company Remarks
                            </x-input-label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Write your thoughts here..."></textarea>
                        </div>
                    </div>

                </div>


            </div>
        </div>

        {{-- WEB REQUIREMENT CONTAINER --}}
        <div class="hidden sm:block col-span-4 sm:col-span-6">
            <div class="bg-white shadow rounded-lg p-6 flex flex-col">

                {{-- TITLE --}}
                <h1 class="text-3xl font-bold">Requirements</h1>

                <div class="flex flex-row mt-4 w-full gap-4">

                    <div class="flex flex-col ">
                        <x-input-label for="fname"><i class="fa-solid fa-file"></i></i> File 1
                        </x-input-label>
                        <button type="button"
                            class="text-gray-900 bg-gray-400 hover:bg-gray-100 border border-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2">
                            <i class="fa-solid fa-file-contract me-2"></i>
                            File Requirement
                        </button>
                    </div>

                    <div class="flex flex-col ">
                        <x-input-label for="fname"><i class="fa-solid fa-file"></i></i> File 1
                        </x-input-label>
                        <button type="button"
                            class="text-gray-900 bg-gray-400 hover:bg-gray-100 border border-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2">
                            <i class="fa-solid fa-file-contract me-2"></i>
                            File Requirement
                        </button>
                    </div>

                    <div class="flex flex-col ">
                        <x-input-label for="fname"><i class="fa-solid fa-file"></i></i> File 1
                        </x-input-label>
                        <button type="button"
                            class="text-gray-900 bg-gray-400 hover:bg-gray-100 border border-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2">
                            <i class="fa-solid fa-file-contract me-2"></i>
                            File Requirement
                        </button>
                    </div>

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
                    <x-input-label for="eligibilityType" :value="__('Remarks')" />
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                </div>

            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button type="button" onclick="eligibilityReset()">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3" type="button" id="eligibilityAdd">
                    {{ __('Approve Job Posting') }}
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
                    <x-input-label for="eligibilityType" :value="__('Remarks')" />
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                </div>

            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button type="button" onclick="eligibilityReset()">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" type="button" id="eligibilityAdd">
                    {{ __('Reject Application') }}
                </x-danger-button>
            </div>
        </div>
    </x-modal>


</x-admin-layout>
