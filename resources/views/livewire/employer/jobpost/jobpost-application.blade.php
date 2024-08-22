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

                @if ($currentSlide < 2)
                    <li
                        class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10">
                        <span
                            class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                            <span class="me-2">2</span>
                            Requirements
                            <span class="hidden sm:inline-flex sm:ms-2"></span>
                        </span>
                    </li>
                @else
                    <li
                        class="flex md:w-full items-center text-blue-600 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10">
                        <span
                            class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            Requirements
                        </span>
                    </li>
                @endif
                @if ($currentSlide < 3)
                    <li class="flex items-center">
                        <span class="me-2">3</span>
                        Confirmation
                    </li>
                @else
                    <li class="flex items-center text-blue-600">
                        <span
                            class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            Confirmation
                        </span>
                    </li>
                @endif

            </ol>

        </div>
    </div>



    <div class=" {{ $currentSlide != 1 ? 'hidden' : '' }} post-section py-3" id="step1">
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
                        <x-text-input wire:model='jobIndustryPost' class="block mt-1 w-full" type="text" readonly
                            x-data="" x-on:click.prevent="$dispatch('open-modal', 'industry-modal')"
                            x-on:focus="$dispatch('open-modal', 'industry-modal')" />
                        <x-input-error :messages="$errors->get('jobIndustryPost')" class="mt-2" />
                    </div>

                </div>

                <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">

                    <div class="flex flex-row gap-4 w-full">

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
                            <option value="0">NONE</option>
                            <option value="1">GRADE I</option>
                            <option value="2">GRADE II</option>
                            <option value="3">GRADE III</option>
                            <option value="4">GRADE IV</option>
                            <option value="5">GRADE V</option>
                            <option value="6">GRADE VI</option>
                            <option value="7">GRADE VII</option>
                            <option value="8">GRADE VIII</option>
                            <option value="9">ELEMENTARY GRADUATE</option>
                            <option value="10">1ST YEAR HIGH SCHOOL/GRADE VII (FOR K TO 12)</option>
                            <option value="11">2ND YEAR HIGH SCHOOL/GRADE VIII (FOR K TO 12)</option>
                            <option value="12">3RD YEAR HIGH SCHOOL/GRADE IX (FOR K TO 12)</option>
                            <option value="13">4TH YEAR HIGH SCHOOL/GRADE X (FOR K TO 12)</option>
                            <option value="14">GRADE XI (FOR K TO 12)</option>
                            <option value="15">GRADE XII (FOR K TO 12)</option>
                            <option value="16">HIGH SCHOOL GRADUATE</option>
                            <option value="17">VOCATIONAL UNDERGRADUATE</option>
                            <option value="18">VOCATIONAL GRADUATE</option>
                            <option value="19">1ST YEAR COLLEGE LEVEL</option>
                            <option value="20">2ND YEAR COLLEGE LEVEL</option>
                            <option value="21">3RD YEAR COLLEGE LEVEL</option>
                            <option value="22">4TH YEAR COLLEGE LEVEL</option>
                            <option value="23">5TH YEAR COLLEGE LEVEL</option>
                            <option value="24">COLLEGE GRADUATE</option>
                            <option value="25">MASTERAL/POST GRADUATE LEVEL</option>
                            <option value="26">MASTERAL/POST GRADUATE</option>
                        </select>
                        <x-input-error :messages="$errors->get('eduPost')" class="mt-2" />
                    </div>

                    <div class="flex flex-col ml sm:w-1/4">
                        <x-input-label for="jtypePost"> <i class="fa-solid fa-briefcase"></i> Job Type
                        </x-input-label>
                        <select wire:model='jtypePost' class="block mt-1 w-full rounded">
                            <option value="" disabled selected>Select Type</option>
                            <option value="1">Full-Time</option>
                            <option value="2">Contractual/Part-Time</option>
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
                            <x-input-error :messages="$errors->get('wAddPost')" class="mt-2" />
                        </div>

                    </div>

                    <div class="flex flex-row gap-4 w-full sm:w-2/3">
                        <div class="flex flex-col w-full">
                            <x-input-label for="barPost"> <i class="fa-solid fa-briefcase"></i> Barangay
                            </x-input-label>
                            <x-text-input wire:model='barPost' class="block mt-1 w-full" type="text" readonly
                                x-data="" x-on:click.prevent="$dispatch('open-modal', 'barangay-modal')"
                                x-on:focus="$dispatch('open-modal', 'barangay-modal')" />
                            <x-input-error :messages="$errors->get('barPost')" class="mt-2" />
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="mun"> <i class="fa-solid fa-briefcase"></i> Province
                            </x-input-label>
                            <x-text-input wire:model='mun' class="block mt-1 w-full" type="text" readonly />
                            <x-input-error :messages="$errors->get('mun')" class="mt-2" />
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="prov"> <i class="fa-solid fa-briefcase"></i> Municipallity
                            </x-input-label>
                            <x-text-input wire:model='prov' class="block mt-1 w-full" type="text" readonly />
                            <x-input-error :messages="$errors->get('prov')" class="mt-2" />
                        </div>
                    </div>

                </div>


            </div>

        </div>

        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 mt-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">

                <div class="flex flex-row my-4 w-full gap-4">

                    <div class="flex flex-col ml w-1/2">
                        <x-input-label for="pesoPost"> <i class="fa-solid fa-briefcase"></i> PESO Branch
                        </x-input-label>
                        <select wire:model='pesoPost' class="block mt-1 w-full rounded">
                            <option value="" disabled selected>Select Branch</option>

                            @foreach ($pesoBranches as $pesoData)
                                <option value="{{ $pesoData->municipality_id }}">
                                    {{ $pesoData->municipality_Name }}</option>
                            @endforeach
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



        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 mt-3">
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

                        <div
                            class="flex-inline border border-gray-300 rounded-lg p-1 mt-2 @if (empty($jobTags)) h-[40px] @endif ">


                            @foreach ($jobTags as $jobData)
                                <span
                                    class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ">
                                    {{ $jobData['position_Title'] }}
                                    <button wire:click.prevent='removeTag( {{ $jobData['position_id'] }})'
                                        type="button"
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
                            @endforeach
                        </div>
                        <x-input-error :messages="$errors->get('jobTags')" class="mt-2" />

                    </div>
                </div>

            </div>
        </div>


        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 mt-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">

                <div class="flex flex-col sm:flex-row w-full space-y-5 sm:sm:space-y-0 sm:space-x-5 mt-4">

                    <div wire:ignore class="flex flex-col w-1/2 ">
                        <x-input-label for="descPost"> <i class="fa-solid fa-briefcase"></i> Job Description
                        </x-input-label>
                        <textarea wire:model='descPost' id="descText"></textarea>
                        {{-- <textarea wire:model='descPost' rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>
                        <x-input-error :messages="$errors->get('descPost')" class="mt-2" /> --}}
                        <x-input-error :messages="$errors->get('descPost')" class="mt-2" />
                    </div>

                    <div wire:ignore class="flex flex-col w-1/2 ">
                        <x-input-label for="qualPost"> <i class="fa-solid fa-briefcase"></i> Job Qualification
                        </x-input-label>
                        <textarea wire:model='qualPost' id="qualText"></textarea>
                        {{-- <textarea wire:model='qualPost' rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>
                        <x-input-error :messages="$errors->get('qualPost')" class="mt-2" /> --}}
                        <x-input-error :messages="$errors->get('qualPost')" class="mt-2" />
                    </div>

                </div>

                <div wire:ignore class="flex flex-col w-full mt-4">
                    <x-input-label for="remPost"> <i class="fa-solid fa-briefcase"></i> Remarks
                    </x-input-label>
                    <textarea wire:model='remPost' id="remText"></textarea>
                    {{-- <textarea wire:model='remPost' rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                    <x-input-error :messages="$errors->get('remPost')" class="mt-2" /> --}}
                    <x-input-error :messages="$errors->get('remPost')" class="mt-2" />
                </div>

                <div class="flex flex-row justify-end mt-4 mb-4 ">
                    <x-blue-button wire:click.prevent='nextSection(2)' type="button">Next</x-blue-button>
                </div>


            </div>
        </div>


    </div>



    <div class=" {{ $currentSlide != 2 ? 'hidden' : '' }} post-section py-3" id="step2">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">

                <h1 class="text-3xl py-4 font-bold">Upload the Requirements</h1>
                @foreach ($requirements->chunk(2) as $chunk)
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-5 w-full mt-4">
                        @foreach ($chunk as $requirement)
                            <div wire:key='jobRequirement-{{ $requirement->requirement_id }}'
                                class="flex flex-col w-full sm:w-1/2">
                                <label class="block text-sm font-medium text-gray-900"
                                    for="file_input">{{ $requirement->requirement_Title }}</label>
                                <input wire:model='req.{{ $requirement->requirement_id }}'
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                    aria-describedby="file_input_help" type="file">
                                <p class="mt-1 text-sm text-gray-500 0">PDF ONLY.</p>
                                <x-input-error :messages="$errors->get('req.' . $requirement->requirement_id)" class="mt-2" />
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <div class="flex flex-row justify-between w-full mt-12 mb-4 ">
                    <x-secondary-button wire:click.prevent='prevSection(1)'
                        type="button">Previous</x-secondary-button>
                    <x-blue-button wire:click.prevent='nextSection(3)' type="button">Next</x-blue-button>
                </div>

            </div>
        </div>

    </div>





    <div class=" {{ $currentSlide != 3 ? 'hidden' : '' }} post-section py-3" id="step3">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">
                <div class="flex flex-row w-full justify-center items-center mt-10">
                    <x-profile-logo class="h-36 w-36">

                    </x-profile-logo>
                </div>
                <div class="flex flex-col px-2 sm:px-20 mt-4 justify-center w-full">
                    <div>
                        <p>By checking the box provided, you acknowledge that the information contained in this job
                            posting
                            is intended for the consideration of potential job seekers and is subject to approval by the
                            Public Employment Services Office (PESO). You agree that the details provided herein are for
                            informational purposes only and do not constitute any form of contractual agreement between
                            you
                            and the job seekers.</p>
                        <br>
                        <p>Please be aware that this job posting may undergo revisions or amendments by PESO to ensure
                            compliance with regulatory standards. While efforts are made to ensure the accuracy and
                            authenticity of the information presented, we cannot guarantee the completeness,
                            reliability, or
                            timeliness of the content.</p>
                        <p>You, as the employer, are solely responsible for reviewing and selecting suitable job seekers
                            for
                            your employment needs. PESO reserves the right to modify, update, or withdraw this posting
                            if it
                            does not adhere to established rules or guidelines.</p>
                        <br>
                        <p>By checking this box, you acknowledge and accept that your confirmation of this disclaimer
                            affirms your role as the employer, responsible for engaging with potential job seekers based
                            on
                            the information provided in this posting.</p>
                        <p>For any inquiries or clarifications regarding this job posting, please contact the Public
                            Employment Services Office or the designated employer representative.</p>
                        <br>
                        <p>Thank you for your understanding and cooperation.</p>
                    </div>
                    <div class="flex flex-col justify-center items-center w-full mt-12 ">
                        <div class="flex flex-row justify-center items-center w-full">
                            <input wire:model='agreePost' id="link-checkbox" type="checkbox" value=""
                                class="sm:mr-2 font-medium rounded-lg text-sm px-3 py-3 justify-center">
                            <label for="link-checkbox" class="ms-2 text-sm font-medium text-gray-900 ">I
                                agree with the <a href="#" class="text-blue-600 hover:underline">terms and
                                    conditions.</a></label>
                        </div>

                        <x-input-error :messages="$errors->get('agreePost')" class="mt-2" />
                    </div>
                </div>




                <div class="flex flex-row justify-between w-full mt-24 mb-4 ">
                    <x-secondary-button wire:click.prevent='prevSection(2)' type="button"
                        wire:loading.attr="disabled">Previous</x-secondary-button>
                    <x-green-button wire:click.prevent='createApplication' type="button"
                        wire:loading.attr="disabled">Confirm
                        <div wire:loading.delay.long wire:target="createApplication" role="status">
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
                    </x-green-button>
                </div>

            </div>
        </div>

    </div>

    {{-- @scipt --}}
    <script>
        $('#descText').summernote({
            placeholder: 'Write job description here...',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['font', ['bold', 'underline']],
                ['para', ['ul', 'ol', 'paragraph']],
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    if ($('#descText').summernote('isEmpty')) {
                        @this.set('descPost',
                            ''
                        ); //Summernote is never really empty it has '<br>' or '<p><br></p>' when it's "empty"
                    } else {
                        @this.set('descPost', contents);
                    }
                }
            }
        });
        $('#qualText').summernote({
            placeholder: 'Write job qualifications here...',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['font', ['bold', 'underline']],
                ['para', ['ul', 'ol', 'paragraph']],
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    if ($('#qualText').summernote('isEmpty')) {
                        @this.set('qualPost',
                            ''
                        ); //Summernote is never really empty it has '<br>' or '<p><br></p>' when it's "empty"
                    } else {
                        @this.set('qualPost', contents);
                    }
                }
            }
        });
        $('#remText').summernote({
            placeholder: 'Write remarks here...',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['font', ['bold', 'underline']],
                ['para', ['ul', 'ol', 'paragraph']],
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    if ($('#remText').summernote('isEmpty')) {
                        @this.set('remPost',
                            ''
                        ); //Summernote is never really empty it has '<br>' or '<p><br></p>' when it's "empty"
                    } else {
                        @this.set('remPost', contents);
                    }
                }
            }
        });

        $('.note-statusbar').hide();
    </script>


    {{-- @endscript --}}


</div>
