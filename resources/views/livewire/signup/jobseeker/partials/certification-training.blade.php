<div class="flex flex-col w-full h-full">
    <h1 class="text-2xl font-bold">Certification and Training</h1>
    <div class="flex flex-col gap-4 mt-5 w-full h-full">


        @if ($certificateData)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto">
                <table class="w-full text-md text-center rtl:text-center text-gray-500">
                    <thead class="text-md text-gray-100 uppercase bg-blue-500 ">
                        <tr>
                            <th scope="col" class="border px-6 py-3">
                                Certification
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Issued By
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Date
                            </th>
                            <th scope="col" class="border px-6 py-3  ">
                                Rating
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
                        @foreach ($certificateData as $index => $data)
                            <tr wire:key='certification-{{ $index }}'
                                class="bg-white border-b hover:bg-gray-50 content-center">
                                <th scope="row" class="border px-6 py-4 font-bold text-gray-900 ">
                                    {{ $data['certName'] }}
                                </th>
                                <td class="border px-6 py-4">
                                    {{ $data['certFrom'] }}
                                </td>
                                <td class="border px-6 py-4">
                                    {{ date('F j, Y', strtotime($data['certEarned'])) }}
                                </td>
                                <td class="border px-6 py-4">
                                    {{ $data['certRate'] }}

                                </td>
                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='editCertificate({{ $data['certTypeID'] }})'
                                        class="font-medium text-blue-600 hover:underline">Edit</button>
                                </td>
                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='removeCertificate({{ $data['certTypeID'] }})'
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
                x-on:click.prevent="$dispatch('open-modal', 'certificate-modal')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                ADD CERTIFICATION
            </button>
        </div>
    </div>


    <div class="flex flex-col gap-4 mt-5 w-full h-full">
        @if ($trainingData)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                <table class="w-full text-md text-center rtl:text-center text-gray-500">
                    <thead class="text-md text-gray-100 uppercase bg-blue-500 ">
                        <tr>
                            <th scope="col" class="border px-6 py-3">
                                Training
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Date Started
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Date Ended
                            </th>
                            <th scope="col" class="border px-6 py-3  ">
                                Training Institution
                            </th>
                            <th scope="col" class="border px-6 py-3  ">
                                Certifcate
                            </th>
                            <th scope="col" class="border px-6 py-3  ">
                                Completed
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
                        @foreach ($trainingData as $index => $data)
                            <tr wire:key='training-{{ $index }}'
                                class="bg-white border-b hover:bg-gray-50 content-center">
                                <td scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                                    {{ $data['trainName'] }}
                                </td>
                                <td class="border px-6 py-4">
                                    {{ date('F j, Y', strtotime($data['trainStart'])) }}
                                </td>
                                <td class="border px-6 py-4">
                                    {{ date('F j, Y', strtotime($data['trainEnd'])) }}
                                </td>
                                <td class="border px-6 py-4">
                                    {{ $data['trainInstitution'] }}
                                </td>
                                <td class="border px-6 py-4">
                                    {{ $data['trainCert'] }}
                                </td>
                                <td class="border px-6 py-4">
                                    <div class="flex items-center justify-center">
                                        <input type="checkbox" disabled {{ $data['trainStat'] == 1 ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    </div>
                                </td>

                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='editTraining({{ $index }})'
                                        class="font-medium text-blue-600 hover:underline">Edit</button>
                                </td>
                                <td class="border px-6 py-4">
                                    <button
                                        wire:click.prevent='removeTraining({{ $index }})'class="font-medium text-red-600 hover:underline">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <div class="flex flex-row mt-4 ">
            <button type="button" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'training-modal')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                ADD TRAINING
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


    <livewire:modals.certificate-modal wire:model='certificateData' />
    <livewire:modals.training-modal wire:model='trainingData' />
</div>
