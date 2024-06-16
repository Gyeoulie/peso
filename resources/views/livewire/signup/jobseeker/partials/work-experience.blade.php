<div class="flex flex-col w-full h-full">
    <h1 class="text-2xl bold">Work Experience</h1>

    <div class="flex flex-col gap-4 mt-5 w-full h-full">
        @if ($workExperienceData)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                <table class="w-full text-md text-center rtl:text-center text-gray-500">
                    <thead class="text-md text-gray-100 uppercase bg-blue-500 ">
                        <tr>
                            <th scope="col" class="border px-6 py-3">
                                Employer
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Address
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Position
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Start Date
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                End Date
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Status
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
                        @foreach ($workExperienceData as $index => $data)
                            <tr wire:key='WorkExp-{{ $index }}'
                                class="bg-white border-b hover:bg-gray-50 content-center">
                                <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                                    {{ $data['workEmp'] }}
                                </th>
                                <td class="border px-6 py-4">
                                    {{ $data['workAdd'] }}
                                </td>
                                <td class="border px-6 py-4">
                                    {{ $data['workPositionTitle'] }}
                                </td>
                                <td class="border px-6 py-4">
                                    {{ date('F j, Y', strtotime($data['workStart'])) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('F j, Y', strtotime($data['workEnd'])) }}
                                </td>
                                <td class="border px-6 py-4">
                                    {{ $data['workStatus'] }}
                                </td>
                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='editWorkExperience({{ $index }})'
                                        class="font-medium text-blue-600 hover:underline">Edit</button>
                                </td>
                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='removeWorkExperience({{ $index }})'
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
                x-on:click.prevent="$dispatch('open-modal', 'work-experience-modal')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                ADD WORK EXPERIENCE
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

    <livewire:modals.work-experience-modal wire:model='workExperienceData' />
</div>
