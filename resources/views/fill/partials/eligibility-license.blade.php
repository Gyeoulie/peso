<h1 class="text-2xl font-bold">Eligibility/License</h1>

<div class="flex flex-col mt-4 ">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto">
        <table id="eligibilityTable" class="w-full text-sm text-center rtl:text-center text-gray-500" style="display: none;">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
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
                {{-- <tr class="bg-white border-b hover:bg-gray-50 content-center">
                    <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                        Nationanl University
                    </th>
                    <td class="border w-4 p-4">
                        01/01/2020
                    </td>
                    <td class="border px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                    </td>
                    <td class="border px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 hover:underline">Delete</a>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
    <div class="flex flex-row mt-4 ">
        <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'eligibility-modal')"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            ADD ELIGIBILITY
        </button>
    </div>
</div>

<x-modal name="eligibility-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Eligibility') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="eligibilityType" :value="__('Eligibility')" />
                <select id="eligibilityType" class="block mt-1 w-full">
                    <option value="" disabled selected>Select Eligibility</option>

                    @foreach ($datainfo['eligibilityTypes'] as $eligibilityTypes)
                        <option data-edulevel-attribute="{{ $eligibilityTypes->eligibility_type_id }}"
                            value="{{ $eligibilityTypes->eligibility_Name }}">
                            {{ $eligibilityTypes->eligibility_Name }}
                        </option>
                    @endforeach

                    {{-- @foreach ($datainfo['eligibilityTypes'] as $eligibilityTypes)
                        <option value="{{ $eligibilityTypes->eligibility_type_id }}">
                            {{ $eligibilityTypes->eligibility_Name }}
                        </option>
                    @endforeach --}}

                </select>
            </div>
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="eligibilityDate" :value="__('Date Validity')" />
                <x-text-input id="eligibilityDate" class="block mt-1 w-full" type="date" />
            </div>

        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button type="button" onclick="eligibilityReset()">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" type="button" id="eligibilityAdd">
                {{ __('Add Eligibility') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>



<div class="flex flex-col mt-4 ">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto">
        <table id="licenseTable" class="w-full text-sm text-center rtl:text-center text-gray-500" style="display: none;">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
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
                {{-- <tr class="bg-white border-b hover:bg-gray-50 content-center">
                    <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                        Nationanl University
                    </th>
                    <td class="border w-4 p-4">
                        01/01/2020
                    </td>
                    <td class="border px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                    </td>
                    <td class="border px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 hover:underline">Delete</a>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
    <div class="flex flex-row mt-4 ">
        <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'license-modal')"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            ADD LICENSE
        </button>
    </div>
    <div class="flex flex-row justify-end space-x-4">
        <button type="button"
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
            onclick="nextSection(7)">
            Previous
        </button>

        <button type="button"
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "
            onclick="nextSection(9)">
            Next
        </button>
    </div>
</div>


{{-- License MODAL --}}
<x-modal name="license-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add License') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="licenseType" :value="__('License')" />
                <select id="licenseType" class="block mt-1 w-full">
                    <option value="" disabled selected>Select License</option>

                    @foreach ($datainfo['licenseTypes'] as $licenseTypes)
                        <option data-licenseType-attribute="{{ $licenseTypes->license_type_id }}"
                            value="{{ $licenseTypes->license_Name }}">
                            {{ $licenseTypes->license_Name }}
                        </option>
                    @endforeach



                    {{-- @foreach ($datainfo['licenseTypes'] as $licenseTypes)
                    <option value="{{ $licenseTypes->license_type_id }}">
                        {{ $licenseTypes->license_name }}
                    </option>
                @endforeach --}}

                </select>
            </div>
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="licenseDate" :value="__('Date Validity')" />
                <x-text-input id="licenseDate" class="block mt-1 w-full" type="date" />
            </div>

        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button type="button" onclick="licenseReset()">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" type="button" id="licenseAdd">
                {{ __('Add License') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>



<script>
    var eligibilityEditMode = false;
    var eligibilityIndex = 0; // Initialize eligibilityIndex variable
    var eligibilityCounter = 0;
    var eligibilitySelectRow = 0;




    // Function to handle row deletion
    function eligibilityReset() {
        $('#eligibilityDate').val('');
        $('#eligibilityType').prop('selectedIndex', 0);
        eligibilityEditMode = false;
        window.dispatchEvent(new CustomEvent('close-modal', {
            detail: 'eligibility-modal' // Assuming $name holds the modal name
        }));
        toggleTableVisibility('eligibilityTable');
    }

    function deleteEligibilityRow() {
        $(this).closest('tr').find('input[type="hidden"]').remove();
        $(this).closest('tr').remove();
        toggleTableVisibility('eligibilityTable');
    }

    // Function to handle row editing
    function editEligibilityRow() {
        // Get the values of the row
        eligibilityEditMode = true;

        var eligibilityRow_Edit = $(this).closest('tr');
        eligibilitySelectRow = $(this).closest('tr').index();



        var eligibilityType_Edit = eligibilityRow_Edit.find('td:eq(0)').text();
        var eligibilityDate_Edit = eligibilityRow_Edit.find('td:eq(1)').text();
        eligibilityIndex = eligibilityRow_Edit.find('input[name^="eligibilityIndex"]').val(); // Update eligibilityIndex

        // Populate the education modal with these values
        $('#eligibilityType').val(eligibilityType_Edit);
        $('#eligibilityDate').val(eligibilityDate_Edit);


        $('#eligibilityIndex').val(eligibilityIndex);

        // Dispatch custom event to open the modal
        window.dispatchEvent(new CustomEvent('open-modal', {
            detail: 'eligibility-modal' // Assuming $name holds the modal name
        }));
    }
    // Function to add a new row
    function addEligibilityRow() {
        // Get the input values
        var eligibilityType = $('#eligibilityType').val();
        var eligibilityDate = $('#eligibilityDate').val();


        var eligibilitySELECTEDID = document.getElementById('eligibilityType');
        // Get the selected option
        var eligibilityTYPEOPTION = eligibilitySELECTEDID.options[eligibilitySELECTEDID.selectedIndex];
        // Get the value of the custom attribute
        var eligibilityCustomAttri = eligibilityTYPEOPTION.getAttribute('data-edulevel-attribute');


        if (eligibilityEditMode) {
            // Update existing row
            $('input[name="eligibilityTypePost[' + eligibilityIndex + ']"]').val(eligibilityCustomAttri);
            $('input[name="eligibilityDatePost[' + eligibilityIndex + ']"]').val(eligibilityDate);

            console.log(eligibilitySelectRow);
            var row = $('#eligibilityTable tbody tr').eq(eligibilitySelectRow);
            row.find('td:eq(0)').text(eligibilityType);
            row.find('td:eq(1)').text(eligibilityDate);


        } else {
            // Append a new row to the table body
            var newEligibilityRowHtml = `
                <tr class="bg-white border-b hover:bg-gray-50 content-center">
                    <td class="border px-6 py-4 font-medium text-gray-900">${eligibilityType}</td>
                    <td class="border px-6 py-4">${eligibilityDate}</td>
                    <td class="border px-6 py-4"><a class="font-medium text-blue-600 hover:underline hover:cursor-pointer edit-eligibility-row">Edit</a><input type="hidden" name="eligibilityIndex[${eligibilityCounter}]" value="${eligibilityCounter}"></td>
                    <td class="border px-6 py-4"><a class="font-medium text-red-600 hover:underline hover:cursor-pointer delete-eligibility-row">Delete</a></td>
                    <input type="hidden" name="eligibilityTypePost[${eligibilityCounter}]" value="${eligibilityCustomAttri}">
                    <input type="hidden" name="eligibilityDatePost[${eligibilityCounter}]" value="${eligibilityDate}">
                </tr>`;
            $('#eligibilityTable tbody').append(newEligibilityRowHtml);
            eligibilityCounter++;
        }
        eligibilityEditMode = false;
        eligibilityReset();
        // Dispatch custom event to close the modal
    }

    // Attach event listeners
    $(document).on('click', '.delete-eligibility-row', deleteEligibilityRow);
    $(document).on('click', '.edit-eligibility-row', editEligibilityRow);
    $('#eligibilityAdd').click(addEligibilityRow);
</script>



<script>

    var licenseEditMode = false;
    var licenseIndex = 0; // Initialize licenseIndex variable
    var licenseCounter = 0;
    var licenseSelectRow = 0;


    // Function to handle row deletion
    function licenseReset() {
        $('#licenseDate').val('');
        $('#licenseType').prop('selectedIndex', 0);
        licenseEditMode = false;
        window.dispatchEvent(new CustomEvent('close-modal', {
            detail: 'license-modal' // Assuming $name holds the modal name
        }));
        toggleTableVisibility('licenseTable');
    }

    function deleteLicenseRow() {
        $(this).closest('tr').find('input[type="hidden"]').remove();
        $(this).closest('tr').remove();
        toggleTableVisibility('licenseTable');
    }

    // Function to handle row editing
    function editLicenseRow() {
        // Get the values of the row
        licenseEditMode = true;

        var licenseRow_Edit = $(this).closest('tr');
        licenseSelectRow = $(this).closest('tr').index();

        var licenseType_Edit = licenseRow_Edit.find('td:eq(0)').text();
        var licenseDate_Edit = licenseRow_Edit.find('td:eq(1)').text();
        licenseIndex = licenseRow_Edit.find('input[name^="licenseIndex"]').val(); // Update licenseIndex

        // Populate the education modal with these values
        $('#licenseType').val(licenseType_Edit);
        $('#licenseDate').val(licenseDate_Edit);



        // Dispatch custom event to open the modal
        window.dispatchEvent(new CustomEvent('open-modal', {
            detail: 'license-modal' // Assuming $name holds the modal name
        }));
    }
    // Function to add a new row
    function addLicenseRow() {
        // Get the input values
        var licenseType = $('#licenseType').val();
        var licenseDate = $('#licenseDate').val();


        var licenseSELECTEDID = document.getElementById('licenseType');
        // Get the selected option
        var licenseTYPEOPTION = licenseSELECTEDID.options[licenseSELECTEDID.selectedIndex];
        // Get the value of the custom attribute
        var licenseCustomAttri = licenseTYPEOPTION.getAttribute('data-licenseType-attribute');



        if (licenseEditMode) {
            // Update existing row
            $('input[name="licenseTypePost[' + licenseIndex + ']"]').val(licenseCustomAttri);
            $('input[name="licenseDateDatePost[' + licenseIndex + ']"]').val(licenseDate);

            console.log(licenseSelectRow);
            var row = $('#licenseTable tbody tr').eq(licenseSelectRow);
            row.find('td:eq(0)').text(licenseType);
            row.find('td:eq(1)').text(licenseDate);


        } else {
            // Append a new row to the table body
            var newLicenseRowHtml = `
                <tr class="bg-white border-b hover:bg-gray-50 content-center">
                    <td class="border px-6 py-4 font-medium text-gray-900">${licenseType}</td>
                    <td class="border px-6 py-4">${licenseDate}</td>
                    <td class="border px-6 py-4"><a class="font-medium text-blue-600 hover:underline hover:cursor-pointer edit-license-row">Edit</a><input type="hidden" name="licenseIndex[${licenseCounter}]" value="${licenseCounter}"></td>
                    <td class="border px-6 py-4"><a class="font-medium text-red-600 hover:underline hover:cursor-pointer delete-license-row">Delete</a></td>
                    <input type="hidden" name="licenseTypePost[${licenseCounter}]" value="${licenseCustomAttri}">
                    <input type="hidden" name="licenseDatePost[${licenseCounter}]" value="${licenseDate}">
                </tr>`;
            $('#licenseTable tbody').append(newLicenseRowHtml);
            licenseCounter++;
        }
        licenseEditMode = false;
        licenseReset();
        // Dispatch custom event to close the modal
    }

    // Attach event listeners
    $(document).on('click', '.delete-license-row', deleteLicenseRow);
    $(document).on('click', '.edit-license-row', editLicenseRow);
    $('#licenseAdd').click(addLicenseRow);
</script>
