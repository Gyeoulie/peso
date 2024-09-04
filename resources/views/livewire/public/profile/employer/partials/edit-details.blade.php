<div wire:init="mountData">
    <div class="grid grid-cols-4 sm:grid-cols-12 mt-4 mx-8 p-0 sm:p-6 gap-5 items-center">
        <div class="col-span-4 sm:col-span-3">

        </div>

        <div class="col-span-4 sm:col-span-9">

            <div class="flex flex-row items-center gap-4">
                <a href="{{ route('employer.profile', ['id' => auth()->user()->company->company_id]) }}">
                    <div class="flex items-center rounded-full hover:bg-gray-300 transition-transform p-1">
                        <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                    </div>
                </a>
                <h2 class="text-2xl font-bold">Edit Details</h2>

            </div>


        </div>

        <div class="col-span-4 sm:col-span-3">

        </div>


        <div class="col-span-4 sm:col-span-6" x-data="{
            openTab: 1,
            activeTab: 'text-blue-600 bg-gray-100  rounded-t-lg active',
            inactiveTab: ' rounded-t-lg hover:text-gray-600 hover:bg-gray-50',
        }">
            <div class="bg-white shadow-lg rounded-lg p-6">


                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
                    <li class="me-2">
                        <button x-on:click="$wire.mountData()" @click="openTab = 1"
                            :class="openTab === 1 ? activeTab : inactiveTab" aria-current="page"
                            class="inline-block p-4">Company Information</button>
                    </li>
                    <li class="me-2">
                        <button x-on:click="$wire.mountData()" @click="openTab = 2"
                            :class="openTab === 2 ? activeTab : inactiveTab" aria-current="page"
                            class="inline-block p-4">Contact Person</button>
                    </li>
                    <li class="me-2">
                        <button x-on:click="$wire.mountData()" @click="openTab = 3"
                            :class="openTab === 3 ? activeTab : inactiveTab" class="inline-block p-4">Company
                            Industry</button>
                    </li>
                    <li class="me-2">
                        <button x-on:click="$wire.mountData()" @click="openTab = 4"
                            :class="openTab === 4 ? activeTab : inactiveTab"
                            class="inline-block p-4">Requirements</button>
                    </li>
                </ul>

                {{-- BASIC INFORMATION --}}
                <div class="flex flex-col" x-show="openTab === 1" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-cloak>

                    <div class="flex flex-col items-center mt-4">
                        <div class="flex flex-col items-center">
                            <div
                                class="w-[160] h-[160] bg-gray-200 border border-gray-300 rounded-lg overflow-hidden flex items-center justify-center shrink-0">
                                <!-- Display uploaded image here -->
                                @if ($companyImage && !$errors->has('companyImage'))
                                    <img id="uploadedImage"
                                        class="flex uploaded-image object-contain w-[200px] h-[200px] shrink-0 grow-0"
                                        src="{{ $companyImage->temporaryUrl() }}" alt="Uploaded Image" />
                                @else
                                    <img id="uploadedImage"
                                        class="flex uploaded-image object-contain w-[200px] h-[200px] shrink-0 grow-0"
                                        src="{{ asset('storage/' . $employerDetails->company_img) }}"
                                        alt="Uploaded Image" />
                                @endif
                            </div>
                        </div>


                        <x-input-error :messages="$errors->get('companyImage')" class="mt-2" />
                        <div class="mt-4 w-160 flex justify-center">
                            <label for="imageUpload" wire:loading.attr="disabled"
                                class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Upload Image
                                <div wire:loading.delay.long wire:target="pimg" role="status">
                                    <svg aria-hidden="true"
                                        class="w-4 h-4 text-gray-200 animate-spin fill-blue-600 ml-4"
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
                            </label>
                            <input wire:model="companyImage" type="file" id="imageUpload" class="hidden"
                                accept="image/*">
                        </div>
                    </div>

                    {{-- FIELDS START --}}
                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="bname" :value="__('Business Name')" />
                            <x-text-input wire:model="businessName" class="block mt-1 w-full" type="text" disabled />
                            <x-input-error :messages="$errors->get('businessName')" class="mt-2" />

                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="tname" :value="__('Trade Name')" />
                            <x-text-input wire:model="tradeName" class="block mt-1 w-full" type="text" disabled />
                            <x-input-error :messages="$errors->get('tradeName')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="tin" :value="__('TIN')" />
                            <x-text-input wire:model="tin" class="block mt-1 w-full" type="text" disabled />
                            <x-input-error :messages="$errors->get('tin')" class="mt-2" />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="loctype" :value="__('Location Type')" />
                            <select wire:model="locType" class="block mt-1 w-full rounded-md" disabled>
                                <option value="" disabled selected>Select Location Type</option>
                                <option value="1">Main</option>
                                <option value="2">Branch</option>
                            </select>
                            <x-input-error :messages="$errors->get('loctype')" class="mt-2" />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="workforce" :value="__('Total Work Force')" />
                            <select wire:model="workforce" class="block mt-1 w-full rounded-md">
                                <option value="" disabled selected>Select Total Work Force</option>
                                <option value="1">1 - 9 (Micro)</option>
                                <option value="2">10 - 99 (Small)</option>
                                <option value="3">100 - 199 (Medium)</option>
                                <option value="4">200 and Over (Large)</option>

                            </select>
                            <x-input-error :messages="$errors->get('workforce')" class="mt-2" />

                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="empType" :value="__('Employment Status')" />
                            <select wire:model='empType' class="block mt-1 w-full rounded" disabled>
                                <option value="" disabled selected>Select Employment Type</option>
                                <option value="1">Public</option>
                                <option value="2">Private</option>
                            </select>
                            <x-input-error :messages="$errors->get('empType')" class="mt-2" />


                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="empDesc" :value="__('Description')" />
                            <select wire:model='empDesc' class="block mt-1 w-full rounded" disabled>
                                <option value="" disabled selected>Select Description</option>
                                <option value="1">National Government Agency</option>
                                <option value="2">Local Government Unit</option>
                                <option value="3">Government-owned and Controlled Corporation</option>
                                <option value="4">State/Local University or College</option>
                                <option value="5">Direct Hire</option>
                                <option value="6">Private Employment Agency</option>
                                <option value="7">Overseas Recruitment Agency</option>
                                <option value="8">'D.O. 174, s. 2017</option>
                            </select>
                            <x-input-error :messages="$errors->get('empDesc')" class="mt-2" />

                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="emptype" :value="__('Employment Type')" />
                            <x-text-input wire:model="empType" class="block mt-1 w-full" type="text" disabled />
                            <x-input-error :messages="$errors->get('empType')" class="mt-2" />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="empdesc" :value="__('Employment Description')" />
                            <x-text-input wire:model="empDesc" class="block mt-1 w-full" type="text" disabled />
                            <x-input-error :messages="$errors->get('empDesc')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="companyAddress" :value="__('Company Address')" />
                            <x-text-input wire:model="companyAddress" class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('companyAddress')" class="mt-2" />

                        </div>
                        <div class="flex flex-col w-full">
                            <livewire:modals.barangay-modal />
                            <x-input-label for="city" :value="__('Barangay')" />
                            <x-text-input wire:model='bar' class="block mt-1 w-full" type="text" readonly
                                x-data="" x-on:click.prevent="dispatch('open-modal', 'barangay-modal')"
                                x-on:focus="$dispatch('open-modal', 'barangay-modal')" />
                            <x-input-error :messages="$errors->get('bar')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="mun" :value="__('Municipality')" />
                            <x-text-input wire:model='mun' class="block mt-1 w-full" type="text" readonly />
                            <x-input-error :messages="$errors->get('mun')" class="mt-2" />
                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="province" :value="__('Province')" />
                            <x-text-input wire:model='prov' class="block mt-1 w-full" type="text" readonly />
                            <x-input-error :messages="$errors->get('prov')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-row mt-4">

                        <x-blue-button wire:target="companyImage, saveCompany" wire:loading.attr="disabled"
                            wire:click.prevent="saveCompany" class="ml-auto mr-3" type="button"
                            x-data="" {{-- x-on:click.prevent="$dispatch('open-modal', 'jobTag-modal')"> x-on:click.prevent="saveDetails(general)" --}}>
                            Save
                            <div wire:loading.delay.long wire:target="companyImage, saveCompany" role="status">
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
                        </x-blue-button>
                    </div>
                </div>
                {{-- BASIC INFORMATION --}}

                {{-- CONTACT PERSON --}}
                <div class="flex flex-col" x-show="openTab === 2"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-cloak>

                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="contactPerson" :value="__('Contact Person')" />
                            <x-text-input wire:model="contactPerson" class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('contactPerson')" class="mt-2" />

                        </div>
                        <div class="flex flex-col w-full">
                            <x-input-label for="contactPosition" :value="__('Position')" />
                            <x-text-input wire:model="contactPosition" class="block mt-1 w-full" type="text" />
                            <x-input-error :messages="$errors->get('contactPosition')" class="mt-2" />

                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="contactEmail" :value="__('E-mail Address')" />
                            <x-text-input wire:model="contactEmail" class="block mt-1 w-full" type="email" />
                            <x-input-error :messages="$errors->get('contactEmail')" class="mt-2" />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="contactTel" :value="__('Telephone No.')" />
                            <x-text-input wire:model="contactTnum" class="block mt-1 w-full" type="tel" />
                            <x-input-error :messages="$errors->get('contactTnum')" class="mt-2" />
                        </div>

                    </div>

                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="contactMobile" :value="__('Mobile No.')" />
                            <x-text-input wire:model="contactPnum" class="block mt-1 w-full" type="tel" />
                            <x-input-error :messages="$errors->get('contactPnum')" class="mt-2" />
                        </div>

                        <div class="flex flex-col w-full">
                            <x-input-label for="contactFax" :value="__('Fax No.')" />
                            <x-text-input wire:model="contactFnum" class="block mt-1 w-full" type="tel" />
                            <x-input-error :messages="$errors->get('contactFnum')" class="mt-2" />
                        </div>

                    </div>
                    <div class="flex flex-row mt-4">

                        <x-blue-button wire:target="saveContact" wire:loading.attr="disabled"
                            wire:click.prevent="saveContact" class="ml-auto mr-3" type="button"
                            x-data="" {{-- x-on:click.prevent="$dispatch('open-modal', 'jobTag-modal')"> x-on:click.prevent="saveDetails(general)" --}}>
                            Save
                            <div wire:loading.delay.long wire:target="saveContact" role="status">
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
                        </x-blue-button>
                    </div>


                </div>
                {{-- CONTACT PERSON --}}

                {{-- INDUSTRY --}}
                <div class="flex flex-col" x-show="openTab === 3"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-cloak>

                    <div class="flex flex-row my-4 w-full gap-4 mt-4">
                        <div class="flex flex-col w-full">

                            <div class="flex flex-row w-full items-center">

                                <x-input-label for="fname"> </i>Industry Preference
                                </x-input-label>

                                <x-primary-button class="ml-auto mr-3" type="button" x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'industry-modal')">
                                    Add Industry Preference
                                </x-primary-button>

                            </div>

                            <div class="flex-inline border border-gray-300 rounded-lg p-1 mt-2 ">


                                @foreach ($employerDetails->company_industry_line as $industryLine)
                                    <span
                                        class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ">
                                        {{ $industryLine->job_industry->industry_Title }}
                                        <button
                                            wire:click.prevent="removeIndustry({{ $industryLine->company_industry_line_id }})"
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
                            <x-input-error :messages="$errors->get('industrypreference')" class="mt-2" />

                        </div>
                    </div>


                </div>

                <div class="flex flex-col" x-show="openTab === 4"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-cloak>
                    <div class="flex flex-col my-4 w-full gap-4 mt-4 w-full">



                        @foreach ($requirements as $requirement)
                            <div class="flex flex-row w-full gap-2 md:gap-4">

                                @if ($requirement->requirementPassed)
                                    <div class="flex flex-col w-full">
                                        <button
                                            wire:click.prevent='viewFile({{ $requirement->requirementPassed->req_passed_id }})'
                                            type="button"
                                            class="text-blue-900 bg-blue-400 hover:bg-blue-100 border border-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2">
                                            <i class="fa-solid fa-file-contract me-2"></i>
                                            View {{ $requirement->requirement_Title }}
                                            <svg class="ml-auto mr-0 w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                            </svg>
                                        </button>
                                        @php
                                            $oneYearAgo = now()->subYear()->format('Y-m-d');
                                        @endphp

                                        <div x-data="{
                                            updatedAt: '{{ $requirement->requirementPassed->updated_at->format('Y-m-d') }}',
                                            isOld: new Date('{{ $requirement->requirementPassed->updated_at->format('Y-m-d') }}') < new Date('{{ $oneYearAgo }}')
                                        }">
                                            <p x-bind:class="{ 'text-red-500': isOld, 'text-gray-800': !isOld }"
                                                class="text-sm">
                                                Last updated:
                                                {{ $requirement->requirementPassed->updated_at->format('F j, Y') }}
                                            </p>
                                        </div>


                                    </div>
                                @else
                                    <div class="flex flex-col w-full">
                                        <div
                                            class="text-red-900 bg-red-400 border border-red-500 focus:ring-4 focus:outline-none focus:ring-red-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2">
                                            <i class="fa-solid fa-file-contract me-2"></i>
                                            You have not uploaded {{ $requirement->requirement_Title }}.
                                            <svg class="ml-auto mr-0 w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </div>
                                    </div>
                                @endif
                                <div class="flex flex-col w-full h-full">
                                    <div class="flex flex-row w-full h-full justify-center items-center gap-2">
                                        <div class="flex flex-col w-full">
                                            <input wire:model='req.{{ $requirement->requirement_id }}'
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                                aria-describedby="file_input_help" id="file_input" type="file">

                                        </div>

                                        <div wire:loading.delay.long
                                            wire:target="req.{{ $requirement->requirement_id }}" role="status">
                                            <svg aria-hidden="true"
                                                class="w-6 h-6 text-gray-200 animate-spin fill-blue-600 ml-4"
                                                viewBox="0 0 100 101" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                    fill="currentFill" />
                                            </svg>
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>

                                    <p class="mt-1 text-sm text-gray-500 " id="file_input_help">PDF ONLY
                                        (MAX
                                        5MB)
                                        .
                                    </p>
                                    <x-input-error :messages="$errors->get('req.' . $requirement->requirement_id)" class="mt-2" />
                                </div>
                            </div>
                        @endforeach


                        <x-blue-button wire:target="req, saveReq" wire:loading.attr="disabled"
                            wire:click.prevent="saveReq" class="ml-auto mr-3" type="button"
                            x-data="">
                            Save
                            <div wire:loading.delay.long wire:target="pimg, saveProfile" role="status">
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
                        </x-blue-button>
                    </div>

                </div>

            </div>








        </div>
    </div>


    <livewire:modals.industry-modal />


</div>

@script
    <script>
        Livewire.on('viewFile', event => {
            // Check if the event is an array and has at least one element
            if (Array.isArray(event) && event.length > 0) {
                // Access the first element and then its properties
                const data = event[0]; // Assuming the data object is the first element

                // Log the entire data object for verification
                console.log('Data:', data);

                // Extract URL and handle dynamic keys
                const url = data.url;
                const formData = {
                    ...data
                }; // Spread the data object to use for form inputs

                // Check if URL is present
                if (url) {
                    // Create and configure the form element
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = url;
                    form.target = '_blank';

                    // Add CSRF token as a hidden input
                    const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken;
                    form.appendChild(csrfInput);

                    // Add all data inputs dynamically
                    for (const [key, value] of Object.entries(formData)) {
                        // Skip the URL and CSRF token from being added as form inputs
                        if (key !== 'url') {
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = key;
                            input.value = value;
                            form.appendChild(input);
                        }
                    }

                    // Append form to the body and submit
                    document.body.appendChild(form);
                    form.submit();

                    // Clean up by removing the form element
                    document.body.removeChild(form);
                } else {
                    console.error('URL not found in event data');
                }
            } else {
                console.error('Event is not in the expected format');
            }
        });
    </script>
@endscript
