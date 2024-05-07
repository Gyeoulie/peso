<x-modal name="jobTag-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Choose Job Tags') }}
        </h2>
        <hr>

        <div class="relative mt-4">
            <div
                class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">

                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>

                    {{-- LICENSE SEARCH --}}
                    <input type="text"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search municipality">
                </div>

                {{-- WEB BUTTON --}}
            </div>

            {{-- LICENSE MODAL --}}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-1/4">

                        </th>
                        <th scope="col" class="px-6 py-3 uppercase">
                            Job Position - Code
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-center">

                            <button class="text-blue-500 hover:underline">Select</button>

                        </td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-base uppercase"> OUTPUT HERE</div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div>

        </div>


    </div>

    </div>
</x-modal>