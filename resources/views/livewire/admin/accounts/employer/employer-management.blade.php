<div class="container mx-auto py-8">
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

        <div class="col-span-4 sm:col-span-12">
            <h1 class="text-2xl font-bold">Role Management / Employer Management</h1>
        </div>

        <div class="col-span-4 sm:col-span-12">
            <div class="bg-white shadow rounded-lg p-6">
                <h1 class="text-3xl text-center font-bold">Employers / Companies
                </h1>

                <div class="relative p-1 mt-4">

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
                            <input wire:model.live='searchEmployers' type="search"
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search">
                        </div>


                        <div class="flex flex-wrap gap-2">
                            <div x-data="{ tooltip: 'Export to Excel' }">
                                <button x-tooltip='tooltip' type="button" wire:click.prevent='exportData'
                                    class="flex items-center py-1.5 px-4 text-xs sm:text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                    <span class="mr-2">Export</span>
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </button>

                            </div>

                            {{-- <x-dropdown align="left" width="36">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-xs sm:text-sm px-3 py-1.5">
                                        <div>
                                            @if (empty($sortName))
                                                Sort By Name
                                            @elseif($sortName === 'ASC')
                                                Ascending
                                            @elseif($sortName === 'DESC')
                                                Descending
                                            @endif
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
                                        max-h-[300px] bg-white
                                    </x-slot>

                                    <x-dropdown-link wire:click.prevent="updateSort('ASC')" class="cursor-pointer">
                                        Ascending
                                    </x-dropdown-link>
                                    <x-dropdown-link wire:click.prevent="updateSort('DESC')" class="cursor-pointer">
                                        Descending
                                    </x-dropdown-link>

                                </x-slot>
                            </x-dropdown> --}}

                            <button type="button" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'filter-employer-modal')"
                                class="py-1.5 px-5 text-xs sm:text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Filter</button>
                        </div>

                    </div>

                    {{-- TABLE --}}
                    <div class="overflow-x-auto ">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Business Name
                                    </th>
                                    <th scope="col" class="hidden sm:table-cell px-6 py-3">
                                        Company Type
                                    </th>
                                    <th scope="col" class="hidden sm:table-cell px-6 py-3">
                                        Employment Type
                                    </th>
                                    <th scope="col" class="hidden sm:table-cell px-6 py-3">
                                        Partnered
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($partnersData->isEmpty())
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
                                    @foreach ($partnersData as $data)
                                        <tr wire:key='company-{{ $data->company->company_id }}'
                                            class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row"
                                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                                <img class="w-10 h-10 rounded-full"
                                                    src="{{ asset('storage/' . $data->company->company_img) }}"
                                                    alt="img">
                                                <div class="ps-3 text-wrap">
                                                    <div class="text-base font-bold">
                                                        <div class="text-base font-bold uppercase">
                                                            {{ $data->company->business_Name }}
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="font-normal text-gray-500 text-sm uppercase hidden sm:block">
                                                        {{ $data->company->company_Address }},
                                                        {{ $data->company->barangay->barangay_Name }},
                                                        {{ $data->company->barangay->municipality->municipality_Name }}
                                                    </div>
                                                    <div class="font-normal text-gray-500 text-sm uppercase sm:hidden">
                                                        {{ $data->company->company_Address }},
                                                        {{ $data->company->barangay->barangay_Name }},
                                                        {{ $data->company->barangay->municipality->municipality_Name }}
                                                    </div>
                                                    <div class="font-normal text-gray-500 text-sm uppercase sm:hidden">
                                                        {{ $data->company->company_Type == 1 ? 'MAIN' : 'BRANCH' }}
                                                    </div>
                                                    <div class="font-normal text-gray-500 text-sm uppercase sm:hidden">
                                                        {{ $data->company->employer_Type == 1 ? 'PUBLIC' : 'PRIVATE' }}

                                                    </div>
                                                </div>
                                            </th>
                                            <td class="hidden sm:table-cell px-6 py-4">
                                                <div class="font-normal text-gray-500 text-sm font-semibold">
                                                    {{ $data->company->company_Type == 1 ? 'MAIN' : 'BRANCH' }}
                                                </div>
                                            </td>
                                            <td class="hidden sm:table-cell px-6 py-4">
                                                <div class="font-normal text-gray-500 text-sm">
                                                    {{ $data->company->employer_Type == 1 ? 'PUBLIC' : 'PRIVATE' }}
                                                </div>
                                            </td>
                                            <td class="hidden sm:table-cell px-6 py-4">
                                                {{ $data->responded_at->format('F j, Y') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex flex-row gap-5">
                                                    <div x-data="{ tooltip: 'Employer Overview' }">
                                                        <a wire:navigate
                                                            href="{{ route('admin-users-employer-overview', ['id' => $data->company->company_id]) }}"
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
                    {{ $partnersData->links('vendor.livewire.tailwind') }}
                </div>
            </div>



        </div>

    </div>


    <x-modal name="filter-employer-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Filter Employers') }}
            </h2>
            <hr>
            <div class="flex flex-col w-full">
                <div class="flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By Company Type</h1>

                    <div class="flex flex-col md:flex-row w-full gap-4 mt-2">
                        <div class="flex items-center">
                            <input wire:model='mountCompanyType' id="companyType-all" type="radio" value=""
                                name="companyType" checked
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="companyType-all" class="ms-2 text-sm font-medium text-gray-900">None</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountCompanyType' id="companyType-main" type="radio" value="1"
                                name="companyType"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="companyType-main" class="ms-2 text-sm font-medium text-gray-900">Main</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountCompanyType' id="companyType-branch" type="radio"
                                value="2" name="companyType"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="companyType-branch"
                                class="ms-2 text-sm font-medium text-gray-900">Branch</label>
                        </div>
                    </div>
                </div>

                <div class="flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By Job Posting</h1>

                    <div class="flex flex-col md:flex-row w-full gap-4 mt-2">
                        <div class="flex items-center">
                            <input wire:model='mountJobPosting' id="job-all" type="radio" value=""
                                name="jobpostFilter" checked
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="job-all" class="ms-2 text-sm font-medium text-gray-900">All</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountJobPosting' id="job-with" type="radio" value="with_posting"
                                name="jobpostFilter"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="job-with" class="ms-2 text-sm font-medium text-gray-900">With Active Job
                                Posting</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountJobPosting' id="job-without" type="radio"
                                value="without_posting" name="jobpostFilter"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="job-without" class="ms-2 text-sm font-medium text-gray-900">Without Active Job
                                Posting</label>
                        </div>
                    </div>
                </div>

                <div class="flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By Location</h1>

                    <div class="flex flex-col md:flex-row w-full gap-4 mt-2">
                        <div class="flex items-center">
                            <input wire:model='mountLocation' id="location-all" type="radio" value=""
                                name="location" checked
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="location-all" class="ms-2 text-sm font-medium text-gray-900">All</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountLocation' id="location-within" type="radio" value="within"
                                name="location" checked
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="location-within" class="ms-2 text-sm font-medium text-gray-900">Within
                                Municipality</label>
                        </div>
                        <div class="flex items-center">
                            <input wire:model='mountLocation' id="location-outside" type="radio" value="outside"
                                name="location"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="location-outside" class="ms-2 text-sm font-medium text-gray-900">Outside
                                Municipality</label>
                        </div>

                    </div>
                </div>

                <div class="flex flex-col mt-4">
                    <h1 class="text-md font-semibold">Sort By Employment Type</h1>
                    <div class="flex flex-col sm:flex-row gap-4" x-data="employmentHandler()"
                        @change-status.window="updateEmpDesc">
                        <div class="flex flex-col w-full">

                            <select wire:model='mountEmpType' class="block mt-1 w-full rounded" x-model="empType"
                                x-on:change="updateEmpDesc">
                                <option value="" disabled selected>Select Employment Type</option>
                                <option value="1">Public</option>
                                <option value="2">Private</option>
                            </select>



                        </div>
                        <div class="flex flex-col w-full">

                            <select wire:model='mountEmpDesc' class="block mt-1 w-full rounded" x-model="empDesc">
                                <option value="" disabled selected>Select Description</option>
                                <template x-for="desc in empDescriptions" :key="desc.value">
                                    <option :value="desc.value" x-text="desc.text"></option>
                                </template>
                            </select>


                        </div>
                    </div>
                </div>


            </div>
            <div class="mt-6 flex justify-between">
                <x-secondary-button x-on:click="$dispatch('close-modal', 'filter-employer-modal')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <div>
                    <x-danger-button wire:click.prevent="resetFilter">
                        {{ __('Reset') }}
                    </x-danger-button>
                    <x-primary-button wire:loading.attr="disabled" wire:click.prevent="mountFilter" class="ms-3"
                        type="button">
                        {{ __('Confirm') }}
                        <div wire:loading.delay.long wire:target="mountFilter" role="status">
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
        </div>
    </x-modal>
</div>

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
