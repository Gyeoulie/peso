<div>
    <div x-show="profileTab === 'editEducation'" class="container">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex flex-row w-full items-center justify-between mb-4">
                <div class="flex flex-row items-center gap-4">
                    <div class="flex items-center rounded-full hover:bg-gray-300 transition-transform p-1"
                        @click="profileTab = 'profileOverview'">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold">Education</h2>

                </div>

                <div class="flex flex-row gap-4 items-center">
                    <div class="flex items-center rounded-full hover:bg-gray-300 transition-transform p-1"
                        x-data="" x-on:click.prevent="$dispatch('open-modal', 'education-modal')">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>

                    </div>
                </div>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 ">

                <div class="container bg-gray-200 p-3 rounded-lg shadow ">

                    <div class="flex flex-row">

                        <div class="flex flex-col h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-10 h-10 sm:w-20 sm:h-20 text-gray-800 ">
                                <path
                                    d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                <path
                                    d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                                <path
                                    d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                            </svg>

                        </div>

                        <div class="flex flex-col ml-4 w-full">
                            <span class="text-2xl text-black font-bold">National University
                                Baliwag</span>
                            <div class="text-lg text-black font-semibold"><span>Bachelor of Science in
                                    Information Technology
                            </div>
                            <span class="text-sm text-gray-700 font-medium">June 2020 - June
                                2023</span>
                        </div>


                        <div class="flex flex-col h-full items-center justify-center">
                            <div class="flex items-center rounded-full hover:bg-gray-300 transition-transform p-1">
                                <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </div>
                        </div>

                    </div>


                </div>



            </div>


        </div>
    </div>



    <x-modal name="education-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Education Record') }}
            </h2>
            <hr>
            <div class="flex flex-col mt-2">

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="eduSchool" :value="__('School')" />
                    <x-text-input id="eduSchool" class="block mt-1 w-full" type="text" />
                    <x-input-error :messages="$errors->get('jobTags')" class="mt-2" />
                </div>
                <div class="flex flex-row mt-2 w-full">
                    <div class="flex flex-col w-full">
                        <x-input-label for="eduLevel" :value="__('Level')" />
                        <select id="eduLevel" class="block mt-1 w-full">
                            <option value="" disabled selected>Select Level</option>
                            <td class="border px-6 py-4">
                                <option data-edulevel-attribute="1" value="GRADE I">GRADE I</option>
                                <option data-edulevel-attribute="2" value="GRADE II">GRADE II</option>
                                <option data-edulevel-attribute="3" value="GRADE III">GRADE III</option>
                                <option data-edulevel-attribute="4" value="GRADE IV">GRADE IV</option>
                                <option data-edulevel-attribute="5" value="GRADE V">GRADE V</option>
                                <option data-edulevel-attribute="6" value="GRADE VI">GRADE VI</option>
                                <option data-edulevel-attribute="7" value="GRADE VII">GRADE VII</option>
                                <option data-edulevel-attribute="8" value="GRADE VIII">GRADE VIII</option>
                                <option data-edulevel-attribute="9" value="ELEMENTARY GRADUATE">ELEMENTARY GRADUATE
                                </option>
                                <option data-edulevel-attribute="10"
                                    value="1ST YEAR HIGH SCHOOL/GRADE VII (FOR K TO 12)">
                                    1ST YEAR HIGH SCHOOL/GRADE VII (FOR K TO 12)</option>
                                <option data-edulevel-attribute="11"
                                    value="2ND YEAR HIGH SCHOOL/GRADE VIII (FOR K TO 12)">
                                    2ND YEAR HIGH SCHOOL/GRADE VIII (FOR K TO 12)</option>
                                <option data-edulevel-attribute="12"
                                    value="3RD YEAR HIGH SCHOOL/GRADE IX (FOR K TO 12)">3RD
                                    YEAR HIGH SCHOOL/GRADE IX (FOR K TO 12)</option>
                                <option data-edulevel-attribute="13" value="4TH YEAR HIGH SCHOOL/GRADE X (FOR K TO 12)">
                                    4TH
                                    YEAR HIGH SCHOOL/GRADE X (FOR K TO 12)</option>
                                <option data-edulevel-attribute="14" value="GRADE XI (FOR K TO 12)">GRADE XI (FOR K TO
                                    12)
                                </option>
                                <option data-edulevel-attribute="15" value="GRADE XII (FOR K TO 12)">GRADE XII (FOR K TO
                                    12)
                                </option>
                                <option data-edulevel-attribute="16" value="HIGH SCHOOL GRADUATE">HIGH SCHOOL GRADUATE
                                </option>
                                <option data-edulevel-attribute="17" value="VOCATIONAL UNDERGRADUATE">VOCATIONAL
                                    UNDERGRADUATE</option>
                                <option data-edulevel-attribute="18" value="VOCATIONAL GRADUATE">VOCATIONAL GRADUATE
                                </option>
                                <option data-edulevel-attribute="19" value="1ST YEAR COLLEGE LEVEL">1ST YEAR COLLEGE
                                    LEVEL
                                </option>
                                <option data-edulevel-attribute="20" value="2ND YEAR COLLEGE LEVEL">2ND YEAR COLLEGE
                                    LEVEL
                                </option>
                                <option data-edulevel-attribute="21" value="3RD YEAR COLLEGE LEVEL">3RD YEAR COLLEGE
                                    LEVEL
                                </option>
                                <option data-edulevel-attribute="22" value="4TH YEAR COLLEGE LEVEL">4TH YEAR COLLEGE
                                    LEVEL
                                </option>
                                <option data-edulevel-attribute="23" value="5TH YEAR COLLEGE LEVEL">5TH YEAR COLLEGE
                                    LEVEL
                                </option>
                                <option data-edulevel-attribute="24" value="COLLEGE GRADUATE">COLLEGE GRADUATE
                                </option>
                                <option data-edulevel-attribute="25" value="MASTERAL/POST GRADUATE LEVEL">
                                    MASTERAL/POST
                                    GRADUATE LEVEL</option>
                                <option data-edulevel-attribute="26" value="MASTERAL/POST GRADUATE">MASTERAL/POST
                                    GRADUATE
                                </option>
                        </select>
                        <x-input-error :messages="$errors->get('jobTags')" class="mt-2" />
                    </div>
                    <div class="flex flex-col ml-4 w-full">
                        <x-input-label for="eduCourse" :value="__('Course')" />
                        <x-text-input id="eduCourse" class="block mt-1 w-full" type="text" />
                        <x-input-error :messages="$errors->get('jobTags')" class="mt-2" />
                    </div>
                </div>
                <div class="flex flex-row mt-2 w-full">
                    <div class="flex flex-col w-full">
                        <x-input-label for="eduStart" :value="__('Started')" />
                        <x-text-input id="eduStart" class="block mt-1 w-full" type="date" />
                        <x-input-error :messages="$errors->get('jobTags')" class="mt-2" />
                    </div>
                    <div class="flex flex-col ml-4 w-full">
                        <x-input-label for="eduEnd" :value="__('Ended')" />
                        <x-text-input id="eduEnd" class="block mt-1 w-full" type="date" />
                        <x-input-error :messages="$errors->get('jobTags')" class="mt-2" />
                    </div>
                </div>

            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button ype="button">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" type="button" id="eduAdd">
                    {{ __('Save') }}
                </x-danger-button>
            </div>
        </div>
    </x-modal>
</div>
