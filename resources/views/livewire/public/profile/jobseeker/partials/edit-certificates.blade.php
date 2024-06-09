<div>
    <div x-show="profileTab === 'editCertificates'" class="container" x-transition:enter="transition ease-out duration-300"
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
                    <h2 class="text-xl font-bold">Certificates</h2>

                </div>

                <div class="flex flex-row gap-4 items-center">
                    <div class="flex items-center rounded-full hover:bg-gray-300 transition-transform p-1"
                        x-data="" wire:click.prevent = 'addModal'>
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>

                    </div>
                </div>

            </div>
            @if ($certs->isEmpty())

                <div class="flex flex-col justify-center items-center mt-20 mb-20">
                    <div class="flex  bg-gray-100 rounded-full p-1">

                        <svg class="w-24 h-24 text-black" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                        </svg>

                    </div>

                    <div class="text-center text-black text-xl font-semibold mt-5">
                        Certificate Record is empty.
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 ">
                    @foreach ($certs as $userCerts)
                        <div wire:key="{{ $userCerts->cert_id }}" class="container bg-gray-200 p-3 rounded-lg shadow ">

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
                                    <span
                                        class="text-2xl text-black font-bold">{{ $userCerts->certificateType->cert_Name }}</span>
                                    <span class="text-lg text-black font-semibold">
                                        {{ $userCerts->cert_From }}
                                    </span>
                                    <span class="text-sm text-gray-700 font-medium"> {{ $userCerts->cert_Rating }}
                                    </span>
                                    <span class="text-sm text-gray-700 font-medium">
                                        {{ $userCerts->cert_Date_Issued->format('F Y') }}
                                    </span>
                                </div>

                                <div class="flex flex-col h-full items-center justify-center">
                                    <div wire:click.prevent = 'editModal({{ $userCerts->cert_id }})'
                                        class="cursor-pointer flex items-center rounded-full hover:bg-gray-300 transition-transform p-1">
                                        <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </div>
                                </div>

                            </div>


                        </div>
                    @endforeach


                </div>

            @endif
        </div>
    </div>


    <x-modal name="certificate-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Certificate Record') }}
            </h2>
            <hr>
            <div class="flex flex-col mt-2">


                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="level" :value="__('Certification')" />

                    {{-- DROP DOWN --}}
                    <x-dropdown align="left" width="full">
                        <x-slot name="trigger">
                            <button
                                class="mt-1 inline-flex h-full items-center text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-md px-1.5 py-2 w-full">
                                <div class="w-full ml-2 text-left">
                                    {{ $certName ?? 'Select Certification' }}
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
                                <input wire:model.live.prevent='search' wire:model="search" type="text"
                                    placeholder="Search..."
                                    class="block w-full px-3 py-1.5 mb-2 border border-gray-300 rounded-md focus:outline-none"
                                    @click.stop>
                            </div>

                            <!-- Dropdown content with scrollbar -->
                            <div class="max-h-[120px] bg-white overflow-y-auto">
                                <!-- Dropdown links -->
                                {{-- LOOP HERE --}}
                                @foreach ($certTypes as $certType)
                                    <x-dropdown-link wire:click.prevent='certtypeid({{ $certType->cert_type_id }})'
                                        class="cursor-pointer block px-4 py-2 hover:bg-gray-100 uppercase">
                                        {{ $certType->cert_Name }}
                                    </x-dropdown-link>
                                @endforeach

                                {{-- LOOP END --}}
                            </div>
                        </x-slot>

                    </x-dropdown>
                    <x-input-error :messages="$errors->get('certName')" class="mt-2" />
                </div>

                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="certIssued" :value="__('Issued By')" />
                    <x-text-input wire:model="certFrom" id="certIssued" class="block mt-1 w-full" type="text" />
                    <x-input-error :messages="$errors->get('jobTags')" class="mt-2" />
                </div>

                <div class="flex flex-row mt-2 w-full">
                    <div class="flex flex-col w-full">
                        <x-input-label for="certDate" :value="__('Earned At')" />
                        <x-text-input wire:model="certEarned" id="certDate" class="block mt-1 w-full"
                            type="date" />
                        <x-input-error :messages="$errors->get('certEarned')" class="mt-2" />
                    </div>
                    <div class="flex flex-col ml-4 w-full">
                        <x-input-label for="certRating" :value="__('Rating')" />
                        <x-text-input wire:model="certRate" id="certRating" class="block mt-1 w-full"
                            type="number" />
                        <x-input-error :messages="$errors->get('certRate')" class="mt-2" />
                    </div>
                </div>

            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button wire:click.prevent='close' type="button">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button wire:click.prevent='save' class="ms-3" type="button" id="certAdd">
                    {{ __('Save') }}
                </x-primary-button>
            </div>

        </div>
    </x-modal>


</div>
