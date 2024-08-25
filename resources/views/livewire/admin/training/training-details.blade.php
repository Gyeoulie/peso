<div class="container mx-auto py-8">
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

        <div class="col-span-4 sm:col-span-12">
            <h1 class="text-2xl font-bold">Trainings / Training List / Training Details</h1>
        </div>


        <div class="col-span-4 sm:col-span-5">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4">
                <div class="flex flex-row justify-center items-center h-full p-5 flex-shrink-0">
                    <img src="{{ asset('storage/' . $programInfo->program_pubmat) }}" alt="Default I mage"
                        class="w-[260px] h-[200px] sm:w-[600px] sm:h-[450px] bg-gray-300 rounded object-fill">
                </div>


            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4 mt-4">
                <div class="flex flex-row w-full">
                    <h1 class="text-xl text-blue-900 font-bold">Matched Job Seekers</h1>
                </div>
                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">

                <div class="max-h-[500px] overflow-y-auto mt-4">
                    @if ($matchingEmployees->isEmpty())
                        <div>


                            <div class="flex flex-col justify-center items-center mt-20 mb-20">
                                <div class="flex  bg-gray-100 rounded-full p-1">

                                    <svg class="w-24 h-24 text-black" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
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



        <div class="col-span-4 sm:col-span-7">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="flex flex-col w-full h-full p-5 space-y-2">

                    <div class="flex flex-col">
                        <h1 class="text-xl text-blue-900 sm:text-2xl font-bold">Program Information
                        </h1>
                    </div>
                    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">

                    <div class="mt-6">
                        <div class="flex flex-col w-full h-full ">
                            <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 w-full">
                                <div class="flex flex-col w-full">
                                    <x-input-label for="progTitle" :value="__('Program Title')" />
                                    <x-text-input value="{{ $programInfo->program_Title }}" class="block mt-1 w-full"
                                        type="text" disabled />
                                </div>
                                <div class="flex flex-col w-full">
                                    <x-input-label for="progHost" :value="__('Program Host')" />
                                    <x-text-input value="{{ $programInfo->program_Host }}" class="block mt-1 w-full"
                                        type="text" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col w-full h-full">
                            <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 w-full">
                                <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 w-full">
                                    <div class="flex flex-col w-full">
                                        <x-input-label for="progTitle" :value="__('Date Posted')" />
                                        <x-text-input value="{{ $programInfo->created_at->format('F j, Y') }}"
                                            class="block mt-1 w-full" type="text" disabled />
                                    </div>
                                    <div class="flex flex-col w-full">
                                        <x-input-label for="progHost" :value="__('Registration Deadline')" />
                                        <x-text-input value="{{ $programInfo->program_Deadline->format('F j, Y') }}"
                                            class="block mt-1 w-full" type="text" disabled />
                                    </div>
                                </div>
                                @if ($programInfo->program_Datetime)
                                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 w-full">
                                        <div class="flex flex-col w-full">
                                            <x-input-label for="progTitle" :value="__('Program Date')" />
                                            <x-text-input
                                                value="{{ $programInfo->program_Datetime->format('F j, Y') }}"
                                                class="block mt-1 w-full" type="text" disabled />
                                        </div>
                                        <div class="flex flex-col w-full">
                                            <x-input-label for="progHost" :value="__('Program Time')" />
                                            <x-text-input value="{{ $programInfo->program_Datetime->format('g:i A') }}"
                                                class="block mt-1 w-full" type="text" disabled />
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="flex flex-col w-full h-full">
                            <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 w-full">
                                <div class="flex flex-col w-full">
                                    <x-input-label for="progTitle" :value="__('Program Type')" />
                                    <x-text-input value="{{ $programInfo->program_Type }}" class="block mt-1 w-full"
                                        type="text" disabled />
                                </div>
                                <div class="flex flex-row gap-2 sm:gap-4 w-full">
                                    <div class="flex flex-col w-full">
                                        <x-input-label for="progHost" :value="__('Program Modality')" />
                                        <x-text-input value="{{ $programInfo->program_Modality }}"
                                            class="block mt-1 w-full" type="text" disabled />
                                    </div>
                                    <div class="flex flex-col w-full">
                                        <x-input-label for="progHost" :value="__('Program Slots')" />
                                        <x-text-input value="{{ $programInfo->program_Slots }}"
                                            class="block mt-1 w-full" type="text" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col w-full h-full">
                            <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 w-full">
                                <div class="flex flex-col w-full">
                                    <x-input-label for="progTitle" :value="__('Program Location')" />
                                    <x-text-input value="{{ $programInfo->program_Location }}"
                                        class="block mt-1 w-full" type="text" disabled />
                                </div>
                                <div class="flex flex-col w-full sm:w-1/3">
                                    <x-input-label for="progTitle" :value="__('Industry Tag')" />
                                    <x-text-input value="{{ $programInfo->job_industry->industry_Title }}"
                                        class="block mt-1 w-full" type="text" disabled />
                                </div>

                            </div>
                        </div>
                        <div class="flex flex-col w-full h-full">
                            <x-input-label for="job_tags">Job Position
                                Tags
                            </x-input-label>
                            <div
                                class="flex-inline border border-gray-300 rounded-lg p-1 mt-2 @if (empty($programInfo->program_tags)) h-[40px] @endif ">
                                @foreach ($programInfo->program_tags as $jobData)
                                    <span
                                        class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ">
                                        {{ $jobData->job_positions->position_Title }}
                                    </span>
                                @endforeach
                            </div>


                        </div>
                    </div>

                    <div class="mt-10">
                        <div class="Job-Description ">
                            <h1 class="text-xl text-blue-900 font-bold">Description</h1>
                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">
                            <div class="p-2 no-tailwindcss-base">
                                {!! $programInfo->program_Description !!}
                            </div>
                        </div>

                        <div class="Job-Qualification">

                            <h1 class="text-xl text-blue-900 font-bold">Qualification</h1>


                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">

                            <div class="p-2 no-tailwindcss-base">
                                {!! $programInfo->program_Qualification !!}
                            </div>
                        </div>

                        <div class="Job-Remarks">

                            <h1 class="text-xl text-blue-900 font-bold">Remarks</h1>


                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700 mt-2">

                            <div class="p-2 no-tailwindcss-base">
                                {!! $programInfo->program_Remarks !!}

                            </div>
                        </div>

                    </div>
                </div>
            </div>




        </div>






    </div>


</div>
