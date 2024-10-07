<div class="flex flex-col w-full h-full">
    <h1 class="text-2xl bold">Work Experience</h1>
    <span class="text-sm text-gray-600">Fields with * are required.</span>
    <div class="flex flex-col gap-4 mt-5 w-full h-full">
        @if ($workExperienceData)
            <div class="relative overflow-x-auto shadow-md lg:rounded-lg ">
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
                                    {{ $data['workEnd'] ? date('F j, Y', strtotime($data['workEnd'])) : 'Present' }}

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

        <div class="flex flex-row justify-between space-x-4 mt-4 lg:mt-auto lg:mb-4">
            <x-secondary-button wire:loading.attr='disabled' wire:click.prevent='prev' type="button">
                Previous
                <div wire:loading.delay.long wire:target="prev" role="status">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-200 animate-spin fill-blue-600 ml-4"
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
            </x-secondary-button>



            <x-blue-button wire:loading.attr='disabled' wire:click.prevent='next' type="button">
                Next
                <div wire:loading.delay.long wire:target="next" role="status">
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-200 animate-spin fill-blue-600 ml-4"
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

    <livewire:modals.work-experience-modal wire:model='workExperienceData' />
</div>
