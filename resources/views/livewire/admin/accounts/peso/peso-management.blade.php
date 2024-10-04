<div wire:poll class="container mx-auto py-8">
    {{-- GRID --}}
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

        {{-- TITLE --}}
        <div class="col-span-4 sm:col-span-12">
            <h1 class="text-2xl font-bold">Role Management / PESO {{ $municipality }}</h1>
        </div>

        <div class="col-span-4 sm:col-span-6">
            {{-- @livewire('admin.requirements.requirements-table') --}}
            <div class="bg-white shadow rounded-lg p-6">

                {{-- TITLE --}}
                <div class="flex items-center mb-2">
                    <h1 class="text-xl font-bold">Account List</h1>
                </div>

                <div class="relative overflow-x-auto">
                    <div class="flex flex-col sm:flex-row p-1 sm:justify-between gap-2 space-y-4 sm:space-y-0 pb-4">

                        <label for="table-search" class="sr-only">Search</label>

                        <div class="relative">

                            <div
                                class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            {{-- SEARCH --}}
                            <input wire:model.live='search' type="search" id="table-search-users"
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search">
                        </div>
                        {{-- ADD BUTTON --}}
                        <div class="flex flex-wrap mr-3 gap-2">


                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                                        <div>
                                            {{ $filter == 8 ? 'PESO Consultant' : ($filter == 9 ? 'PESO Officer' : 'All') }}
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
                                    <x-slot name="contentClasses">
                                        max-h-[200px] bg-white
                                    </x-slot>

                                    <x-dropdown-link href="#" wire:click="updateFilter('')"
                                        class="block px-4 py-2 hover:bg-gray-100">All</x-dropdown-link>
                                    <hr>
                                    <!-- Authentication -->
                                    <x-dropdown-link href="#" wire:click="updateFilter('8')"
                                        class="block px-4 py-2 hover:bg-gray-100">PESO Consultant</x-dropdown-link>

                                    <x-dropdown-link href="#" wire:click="updateFilter('9')"
                                        class="block px-4 py-2 hover:bg-gray-100">PESO Officer</x-dropdown-link>

                                    </form>
                                </x-slot>
                            </x-dropdown>

                        </div>



                    </div>

                    {{-- REQUIREMENT TABLE --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center hidden sm:table-cell">
                                        Created
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <!-- Action Column -->
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($adminAccounts->isEmpty())
                                    <tr>
                                        <td colspan="5">
                                            <div class="flex flex-col items-center justify-center mt-24 mb-24">
                                                <div class="p-6 bg-gray-100 rounded-full">
                                                    <svg class="w-24 h-24 text-black" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2"
                                                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                                    </svg>
                                                </div>
                                                <p class="text-xl font-bold text-black text-center mt-2">
                                                    No Records Found!
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($adminAccounts as $data)
                                        <tr wire:key='requirement-{{ $data->requirement_id }}'
                                            class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row" class="text-gray-900 whitespace-nowrap">
                                                <div class="ps-3 text-wrap">
                                                    <div class="text-base font-semibold">
                                                        <div class="text-base font-semibold uppercase">
                                                            {{ $data->peso_accounts->peso_accounts_Fname }}
                                                            {{ $data->peso_accounts->peso_accounts_Mname ?? '' }}
                                                            {{ $data->peso_accounts->peso_accounts_Lname }}
                                                        </div>
                                                    </div>
                                                    <div class="font-normal text-gray-500 text-sm uppercase">
                                                        {{ $data->peso_accounts->peso_accounts_Pnumber }}
                                                    </div>
                                                    <div class="font-normal text-gray-500 text-sm">
                                                        <!-- Extra Info for Mobile -->
                                                        <span class="sm:hidden">
                                                            {{ $data->usertype == 8 ? 'PESO Consultant' : ($data->usertype == 9 ? 'PESO Officer' : 'PESO Manager') }}
                                                            | Status: <!-- Replace with actual status if available -->
                                                            {{ $data->status ?? 'N/A' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="px-6 py-4 hidden sm:table-cell">
                                                <div class="flex items-center uppercase">
                                                    @if ($data->usertype == 8)
                                                        <div class="h-2.5 w-2.5 rounded-full bg-cyan-500 me-2"></div>
                                                        PESO Consultant
                                                    @elseif ($data->usertype == 9)
                                                        <div class="h-2.5 w-2.5 rounded-full bg-purple-500 me-2"></div>
                                                        PESO Officer
                                                    @elseif ($data->usertype == 10)
                                                        <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2"></div>
                                                        PESO Manager
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 hidden sm:table-cell">
                                                Status
                                            </td>
                                            <td class="px-6 py-4 text-center hidden sm:table-cell">
                                                <div class="text-base font-light uppercase text-sm">
                                                    {{ $data->updated_at->format('h:i A') }}
                                                </div>
                                                <div class="text-base font-medium uppercase text-sm">
                                                    {{ $data->updated_at->format('F d Y') }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex flex-row items-center justify-center gap-6">
                                                    <div x-data="{ tooltip: 'PESO Account Overview' }">
                                                        <a wire:navigate
                                                            href="{{ route('admin-users-peso-overview', ['id' => $data->peso_accounts->peso_accounts_id]) }}"
                                                            x-tooltip="tooltip" type="button"
                                                            class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" fill="currentColor">
                                                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>

                {{-- PAGINATION --}}
                <div class="mt-4">
                    {{ $adminAccounts->links('vendor.livewire.tailwind') }}
                </div>

            </div>

        </div>




        <div class="col-span-4 sm:col-span-6">
            {{-- @livewire('admin.requirements.requirements-add') --}}
            <div class="bg-white shadow rounded-lg p-6" x-data="{
                openTab: 1,
                activeTab: 'text-blue-600 bg-gray-100  rounded-t-lg active',
                inactiveTab: ' rounded-t-lg hover:text-gray-600 hover:bg-gray-50',
            }">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200">
                    <li class="me-2">
                        <button @click="openTab = 1" :class="openTab === 1 ? activeTab : inactiveTab"
                            aria-current="page" class="inline-block p-4">PESO Branch</button>
                    </li>
                    <li class="me-2">
                        <button @click="openTab = 2" :class="openTab === 2 ? activeTab : inactiveTab"
                            aria-current="page" class="inline-block p-4">PESO Accounts</button>
                    </li>
                </ul>


                <div class="mt-4">
                    <div x-show="openTab === 1" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-cloak>
                        <h1 class="text-2xl font-bold mb-4">PESO Profile</h1>

                        <div class="flex flex-col items-center mt-4">
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-[160] h-[160] bg-gray-200 border border-gray-300 rounded-lg overflow-hidden flex items-center justify-center shrink-0">
                                    <!-- Display uploaded image here -->

                                    @if ($pesoImg && !$errors->has('pesoImg'))
                                        <img id="uploadedImage"
                                            class="flex uploaded-image object-contain w-[200px] h-[200px] shrink-0 grow-0"
                                            src="{{ $pesoImg->temporaryUrl() }}" alt="Uploaded Image" />
                                    @else
                                        <img id="uploadedImage"
                                            class="flex uploaded-image object-contain w-[200px] h-[200px] shrink-0 grow-0"
                                            src="{{ $pesoInfo->peso_Img ? asset('storage/' . $pesoInfo->peso_Img) : asset('assets/img/PESO-Logo.png') }}"
                                            alt="Uploaded Image" />
                                    @endif
                                </div>
                            </div>


                            <x-input-error :messages="$errors->get('pesoImg')" class="mt-2" />
                            <div class="mt-4 w-160 flex justify-center">
                                <label for="imageUpload" wire:loading.attr="disabled"
                                    class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Upload Image
                                    <div wire:loading.delay.long wire:target="pesoImg" role="status">
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
                                <input wire:model="pesoImg" type="file" id="imageUpload" class="hidden"
                                    accept="image/*">
                            </div>
                            <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                                <div class="flex flex-col w-full">
                                    <x-input-label for="pesoEmail" :value="__('PESO Email*')" />
                                    <x-text-input wire:model="pesoEmail" class="block mt-1 w-full" type="text" />
                                    <x-input-error :messages="$errors->get('pesoEmail')" class="mt-2" />

                                </div>
                                <div class="flex flex-col w-full">
                                    <x-input-label for="pesoPhone" :value="__('PESO Phone Number*')" />
                                    <x-text-input wire:model="pesoPhone" class="block mt-1 w-full" type="text" />
                                    <x-input-error :messages="$errors->get('pesoPhone')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 mt-4 w-full">
                                <div class="flex flex-col w-full">
                                    <x-input-label for="pesoTel" :value="__('PESO Telephone Number')" />
                                    <x-text-input wire:model="pesoTel" class="block mt-1 w-full" type="text" />
                                    <x-input-error :messages="$errors->get('pesoTel')" class="mt-2" />

                                </div>
                                <div class="flex flex-col w-full">
                                    <x-input-label for="pesoFax" :value="__('PESO Fax Number')" />
                                    <x-text-input wire:model="pesoFax" class="block mt-1 w-full" type="text" />
                                    <x-input-error :messages="$errors->get('pesoFax')" class="mt-2" />
                                </div>
                            </div>

                            <div class="flex flex-col w-full mt-2">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">PESO
                                    Description</label>
                                <textarea id="descModal" maxlength="400" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                    placeholder="Write your description here..." name="descPost" wire:model='pesoDesc'></textarea>
                                <x-input-error :messages="$errors->get('pesoDesc')" class="mt-2" />

                            </div>

                            <div class="flex flex-row w-full justify-end mt-6 ">
                                <x-green-button wire:loading.attr="disabled" wire:click.prevent="savePESO"
                                    wire:target='savePESO, pesoImg' class="ms-3" type="button">
                                    {{ __('Save') }}
                                    <div wire:loading.delay.long wire:target="savePESO" role="status">
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
                                </x-green-button>

                            </div>



                        </div>

                    </div>


                    <div x-show="openTab === 2" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-cloak>
                        <h1 class="text-2xl font-bold mb-4">Create An Account</h1>
                        <div>
                            <div class="flex flex-col sm:flex-row w-full mt-6 gap-2 ">
                                <div class="flex flex-col mt-2 w-full">
                                    <x-input-label for="fname" :value="__('First Name*')" />
                                    <x-text-input wire:model="fname" class="block mt-1 w-full" type="text" />
                                    <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                                </div>
                                <div class="flex flex-col mt-2 w-full">
                                    <x-input-label for="mname" :value="__('Middle Name')" />
                                    <x-text-input wire:model="mname" class="block mt-1 w-full" type="text" />
                                    <x-input-error :messages="$errors->get('mname')" class="mt-2" />
                                </div>
                                <div class="flex flex-col mt-2 w-full">
                                    <x-input-label for="lname" :value="__('Last Name*')" />
                                    <x-text-input wire:model="lname" class="block mt-1 w-full" type="text" />
                                    <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                                </div>

                            </div>
                            <div class="flex flex-col sm:flex-row w-full mt-6 gap-2 ">

                                <div class="flex flex-col mt-2 w-full">
                                    <x-input-label for="email" :value="__('Email*')" />
                                    <x-text-input wire:model="email" class="block mt-1 w-full" type="email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="flex flex-col mt-2 w-full">
                                    <x-input-label for="phone" :value="__('Phone Number*')" />
                                    <x-text-input wire:model="phone" class="block mt-1 w-full" type="tel" />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex flex-col w-full sm:w-1/2 mt-6">
                                <div class="flex flex-col w-full">
                                    <x-input-label for="role" :value="__('PESO Role*')" />
                                    <select wire:model="role" class="block mt-1 w-full rounded-md">
                                        <option value="" disabled selected>Select PESO Role</option>
                                        {{-- <option value="8">PESO Consultant</option> --}}
                                        <option value="9">PESO Officer</option>
                                        <option value="10">PESO Manager</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex flex-row w-full mt-6 justify-end">
                                <x-green-button wire:click.prevent='validateAccount' type="submit"
                                    class="ml-auto mr-3">
                                    {{ __('Create Account') }}
                                </x-green-button>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>


    <x-modal name="confirm-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center" x-data="{ agreeBox: @entangle('agreeBox') }">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to create this account?') }}
            </h2>
            <hr>
            <div class="flex flex-col my-4 items-center justify-center">
                <div class="flex flex-col mt-4 w-full  px-4">
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col">
                            <span class="text-xl font-bold ">Full Name:</span>
                            <span>{{ $fname }}
                                @if ($mname)
                                    {{ $mname }}
                                @endif
                                {{ $lname }}
                            </span>
                        </div>
                        <div class="flex flex-col ">
                            <span class="text-xl font-bold ">Email:</span>
                            <span>{{ $email }}</span>
                        </div>

                        <div class="flex flex-col">
                            <span class="text-xl font-bold ">Phone Number:</span>
                            <span>
                                {{ $phone }}
                            </span>
                        </div>
                        <div class="flex flex-col ">
                            <span class="text-xl font-bold ">Role:</span>
                            <span>
                                @if ($role == 8)
                                    PESO Consultant
                                @elseif ($role == 9)
                                    PESO Officer
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 mt-4" role="alert">
                        <span class="font-medium">Password will be generated and sent through the user's email.</span>
                    </div>

                    <div class="inline-flex justify-center items-center mt-4 w-full">
                        <label class="relative flex items-center p-3 rounded-full cursor-pointer" for="agreeBox">
                            <input wire:model="agreeBox" type="checkbox" id="agreeBox"
                                class="h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all checked:border-blue-900 checked:bg-blue-600" />
                            <span
                                class="absolute text-white top-2/4 left-2/4 transform -translate-x-2/4 -translate-y-2/4 opacity-0 peer-checked:opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                    fill="currentColor" stroke="currentColor" stroke-width="1">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </label>
                        <label class="mt-px font-light text-gray-700 cursor-pointer select-none" for="agreeBox">
                            Confirm the transaction
                        </label>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-between">
                <x-secondary-button x-on:click="agreeBox = false; $dispatch('close-modal', 'confirm-modal')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-green-button x-bind:disabled="!agreeBox" wire:loading.attr="disabled"
                    wire:click.prevent="createAccount" class="ms-3" type="button">
                    {{ __('Create') }}
                    <div wire:loading.delay.long wire:target="createAccount" role="status">
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


</div>
