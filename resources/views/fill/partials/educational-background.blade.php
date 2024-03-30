<h1 class="text-2xl font-bold">Educational Background</h1>

<div class="flex flex-col mt-4 ">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg  mx-auto">
        <table id="educationTable" class="w-full text-sm text-center rtl:text-center text-gray-500" style="display: none;">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="border px-6 py-3">
                        School
                    </th>
                    <th scope="col" class="border px-6 py-3 ">
                        Level
                    </th>
                    <th scope="col" class="border px-6 py-3 ">
                        Course
                    </th>
                    <th scope="col" class="border px-6 py-3  ">
                        Started
                    </th>
                    <th scope="col" class="border px-6 py-3 ">
                        Ended
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
                        National University Baliwag
                    </th>
                    <td class="border w-4 p-4">
                        1st Year College
                    </td>
                    <td class="border px-6 py-4">
                        BSIT
                    </td>
                    <td class="border px-6 py-4">
                        01/03/2020
                    </td>
                    <td class="border px-6 py-4">
                        01/03/2020
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
        <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'education-modal')"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            ADD EDUCATION
        </button>
    </div>
    <div class="flex flex-row justify-end space-x-4">
        <button type="button"
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
            onclick="nextSection(5)">
            Previous
        </button>

        <button type="button"
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
            onclick="nextSection(7)">
            Next
        </button>
    </div>
</div>


{{-- EDUCATION MODAL --}}
<x-modal name="education-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Education Record') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">

            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="eduSchool" :value="__('School')" />
                <x-text-input id="eduSchool" class="block mt-1 w-full" type="text" />
            </div>
            <div class="flex flex-row mt-2 w-full">
                <div class="flex flex-col w-full">
                    <x-input-label for="eduLevel" :value="__('Level')" />
                    <select id="eduLevel" class="block mt-1 w-full">
                        <option value="" disabled selected>Select Level</option>
                        <td class="border px-6 py-4">
                            <option data-edulevel-attribute="1" value="GRADE I">GRADE I</option>
                            <option data-edulevel-attribute="2" value="GRADE II">GRADE II</option>
                            <option data-edulevel-attribute="3" value="GRADE III">GRADE III</option>
                            <option data-edulevel-attribute="4" value="GRADE IV">GRADE IV</option>
                            <option data-edulevel-attribute="5" value="GRADE V">GRADE V</option>
                            <option data-edulevel-attribute="6" value="GRADE VI">GRADE VI</option>
                            <option data-edulevel-attribute="7" value="GRADE VII">GRADE VII</option>
                            <option data-edulevel-attribute="8" value="GRADE VIII">GRADE VIII</option>
                            <option data-edulevel-attribute="9" value="ELEMENTARY GRADUATE">ELEMENTARY GRADUATE</option>
                            <option data-edulevel-attribute="10" value="1ST YEAR HIGH SCHOOL/GRADE VII (FOR K TO 12)">
                                1ST YEAR HIGH SCHOOL/GRADE VII (FOR K TO 12)</option>
                            <option data-edulevel-attribute="11" value="2ND YEAR HIGH SCHOOL/GRADE VIII (FOR K TO 12)">
                                2ND YEAR HIGH SCHOOL/GRADE VIII (FOR K TO 12)</option>
                            <option data-edulevel-attribute="12" value="3RD YEAR HIGH SCHOOL/GRADE IX (FOR K TO 12)">3RD
                                YEAR HIGH SCHOOL/GRADE IX (FOR K TO 12)</option>
                            <option data-edulevel-attribute="13" value="4TH YEAR HIGH SCHOOL/GRADE X (FOR K TO 12)">4TH
                                YEAR HIGH SCHOOL/GRADE X (FOR K TO 12)</option>
                            <option data-edulevel-attribute="14" value="GRADE XI (FOR K TO 12)">GRADE XI (FOR K TO 12)
                            </option>
                            <option data-edulevel-attribute="15" value="GRADE XII (FOR K TO 12)">GRADE XII (FOR K TO 12)
                            </option>
                            <option data-edulevel-attribute="16" value="HIGH SCHOOL GRADUATE">HIGH SCHOOL GRADUATE
                            </option>
                            <option data-edulevel-attribute="17" value="VOCATIONAL UNDERGRADUATE">VOCATIONAL
                                UNDERGRADUATE</option>
                            <option data-edulevel-attribute="18" value="VOCATIONAL GRADUATE">VOCATIONAL GRADUATE
                            </option>
                            <option data-edulevel-attribute="19" value="1ST YEAR COLLEGE LEVEL">1ST YEAR COLLEGE LEVEL
                            </option>
                            <option data-edulevel-attribute="20" value="2ND YEAR COLLEGE LEVEL">2ND YEAR COLLEGE LEVEL
                            </option>
                            <option data-edulevel-attribute="21" value="3RD YEAR COLLEGE LEVEL">3RD YEAR COLLEGE LEVEL
                            </option>
                            <option data-edulevel-attribute="22" value="4TH YEAR COLLEGE LEVEL">4TH YEAR COLLEGE LEVEL
                            </option>
                            <option data-edulevel-attribute="23" value="5TH YEAR COLLEGE LEVEL">5TH YEAR COLLEGE LEVEL
                            </option>
                            <option data-edulevel-attribute="24" value="COLLEGE GRADUATE">COLLEGE GRADUATE</option>
                            <option data-edulevel-attribute="25" value="MASTERAL/POST GRADUATE LEVEL">MASTERAL/POST
                                GRADUATE LEVEL</option>
                            <option data-edulevel-attribute="26" value="MASTERAL/POST GRADUATE">MASTERAL/POST GRADUATE
                            </option>
                    </select>
                    <h6 class="text-xs text-red-500">This Field is required! </h6>
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <x-input-label for="eduCourse" :value="__('Course')" />
                    <x-text-input id="eduCourse" class="block mt-1 w-full" type="text" />
                </div>
            </div>
            <div class="flex flex-row mt-2 w-full">
                <div class="flex flex-col w-full">
                    <x-input-label for="eduStart" :value="__('Started')" />
                    <x-text-input id="eduStart" class="block mt-1 w-full" type="date" />
                </div>
                <div class="flex flex-col ml-4 w-full">
                    <x-input-label for="eduEnd" :value="__('Ended')" />
                    <x-text-input id="eduEnd" class="block mt-1 w-full" type="date" />
                </div>
            </div>

        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button ype="button" onclick="eduReset()">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" type="button" id="eduAdd">
                {{ __('Add Education Record') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>

<script>


    var eduEditMode = false;
    var eduIndex = 0; // Initialize eduIndex variable
    var eduCounter = 0;
    var eduSelectRow = 0;

    // Function to handle row deletion
    function eduReset() {
        $('#eduSchool, #eduCourse, #eduStart, #eduEnd').val('');
        $('#eduLevel').prop('selectedIndex', 0);
        eduEditMode = false;
        window.dispatchEvent(new CustomEvent('close-modal', {
            detail: 'education-modal' // Assuming $name holds the modal name
        }));
        toggleTableVisibility('educationTable');
    }

    function deleteEduRow() {
        $(this).closest('tr').find('input[type="hidden"]').remove();
        $(this).closest('tr').remove();
        toggleTableVisibility('educationTable');
    }

    // Function to handle row editing
    function editEduRow() {
        // Get the values of the row
        eduEditMode = true;

        var eduRow_Edit = $(this).closest('tr');
        eduSelectRow = $(this).closest('tr').index();

        var eduSchool_Edit = eduRow_Edit.find('td:eq(0)').text();
        var eduLevel_Edit = eduRow_Edit.find('td:eq(1)').text();
        var eduCourse_Edit = eduRow_Edit.find('td:eq(2)').text();
        var eduStart_Edit = eduRow_Edit.find('td:eq(3)').text(); // Fixed variable name
        var eduEnd_Edit = eduRow_Edit.find('td:eq(4)').text();
        eduIndex = eduRow_Edit.find('input[name^="eduIndex"]').val(); // Update eduIndex

        // Populate the education modal with these values
        $('#eduSchool').val(eduSchool_Edit);
        $('#eduLevel').val(eduLevel_Edit);
        $('#eduCourse').val(eduCourse_Edit);
        $('#eduStart').val(eduStart_Edit);
        $('#eduEnd').val(eduEnd_Edit);
        $('#eduIndex').val(eduIndex);

        // Dispatch custom event to open the modal
        window.dispatchEvent(new CustomEvent('open-modal', {
            detail: 'education-modal' // Assuming $name holds the modal name
        }));
    }
    // Function to add a new row
    function addEduRow() {
        // Get the input values
        var eduSchool = $('#eduSchool').val();
        var eduLevel = $('#eduLevel').val();
        var eduCourse = $('#eduCourse').val();
        var eduStart = $('#eduStart').val();
        var eduEnd = $('#eduEnd').val();


        var eduSELECTEDID = document.getElementById('eduLevel');
        // Get the selected option
        var eduLEVELOPTION = eduSELECTEDID.options[eduSELECTEDID.selectedIndex];
        // Get the value of the custom attribute
        var eduCustomAttri = eduLEVELOPTION.getAttribute('data-edulevel-attribute');

        if (eduEditMode) {
            console.log(eduCustomAttri);
            // Update existing row
            $('input[name="eduSchoolPost[' + eduIndex + ']"]').val(eduSchool);
            $('input[name="eduLevelPost[' + eduIndex + ']"]').val(eduCustomAttri);
            $('input[name="eduCoursePost[' + eduIndex + ']"]').val(eduCourse);
            $('input[name="eduStartPost[' + eduIndex + ']"]').val(eduStart);
            $('input[name="eduEndPost[' + eduIndex + ']"]').val(eduEnd);

            var row = $('#educationTable tbody tr').eq(eduSelectRow);
            row.find('td:eq(0)').text(eduSchool);
            row.find('td:eq(1)').text(eduLevel);
            row.find('td:eq(2)').text(eduCourse);
            row.find('td:eq(3)').text(eduStart);
            row.find('td:eq(4)').text(eduEnd);

        } else {
            // Append a new row to the table body
            var newEduRowHtml = `
                <tr class="bg-white border-b hover:bg-gray-50 content-center">
                    <td class="border px-6 py-4 font-medium text-gray-900">${eduSchool}</td>
                    <td class="border px-6 py-4">${eduLevel}</td>
                    <td class="border px-6 py-4">${eduCourse}</td>
                    <td class="border px-6 py-4">${eduStart}</td>
                    <td class="border px-6 py-4">${eduEnd}</td>
                    <td class="border px-6 py-4"><a class="font-medium text-blue-600 hover:underline hover:cursor-pointer edit-edu-row">Edit</a><input type="hidden" name="eduIndex[${eduCounter}]" value="${eduCounter}"></td>
                    <td class="border px-6 py-4"><a class="font-medium text-red-600 hover:underline hover:cursor-pointer delete-edu-row">Delete</a></td>

                    <input type="hidden" name="eduSchoolPost[${eduCounter}]" value="${eduSchool}">
                    <input type="hidden" name="eduLevelPost[${eduCounter}]" value="${eduCustomAttri}">
                    <input type="hidden" name="eduCoursePost[${eduCounter}]" value="${eduCourse}">
                    <input type="hidden" name="eduStartPost[${eduCounter}]" value="${eduStart}">
                    <input type="hidden" name="eduEndPost[${eduCounter}]" value="${eduEnd}">
                </tr>`;
            $('#educationTable tbody').append(newEduRowHtml);
            eduCounter++;
        }
        eduEditMode = false;
        eduReset();
        // Dispatch custom event to close the modal
    }

    // Attach event listeners
    $(document).on('click', '.delete-edu-row', deleteEduRow);
    $(document).on('click', '.edit-edu-row', editEduRow);
    $('#eduAdd').click(addEduRow);
</script>













































<script>
    //     var eduCounter = 1; // Assuming there's already one row present in the table
    // jQuery('#eduAdd').click(function() {
    //     // Get the input values
    //     var eduSchool = $('#eduSchool').val();
    //     var eduLevel = $('#eduLevel').val();
    //     var eduCourse = $('#eduCourse').val();
    //     var eduStart = $('#eduStart').val();
    //     var eduEnd = $('#eduEnd').val();

    //     // Append a new row to the table body
    //     $('#educationTable tbody').append(
    //         '<tr class="bg-white border-b hover:bg-gray-50 content-center">' +
    //         '<th scope="row" class="border px-6 py-4 font-medium text-gray-900">' +
    //         eduSchool +
    //         '<input type="hidden" name="eduSchool[' + eduCounter + ']" value="' + eduSchool + '">' +
    //         '</th>' +
    //         '<td class="border px-6 py-4">' +
    //         eduLevel +
    //         '<input type="hidden" name="eduLevel[' + eduCounter + ']" value="' + eduLevel + '">' +
    //         '</td>' +
    //         '<td class="border px-6 py-4">' +
    //         eduCourse +
    //         '<input type="hidden" name="eduCourse[' + eduCounter + ']" value="' + eduCourse + '">' +
    //         '</td>' +
    //         '<td class="border px-6 py-4">' +
    //         eduStart +
    //         '<input type="hidden" name="eduStart[' + eduCounter + ']" value="' + eduStart + '">' +
    //         '</td>' +
    //         '<td class="border px-6 py-4">' +
    //         eduEnd +
    //         '<input type="hidden" name="eduEnd[' + eduCounter + ']" value="' + eduEnd + '">' +
    //         '</td>' +
    //         '<td class="border px-6 py-4">' +
    //         '<a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>' +
    //         '</td>' +
    //         '<td class="border px-6 py-4">' +
    //         '<a href="#" class="font-medium text-blue-600 hover:underline">Delete</a>' +
    //         '</td>' +
    //         '</tr>'
    //     );
    //     eduCounter++;
    // });


    // function openEducationModal() {
    //     var event = new CustomEvent('open-modal', {
    //         detail: {
    //             name: 'education-modal'
    //         }
    //     });
    //     document.dispatchEvent(event);
    // }

    // // Call the function where you want the modal to open
    // function yourFunction() {
    //     // Your function code here
    //     // Call openEducationModal() at the desired point in your function
    //     openEducationModal();
    // }
</script>
