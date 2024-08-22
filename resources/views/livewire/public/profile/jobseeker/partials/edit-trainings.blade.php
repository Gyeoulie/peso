<div>
    <div x-show="profileTab === 'editTrainings'" class="container" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-cloak>
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
                    <h2 class="text-xl font-bold">Trainings</h2>

                </div>

                <div class="flex flex-row gap-4 items-center">
                    <div x-data="{ tooltip: 'Add Training Record' }">
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
            @if ($trainings->isEmpty())

                <div class="flex flex-col justify-center items-center mt-20 mb-20">
                    <div class="flex bg-blue-200 rounded-full p-1">

                        <svg class="w-24 h-24 text-black" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                        </svg>

                    </div>

                    <div class="text-center text-black text-xl font-semibold mt-5">
                        Training Record is empty.
                    </div>
                </div>
            @else
                {{-- <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 "> --}}
                @foreach ($trainings as $trainings)
                    <div wire:key="{{ $trainings->training_id }}" class="container p-3">

                        <div class="flex flex-row h-full items-center">

                            <div class="flex flex-col">
                                <svg class="w-10 h-10 sm:w-20 sm:h-20 text-gray-800" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="m10.076 8.64-2.201-2.2V4.874a.75.75 0 0 0-.364-.643l-3.75-2.25a.75.75 0 0 0-.916.113l-.75.75a.75.75 0 0 0-.113.916l2.25 3.75a.75.75 0 0 0 .643.364h1.564l2.062 2.062 1.575-1.297Z" />
                                    <path fill-rule="evenodd"
                                        d="m12.556 17.329 4.183 4.182a3.375 3.375 0 0 0 4.773-4.773l-3.306-3.305a6.803 6.803 0 0 1-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 0 0-.167.063l-3.086 3.748Zm3.414-1.36a.75.75 0 0 1 1.06 0l1.875 1.876a.75.75 0 1 1-1.06 1.06L15.97 17.03a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>

                            <div class="flex flex-col ml-4 w-full">
                                <span class="text-3xl text-black font-black">{{ $trainings->training_Name }}</span>
                                <span class="text-xl text-black font-semibold">{{ $trainings->training_Cert }}
                                </span>
                                <span class="text-md text-gray-700 font-medium">{{ $trainings->training_From }}</span>
                                <span class="text-md text-gray-700 font-medium">
                                    {{ $trainings->training_Start->format('F Y') }} -
                                    {{ $trainings->training_End->format('F Y') }}</span>
                            </div>

                            <div class="flex flex-col h-full items-center justify-center">
                                <div x-tooltip="tooltip" x-data="{ tooltip: 'Add Training Record' }">
                                    <div wire:click.prevent='editModal({{ $trainings->training_id }})'
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


    {{-- TRAINING MODAL --}}
    <x-modal name="training-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Training Record') }}
            </h2>
            <hr>
            <div class="flex flex-col mt-2">

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="trainingName" :value="__('Training Name')" />
                    <x-text-input wire:model="trainName" id="trainingName" class="block mt-1 w-full" type="text" />
                    <x-input-error :messages="$errors->get('trainName')" class="mt-2" />
                </div>
                <div class="flex flex-row mt-2 w-full">
                    <div class="flex flex-col w-full">
                        <x-input-label for="trainingStart" :value="__('Started')" />
                        <x-text-input wire:model="trainStart" id="trainingStart" class="block mt-1 w-full"
                            type="date" />
                        <x-input-error :messages="$errors->get('trainStart')" class="mt-2" />
                    </div>
                    <div class="flex flex-col ml-4 w-full">
                        <x-input-label for="trainingEnd" :value="__('Ended')" />
                        <x-text-input wire:model="trainEnd" id="trainingEnd" class="block mt-1 w-full" type="date" />
                        <x-input-error :messages="$errors->get('trainEnd')" class="mt-2" />
                    </div>
                </div>
                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="trainingInsti" :value="__('Training Institution')" />
                    <x-text-input wire:model="trainInstitution" id="trainingInsti" class="block mt-1 w-full"
                        type="text" />
                    <x-input-error :messages="$errors->get('trainInstitution')" class="mt-2" />
                </div>

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="trainingCert" :value="__('Certificate Recieved')" />
                    <x-text-input wire:model="trainCert" id="trainingCert" class="block mt-1 w-full"
                        type="text" />
                    <x-input-error :messages="$errors->get('trainCert')" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-input-label for="trainingComplete" :value="__('Completed')" />
                    <div class="flex items-center">
                        <label for="completeCheckBoxYes" class="mr-2">
                            <input wire:model="trainStat" id="completeCheckBoxYes" type="radio"
                                name="completeCheckBox" value="1" autocomplete="off">
                            <span class="ml-1">{{ __('Yes') }}</span>
                        </label>
                        <label for="completeCheckBoxNo" class="ml-4 mr-2">
                            <input wire:model="trainStat" id="completeCheckBoxNo" type="radio"
                                name="completeCheckBox" value="2" autocomplete="off">
                            <span class="ml-1">{{ __('No') }}</span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('trainStat')" class="mt-2" />
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button wire:click.prevent='close' type="button">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button wire:click.prevent='save' class="ms-3" type="button" id="trainingAdd">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </div>
    </x-modal>

</div>
