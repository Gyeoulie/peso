<div class="flex flex-col w-full h-full">
    <h1 class="text-2xl font-bold">Language/Dialects</h1>
    <span class="text-sm text-gray-600">Fields with * are required.</span>
    <div class="flex flex-col gap-4 mt-5 w-full h-full">
        @if ($languages)
            <div class="relative h-xl overflow-y-auto shadow-md sm:rounded-lg w-3/4 mx-auto">
                <table class="w-full overflow-scroll text-sm text-center rtl:text-center text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="border px-6 py-3">
                                Language
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Read
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Write
                            </th>
                            <th scope="col" class="border px-6 py-3  ">
                                Speak
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Understand
                            </th>
                            <th scope="col" class="border px-6 py-3 ">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($languages as $index => $data)
                            <tr wire:key='language-{{ $index }}'
                                class="bg-white border-b hover:bg-gray-50 content-center">
                                <th class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $data['language'] }}
                                </th>
                                <td scope="row" class="border px-6 py-4">
                                    <div class="flex items-center justify-center">
                                        <input wire:model='languages.{{ $index }}.read' id="checkbox-read"
                                            type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                        <label for="checkbox-read" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="border px-6 py-4">
                                    <div class="flex items-center justify-center">
                                        <input wire:model='languages.{{ $index }}.write' id="checkbox-write"
                                            type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                        <label for="checkbox-write" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="border px-6 py-4">
                                    <div class="flex items-center justify-center">
                                        <input wire:model='languages.{{ $index }}.speak' id="checkbox-speak"
                                            type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 ">
                                        <label for="checkbox-speak" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="border px-6 py-4">
                                    <div class="flex items-center justify-center">
                                        <input wire:model='languages.{{ $index }}.understand'
                                            id="checkbox-understand" type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 ">
                                        <label for="checkbox-understand" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="border px-6 py-4">
                                    <button wire:click.prevent='removeLanguage({{ $index }})'
                                        class="font-medium text-red-600 px-6 py-4 hover:underline">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <x-input-error :messages="$errors->get('languages')" class="mt-2" />
        <div class="flex flex-row mt-4 ">
            <button type="button" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'language-modal')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                ADD LANGUAGE
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

    <livewire:modals.language-modal wire:model="languages" />
</div>
