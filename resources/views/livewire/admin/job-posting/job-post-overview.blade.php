<div class="md:mx-10">
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
                                <h1 class="text-xl sm:text-3xl font-bold">{{ $jobpost->company->bussines_Name }}</h1>
                                <p class="text-sm sm:text-lg text-gray-700">{{ $jobpost->company->company_Address }},
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
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                Title
                            </x-input-label>
                            <x-text-input id="fname" class="block mt-1 w-full" type="text"
                                value="{{ $jobpost->job_Title }}" readonly />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                Industry
                            </x-input-label>
                            <x-text-input id="fname" class="block mt-1 w-full" type="text"
                                value="{{ $jobpost->job_industry->industry_Title }}" readonly />
                        </div>

                    </div>


                    <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">

                        <div class="flex flex-col ml w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i>
                                Educational Attainment
                            </x-input-label>
                            <x-text-input id="fname" class="block mt-1 w-full" type="text"
                                value=" {{ $eduLevels[$jobpost->job_Edu] }}" readonly />
                        </div>

                        <div class="flex flex-col sm:flex-col ml w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Employment Type
                            </x-input-label>
                            <x-text-input id="fname" class="block mt-1 w-full" type="text"
                                value="{{ $jobpost->job_Type == 1 ? 'Full Time' : 'Part Time' }}" readonly />
                        </div>

                    </div>

                    <div class="flex flex-col sm:flex-row mt-4 w-full gap-4">

                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Wage Range
                            </x-input-label>
                            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fnamePost"
                                value="₱{{ number_format($jobpost->job_MinWage) }} - ₱{{ number_format($jobpost->job_MaxWage) }}"
                                readonly />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                Posting Duration
                            </x-input-label>
                            <x-text-input id="fname" class="block mt-1 w-full" type="text"
                                value=" {{ $jobpost->job_Duration->format('F j, Y') }}" readonly />
                        </div>

                        <div class="flex flex-col w-1/3">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job Slots
                            </x-input-label>
                            <x-text-input id="fname" class="block mt-1 w-full" type="text"
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
                            <textarea id="message" rows="4" readonly
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Write your thoughts here...">{{ $jobpost->job_Description }}</textarea>
                        </div>
                    </div>

                    <div class="flex flex-row mt-4 w-full gap-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                Qualification
                            </x-input-label>
                            <textarea id="message" rows="4" readonly
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Write your thoughts here...">{{ $jobpost->job_Qualifications }}</textarea>
                        </div>
                    </div>

                    <div class="flex flex-row mt-4 w-full gap-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="fname"> <i class="fa-solid fa-briefcase"></i> Job
                                Company Remarks
                            </x-input-label>
                            <textarea id="message" rows="4" readonly
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
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
                                <div class="flex flex-col w-1/2">
                                    <button wire:click.prevent="downloadPDF('{{ $req->req_passed_id }}')"
                                        type="button"
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
                                </div>
                            @endforeach

                        </div>
                    @endforeach

                </div>



                <div class="bg-white shadow rounded-lg p-6 flex flex-col mt-4 ">
                    <h1 class="text-3xl font-bold mb-3">Matched Applicants</h1>
                    <div class="max-h-[500px] overflow-y-auto">
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-4">

                            <div
                                class="flex flex-col items-center justify-center py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-lg shrink-0">
                                <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0"
                                    src="https://tailwindcss.com/img/erin-lindford.jpg" alt="Woman's Face">
                                <div class="flex flex-col items-center justify-center text-center  sm:text-left">
                                    <div class="space-y-0.5">
                                        <p class="text-lg text-black text-center font-semibold">
                                            Erin Lindford
                                        </p>
                                        <p class="text-slate-500 text-center font-medium">
                                            Product Engineer
                                        </p>
                                    </div>
                                    <button
                                        class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Profile</button>
                                </div>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-lg shrink-0">
                                <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0"
                                    src="https://tailwindcss.com/img/erin-lindford.jpg" alt="Woman's Face">
                                <div class="flex flex-col items-center justify-center text-center  sm:text-left">
                                    <div class="space-y-0.5">
                                        <p class="text-lg text-black text-center font-semibold">
                                            Erin Lindford
                                        </p>
                                        <p class="text-slate-500 text-center font-medium">
                                            Product Engineer
                                        </p>
                                    </div>
                                    <button
                                        class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Profile</button>
                                </div>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-lg shrink-0">
                                <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0"
                                    src="https://tailwindcss.com/img/erin-lindford.jpg" alt="Woman's Face">
                                <div class="flex flex-col items-center justify-center text-center  sm:text-left">
                                    <div class="space-y-0.5">
                                        <p class="text-lg text-black text-center font-semibold">
                                            Erin Lindford
                                        </p>
                                        <p class="text-slate-500 text-center font-medium">
                                            Product Engineer
                                        </p>
                                    </div>
                                    <button
                                        class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Profile</button>
                                </div>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-lg shrink-0">
                                <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0"
                                    src="https://tailwindcss.com/img/erin-lindford.jpg" alt="Woman's Face">
                                <div class="flex flex-col items-center justify-center text-center  sm:text-left">
                                    <div class="space-y-0.5">
                                        <p class="text-lg text-black text-center font-semibold">
                                            Erin Lindford
                                        </p>
                                        <p class="text-slate-500 text-center font-medium">
                                            Product Engineer
                                        </p>
                                    </div>
                                    <button
                                        class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Profile</button>
                                </div>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-lg shrink-0">
                                <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0"
                                    src="https://tailwindcss.com/img/erin-lindford.jpg" alt="Woman's Face">
                                <div class="flex flex-col items-center justify-center text-center  sm:text-left">
                                    <div class="space-y-0.5">
                                        <p class="text-lg text-black text-center font-semibold">
                                            Erin Lindford
                                        </p>
                                        <p class="text-slate-500 text-center font-medium">
                                            Product Engineer
                                        </p>
                                    </div>
                                    <button
                                        class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Profile</button>
                                </div>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-lg shrink-0">
                                <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0"
                                    src="https://tailwindcss.com/img/erin-lindford.jpg" alt="Woman's Face">
                                <div class="flex flex-col items-center justify-center text-center  sm:text-left">
                                    <div class="space-y-0.5">
                                        <p class="text-lg text-black text-center font-semibold">
                                            Erin Lindford
                                        </p>
                                        <p class="text-slate-500 text-center font-medium">
                                            Product Engineer
                                        </p>
                                    </div>
                                    <button
                                        class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Profile</button>
                                </div>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-lg shrink-0">
                                <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0"
                                    src="https://tailwindcss.com/img/erin-lindford.jpg" alt="Woman's Face">
                                <div class="flex flex-col items-center justify-center text-center  sm:text-left">
                                    <div class="space-y-0.5">
                                        <p class="text-lg text-black text-center font-semibold">
                                            Erin Lindford
                                        </p>
                                        <p class="text-slate-500 text-center font-medium">
                                            Product Engineer
                                        </p>
                                    </div>
                                    <button
                                        class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Profile</button>
                                </div>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center py-8 px-8 max-w-sm mx-auto bg-white rounded-xl shadow-lg shrink-0">
                                <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0"
                                    src="https://tailwindcss.com/img/erin-lindford.jpg" alt="Woman's Face">
                                <div class="flex flex-col items-center justify-center text-center  sm:text-left">
                                    <div class="space-y-0.5">
                                        <p class="text-lg text-black text-center font-semibold">
                                            Erin Lindford
                                        </p>
                                        <p class="text-slate-500 text-center font-medium">
                                            Product Engineer
                                        </p>
                                    </div>
                                    <button
                                        class="px-4 py-1 text-sm text-blue-600 font-semibold rounded-full border border-purple-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2">Profile</button>
                                </div>
                            </div>




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
                        <x-input-label :value="__('Remarks')" />
                        <textarea wire:model='remarks' id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
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

                        <div wire:loading.delay.long role="status">
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
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
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
                        <div wire:loading.delay.long role="status">
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
