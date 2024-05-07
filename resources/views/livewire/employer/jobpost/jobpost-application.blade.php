<div>
    <div class="mt-12">
        <div class="max-w-3xl mx-auto px-2 sm:px-6 lg:px-8">

            <ol class="flex items-center w-full text-sm font-medium text-center text-gray-500  sm:text-base">
                <li
                    class="flex md:w-full items-center text-blue-600  sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 ">
                    <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 ">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        Job <span class="hidden sm:inline-flex sm:ms-2">Information</span>
                    </span>
                </li>
                <li
                    class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 ">
                    <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 ">
                        <span class="me-2">2</span>
                        Requirements <span class="hidden sm:inline-flex sm:ms-2"></span>
                    </span>
                </li>
                <li class="flex items-center">
                    <span class="me-2">3</span>
                    Confirmation
                </li>
            </ol>

        </div>
    </div>



    <div class="post-section py-3" id="step1">
        <div class="max-w-6xl mx-auto p-2 sm:px-6 lg:px-8">


            {{-- FIRST CONTAINER - JOB INFORMATION --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">
                {{-- TITLE --}}
                <h1 class="text-5xl font-bold mt-4 mb-4">Fill in the Details</h1>


                <div class="flex flex-row mt-4 w-full gap-4">

                    <div class="flex flex-col w-full">
                        <x-input-label for="jobTitlePost"> <i class="fa-solid fa-briefcase"></i> Job Title
                        </x-input-label>
                        <x-text-input wire:model='jobTitlePost' class="block mt-1 w-full" type="text" />
                        <x-input-error :messages="$errors->get('jobTitlePost')" class="mt-2" />
                    </div>

                    <div class="flex flex-col w-full">
                        <x-input-label for="jobIndustryPost"> <i class="fa-solid fa-briefcase"></i> Job Industry
                        </x-input-label>
                        <x-text-input wire:model='jobIndustryPost' class="block mt-1 w-full" type="text" />
                        <x-input-error :messages="$errors->get('jobIndustryPost')" class="mt-2" />
                    </div>

                </div>

                <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">

                    <div class="flex flex-row gap-4 w">

                        <div class="flex flex-col w-full">
                            <x-input-label for="minWagePost"> <i class="fa-solid fa-briefcase"></i> Minimum Wage
                            </x-input-label>
                            <x-text-input wire:model='minWagePost' class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('minWagePost')" class="mt-2" />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="maxWagePost"> <i class="fa-solid fa-briefcase"></i> Max Wage
                            </x-input-label>
                            <x-text-input wire:model='maxWagePost' class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('maxWagePost')" class="mt-2" />
                        </div>

                    </div>


                    <div class="flex flex-col ml sm:w-1/4">
                        <x-input-label for="eduPost"> <i class="fa-solid fa-briefcase"></i> Educational Attainment
                        </x-input-label>
                        <select wire:model='eduPost' class="block mt-1 w-full rounded">
                            <option value="" disabled selected>Select Type</option>
                            <option value="mr">None</option>
                            <option value="mrs">Full-Time</option>
                            <option value="ms">Contractual/Part-Time</option>

                        </select>
                        <x-input-error :messages="$errors->get('eduPost')" class="mt-2" />
                    </div>

                    <div class="flex flex-col ml sm:w-1/4">
                        <x-input-label for="jtypePost"> <i class="fa-solid fa-briefcase"></i> Job Type
                        </x-input-label>
                        <select wire:model='jtypePost' class="block mt-1 w-full rounded">
                            <option value="" disabled selected>Select Type</option>
                            <option value="mr">None</option>
                            <option value="mrs">Full-Time</option>
                            <option value="ms">Contractual/Part-Time</option>
                        </select>
                        <x-input-error :messages="$errors->get('jtypePost')" class="mt-2" />
                    </div>

                </div>

                <div class="flex flex-col sm:flex-row mt-4 w-full gap-4 mb-4">

                    <div class="flex flex-row gap-4 w-full sm:w-1/3">
                        <div class="flex flex-col w-full">
                            <x-input-label for="wAddPost"> <i class="fa-solid fa-briefcase"></i> Work Address
                            </x-input-label>
                            <x-text-input wire:model='wAddPost' class="block mt-1 w-full" type="text" />
                        </div>
                        <x-input-error :messages="$errors->get('wAddPost')" class="mt-2" />
                    </div>

                    <div class="flex flex-row gap-4 w-full sm:w-2/3">
                        <div class="flex flex-col w-full">
                            <x-input-label for="barPost"> <i class="fa-solid fa-briefcase"></i> Barangay
                            </x-input-label>
                            <x-text-input wire:model='barPost' class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('barPost')" class="mt-2" />
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="mun"> <i class="fa-solid fa-briefcase"></i> Province
                            </x-input-label>
                            <x-text-input class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('mun')" class="mt-2" />
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="prov"> <i class="fa-solid fa-briefcase"></i> Municipallity
                            </x-input-label>
                            <x-text-input class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('prov')" class="mt-2" />
                        </div>
                    </div>

                </div>


            </div>

        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">

                <div class="flex flex-row my-4 w-full gap-4">

                    <div class="flex flex-col ml w-1/2">
                        <x-input-label for="pesoPost"> <i class="fa-solid fa-briefcase"></i> PESO Branch
                        </x-input-label>
                        <select wire:model='pesoPost' class="block mt-1 w-full rounded">
                            <option value="" disabled selected>Select Type</option>
                            <option value="mr">None</option>
                            <option value="mrs">Full-Time</option>
                            <option value="ms">Contractual/Part-Time</option>
                        </select>
                        <x-input-error :messages="$errors->get('pesoPost')" class="mt-2" />
                    </div>

                </div>

                <div class="flex flex-row mt-4 w-full gap-4">

                    <div class="flex flex-col w-1/2">
                        <x-input-label for="durationPost"> <i class="fa-solid fa-briefcase"></i> Job Posting Duration
                        </x-input-label>
                        <x-text-input wire:model='durationPost' class="block mt-1 w-full" type="date" />
                        <x-input-error :messages="$errors->get('durationPost')" class="mt-2" />
                    </div>

                    <div class="flex flex-col w-1/3 mb-5">
                        <x-input-label for="slotsPost"> <i class="fa-solid fa-briefcase"></i> Job Slots
                        </x-input-label>
                        <x-text-input wire:model='slotsPost' class="block mt-1 w-full" type="text" />
                        <x-input-error :messages="$errors->get('slotsPost')" class="mt-2" />
                    </div>

                </div>


            </div>
        </div>



        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">

                <div class="flex flex-row my-4 w-full gap-4">
                    <div class="flex flex-col w-full">

                        <div class="flex flex-row w-full items-center">

                            <x-input-label for="fname"> </i> Job Position
                                Tags
                            </x-input-label>

                            <x-primary-button class="ml-auto mr-3" type="button" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'jobTag-modal')">
                                Add Job Tag
                            </x-primary-button>

                        </div>

                        <div class="flex-inline border border-gray-300 rounded-lg p-1 mt-2">

                            <span
                                class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ">
                                Professor
                                <button type="button"
                                    class="flex-shrink-0 size-4 inline-flex items-center justify-center rounded-full hover:bg-blue-200 focus:outline-none focus:bg-blue-200 focus:text-blue-500 ">
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
                        <x-input-error :messages="$errors->get('jobTags')" class="mt-2" />

                    </div>
                </div>

            </div>
        </div>


        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">

                <div class="flex flex-col sm:flex-row w-full sm:space-x-4 mt-4">

                    <div class="flex flex-col w-full ">
                        <x-input-label for="descPost"> <i class="fa-solid fa-briefcase"></i> Job Description
                        </x-input-label>
                        <textarea wire:model='descPost' rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>
                        <x-input-error :messages="$errors->get('descPost')" class="mt-2" />
                    </div>

                    <div class="flex flex-col w-full ">
                        <x-input-label for="qualPost"> <i class="fa-solid fa-briefcase"></i> Job Qualification
                        </x-input-label>
                        <textarea wire:model='qualPost' rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>
                        <x-input-error :messages="$errors->get('qualPost')" class="mt-2" />
                    </div>

                </div>

                <div class="flex flex-col w-full mt-4">
                    <x-input-label for="remPost"> <i class="fa-solid fa-briefcase"></i> Remarks
                    </x-input-label>
                    <textarea wire:model='remPost' rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                    <x-input-error :messages="$errors->get('remPost')" class="mt-2" />
                </div>

                <div class="flex flex-row mt-4 mb-4 ">
                    <button type="button"
                        class="ml-auto mr-4 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none"
                        style="width: 100px;">Next</button>
                </div>


            </div>
        </div>


    </div>



    <div class="post-section py-3" id="step2">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">

                <h1 class="text-3xl py-4 font-bold">Upload the Requirements</h1>

                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-5 w-full">

                    <div class="flex flex-col w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                            file</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            aria-describedby="file_input_help" type="file">
                        <p class="mt-1 text-sm text-gray-500 0">SVG, PNG, JPG or GIF (MAX.
                            800x400px).</p>
                    </div>

                    <div class="flex flex-col w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload
                            file</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            aria-describedby="file_input_help" type="file">
                        <p class="mt-1 text-sm text-gray-500">SVG, PNG, JPG or GIF (MAX.
                            800x400px).</p>
                    </div>

                </div>

                <div class="flex flex-row mt-4 mb-4 ">
                    <button type="button"
                        class="ml-auto mr-4 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none"
                        style="width: 100px;">Next</button>
                </div>

            </div>
        </div>

    </div>

</div>
