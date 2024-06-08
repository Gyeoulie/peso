<div class="flex flex-col w-full h-full">
    <h1 class="text-2xl font-bold">Eligibility/License</h1>

    <div class="flex flex-col gap-4 mt-5 w-full h-full">
        @if ($eligibilityData)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto">
                <table class="w-full text-md text-center rtl:text-center text-gray-500">
                    <thead class="text-md text-gray-100 uppercase bg-blue-500 ">
                        <tr>
                            <th scope="col" class="border px-6 py-3">
                                Eligibility
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Date Taken
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Edit
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($eligibilityData as $index => $data)
                            <tr wire:key='eligibility-{{ $data['eligibilityId'] }}'
                                class="bg-white border-b hover:bg-gray-50 content-center">
                                <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                                    {{ $data['eligibilityName'] }}
                                </th>
                                <td class="border px-6 py-4">
                                    {{ date('F j, Y', strtotime($data['eligibilityDate'])) }}

                                </td>
                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='editEligibility({{ $data['eligibilityId'] }})'
                                        class="font-medium text-blue-600 hover:underline">Edit</button>
                                </td>
                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='removeEligibility({{ $data['eligibilityId'] }})'
                                        class="font-medium text-red-600 hover:underline">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <div class="flex flex-row mt-4 ">
            <button type="button" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'eligibility-modal')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                ADD ELIGIBILITY
            </button>
        </div>
    </div>




    <div class="flex flex-col gap-4 mt-5 w-full h-full">
        @if ($licenseData)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto">
                <table class="w-full text-md text-center rtl:text-center text-gray-500">
                    <thead class="text-md text-gray-100 uppercase bg-blue-500 ">
                        <tr>
                            <th scope="col" class="border px-6 py-3">
                                License
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Date Taken
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Edit
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($licenseData as $index => $data)
                            <tr wire:key='license-{{ $data['licenseId'] }}'
                                class="bg-white border-b hover:bg-gray-50 content-center">
                                <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                                    {{ $data['licenseName'] }}
                                </th>
                                <td class="border px-6 py-4">
                                    {{ date('F j, Y', strtotime($data['licenseDate'])) }}

                                </td>
                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='editLicense({{ $data['licenseId'] }})'
                                        class="font-medium text-blue-600 hover:underline">Edit</button>
                                </td>
                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='removeLicense({{ $data['licenseId'] }})'
                                        class="font-medium text-red-600 hover:underline">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <div class="flex flex-row mt-4 ">
            <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'license-modal')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                ADD LICENSE
            </button>
        </div>
        <div class="flex flex-row justify-between space-x-4 mt-4 sm:mt-auto sm:mb-4">
            <x-secondary-button wire:click.prevent='prev' type="button">
                Previous
            </x-secondary-button>

            <x-blue-button wire:click.prevent='next' type="button">
                Next
            </x-blue-button>
        </div>
    </div>


    <livewire:modals.eligibility-modal wire:model='eligibilityData' />
    <livewire:modals.license-modal wire:model='licenseData' />

</div>
