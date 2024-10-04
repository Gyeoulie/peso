<x-modal wire:poll name="work-experience-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Work Experience') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="workEmp" :value="__('Employer*')" />
                <x-text-input wire:model="workEmp" class="block mt-1 w-full" type="text" />
                <x-input-error :messages="$errors->get('workEmp')" class="mt-2" />
            </div>
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="workAddress" :value="__('Address*')" />
                <x-text-input wire:model="workAdd" class="block mt-1 w-full" type="text" />
                <x-input-error :messages="$errors->get('workAdd')" class="mt-2" />
            </div>
            <div class="flex flex-col sm:flex-row mt-2 w-full">

                <div class="flex flex-col w-full">
                    <x-input-label for="workPos" :value="__('Job Position*')" />
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
                                <input wire:model.live='search' type="search" wire:model="search"
                                    placeholder="Search..."
                                    class="block w-full px-3 py-1.5 mb-2 border border-gray-300 rounded-md focus:outline-none"
                                    @click.stop>
                            </div>

                            <!-- Dropdown content with scrollbar -->
                            <div class="max-h-[120px] bg-white overflow-y-auto">
                                <!-- Dropdown links -->
                                @foreach ($job_positions as $data)
                                    <x-dropdown-link wire:loading.attr="disabled"
                                        wire:click.prevent='selectWorkPosition({{ $data->position_id }})'
                                        class="cursor-pointer block px-4 py-2 hover:bg-gray-100 uppercase">{{ $data->position_Title }}</x-dropdown-link>
                                @endforeach
                            </div>
                        </x-slot>

                    </x-dropdown>
                    <x-input-error :messages="$errors->get('workPositionId')" class="mt-2" />
                </div>

                <div class="flex flex-col w-full ml-4">
                    <x-input-label for="workStatus" :value="__('Status*')" />
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
                    <x-input-label for="workStart" :value="__('Started*')" />
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
            <x-secondary-button wire:loading.attr="disabled" wire:click.prevent='close' type="button">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button wire:loading.attr="disabled" wire:click.prevent='save' class="ms-3" type="button">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </div>
</x-modal>
