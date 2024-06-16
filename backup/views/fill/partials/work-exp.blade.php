<h1 class="text-2xl bold">Work Experience</h1>

<div class="flex flex-col mt-4 ">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto">
        <table id="workTable" class="w-full text-sm text-center rtl:text-center text-gray-500" style="display: none;">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
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
                {{-- <tr class="bg-white border-b hover:bg-gray-50 content-center">
                    <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                        Nationanl University
                    </th>
                    <td class="border w-4 p-4">
                        Baliwag, Bulacan
                    </td>
                    <td class="border w-4 p-4">
                        Professor
                    </td>
                    <td class="border w-4 p-4">
                        01/01/2020
                    </td>
                    <td class="w-4 p-4">
                        01/01/2020
                    </td>
                    <td class="border w-4 p-4">
                        Part-time
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
        <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'workExp-modal')"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            ADD WORK EXPERIENCE
        </button>
    </div>
    <div class="flex flex-row justify-end space-x-4">
        <button type="button"
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
            onclick="nextSection(8)">
            Previous
        </button>

        <button type="button"
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "
            onclick="nextSection(10)">
            Next
        </button>
    </div>
</div>

{{-- WORK EXPERIENCE MODAL --}}
<x-modal name="workExp-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Work Experience Record') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="workEmp" :value="__('Employer')" />
                <x-text-input id="workEmp" class="block mt-1 w-full" type="text" />
            </div>
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="workAddress" :value="__('Address')" />
                <x-text-input id="workAddress" class="block mt-1 w-full" type="text" />
            </div>

            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="workPos" :value="__('Position')" />
                <select id="workPos" class="block mt-1 w-full">
                    <option value="" disabled selected>Select Job Position</option>
                    @foreach ($datainfo['jobPositions'] as $jobPositions)
                        <option data-workPos-attribute="{{ $jobPositions->position_id }}"
                            value="{{ $jobPositions->position_Title }}">{{ $jobPositions->position_Title }}</option>
                    @endforeach



                    {{-- @foreach ($datainfo['jobPositions'] as $jobPositions)
                        <option value="{{ $jobPositions->position_id }}">{{ $jobPositions->position_Title }}</option>
                    @endforeach --}}
                </select>

            </div>
            <div class="flex flex-row mt-2 w-full">
                <div class="flex flex-col w-full">
                    <x-input-label for="workStart" :value="__('Started')" />
                    <x-text-input id="workStart" class="block mt-1 w-full" type="date" />
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <x-input-label for="workEnd" :value="__('Ended')" />
                    <x-text-input id="workEnd" class="block mt-1 w-full" type="date" />
                </div>
                <div class="flex flex-col w-full ml-4">
                    <x-input-label for="workStatus" :value="__('Status')" />
                    <select id="workStatus" class="block mt-1 w-full">
                        <option value="" disabled selected>Select Work Status</option>
                        <option value="Permanent">Permanent</option>
                        <option value="Contractual">Contractual</option>
                        <option value="Probationary">Probationary</option>
                        <option value="Part-time">Part-time</option>
                    </select>

                </div>
            </div>
        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-buttontype="button" onclick="workReset()">
            {{ __('Cancel') }}
            </x-secondary-buttontype=>

            <x-danger-button class="ms-3" type="button" id="workAdd">
                {{ __('Add Record') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>



<script>
    var workEditMode = false;
    var workIndex = 0; // Initialize workIndex variable
    var workCounter = 0;
    var workSelectRow = 0;


    // Function to handle row deletion
    function workReset() {
        $('#workEmp, #workAddress, #workStart, #workEnd').val('');
        $('#workPos, #workStatus').prop('selectedIndex', 0);
        workEditMode = false;
        window.dispatchEvent(new CustomEvent('close-modal', {
            detail: 'workExp-modal' // Assuming $name holds the modal name
        }));
        toggleTableVisibility('workTable');

    }

    function deleteWorkRow() {
        $(this).closest('tr').find('input[type="hidden"]').remove();
        $(this).closest('tr').remove();
        toggleTableVisibility('workTable');

    }

    // Function to handle row editing
    function editWorkRow() {
        // Get the values of the row
        workEditMode = true;

        var licenseRow_Edit = $(this).closest('tr');
        workSelectRow = $(this).closest('tr').index();

        var workEmp_Edit = licenseRow_Edit.find('td:eq(0)').text();
        var workAddress_Edit = licenseRow_Edit.find('td:eq(1)').text();
        var workPos_Edit = licenseRow_Edit.find('td:eq(2)').text();
        var workStart_Edit = licenseRow_Edit.find('td:eq(3)').text();
        var workEnd_Edit = licenseRow_Edit.find('td:eq(4)').text();
        var workStatus_Edit = licenseRow_Edit.find('td:eq(5)').text();
        workIndex = licenseRow_Edit.find('input[name^="workIndex"]').val(); // Update workIndex

        // Populate the education modal with these values
        $('#workEmp').val(workEmp_Edit);
        $('#workAddress').val(workAddress_Edit);
        $('#workPos').val(workPos_Edit);
        $('#workStart').val(workStart_Edit);
        $('#workEnd').val(workEnd_Edit);
        $('#workStatus').val(workStatus_Edit);





        // Dispatch custom event to open the modal
        window.dispatchEvent(new CustomEvent('open-modal', {
            detail: 'workExp-modal' // Assuming $name holds the modal name
        }));
    }
    // Function to add a new row
    function addWorkRow() {
        // Get the input values
        var workEmp = $('#workEmp').val();
        var workAddress = $('#workAddress').val();
        var workPos = $('#workPos').val();
        var workStart = $('#workStart').val();
        var workEnd = $('#workEnd').val();
        var workStatus = $('#workStatus').val();


        var workSELECTEDID = document.getElementById('workPos');
        // Get the selected option
        var workPOSOPTION = workSELECTEDID.options[workSELECTEDID.selectedIndex];
        // Get the value of the custom attribute
        var workCustomAttri = workPOSOPTION.getAttribute('data-workPos-attribute');



        if (workEditMode) {
            // Update existing row
            $('input[name="workEmpPost[' + workIndex + ']"]').val(workEmp);
            $('input[name="workAddressPost[' + workIndex + ']"]').val(workAddress);
            $('input[name="workPosPost[' + workIndex + ']"]').val(workCustomAttri);
            $('input[name="workStartPost[' + workIndex + ']"]').val(workStart);
            $('input[name="workEndPost[' + workIndex + ']"]').val(workEnd);
            $('input[name="workStatusPost[' + workIndex + ']"]').val(workStatus);

            console.log(workSelectRow);
            var row = $('#workTable tbody tr').eq(workSelectRow);
            row.find('td:eq(0)').text(workEmp);
            row.find('td:eq(1)').text(workAddress);
            row.find('td:eq(2)').text(workPos);
            row.find('td:eq(3)').text(workStart);
            row.find('td:eq(4)').text(workEnd);
            row.find('td:eq(5)').text(workStatus);


        } else {
            // Append a new row to the table body
            var newLicenseRowHtml = `
                <tr class="bg-white border-b hover:bg-gray-50 content-center">
                    <td class="border px-6 py-4 font-medium text-gray-900">${workEmp}</td>
                    <td class="border px-6 py-4">${workAddress}</td>
                    <td class="border px-6 py-4">${workPos}</td>
                    <td class="border px-6 py-4">${workStart}</td>
                    <td class="border px-6 py-4">${workEnd}</td>
                    <td class="border px-6 py-4">${workStatus}</td>
                    <td class="border px-6 py-4"><a class="font-medium text-blue-600 hover:underline hover:cursor-pointer edit-work-row">Edit</a><input type="hidden" name="workIndex[${workCounter}]" value="${workCounter}"></td>
                    <td class="border px-6 py-4"><a class="font-medium text-red-600 hover:underline hover:cursor-pointer delete-work-row">Delete</a></td>
                    <input type="hidden" name="workEmpPost[${workCounter}]" value="${workEmp}">
                    <input type="hidden" name="workAddressPost[${workCounter}]" value="${workAddress}">
                    <input type="hidden" name="workPosPost[${workCounter}]" value="${workCustomAttri}">
                    <input type="hidden" name="workStartPost[${workCounter}]" value="${workStart}">
                    <input type="hidden" name="workEndPost[${workCounter}]" value="${workEnd}">
                    <input type="hidden" name="workStatusPost[${workCounter}]" value="${workStatus}">
                </tr>`;
            $('#workTable tbody').append(newLicenseRowHtml);
            workCounter++;
        }
        workEditMode = false;
        workReset();
        // Dispatch custom event to close the modal
    }

    // Attach event listeners
    $(document).on('click', '.delete-work-row', deleteWorkRow);
    $(document).on('click', '.edit-work-row', editWorkRow);
    $('#workAdd').click(addWorkRow);
</script>
