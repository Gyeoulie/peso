<div class="bg-white shadow rounded-lg p-6 h-full w-full overflow-auto">
    <div class="mb-5">
        <h1 class="text-2xl font-bold">Most Popular Trainings</h1>
        <hr class="h-px my-2 bg-gray-200 border-0">
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-2">
            <thead class="text-xs text-gray-700 uppercase bg-blue-300">
                <tr>
                    <th scope="col" class="px-6 py-3 w-full">
                        <span class="text-black font-bold text-md">Training Title</span>
                    </th>
                    <th scope="col" class="hidden sm:table-cell px-6 py-3">
                        <span class="text-black font-bold text-md">Type</span>
                    </th>
                    <th scope="col" class="hidden sm:table-cell px-6 py-3 text-center">
                        <span class="text-black font-bold text-md">Registered</span>
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @if ($topPrograms->isEmpty())
                    <tr>
                        <td colspan="4">
                            <div class="flex flex-col items-center justify-center mt-24 mb-24">
                                <div class="p-6 bg-gray-100 rounded-full">
                                    <svg class="w-24 h-24 text-black" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <p class="text-xl font-bold text-black text-center mt-2">
                                    Not enough data!
                                </p>
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($topPrograms as $data)
                        <tr wire:key='program-{{ $data->program_id }}' class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                <img class="w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . $data->program_pubmat) }}" alt="img">
                                <div class="ps-3 text-wrap">
                                    <div class="text-base font-semibold">
                                        <div class="text-base font-semibold">{{ $data->program_Title }}</div>
                                        <div class="font-normal text-gray-500 text-sm uppercase">
                                            {{ $data->program_Host }}
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-500 sm:hidden">
                                        {{ $data->program_Type }}
                                    </div>
                                    <div class="text-sm text-gray-500 sm:hidden">
                                        Registrants: <span
                                            class="text-black font-bold">{{ $data->registration_count }}</span>
                                    </div>

                                </div>
                            </th>

                            <td class="hidden sm:table-cell px-6 py-4">
                                {{ $data->program_Type }}
                            </td>

                            <td class="hidden sm:table-cell px-6 py-4">
                                <div class="font-normal text-gray-500 text-sm text-center uppercase">
                                    <span class="text-blue-500 font-bold text-md">
                                        {{ $data->registration_count }}</span>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div x-data="{ tooltip: 'Program Overview' }">
                                    <a wire:navigate
                                        href="{{ route('admin-registrants-training', ['id' => $data->program_id]) }}"
                                        x-tooltip="tooltip" type="button"
                                        class="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path fill-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    </div>


</div>
