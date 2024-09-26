<div>
    <div class="mt-12">
        <div class="max-w-3xl mx-auto px-2 sm:px-6 lg:px-8">

            <ol class="flex items-center  w-full text-sm font-medium text-center text-gray-500  sm:text-base">
                <li class="flex w-full justify-center items-center text-blue-600   ">
                    <span class="flex items-center text-lg sm:text-2xl justify-center">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25Zm7.5 0v.09a49.488 49.488 0 0 0-6 0v-.09a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5Zm-3 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                clip-rule="evenodd" />
                            <path
                                d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
                        </svg>

                        Edit Job Information
                    </span>
                </li>


            </ol>

        </div>
    </div>



    <div class="post-section py-3" id="step1">
        <div class="max-w-6xl mx-auto p-2 sm:px-6 lg:px-8">


            {{-- FIRST CONTAINER - JOB INFORMATION --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">
                {{-- TITLE --}}



                <div class="flex flex-col sm:flex-row mt-2 w-full gap-4">

                    <div class="flex flex-col w-full">
                        <x-input-label for="jobTitlePost">Job Title
                        </x-input-label>
                        <x-text-input wire:model='jobTitlePost' class="block mt-1 w-full" type="text" />
                        <x-input-error :messages="$errors->get('jobTitlePost')" class="mt-2" />
                    </div>

                    <div class="flex flex-col w-full">
                        <x-input-label for="jobIndustryPost">Job Industry
                        </x-input-label>
                        <x-text-input wire:model='jobIndustryPost' class="block mt-1 w-full" type="text" disabled />
                        <x-input-error :messages="$errors->get('jobIndustryPost')" class="mt-2" />
                    </div>

                </div>

                <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">

                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-1/2">

                        <div class="flex flex-col w-full">
                            <x-input-label for="minWagePost">Minimum Wage
                            </x-input-label>
                            <x-text-input wire:model='minWagePost' class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('minWagePost')" class="mt-2" />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="maxWagePost">Max Wage
                            </x-input-label>
                            <x-text-input wire:model='maxWagePost' class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('maxWagePost')" class="mt-2" />
                        </div>

                    </div>


                    <div class="flex flex-col ml sm:w-1/2">
                        <x-input-label for="eduPost">Educational Attainment
                        </x-input-label>
                        <select wire:model='eduPost' class="block mt-1 w-full rounded" disabled>
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

                    <div class="flex flex-col ml sm:w-1/2">
                        <x-input-label for="jtypePost">Job Type
                        </x-input-label>
                        <select wire:model='jtypePost' class="block mt-1 w-full rounded" disabled>
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
                            <x-input-label for="wAddPost">Work Address
                            </x-input-label>
                            <x-text-input wire:model='wAddPost' class="block mt-1 w-full" type="text" disabled />
                            <x-input-error :messages="$errors->get('wAddPost')" class="mt-2" />
                        </div>

                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-2/3">
                        <div class="flex flex-col w-full">
                            <x-input-label for="barPost">Barangay
                            </x-input-label>
                            <x-text-input wire:model='barPost' class="block mt-1 w-full" type="text" disabled />
                            <x-input-error :messages="$errors->get('barPost')" class="mt-2" />
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="mun">Province
                            </x-input-label>
                            <x-text-input wire:model='mun' class="block mt-1 w-full" type="text" disabled />
                            <x-input-error :messages="$errors->get('mun')" class="mt-2" />
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="prov">Municipallity
                            </x-input-label>
                            <x-text-input wire:model='prov' class="block mt-1 w-full" type="text" disabled />
                            <x-input-error :messages="$errors->get('prov')" class="mt-2" />
                        </div>
                    </div>

                </div>


            </div>

        </div>

        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 mt-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">

                <div class="flex flex-row my-4 w-full gap-4">

                    <div class="flex flex-col ml w-full sm:w-1/2">
                        <x-input-label for="pesoPost">PESO Branch
                        </x-input-label>
                        <select wire:model='pesoPost' class="block mt-1 w-full rounded" disabled>
                            <option value="{{ $pesoPost }}" disabled selected>{{ $pesoTitle }}</option>


                        </select>
                        <x-input-error :messages="$errors->get('pesoPost')" class="mt-2" />
                    </div>

                </div>

                <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">

                    <div class="flex flex-col w-full sm:w-1/2">
                        <x-input-label for="durationPost">Job Posting Duration
                        </x-input-label>
                        <x-text-input wire:model='durationPost' class="block mt-1 w-full" type="date" disabled />
                        <x-input-error :messages="$errors->get('durationPost')" class="mt-2" />
                    </div>

                    <div class="flex flex-col w-full sm:w-1/3 mb-5">
                        <x-input-label for="slotsPost">Job Slots
                        </x-input-label>
                        <x-text-input wire:model='slotsPost' class="block mt-1 w-full" type="text" disabled />
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
                                x-on:click.prevent="$dispatch('open-modal', 'job-position-modal')">
                                Add Job Tag
                            </x-primary-button>

                        </div>


                        <div
                            class="flex-inline border border-gray-300 rounded-lg p-1 mt-2 @if (empty($displayTags)) h-[40px] @endif">
                            @foreach ($displayTags as $tag)
                                <span
                                    class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ">
                                    {{ $tag['position_Title'] }}
                                    <button wire:loading.attr="disabled"
                                        wire:click.prevent="removeTag({{ $tag['position_id'] }})" type="button"
                                        class="flex-shrink-0 size-4 inline-flex items-center justify-center rounded-full hover:bg-blue-200 focus:outline-none focus:bg-blue-200 focus:text-blue-500">
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

                        <x-input-error :messages="$errors->get('displayTags')" class="mt-2" />

                    </div>
                </div>

            </div>
        </div>


        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 mt-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6">

                <div class="flex flex-col sm:flex-row w-full space-y-5 sm:sm:space-y-0 sm:space-x-5 mt-4">

                    <div class="flex flex-col w-full sm:w-1/2 ">
                        <x-input-label for="descPost">Job Description
                        </x-input-label>
                        <div wire:ignore>
                            <textarea wire:model='descPost' id="descText">{!! $descPost !!}</textarea>
                        </div>

                        {{-- <textarea wire:model='descPost' rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>
                        <x-input-error :messages="$errors->get('descPost')" class="mt-2" /> --}}
                        @if ($errors->has('descPost'))
                            <x-input-error :messages="$errors->get('descPost')" class="mt-2" />
                        @endif

                    </div>


                    <div class="flex flex-col w-full sm:w-1/2 ">
                        <x-input-label for="qualPost">Job Qualification
                        </x-input-label>
                        <div wire:ignore>
                            <textarea wire:model='qualPost' id="qualText">{!! $qualPost !!}</textarea>
                        </div>
                        {{-- <textarea wire:model='qualPost' rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>
                        <x-input-error :messages="$errors->get('qualPost')" class="mt-2" /> --}}
                        @if ($errors->has('qualPost'))
                            <x-input-error :messages="$errors->get('qualPost')" class="mt-2" />
                        @endif
                    </div>

                </div>

                <div class="flex flex-col w-full mt-4">
                    <x-input-label for="remPost">Remarks
                    </x-input-label>
                    <div wire:ignore>
                        <textarea wire:model='remPost' id="remText">{!! $remPost !!}</textarea>
                    </div>
                    {{-- <textarea wire:model='remPost' rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                    <x-input-error :messages="$errors->get('remPost')" class="mt-2" /> --}}
                    @if ($errors->has('remPost'))
                        <x-input-error :messages="$errors->get('remPost')" class="mt-2" />
                    @endif

                </div>

                <div class="flex flex-row justify-end mt-4 mb-4 ">
                    <x-green-button wire:loading.attr="disabled" wire:click.prevent='validateInput'
                        type="button">Save</x-green-button>
                </div>


            </div>
        </div>


    </div>
    <x-modal name="confirm-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Job Posting Confirmation') }}
            </h2>
            <hr>
            <div class="flex flex-col justify-center items-center my-12">

                <h1 class="text-2xl font-bold">Are you sure you want to update this job posting?</h1>

            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close-modal', 'confirm-modal')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-green-button wire:loading.attr="disabled" wire:click.prevent="saveJobPost" class="ms-3"
                    type="button">
                    {{ __('Confirm') }}
                    <div wire:loading.delay.long wire:target="updateApplicant('REJECT', 'reject')" role="status">
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
                </x-green-button>
            </div>
        </div>
    </x-modal>



    <livewire:modals.job-position-modal />



    {{-- @scipt --}}
    <script data-navigate-once>
        $('#descText').summernote({
            placeholder: 'Write job description here...',
            tabsize: 2,
            height: 300,
            disableResizeEditor: true, // This is optional if you want to remove resize
            disableDragAndDrop: true, // Set the height here (e.g., 300px)
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
            height: 300,
            disableResizeEditor: true, // This is optional if you want to remove resize
            disableDragAndDrop: true, // Set the height here (e.g., 300px)
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
            disableResizeEditor: true, // This is optional if you want to remove resize
            disableDragAndDrop: true, // Set the height here (e.g., 300px)
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
