<div>
    <div class="grid grid-cols-4 sm:grid-cols-12 mt-4 mx-8 p-0 sm:p-6 gap-5 items-center">
        <div class="col-span-4 sm:col-span-3">

        </div>

        <div class="col-span-4 sm:col-span-9">

            <div class="flex flex-row items-center gap-4">
                <a href="{{ route('jobseeker.profile', ['id' => auth()->user()->employee->employee_id]) }}">
                    <div class="flex items-center rounded-full hover:bg-gray-300 transition-transform p-1">
                        <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                    </div>
                </a>
                <h2 class="text-2xl font-bold">Edit Profile</h2>

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
                        <button @click="openTab = 1" :class="openTab === 1 ? activeTab : inactiveTab"
                            aria-current="page" class="inline-block p-4">Basic Information</button>
                    </li>
                    <li class="me-2">
                        <button @click="openTab = 2" :class="openTab === 2 ? activeTab : inactiveTab"
                            class="inline-block p-4">Eligibility</button>
                    </li>
                    <li class="me-2">
                        <button @click="openTab = 3" :class="openTab === 3 ? activeTab : inactiveTab"
                            class="inline-block p-4">License</button>
                    </li>
                    <li class="me-2">
                        <button @click="openTab = 4" :class="openTab === 4 ? activeTab : inactiveTab"
                            class="inline-block p-4">Job Preference</button>
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
                                <img id="uploadedImage" class="uploaded-image"
                                    src="{{ $employeeDetails->pimg ? asset($employeeDetails->pimg) : asset('https://randomuser.me/api/portraits/men/94.jpg') }}"
                                    alt="User Image" width="160" height="160" />
                            </div>
                        </div>
                        <div class="mt-4 w-160 flex justify-center">
                            <label for="imageUpload"
                                class="cursor-pointer px-4 py-2 bg-[#428bca] text-white rounded hover:bg-red-600 transition-colors duration-300 text-center w-full">
                                Upload Image
                            </label>
                            <input type="file" id="imageUpload" name="pimagePost" class="hidden" accept="image/*"
                                onchange="previewImage(event)">
                        </div>
                    </div>

                    <div class="flex flex-row mt-4 w-full">
                        <div class="flex flex-col w-full">
                            <x-input-label for="fname" :value="__('First Name')" />
                            <x-text-input wire:model="fname" class="block mt-1 w-full" type="text" />

                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="lname" :value="__('Last Name')" />
                            <x-text-input wire:model="lname" class="block mt-1 w-full" type="text" />
                        </div>
                    </div>
                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="mname" :value="__('Middle Name')" />
                            <x-text-input wire:model="mname" class="block mt-1 w-full" type="text" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="suffix" :value="__('Suffix')" />
                            <select wire:model="suffix" name="suffixPost" class="block mt-1 w-full rounded-md">
                                <option value="" disabled selected>Select Suffix</option>
                                <option value="nonw">None</option>
                                <option value="jr">Jr. (Junior)</option>
                                <option value="sr">Sr. (Senior)</option>
                                <option value="i">I</option>
                                <option value="ii">II</option>
                                <option value="iii">III</option>
                                <option value="iv">IV</option>
                                <option value="v">V</option>
                                <option value="vi">VI</option>
                                <option value="vii">VII</option>
                                <option value="viii">VIII</option>
                                <option value="ix">IX</option>
                                <option value="x">X</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="birthdate" :value="__('Birthdate')" />
                            <x-text-input wire:model="birthdate" class="block mt-1 w-full" type="date" />
                        </div>

                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="gender" :value="__('Gender')" />
                            <select wire:model="gender" name="genderPost" class="block mt-1 w-full rounded-md">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-row w-full mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="presentAddress" :value="__('Present Address')" />
                            <x-text-input wire:model="address" class="block mt-1 w-full" type="text"
                                name="hnumPost" />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="city" :value="__('Barangay')" />
                            <select name="barangayPost" class="block mt-1 w-full rounded-md">
                            </select>
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="city" :value="__('Municipality')" />
                            <select name="cityPost" class="block mt-1 w-full rounded-md">
                                <option value="" disabled selected>Select City</option>
                            </select>
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="province" :value="__('Province')" />
                            <select name="provincePost" class="block mt-1 w-full rounded-md">
                                <option value="" disabled selected>Select Province</option>
                            </select>
                            <x-input-error :messages="$errors->get('province')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="civilstatus" :value="__('Civil Status')" />
                            <select wire:model="civilstatus" name="civilstatusPost"
                                class="block mt-1 w-full rounded-md">
                                <option value="" disabled selected>Select Civil Status</option>
                                <option value="1">Single</option>
                                <option value="2">Married</option>
                                <option value="3">Widowed</option>

                            </select>
                            <x-input-error :messages="$errors->get('civilstatus')" class="mt-2" />
                        </div>

                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="religion" :value="__('Religion')" />
                            <select wire:model="religion" name="religionPost" class="block mt-1 w-full rounded-md">
                                <option value="" disabled selected>Select Religion</option>
                                <option value="2">ASSEMBLY OF GOD</option>
                                <option value="3">AGLIPAYAN</option>
                                <option value="4">BORN AGAIN CHRISTIAN</option>
                                <option value="5">BAPTIST</option>
                                <option value="6">BUDDIST</option>
                                <option value="7">CHURCH OF GOD THRU CHRIST JESUS</option>
                                <option value="8">CHRISTIAN</option>
                                <option value="9">CHURCH OF CHRIST</option>
                                <option value="10">CHURCH OF GOD</option>
                                <option value="25">CHURCH OF LATTER DAY SAINT</option>
                                <option value="11">EPISCOPALIAN ANGELICAN</option>
                                <option value="12">ESPIRITISM</option>
                                <option value="13">EVANGELICAL</option>
                                <option value="15">FAITH TABERNACLE</option>
                                <option value="14">FOUR SQUARE GOSPEL CHURCH</option>
                                <option value="31">FOURTH WATCH</option>
                                <option value="16">HINDU</option>
                                <option value="19">IGLESIA NG DIYOS KAY CRISTO JESUS</option>
                                <option value="18">IGLESIA NI CRISTO</option>
                                <option value="17">IGLESIA SA DIYOS ESPIRITU SANTO</option>
                                <option value="20">ISLAM</option>
                                <option value="22">JEHOVAH'S WITNESSES</option>
                                <option value="21">JESUS MIRACLE CRUSADE</option>
                                <option value="23">LUTHERAN</option>
                                <option value="24">METHODIST</option>
                                <option value="26">NON-SECTORAL CHARISMATIC</option>
                                <option value="27">ORTHODOX</option>
                                <option value="28">OTHERS</option>
                                <option value="29">PENTECOSTAL</option>
                                <option value="30">PHILIPPINE INDEPENDENT CHRISTIAN CHURCH(PICC/IFI)</option>
                                <option value="32">PRESBYTERIAN</option>
                                <option value="33">PROTESTANT</option>
                                <option value="35">RIZALIST</option>
                                <option value="34">ROMAN CATHOLIC</option>
                                <option value="36">SEVENTH DAY ADVENTIST</option>
                                <option value="1">TWELVE TRIBES OF ISRAEL</option>
                                <option value="38">UNION ESPIRITISTA CRISTIANA</option>
                                <option value="37">UNITED CHURCH CHRISTIAN OF THE PHILIPPINES (UCCP)</option>
                                <option value="39">WESLEYAN CHURCH</option>
                                <option value="40">WORD OF HOPE</option>
                                <option value="41">OTHER</option>
                            </select>
                            <x-input-error :messages="$errors->get('religion')" class="mt-2" />
                        </div>
                    </div>


                    <div class="flex flex-row mt-4">
                        <div class="flex flex-col w-full">
                            <x-input-label for="pnum" :value="__('Cellphone No.')" />
                            <x-text-input wire:model="pnumber" class="block mt-1 w-full" type="tel"
                                name="pnumPost" />
                            <x-input-error :messages="$errors->get('pnumber')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="tin" :value="__('TIN')" />
                            <x-text-input wire:model="tinnum" class="block mt-1 w-full" type="text"
                                name="tinPost" />
                            <x-input-error :messages="$errors->get('tinnum')" class="mt-2" />
                        </div>
                        <div class="flex flex-col ml-4 w-full">
                            <x-input-label for="height" :value="__('Height (cm)')" />
                            <x-text-input wire:model="height" class="block mt-1 w-full" type="text"
                                name="heightPost" />
                            <x-input-error :messages="$errors->get('height')" class="mt-2" />
                        </div>
                    </div>










                    <div class="flex flex-row my-4 w-full gap-4">
                        <div class="flex flex-col w-full">

                            <div class="flex flex-row w-full items-center">

                                <x-input-label for="fname"> </i>Disability
                                </x-input-label>

                                <x-primary-button class="ml-auto mr-3" type="button" x-data="">
                                    {{-- x-on:click.prevent="$dispatch('open-modal', 'jobTag-modal')"> --}}
                                    Add Disability
                                </x-primary-button>

                            </div>

                            <div class="flex-inline border border-gray-300 rounded-lg p-1 mt-2 ">


                                @foreach ($disability as $dis)
                                    <span wire:key="{{ $dis->disability_id }}"
                                        class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ">
                                        {{ $dis->disability_Type }}
                                        <button wire:click.prevent="removeDisability({{ $dis->disability_id }})"
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
                            <x-input-error :messages="$errors->get('disability')" class="mt-2" />

                        </div>
                    </div>

                    <div class="flex flex-row">


                        <x-blue-button class="ml-auto mr-3" type="button" x-data=""
                            {{-- x-on:click.prevent="$dispatch('open-modal', 'jobTag-modal')"> --}} x-on:click.prevent="save">
                            Save
                        </x-blue-button>
                    </div>
                </div>
                {{-- BASIC INFORMATION --}}


                {{-- ELIGIBILITY --}}
                <div class="flex flex-col" x-show="openTab === 2"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-cloak>


                    <div class="relative overflow-x-auto mt-4">

                        <div
                            class="p-1 flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 ">

                            <label for="table-search" class="sr-only">Search</label>


                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                {{-- SEARCH --}}
                                <input wire:model.live='search' type="text"
                                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Search for eligibility">
                            </div>

                            {{-- ADD BUTTON --}}
                            <div class="hidden sm:inline-flex">
                                <x-primary-button wire:click.prevent='addEli()' type="button"
                                    class="bg-blue-400 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900"
                                    x-data="">
                                    {{-- x-on:click.prevent="$dispatch('open-modal', 'eligibility-modal')"> --}}
                                    Add Eligibility</x-primary-button>
                            </div>

                        </div>


                        <table class="w-full text-sm text-left rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-1/3">
                                        Eligibility Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-full">
                                        Validity date
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-1/3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($eligibility as $eli)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">
                                            <div class="text-gray-500 font-medium text-lg uppercase">
                                                {{ $eli->eligibilityType->eligibility_Name }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="text-black font-bold text-lg uppercase">
                                                {{ $eli->eligibility_Date->format('F j, Y') }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex flex-row items-center justify-center gap-6">
                                                <button
                                                    wire:click.prevent='editEligibility({{ $eli->eligibility_id }})'
                                                    type="button">


                                                    <svg class="w-6 h-6 text-blue-600" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="currentColor" viewBox="0 0 24 24">

                                                        <path fill-rule="evenodd"
                                                            d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                                            clip-rule="evenodd" />
                                                        <path fill-rule="evenodd"
                                                            d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <svg class="w-6 h-6 text-gray-800 text-red-500" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>


                </div>
                {{-- ELIGIBILITY --}}


                {{-- LICENSE --}}
                <div class="flex flex-col" x-show="openTab === 3"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-cloak>


                    <div class="relative overflow-x-auto mt-4">

                        <div
                            class="p-1 flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 ">

                            <label for="table-search" class="sr-only">Search</label>


                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                {{-- SEARCH --}}
                                <input type="text" wire:model.live.prevent='search'
                                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Search for job position">
                            </div>

                            {{-- ADD BUTTON --}}
                            <div class="hidden sm:inline-flex">
                                <x-primary-button wire:click.prevent='addlicense()' type="button"
                                    class="bg-blue-400 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900"
                                    x-data="">
                                    {{-- x-on:click.prevent="$dispatch('open-modal', 'jobposition-modal')"> --}}
                                    Add License</x-primary-button>
                            </div>

                        </div>


                        <table class="w-full text-sm text-left rtl:text-right">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-1/3">
                                        License Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-full">
                                        Validity date
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-1/3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($license as $empLicense)
                                    <tr wire:key="{{ $empLicense->license_id }}"
                                        class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">
                                            <div class="text-gray-500 font-medium text-lg uppercase">
                                                {{ $empLicense->license_type->license_Name }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="text-black font-bold text-lg uppercase">
                                                {{ $empLicense->license_Validity }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex flex-row items-center justify-center gap-6">
                                                <button
                                                    wire:click.prevent='editLicense({{ $empLicense->license_id }})'
                                                    type="button">


                                                    <svg class="w-6 h-6 text-blue-600" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="currentColor" viewBox="0 0 24 24">

                                                        <path fill-rule="evenodd"
                                                            d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                                            clip-rule="evenodd" />
                                                        <path fill-rule="evenodd"
                                                            d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <svg class="w-6 h-6 text-gray-800 text-red-500" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>


                </div>
                {{-- LICENSE --}}


                <div class="flex flex-col" x-show="openTab === 4"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-cloak>

                    <div class="flex flex-row my-4 w-full gap-4 mt-4">
                        <div class="flex flex-col w-full">

                            <div class="flex flex-row w-full items-center">

                                <x-input-label for="fname"> </i>Job Preference
                                </x-input-label>

                                <x-primary-button class="ml-auto mr-3" type="button" x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'jobTag-modal')">
                                    Add Job Preference
                                </x-primary-button>

                            </div>

                            <div class="flex-inline border border-gray-300 rounded-lg p-1 mt-2 ">



                                <span
                                    class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ">
                                    Information Technology
                                    <button type="button"
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

                            </div>
                            <x-input-error :messages="$errors->get('jobTags')" class="mt-2" />

                        </div>
                    </div>

                </div>

            </div>








        </div>
    </div>


    <x-modal name="license-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('License Record') }}
            </h2>
            <hr>
            <div class="flex flex-col mt-2">
                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="licenseType" :value="__('License')" />

                    <x-dropdown align="left" width="full">
                        <x-slot name="trigger">
                            <button
                                class="mt-1 inline-flex h-full items-center text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-md px-1.5 py-2 w-full">
                                <div class="w-full ml-2 text-left">
                                    {{ $licName }}
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
                                <input wire:model.live.prevent='search' type="text" placeholder="Search..."
                                    class="block w-full px-3 py-1.5 mb-2 border border-gray-300 rounded-md focus:outline-none"
                                    @click.stop>
                            </div>

                            <!-- Dropdown content with scrollbar -->
                            <div class="max-h-[120px] bg-white overflow-y-auto">
                                <!-- Dropdown links -->
                                {{-- LOOP HERE --}}
                                @foreach ($liTypes as $licenseTypes)
                                    <x-dropdown-link wire:click.prevent='selectLicense({{$licenseTypes->license_type_id}})'
                                        class="cursor-pointer block px-4 py-2 hover:bg-gray-100 uppercase"> {{$licenseTypes->license_Name}} </x-dropdown-link>
                                @endforeach
                                {{-- LOOP END --}}
                            </div>
                        </x-slot>

                    </x-dropdown>


                </div>
                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="licenseDate" :value="__('Date Validity')" />
                    <x-text-input wire:model='licValidity' class="block mt-1 w-full" type="date" />
                </div>

            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button wire:click.prevent='closeLic()' type="button">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button wire:click.prevent='saveLicense()' class="ms-3" type="button">
                    {{ __('Save') }}
                </x-danger-button>
            </div>
        </div>
    </x-modal>


    <x-modal name="eligibility-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Eligibility Record') }}
            </h2>
            <hr>
            <div class="flex flex-col mt-2">
                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="licenseType" :value="__('Eligibility')" />

                    <x-dropdown align="left" width="full">
                        <x-slot name="trigger">
                            <button
                                class="mt-1 inline-flex h-full items-center text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-md px-1.5 py-2 w-full">
                                <div class="w-full ml-2 text-left">
                                    {{ $eli_Name }}
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
                                <input wire:model.live='search' type="text" placeholder="Search..."
                                    class="block w-full px-3 py-1.5 mb-2 border border-gray-300 rounded-md focus:outline-none"
                                    @click.stop>
                            </div>

                            <!-- Dropdown content with scrollbar -->
                            <div class="max-h-[120px] bg-white overflow-y-auto">
                                <!-- Dropdown links -->
                                {{-- LOOP HERE --}}
                                @foreach ($elTypes as $eliTypes)
                                    <x-dropdown-link wire:click.prevent='setEli({{ $eliTypes->eligibility_type_id }})'
                                        class="cursor-pointer block px-4 py-2 hover:bg-gray-100 uppercase">
                                        {{ $eliTypes->eligibility_Name }}</x-dropdown-link>
                                    {{-- LOOP END --}}
                                @endforeach

                            </div>

                        </x-slot>

                    </x-dropdown>


                </div>
                <div class="flex flex-col mt-2 w-full">
                    <x-input-label for="licenseDate" :value="__('Date Validity')" />
                    <x-text-input wire:model='eli_Date' class="block mt-1 w-full" type="date" />
                </div>

            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button wire:click.prevent="close()" type="button">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button wire:click.prevent="saveEli()" class="ms-3" type="button">
                    {{ __('Save') }}
                </x-danger-button>
            </div>
        </div>
    </x-modal>












</div>
