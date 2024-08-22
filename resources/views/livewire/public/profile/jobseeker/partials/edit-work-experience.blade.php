<div>
    <div x-show="profileTab === 'editWorkExperience'" class="container"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-cloak>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex flex-row w-full items-center justify-between mb-4">
                <div class="flex flex-row items-center gap-4">
                    <div class="cursor-pointer flex items-center rounded-full hover:bg-gray-300 transition-transform p-1"
                        @click="profileTab = 'profileOverview'">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold">Work Experience</h2>

                </div>

                <div class="flex flex-row gap-4 items-center">
                    <div x-data="{ tooltip: 'Add Work Experience' }">
                        <div x-tooltip="tooltip"
                            class="flex items-center rounded-full hover:bg-gray-300 transition-transform p-1 cursor-pointer"
                            wire:click.prevent='addModal()'>
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>

            @if ($workexp->isEmpty())

                <div class="flex flex-col justify-center items-center mt-20 mb-20">
                    <div class="flex bg-blue-200 rounded-full p-1">

                        <svg class="w-24 h-24 text-black" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                        </svg>

                    </div>

                    <div class="text-center text-black text-xl font-semibold mt-5">
                        Work Experience is Empty.
                    </div>
                </div>
            @else
                {{-- <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 "> --}}

                @foreach ($workexp as $experience)
                    <div wire:key="{{ $experience->workexp_id }}" class="container p-3">

                        <div class="flex flex-row h-full items-center">

                            <div class="flex flex-col">
                                <svg class="w-10 h-10 sm:w-20 sm:h-20 text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M10 2a3 3 0 0 0-3 3v1H5a3 3 0 0 0-3 3v2.382l1.447.723.005.003.027.013.12.056c.108.05.272.123.486.212.429.177 1.056.416 1.834.655C7.481 13.524 9.63 14 12 14c2.372 0 4.52-.475 6.08-.956.78-.24 1.406-.478 1.835-.655a14.028 14.028 0 0 0 .606-.268l.027-.013.005-.002L22 11.381V9a3 3 0 0 0-3-3h-2V5a3 3 0 0 0-3-3h-4Zm5 4V5a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1h6Zm6.447 7.894.553-.276V19a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-5.382l.553.276.002.002.004.002.013.006.041.02.151.07c.13.06.318.144.557.242.478.198 1.163.46 2.01.72C7.019 15.476 9.37 16 12 16c2.628 0 4.98-.525 6.67-1.044a22.95 22.95 0 0 0 2.01-.72 15.994 15.994 0 0 0 .707-.312l.041-.02.013-.006.004-.002.001-.001-.431-.866.432.865ZM12 10a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>

                            <div class="flex flex-col ml-4 w-full">
                                <span class="text-3xl text-black font-black">{{ $experience->work_Name }}</span>
                                <div class="text-xl text-black font-semibold">
                                    <span>{{ $experience->job_positions->position_Title }}</span>
                                    -
                                    <span>{{ $experience->work_Status }}</span>
                                </div>
                                <span class="text-md text-gray-700 font-medium">
                                    {{ $experience->work_Start->format('F Y') }} -
                                    {{ $experience->work_End->format('F Y') }}</span>
                                <span class="text-md text-gray-700 font-medium">{{ $experience->work_Address }}</span>
                            </div>


                            <div class="flex flex-col h-full items-center justify-center">
                                <div x-data="{ tooltip: 'Edit Work Experience' }">
                                    <div x-tooltip="tooltip"
                                        wire:click.prevent='editModal({{ $experience->workexp_id }})'
                                        class="cursor-pointer flex items-center rounded-full hover:bg-blue-300 transition-transform p-1 cursor-pointer">
                                        <svg class="w-10 h-10 text-blue-700" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <hr class="h-0.5 my-2 mx-10 bg-blue-200 border-0">
                @endforeach

                {{-- </div> --}}

            @endif
        </div>
    </div>


    <x-modal name="workExp-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Work Experience') }}
            </h2>
            <hr>
            <div class="flex flex-col mt-2">
                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="workEmp" :value="__('Employer')" />
                    <x-text-input wire:model="workName" class="block mt-1 w-full" type="text" />
                    <x-input-error :messages="$errors->get('workName')" class="mt-2" />
                </div>
                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="workAddress" :value="__('Address')" />
                    <x-text-input wire:model="workAdd" class="block mt-1 w-full" type="text" />
                    <x-input-error :messages="$errors->get('workAdd')" class="mt-2" />
                </div>
                <div class="flex flex-col sm:flex-row mt-2 w-full">

                    <div class="flex flex-col w-full">
                        <x-input-label for="workPos" :value="__('Job Position')" />
                        <x-dropdown align="left" width="full">
                            <x-slot name="trigger">
                                <button
                                    class="mt-1 inline-flex h-full items-center text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-md px-1.5 py-2 w-full">
                                    <div class="w-full ml-2 text-left">
                                        {{ $workPositionTitle ?? 'Select Job Position' }}
                                    </div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <!-- Search input -->
                                <div class="p-2">
                                    <input wire:model.live.prevent='search' type="text" wire:model="search"
                                        placeholder="Search..."
                                        class="block w-full px-3 py-1.5 mb-2 border border-gray-300 rounded-md focus:outline-none"
                                        @click.stop>
                                </div>

                                <!-- Dropdown content with scrollbar -->
                                <div class="max-h-[120px] bg-white overflow-y-auto">
                                    <!-- Dropdown links -->
                                    @foreach ($job_positions as $data)
                                        <x-dropdown-link wire:click.prevent='updateSelect({{ $data->position_id }})'
                                            class="cursor-pointer block px-4 py-2 hover:bg-gray-100 uppercase">{{ $data->position_Title }}</x-dropdown-link>
                                    @endforeach
                                </div>
                            </x-slot>

                        </x-dropdown>
                        <x-input-error :messages="$errors->get('workPosition')" class="mt-2" />
                    </div>

                    <div class="flex flex-col w-full ml-4">
                        <x-input-label for="workStatus" :value="__('Status')" />
                        <select wire:model="workStatus" class="block mt-1 w-full  rounded-lg ">
                            <option value="" disabled selected>Select Work Status</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Probationary">Probationary</option>
                            <option value="Part-time">Part-time</option>
                        </select>
                        <x-input-error :messages="$errors->get('workStatus')" class="mt-2" />
                    </div>
                </div>

                <div class="flex flex-row mt-2 w-full">
                    <div class="flex flex-col w-full">
                        <x-input-label for="workStart" :value="__('Started')" />
                        <x-text-input wire:model="workStart" class="block mt-1 w-full" type="date" />
                        <x-input-error :messages="$errors->get('workStart')" class="mt-2" />
                    </div>
                    <div class="flex flex-col ml-4 w-full">
                        <x-input-label for="workEnd" :value="__('Ended')" />
                        <x-text-input wire:model="workEnd" class="block mt-1 w-full" type="date" />
                        <x-input-error :messages="$errors->get('workEnd')" class="mt-2" />
                    </div>

                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button wire:click.prevent='close' type="button">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button wire:click.prevent='save' class="ms-3" type="button">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </div>
    </x-modal>
</div>
