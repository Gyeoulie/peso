<h1 class="text-2xl font-bold">Language/Dialects</h1>
<div class="flex flex-col mt-4 ">
    <div class="relative h-xl overflow-y-auto shadow-md sm:rounded-lg w-3/4 mx-auto">
        <table id="languageTable" class="w-full overflow-scroll text-sm text-center rtl:text-center text-gray-500" style="display: none;">
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
                {{-- <tr class="bg-white border-b hover:bg-gray-50 content-center">
                    <th class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        English
                    </th>
                    <td scope="row" class="border px-6 py-4">
                        <div class="flex items-center justify-center">
                            <input id="checkbox-table-1" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-table-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td class="border px-6 py-4">
                        <div class="flex items-center justify-center">
                            <input id="checkbox-table-1" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-table-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td class="border px-6 py-4">
                        <div class="flex items-center justify-center">
                            <input id="checkbox-table-1" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-table-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td class="border px-6 py-4">
                        <div class="flex items-center justify-center">
                            <input id="checkbox-table-1" type="checkbox" checked
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-table-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td class="border px-6 py-4">
                        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
    <div class="flex flex-row mt-4 ">
        <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'language-modal')"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            ADD LANGUAGE
        </button>
    </div>
    <div class="flex flex-row justify-end space-x-4">
        <button type="button"
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"onclick="nextSection(4)">
            Previous
        </button>

        <button type="button"
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "onclick="nextSection(6)">
            Next
        </button>
    </div>
</div>


{{-- LANGUAGE MODAL --}}
<x-modal name="language-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Language/Dialect Record') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">

            <div class="flex flex-col  mt-2 w-full">
                <x-input-label for="langSelect" :value="__('Add Language')" />
                <select id="langSelect" name="langSelect" class="block mt-1 w-full"
                    onchange="toggleOtherLanguageVisibility()">
                    <option value="" disabled selected>Select Language</option>
                    <option value="English">English</option>
                    <option value="Filipino">Filipino</option>
                    <option value="Mandarin">Mandarin</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div id="langOtherDiv" class="mt-2" style="visibility: hidden;">
                <x-input-label for="langOther" :value="__('Other')" />
                <x-text-input id="langOther" class="block mt-1 w-full" type="text" name="langOther" />
            </div>

        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" type="button" onclick='addLanguage()'>
                {{ __('Add Language Record') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>


<script>




    function resetLanguageForm() {

        toggleTableVisibility('languageTable');
        // Reset selected language dropdown
        $('#langSelect').val('');
        // Reset other language input visibility
        $('#langOtherDiv').css('visibility', 'hidden');
        // Reset other language input value
        $('#langOther').val('');
    }

    function toggleOtherLanguageVisibility() {
        var selectElement = document.getElementById("langSelect");
        var otherLanguageDiv = document.getElementById("langOtherDiv");

        // Check if the selected value is "other"
        if (selectElement.value === "other") {
            otherLanguageDiv.style.visibility = "visible"; // Show the other language input fields
        } else {
            otherLanguageDiv.style.visibility = "hidden"; // Hide the other language input fields
        }
    }

    var languageCounter = 0; // Assuming there's already one row present in the table


    function addLanguage() {
        // Get the selected language
        var selectedLanguage = $('#langSelect').val();

        // Get the visibility of the other language input
        var otherLanguageVisibility = $('#langOtherDiv').css('visibility');

        // Determine the language to add based on whether it's 'other' or a specific language
        var languageToAdd = selectedLanguage;
        if (selectedLanguage === 'other' && otherLanguageVisibility === 'visible') {
            languageToAdd = $('#langOther').val();
        }
        console.log(languageToAdd);

        // Append a new row to the table body

        var rowToAppend = `
    <tr class="bg-white border-b hover:bg-gray-50 content-center">
        <th class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
            ${languageToAdd}
            <input type="hidden" name="languageRow[${languageCounter}]" value="${languageToAdd}">
        </th>
        <td scope="row" class="border px-6 py-4">
            <div class="flex items-center justify-center">
                <input id="checkbox-table-${languageCounter}-read" type="checkbox" name="read[${languageCounter}]" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
            </div>
        </td>
        <td class="border px-6 py-4">
            <div class="flex items-center justify-center">
                <input id="checkbox-table-${languageCounter}-write" type="checkbox" name="write[${languageCounter}]" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
            </div>
        </td>
        <td class="border px-6 py-4">
            <div class="flex items-center justify-center">
                <input id="checkbox-table-${languageCounter}-speak" type="checkbox" name="speak[${languageCounter}]" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
            </div>
        </td>
        <td class="border px-6 py-4">
            <div class="flex items-center justify-center">
                <input id="checkbox-table-${languageCounter}-understand" type="checkbox" name="understand[${languageCounter}]" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
            </div>
        </td>
        <td class="border px-6 py-4">
            <a class="font-medium text-red-600 hover:underline hover:cursor-pointer delete-row-language ">Delete</a>
        </td>
    </tr>`;

        $('#languageTable tbody').append(rowToAppend);


        window.dispatchEvent(new CustomEvent('close-modal', {
            detail: 'language-modal' // Assuming $name holds the modal name
        }));
        languageCounter++;
        resetLanguageForm();

    }

    $(document).on('click', '.delete-row-language', deleteRow);

    function deleteRow() {

        $(this).closest('tr').remove();
        toggleTableVisibility();
    }
</script>
