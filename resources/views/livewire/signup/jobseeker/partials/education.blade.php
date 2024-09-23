<div class="flex flex-col w-full h-full">
    <h1 class="text-2xl font-bold">Educational Background</h1>
    <span class="text-sm text-gray-600">Fields with * are required.</span>
    <div class="flex flex-col gap-4 mt-5 w-full h-full">
        @if ($educationData)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                <table class="w-full text-md text-center rtl:text-center text-gray-500">
                    <thead class="text-md text-gray-100 uppercase bg-blue-500 ">
                        <tr>
                            <th scope="col" class="border px-6 py-3">
                                School
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Level
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Course
                            </th>
                            <th scope="col" class="border px-6 py-3  ">
                                Started
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Ended
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
                        @foreach ($educationData as $index => $data)
                            <tr wire:key='edu-{{ $index }}'
                                class="bg-white border-b hover:bg-gray-50 content-center">
                                <th scope="row" class="border px-6 py-4 font-bold text-gray-900 ">
                                    {{ $data['eduSchool'] }}
                                </th>
                                <td class="border px-6 py-4">
                                    {{ $eduLevels[$data['eduLevel']] }}
                                </td>
                                <td class="border px-6 py-4">
                                    {{ $data['eduCourse'] }}
                                </td>
                                <td class="border px-6 py-4">
                                    {{ date('F j, Y', strtotime($data['eduStart'])) }}


                                </td>
                                <td class="border px-6 py-4">
                                    @if ($data['eduOngoing'] === true)
                                        ON GOING
                                    @else
                                        {{ date('F j, Y', strtotime($data['eduEnd'])) }}
                                    @endif

                                </td>
                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='editEducation({{ $index }})'
                                        class="font-medium text-blue-600 hover:underline">Edit</button>
                                </td>
                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='removeEducation({{ $index }})'
                                        class="font-medium text-red-600 hover:underline">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <x-input-error :messages="$errors->get('educationData')" class="mt-2" />
        <div class="flex flex-row mt-4 ">
            <button type="button" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'education-modal')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                ADD EDUCATION
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

    <livewire:modals.education-modal wire:model="educationData" />
</div>
