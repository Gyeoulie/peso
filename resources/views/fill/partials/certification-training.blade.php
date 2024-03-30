<h1 class="text-2xl font-bold">Certification and Training</h1>
<div class="flex flex-col mt-4 ">

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto" >
        <table id="certificationTable" class="w-full text-sm text-center rtl:text-center text-gray-500" style="display: none">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
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
                {{-- <tr class="bg-white border-b hover:bg-gray-50 content-center">
                    <th scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                        Skills Training
                    </th>
                    <td class="border w-4 p-4">
                        National University Baliwag
                    </td>
                    <td class="border px-6 py-4">
                        01/03/2020
                    </td>
                    <td class="border px-6 py-4">
                        100
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
        <button type="button" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'certification-modal')"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            ADD CERTIFICATION
        </button>
    </div>
</div>

{{-- CERTIFICATION MODAL --}}
<x-modal name="certification-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Certification Record') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">


            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="level" :value="__('Certification')" />
                <select id="certType" class="block mt-1 w-full">
                    <option value="" disabled selected>Select Certificate</option>

                    @foreach ($datainfo['certificateTypes'] as $certificates)
                        <option data-certTypes-attribute="{{ $certificates->cert_type_id }}"
                            value="{{ $certificates->cert_Name }}">{{ $certificates->cert_Name }}
                        </option>
                    @endforeach


                    {{-- @foreach ($datainfo['certificateTypes'] as $certificates)
                        <option value="{{ $certificates->cert_type_id }}">{{ $certificates->cert_Name }}
                        </option>
                    @endforeach --}}
                </select>
            </div>
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="certIssued" :value="__('Issued By')" />
                <x-text-input id="certIssued" class="block mt-1 w-full" type="text" />
            </div>


            <div class="flex flex-row mt-2 w-full">
                <div class="flex flex-col w-full">
                    <x-input-label for="certDate" :value="__('Earned At')" />
                    <x-text-input id="certDate" class="block mt-1 w-full" type="date" />
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <x-input-label for="certRating" :value="__('Rating')" />
                    <x-text-input id="certRating" class="block mt-1 w-full" type="number" />
                </div>
            </div>

        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button type="button" onclick="certReset()">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" type="button" id="certAdd">
                {{ __('Add Certifcation Record') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>


<div class="flex flex-col mt-4 ">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
        <table id="trainingTable" class="w-full text-sm text-center rtl:text-center text-gray-500" style="display: none;">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
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
                {{-- <tr class="bg-white border-b hover:bg-gray-50 content-center">
                    <td scope="row" class="border px-6 py-4 font-medium text-gray-900 ">
                        Skills Training
                    </td>
                    <td class="border w-4 p-4">
                        01/01/2020
                    </td>
                    <td class="border px-6 py-4">
                        01/01/2020
                    </td>
                    <td class="border px-6 py-4">
                        TESDA
                    </td>
                    <td class="border px-6 py-4">
                        Skills Certificate
                    </td>
                    <td class="border px-6 py-4">
                        <div class="flex items-center justify-center">
                            <input id="checkbox-table-1" type="checkbox" disabled
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox-table-1" class="sr-only">checkbox</label>
                        </div>
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
        <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'training-modal')"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            ADD TRAINING
        </button>
    </div>
    <div class="flex flex-row justify-end space-x-4">
        <button type="button"
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
            onclick="nextSection(6)">
            Previous
        </button>

        <button type="button"
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "
            onclick="nextSection(8)">
            Next
        </button>
    </div>
</div>


{{-- TRAINING MODAL --}}
<x-modal name="training-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Training Record') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">

            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="trainingName" :value="__('Training Name')" />
                <x-text-input id="trainingName" class="block mt-1 w-full" type="text" />
            </div>
            <div class="flex flex-row mt-2 w-full">
                <div class="flex flex-col w-full">
                    <x-input-label for="trainingStart" :value="__('Started')" />
                    <x-text-input id="trainingStart" class="block mt-1 w-full" type="date" />
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <x-input-label for="trainingEnd" :value="__('Ended')" />
                    <x-text-input id="trainingEnd" class="block mt-1 w-full" type="date" />
                </div>
            </div>
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="trainingInsti" :value="__('Training Institution')" />
                <x-text-input id="trainingInsti" class="block mt-1 w-full" type="text" />
            </div>
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="trainingCert" :value="__('Certificate Recieved')" />
                <x-text-input id="trainingCert" class="block mt-1 w-full" type="text" />
            </div>
            <div class="mt-2">
                <x-input-label for="trainingComplete" :value="__('Completed')" />
                <div class="flex items-center">
                    <label for="completeCheckBoxYes" class="mr-2">
                        <input id="completeCheckBoxYes" type="radio" name="completeCheckBox" value="1"
                            autocomplete="off">
                        <span class="ml-1">{{ __('Yes') }}</span>
                    </label>
                    <label for="completeCheckBoxNo" class="ml-4 mr-2">
                        <input id="completeCheckBoxNo" type="radio" name="completeCheckBox" value="2"
                            autocomplete="off">
                        <span class="ml-1">{{ __('No') }}</span>
                    </label>
                </div>
            </div>

        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button type="button" onclick="trainingReset()">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" type="button" id="trainingAdd">
                {{ __('Add Training Record') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>







<script>



    var trainingEditMode = false;
    var trainingIndex = 0; // Initialize eduindexedit variable
    var trainingRowCounter = 0;
    var trainingSelectRow = 0;
    var checkboxTrainingHtml;

    function trainingReset() {
        // Reset input fields
        $('#trainingName, #trainingStart, #trainingEnd, #trainingInsti, #trainingCert').val('');
        $('#completeCheckBoxYes, #completeCheckBoxNo').prop('checked', false);
        trainingEditMode = false;
        trainingIndex = 0;
        var trainingSelectRow = 0;
        checkboxTrainingHtml = '';

        window.dispatchEvent(new CustomEvent('close-modal', {
            detail: 'training-modal' // Assuming $name holds the modal name
        }));
        toggleTableVisibility('trainingTable');

    }

    // Function to handle row deletion
    function deleteTrainingRow() {
        $(this).closest('tr').find('input[type="hidden"]').remove();
        $(this).closest('tr').remove();
        toggleTableVisibility('trainingTable');

    }

    // Function to handle row editing
    function editTrainingRow() {
        // Get the values of the row
        trainingEditMode = true;

        var trainingRowEdit = $(this).closest('tr');
        trainingSelectRow = $(this).closest('tr').index();

        var trainingName_Edit = trainingRowEdit.find('td:eq(0)').text();
        var trainingStart_Edit = trainingRowEdit.find('td:eq(1)').text();
        var trainingEnd_Edit = trainingRowEdit.find('td:eq(2)').text();
        var trainingInsti_Edit = trainingRowEdit.find('td:eq(3)').text();
        var trainingCert_Edit = trainingRowEdit.find('td:eq(4)').text();
        var trainingCheckbox = trainingRowEdit.find('td:eq(5)').find('input[type="checkbox"]');

        trainingIndex = trainingRowEdit.find('input[name^="trainingIndex"]').val();

        // Populate the education modal with these values
        $('#trainingName').val(trainingName_Edit);
        $('#trainingStart').val(trainingStart_Edit);
        $('#trainingEnd').val(trainingEnd_Edit);
        $('#trainingInsti').val(trainingInsti_Edit);
        $('#trainingCert').val(trainingCert_Edit);

        var trainStatus_Edit = trainingCheckbox.prop('checked') ? '1' : '2';

        if (trainStatus_Edit === "1") {
            $('#completeCheckBoxYes').prop('checked', true);
            $('#completeCheckBoxNo').prop('checked', false);
        } else if (trainStatus_Edit === "2") {
            $('#completeCheckBoxYes').prop('checked', false);
            $('#completeCheckBoxNo').prop('checked', true);
        }

        //$('#trainingIndex').val(trainingIndex);

        // Dispatch custom event to open the modal
        window.dispatchEvent(new CustomEvent('open-modal', {
            detail: 'training-modal' // Assuming $name holds the modal name
        }));
    }

    // Function to add a new row
    function addTrainingRow() {
        // Get the input values
        var trainingName = $('#trainingName').val();
        var trainingStart = $('#trainingStart').val();
        var trainingEnd = $('#trainingEnd').val();
        var trainingInsti = $('#trainingInsti').val();
        var trainingCert = $('#trainingCert').val();
        var trainingStatus = $('input[name="completeCheckBox"]:checked').val();

        if (trainingEditMode) {
            // Update existing row
            $('input[name="trainingNamePost[' + trainingIndex + ']"]').val(trainingName);
            $('input[name="trainingStartPost[' + trainingIndex + ']"]').val(trainingStart);
            $('input[name="trainingEndPost[' + trainingIndex + ']"]').val(trainingEnd);
            $('input[name="trainingInstiPost[' + trainingIndex + ']"]').val(trainingInsti);
            $('input[name="trainingCertPost[' + trainingIndex + ']"]').val(trainingCert);
            $('input[name="trainingStatusPost[' + trainingIndex + ']"]').val(trainingStatus);

            var row = $('#trainingTable tbody tr').eq(trainingSelectRow);
            row.find('td:eq(0)').text(trainingName);
            row.find('td:eq(1)').text(trainingStart);
            row.find('td:eq(2)').text(trainingEnd);
            row.find('td:eq(3)').text(trainingInsti);
            row.find('td:eq(4)').text(trainingCert);

            // Construct the checkbox HTML
            var checkboxTrainingHtml = '';
            if (trainingStatus === '1') {
                checkboxTrainingHtml =
                    `<div class="flex items-center justify-center"><input id="trainStatus${trainingIndex}-write" type="checkbox" checked disabled class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"></div><input type="hidden" name="trainingStatusPost[${trainingIndex}]" value="${trainingStatus}"></td>`;
            } else if (trainingStatus === '2') {
                checkboxTrainingHtml =
                    `<div class="flex items-center justify-center"><input id="trainStatus${trainingIndex}-write" type="checkbox" disabled class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"></div><input type="hidden" name="trainingStatusPost[${trainingIndex}]" value="${trainingStatus}"></td>`;
            }

            // Update the HTML content of the cell to display the checkbox
            row.find('td:eq(5)').html(checkboxTrainingHtml);
        } else {
            // Construct the checkbox HTML for new row
            var checkboxTrainingHtml = '';
            if (trainingStatus === '1') {
                checkboxTrainingHtml =
                    `<div class="flex items-center justify-center"><input id="trainStatus${trainingRowCounter}-write" type="checkbox" checked disabled class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"></div>`;
            } else if (trainingStatus === '2') {
                checkboxTrainingHtml =
                    `<div class="flex items-center justify-center"><input id="trainStatus${trainingRowCounter}-write" type="checkbox" disabled class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"></div>`;
            }

            // Append a new row to the table body
            var newTrainingRowHtml = `
            <tr class="bg-white border-b hover:bg-gray-50 content-center">
                <td class="border px-6 py-4 font-medium text-gray-900">${trainingName}</td>
                <td class="border px-6 py-4">${trainingStart}</td>
                <td class="border px-6 py-4">${trainingEnd}</td>
                <td class="border px-6 py-4">${trainingInsti}</td>
                <td class="border px-6 py-4">${trainingCert}</td>
                <td> <div class="flex items-center justify-center">${checkboxTrainingHtml}</div></td>
                <td class="border px-6 py-4"><a class="font-medium text-blue-600 hover:underline hover:cursor-pointer edit-training-row">Edit</a><input type="hidden" name="trainingIndex[${trainingRowCounter}]" value="${trainingRowCounter}"></td>
                <td class="border px-6 py-4"><a class="font-medium text-red-600 hover:underline hover:cursor-pointer delete-training-row">Delete</a></td>
                <input type="hidden" name="trainingNamePost[${trainingRowCounter}]" value="${trainingName}">
                <input type="hidden" name="trainingStartPost[${trainingRowCounter}]" value="${trainingStart}">
                <input type="hidden" name="trainingEndPost[${trainingRowCounter}]" value="${trainingEnd}">
                <input type="hidden" name="trainingInstiPost[${trainingRowCounter}]" value="${trainingInsti}">
                <input type="hidden" name="trainingCertPost[${trainingRowCounter}]" value="${trainingCert}">
                <input type="hidden" name="trainingStatusPost[${trainingRowCounter}]" value="${trainingStatus}">
            </tr>`;

            $('#trainingTable tbody').append(newTrainingRowHtml);
            trainingRowCounter++;
        }

        // Reset edit mode flag
        trainingEditMode = false;
        // Reset input fields
        trainingReset();

        // Dispatch custom event to close the modal
        window.dispatchEvent(new CustomEvent('close-modal', {
            detail: 'training-modal' // Assuming $name holds the modal name
        }));
    }


    // Attach event listeners
    $(document).on('click', '.delete-training-row', deleteTrainingRow);
    $(document).on('click', '.edit-training-row', editTrainingRow);
    $('#trainingAdd').click(addTrainingRow);
</script>









<script>

    // CERTIFICATION 
    var certEditMode = false;
    var certIndex = 0; // Initialize eduindexedit variable
    var certRowCounter = 0;
    var certSelectRow = 0;

    function certReset() {
        // Reset input fields
        $('#certIssued, #certDate, #certRating').val('');
        $('#certType').prop('selectedIndex', 0);
        certEditMode = false;
        certSelectRow = 0;
        certIndex = 0;

        window.dispatchEvent(new CustomEvent('close-modal', {
            detail: 'certification-modal' // Assuming $name holds the modal name
        }));
        toggleTableVisibility('certificationTable');

    }

    // Function to handle row deletion
    function deleteCertificationRow() {
        $(this).closest('tr').find('input[type="hidden"]').remove();
        $(this).closest('tr').remove();
        toggleTableVisibility('certificationTable');

    }

    // Function to handle row editing
    function editCertificationRow() {
        // Get the values of the row
        certEditMode = true;

        var certRowEdit = $(this).closest('tr');
        certSelectRow = $(this).closest('tr').index();
        var certType_Edit = certRowEdit.find('td:eq(0)').text();
        var certIssue_Edit = certRowEdit.find('td:eq(1)').text();
        var certDate_Edit = certRowEdit.find('td:eq(2)').text();
        var certRating_Edit = certRowEdit.find('td:eq(3)').text();
        certIndex = certRowEdit.find('input[name^="certIndex"]').val();


        // Populate the education modal with these values
        $('#certType').val(certType_Edit);
        $('#certIssued').val(certIssue_Edit);
        $('#certDate').val(certDate_Edit);
        $('#certRating').val(certRating_Edit);
        $('#certIndex').val(certIndex);

        // Dispatch custom event to open the modal
        window.dispatchEvent(new CustomEvent('open-modal', {
            detail: 'certification-modal' // Assuming $name holds the modal name
        }));
    }
    // Function to add a new row
    function addCertificationRow() {
        // Get the input values
        var certType = $('#certType').val();
        var certIssued = $('#certIssued').val();
        var certDate = $('#certDate').val();
        var certRating = $('#certRating').val();

        var certSELECTID = document.getElementById('certType');
        // Get the selected option
        var eduLEVELOPTION = certSELECTID.options[certSELECTID.selectedIndex];
        // Get the value of the custom attribute
        var certCustomAttri = eduLEVELOPTION.getAttribute('data-certTypes-attribute');


        if (certEditMode) {
            // Update existing row
            $('input[name="certTypePost[' + certIndex + ']"]').val(certCustomAttri);
            $('input[name="certIssuedPost[' + certIndex + ']"]').val(certIssued);
            $('input[name="certDatePost[' + certIndex + ']"]').val(certDate);
            $('input[name="certRatingPost[' + certIndex + ']"]').val(certRating);

            var row = $('#certificationTable tbody tr').eq(certSelectRow);
            row.find('td:eq(0)').text(certType);
            row.find('td:eq(1)').text(certIssued);
            row.find('td:eq(2)').text(certDate);
            row.find('td:eq(3)').text(certRating);
        } else {
            // Append a new row to the table body
            var newCertificateRowHtml = `
                <tr class="bg-white border-b hover:bg-gray-50 content-center">
                    <td class="border px-6 py-4 font-medium text-gray-900">${certType}</td>
                    <td class="border px-6 py-4">${certIssued}</td>
                    <td class="border px-6 py-4">${certDate}</td>
                    <td class="border px-6 py-4">${certRating}</td>
                    <td class="border px-6 py-4"><a class="font-medium text-blue-600 hover:underline hover:cursor-pointer edit-certificate-row">Edit</a><input type="hidden" name="certIndex[${certRowCounter}]" value="${certRowCounter}"></td>
                    <td class="border px-6 py-4"><a class="font-medium text-red-600 hover:underline hover:cursor-pointer delete-certificate-row">Delete</a></td>
                    <input type="hidden" name="certTypePost[${certRowCounter}]" value="${certCustomAttri}">
                    <input type="hidden" name="certIssuedPost[${certRowCounter}]" value="${certIssued}">
                    <input type="hidden" name="certDatePost[${certRowCounter}]" value="${certDate}">
                    <input type="hidden" name="certRatingPost[${certRowCounter}]" value="${certRating}">
                </tr>`;


            $('#certificationTable tbody').append(newCertificateRowHtml);
            certRowCounter++;
        }
        certReset();
    }

    // Attach event listeners
    $(document).on('click', '.delete-certificate-row', deleteCertificationRow);
    $(document).on('click', '.edit-certificate-row', editCertificationRow);
    $('#certAdd').click(addCertificationRow);
</script>
