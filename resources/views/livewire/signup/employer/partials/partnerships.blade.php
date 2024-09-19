<div class="flex flex-col w-full h-full">
    <h1 class="text-2xl font-bold">PESO Partnerships</h1>

    <div class="flex flex-col gap-4 mt-5 w-full h-full">
        @if ($partnershipData)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto">
                <table class="w-full text-md text-center rtl:text-center text-gray-500">
                    <thead class="text-md text-gray-100 uppercase bg-blue-500 ">
                        <tr>
                            <th scope="col" class="border px-6 py-3">
                                PESO Municipality
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($partnershipData as $index => $data)
                            <tr wire:key='eligibility-{{ $data['peso_id'] }}'
                                class="bg-white border-b hover:bg-gray-50 content-center">
                                <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                                    PESO {{ $data['municipality_Name'] }}
                                </th>

                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='removePartnership({{ $data['peso_id'] }})'
                                        class="font-medium text-red-600 hover:underline">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <x-input-error :messages="$errors->get('partnershipData')" class="mt-2" />

        <div class="flex flex-row mt-4 mb-4">
            <button type="button" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'partnership-modal')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                ADD PARTNERSHIP
            </button>
        </div>
    </div>
    <div class="flex flex-row justify-between space-x-4 mt-4 sm:mt-auto sm:mb-4">
        <x-secondary-button wire:click='prev' type="button">
            Previous
        </x-secondary-button>

        <x-blue-button wire:click='next' type="button">
            Next
        </x-blue-button>
    </div>

    <livewire:modals.partnership-modal wire:model='partnershipData' />


</div>
