<div class="flex flex-col w-full h-full gap-4">
    <h1 class="text-2xl font-bold">Company Information</h1>
    <div class="flex flex-col mt-5 sm:flex-row-reverse">
        <div class="flex flex-col items-center  w-full">
            <div class="flex flex-col items-center">
                <x-input-label for="image" :value="__('Upload Company Logo')" />
                <div
                    class="bg-gray-200 border border-gray-300 rounded-lg overflow-hidden flex items-center justify-center mt-2 shrink-0 grow-0">
                    <!-- Display uploaded image here -->
                    @if ($cimg)
                        <img id="uploadedImage"
                            class="flex uploaded-image object-fill w-[200px] h-[200px] shrink-0 grow-0"
                            src="{{ $cimg->temporaryUrl() }}" alt="Uploaded Image" />
                    @else
                        <img id="uploadedImage"
                            class="flex uploaded-image object-fill  w-[200px] h-[200px] shrink-0 grow-0"
                            src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png "
                            alt="Uploaded Image" />
                    @endif
                </div>
            </div>
            <x-input-error :messages="$errors->get('cimg')" class="mt-2" />
            <div class="mt-4 w-160 flex justify-center">
                <label for="imageUpload"
                    class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Upload Image
                </label>
                <input wire:model='cimg' id="imageUpload" type="file"class="hidden" accept="image/*">
            </div>
        </div>
        <div class="flex flex-col w-full">
            <div class="flex flex-col mt-4 w-full">
                <x-input-label for="TIN" :value="__('TIN*')" />
                <x-text-input wire:model='tin' class="block mt-1" type="text" />
                <x-input-error :messages="$errors->get('tin')" class="mt-2" />

            </div>

            <div class="flex flex-col mt-4 w-full">
                <x-input-label for="businessname" :value="__('Business Name*')" />
                <x-text-input wire:model='business' class="block mt-1" type="text" />
                <x-input-error :messages="$errors->get('business')" class="mt-2" />

            </div>
            <div class="flex flex-col mt-4 w-full">
                <x-input-label for="tradename" :value="__('Trade Name*')" />
                <x-text-input wire:model='trade' class="block mt-1" type="text" />
                <x-input-error :messages="$errors->get('trade')" class="mt-2" />
            </div>
        </div>


    </div>
    <div class="flex flex-col w-full sm:flex-row sm:w-1/2 mt-4 gap-4">
        <div class="flex flex-col w-full">
            <x-input-label for="loctype" :value="__('Location Type*')" />
            <select wire:model='locType' class="block mt-1 w-full rounded">
                <option value="" disabled selected>Select Location Type</option>
                <option value="1">Main</option>
                <option value="2">Branch</option>
            </select>
            <x-input-error :messages="$errors->get('locType')" class="mt-2" />

        </div>
        <div class="flex flex-col w-full">
            <x-input-label for="workforce" :value="__('Total Work Force*')" />
            <select wire:model='workForce' class="block mt-1 w-full rounded">
                <option value="" disabled selected>Select Total Work Force</option>
                <option value="1">1 - 9 (Micro)</option>
                <option value="2">10 - 99 (Small)</option>
                <option value="3">100 - 199 (Medium)</option>
                <option value="4">200 and Over (Large)</option>
            </select>
            <x-input-error :messages="$errors->get('workForce')" class="mt-2" />

        </div>
    </div>
    <div class="flex flex-col w-full sm:flex-row sm:w-1/2 mt-4 gap-4" x-data="employmentHandler()"
        @change-status.window="updateEmpDesc">
        <div class="flex flex-col w-full">
            <x-input-label for="empStatus" :value="__('Employment Status*')" />
            <select wire:model='empType' class="block mt-1 w-full rounded" x-model="empType"
                x-on:change="updateEmpDesc">
                <option value="" disabled selected>Select Employment Type</option>
                <option value="1">Public</option>
                <option value="2">Private</option>
            </select>
            <x-input-error :messages="$errors->get('empType')" class="mt-2" />


        </div>
        <div class="flex flex-col w-full">
            <x-input-label for="empDesc" :value="__('Description*')" />
            <select wire:model='empDesc' class="block mt-1 w-full rounded" x-model="empDesc">
                <option value="" disabled selected>Select Description</option>
                <template x-for="desc in empDescriptions" :key="desc.value">
                    <option :value="desc.value" x-text="desc.text"></option>
                </template>
            </select>
            <x-input-error :messages="$errors->get('empDesc')" class="mt-2" />

        </div>
    </div>
    <x-input-label for="lineofIndustry" :value="__('Line of Industry*')" class="mt-4" />
    <div class="flex flex-row w-full">
        <div class="flex-inline mt-2 ">


            @foreach ($industryData as $industryData)
                <span wire:key='jobPref-{{ $industryData['industry_id'] }}'
                    class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ">
                    {{ $industryData['industry_Title'] }}
                    <button wire:click.prevent='removeIndustry( {{ $industryData['industry_id'] }})' type="button"
                        class="flex-shrink-0 size-4 inline-flex items-center justify-center rounded-full hover:bg-blue-200 focus:outline-none focus:bg-blue-200 focus:text-blue-500 ">
                        <span class="sr-only">Remove badge</span>
                        <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </span>
            @endforeach
        </div>
    </div>
    <x-input-error :messages="$errors->get('industryData')" class="mt-2" />
    <div class="flex flex-row mt-2">
        <div class="flex flex-row">
            <button type="button" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'industry-modal')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                ADD INDUSTRY
            </button>
        </div>
    </div>


    <div class="flex flex-col w-full mt-4">
        <x-input-label for="presentAddress" :value="__('Address*')" />
        <x-text-input wire:model='address' class="block mt-1 sm:w-2/3" type="text"
            placeholder="HOUSE/BUILDING NO,. STREET, VILLAGE" />
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>
    <div class="flex flex-col mt-4 w-full gap-4 sm:w-2/3">
        <div class="flex flex-col">
            <x-input-label for="province" :value="__('Barangay*')" />
            <x-text-input wire:model='bar' class="block mt-1 sm:w-2/3" type="text" readonly
                x-data="" x-on:click.prevent="$dispatch('open-modal', 'barangay-modal')"
                x-on:focus="$dispatch('open-modal', 'barangay-modal')" />
            <x-input-error :messages="$errors->get('barangayID')" class="mt-2" />
        </div>

        <div class="flex flex-col">
            <x-input-label for="province" :value="__('Municipality*')" />
            <x-text-input wire:model='mun' class="block mt-1 sm:w-2/3" type="text" readonly />
        </div>

        <div class="flex flex-col">
            <x-input-label for="province" :value="__('Province*')" />
            <x-text-input wire:model='prov' class="block mt-1 sm:w-2/3" type="text" readonly />
        </div>
    </div>





    <div class="flex flex-row justify-end space-x-4 mt-4 sm:mt-auto sm:mb-4">

        <x-blue-button wire:click.prevent='next' type="button">
            Next
        </x-blue-button>
    </div>
    <livewire:modals.barangay-modal />
    <livewire:modals.industry-modal />

    <script>
        function employmentHandler() {
            return {
                empType: '',
                empDesc: '',
                empDescriptions: [],

                updateEmpDesc() {
                    this.empDesc = ''; // Reset the empDesc value
                    this.empDescriptions = [];
                    if (this.empType === '1') { // '1' corresponds to 'employed'
                        this.empDescriptions = [{
                                text: 'National Government Agency',
                                value: 1
                            },
                            {
                                text: 'Local Government Unit',
                                value: 2
                            },
                            {
                                text: 'Government-owned and Controlled Corporation',
                                value: 3
                            },
                            {
                                text: 'State/Local University or College',
                                value: 4
                            }
                        ];
                    } else if (this.empType === '2') { // '2' corresponds to 'unemployed'
                        this.empDescriptions = [{
                                text: 'Direct Hire',
                                value: 5
                            },
                            {
                                text: 'Private Employment Agency',
                                value: 6
                            },
                            {
                                text: 'Overseas Recruitment Agency',
                                value: 7
                            },
                            {
                                text: 'D.O. 174, s. 2017',
                                value: 8
                            }
                        ];
                    }
                }
            }
        }
    </script>




</div>
