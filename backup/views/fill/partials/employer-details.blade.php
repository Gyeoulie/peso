<h1 class="text-2xl font-bold">Company Information</h1>
<div class="flex flex-row">
    <div class="flex flex-col w-full">
        <div class="flex flex-col mt-4 w-full">
            <x-input-label for="TIN" :value="__('TIN')" />
            <x-text-input id="TIN" class="block mt-1 " type="text" name="tinPost" />
        </div>

        <div class="flex flex-col mt-4 w-full">
            <x-input-label for="businessname" :value="__('Business Name')" />
            <x-text-input id="businessname" class="block mt-1 " type="text" name="bnamePost" />
        </div>
        <div class="flex flex-col mt-4 w-full">
            <x-input-label for="tradename" :value="__('Trade Name')" />
            <x-text-input id="tradename" class="block mt-1 " type="text" name="tnamePost" />
        </div>
    </div>
    <div class="flex flex-col items-center mt-4 w-full">
        <div class="flex flex-col items-center">
            <x-input-label for="image" :value="__('Upload Company Logo')" />
            <div
                class="w-160 h-160 bg-gray-200 border border-gray-300 rounded-lg overflow-hidden flex items-center justify-center">
                <!-- Display uploaded image here -->
                <img id="uploadedImage" class="uploaded-image"
                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                    alt="Uploaded Image" width="160" height="160" />
            </div>
        </div>
        <div class="mt-4 w-160 flex justify-center">
            <label for="imageUpload"
                class="cursor-pointer px-4 py-2 bg-[#428bca] text-white rounded hover:bg-red-600 transition-colors duration-300 text-center w-full">
                Upload Image
            </label>
            <input type="file" id="imageUpload" name="cimagePost" class="hidden" accept="image/*"
                onchange="previewImage(event)">
        </div>
    </div>

</div>
<div class="inline-flex mt-4">
    <div class="flex flex-col w-full">
        <x-input-label for="loctype" :value="__('Location Type')" />
        <select id="loctype" name="locPost" class="block mt-1 w-full">
            <option value="" disabled selected>Select Location Type</option>
            <option value="1">Main</option>
            <option value="2">Branch</option>
        </select>
    </div>
    <div class="flex flex-col w-full ml-4">
        <x-input-label for="workforce" :value="__('Total Work Force')" />
        <select id="workforce" name="workforcePost" class="block mt-1 w-full">
            <option value="" disabled selected>Select Total Work Force</option>
            <option value="1">1 - 9 (Micro)</option>
            <option value="2">10 - 99 (Small)</option>
            <option value="3">100 - 199 (Medium)</option>
            <option value="4">200 and Over (Large)</option>
        </select>
    </div>
</div>
<div class="flex flex-col mt-4 w-full">
    <x-input-label for="empStatus" :value="__('Employment Status')" />
    <select onchange="updateEmpDesc()" id="empStatus" name="empTypePost" class="block mt-1 w-3/4">
        <option value="" disabled selected>Select Employment Type</option>
        <option value="1">Public</option>
        <option value="2">Private</option>
    </select>
    <h1 id="empStatusError" class="text-red-600 hidden">This Field is Required!</h1>
</div>
<div class="flex flex-col mt-4 w-full">
    <x-input-label for="empDesc" :value="__('Description')" />
    <select id="empDesc" name="empdescPost" class="block mt-1 w-3/4">
        <option value="" disabled selected>Select Description</option>
    </select>
    <h1 id="empDescError" class="text-red-600 hidden">This Field is Required!</h1>
</div>
<x-input-label for="lineofIndustry" :value="__('Line of Industry')" class="mt-4" />
<div class="flex flex-row w-full">
    <div id= "locPrefRow" class="flex-inline mt-2">

    </div>
</div>
<div class="flex flex-row mt-2">
    <div class="flex flex-row">
        <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'locpref-modal')"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            ADD INDUSTRY
        </button>
    </div>
</div>


<div class="flex flex-col w-full mt-4">
    <x-input-label for="presentAddress" :value="__('Address')" />
    <x-text-input id="presentAddress" class="block mt-1 w-2/3" type="text" name="hnumPost"
        placeholder="HOUSE/BUILDING NO,. STREET, VILLAGE" />
    <x-input-error :messages="$errors->get('fname')" class="mt-2" />
</div>
<div class="flex flex-row mt-4">
    <div class="flex flex-col w-2/3">
        <x-input-label for="province" :value="__('Barangay')" />
        <select id="province" name="barPost" class="block mt-1 w-full">
            <option value="" disabled selected>Select Barangay</option>

            @foreach ($datainfo['barangays'] as $barangays)
                <option value="{{ $barangays->barangay_id }}">{{ $barangays->barangay_Name }}
                </option>
            @endforeach

        </select>
    </div>
</div>
<div class="flex flex-row mt-4">
    <div class="flex flex-col w-2/3">
        <x-input-label for="province" :value="__('Municipality')" />
        <select id="province" name="munPost" class="block mt-1 w-full">
            <option value="" disabled selected>Select Municipality</option>

            @foreach ($datainfo['municipalities'] as $municipalities)
                <option value="{{ $municipalities->municipality_id }}">{{ $municipalities->municipality_Name }}
                </option>
            @endforeach

        </select>
    </div>
</div>
<div class="flex flex-row mt-4">
    <div class="flex flex-col w-2/3">
        <x-input-label for="province" :value="__('Province')" />
        <select id="province" name="proPost" class="block mt-1 w-full">
            <option value="" disabled selected>Select Province</option>

            @foreach ($datainfo['provinces'] as $provinces)
                <option value="{{ $provinces->province_id }}">{{ $provinces->province_Name }}
                </option>
            @endforeach

        </select>
    </div>
</div>





<div class="flex flex-row mt-4 justify-end space-x-4">

    <button type="button"
        class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
        onclick="nextSection(2)">
        Next
    </button>
</div>



{{-- LOCATION PREFERENCE MODAL --}}
<x-modal name="locpref-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Location Preference') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="locPrefType" :value="__('Location')" />
                <select id="locPrefType" class="block mt-1 w-full">
                    <option value="" disabled selected>Select Location Preference</option>

                    @foreach ($datainfo['jobIndustries'] as $jobIndustry)
                        <option value="{{ $jobIndustry->industry_id }}">{{ $jobIndustry->industry_Title }}
                        </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button type="button" onclick="locprefReset()">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" type="button" onclick="locPrefAdd()">
                {{ __('Add Job Preference') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>



<script>
    var locPrefCounter = 0; // Initialize counter for naming

    function locprefReset() {
        // Reset selected language dropdown
        window.dispatchEvent(new CustomEvent('close-modal', {
            detail: 'locpref-modal' // Assuming $name holds the modal name
        }));
        $('#locPrefType').prop('selectedIndex', 0);
    }

    function locPrefAdd() {
        var locPrefTypeSelect = document.getElementById('locPrefType');
        var locPrefId = locPrefTypeSelect.value; // Assuming value is the municipality ID
        var locPrefText = locPrefTypeSelect.options[locPrefTypeSelect.selectedIndex].textContent.trim();


        var locPrefDuplicate = $('#locPrefRow').find(`[data-locpref-id="${locPrefId}"]`).length > 0;

        if (locPrefDuplicate) {
            console.error('Error: Duplicate job preference ID found.');
            locprefReset();
            window.dispatchEvent(new CustomEvent('open-modal', {
                detail: 'duplicate-pref-modal' // Assuming $name holds the modal name
            }));
            return; // Exit the function if duplicate ID found
        }


        var locPrefBadge = `<span class="inline-flex items-center mr-1 mt-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500" data-locpref-id="${locPrefId}">
        ${locPrefText}
        <button type="button" onclick="locPrefRemove(this)" class="flex-shrink-0 size-4 inline-flex items-center justify-center rounded-full hover:bg-blue-200 focus:outline-none focus:bg-blue-200 focus:text-blue-500 dark:hover:bg-blue-900">
            <span class="sr-only">Remove badge</span>
            <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
            </svg>
        </button>
        <input type="hidden" name="industryPost[${locPrefCounter}]" value="${locPrefId}" id="hiddenLocPref[${locPrefCounter}]">
    </span>`;
        locPrefCounter++
        $('#locPrefRow').append(locPrefBadge);

        locprefReset();
        printHiddenInputs()
    }

    function locPrefRemove(button) {
        var span = $(button).parent();
        var locPrefId = span.attr('data-locpref-id');

        // Remove the badge from HTML
        span.remove();
        console.log('Badge removed from HTML. Municipality ID:', locPrefId);

        // Remove the corresponding hidden input elements
        $('input[name^="industryPost"]').each(function() {
            if ($(this).val() === locPrefId) {
                $(this).remove();
                console.log('Hidden input removed:', $(this).attr('name') + ' = ' + $(this).val());
            }
        });
        printHiddenInputs()
    }
</script>


<script>
    function previewImage(event) {
        var fileInput = event.target;
        var uploadedImage = document.getElementById('uploadedImage');
        var imageContainer = document.querySelector('.w-160.h-160');

        // Ensure a file is selected
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                uploadedImage.src = e.target.result;
                imageContainer.style.backgroundImage = 'url(' + e.target.result + ')';
                imageContainer.style.backgroundSize = 'cover';
                imageContainer.style.backgroundPosition = 'center';
            };

            // Read the file as a data URL
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>

<script>
    document.getElementById('empDesc').addEventListener('change', function() {
        var selectedValue = this.value;
        console.log('Selected value:', selectedValue);
    });

    function updateEmpDesc() {
        var empStatus = document.getElementById('empStatus').value;
        var empDescSelect = document.getElementById('empDesc');

        empDescSelect.innerHTML = ''; // Clear previous options

        if (empStatus === '1') { // '1' corresponds to 'employed'
            empDescSelect.disabled = false;
            addOption(empDescSelect, 'National Government Agency', 1);
            addOption(empDescSelect, 'Local Government Unit', 2);
            addOption(empDescSelect, 'Government-owned and Controlled Corporation', 3);
            addOption(empDescSelect, 'State/Local University or College', 4);
        } else if (empStatus === '2') { // '2' corresponds to 'unemployed'
            empDescSelect.disabled = false;
            addOption(empDescSelect, 'Direct Hire', 5);
            addOption(empDescSelect, 'Private Employment Agency', 6);
            addOption(empDescSelect, 'Overseas Recruitment Agency', 7);
            addOption(empDescSelect, 'D.O. 174, s. 2017', 8);
        } else {
            empDescSelect.disabled = true;
            addOption(empDescSelect, 'Select Description', '');
        }
    }

    function addOption(select, text, value) {
        var option = document.createElement('option');
        option.text = text;
        option.value = value;
        select.appendChild(option);
    }

    function validateAndNext() {
        var empStatus = document.getElementById('empStatus').value;
        var empDesc = document.getElementById('empDesc').value;
        var empStatusError = document.getElementById('empStatusError');
        var empDescError = document.getElementById('empDescError');

        // Reset error messages
        empStatusError.classList.add('hidden');
        empDescError.classList.add('hidden');

        // Validate fields
        if (!empStatus) {
            empStatusError.classList.remove('hidden');
            return;
        }

        if (!empDesc) {
            empDescError.classList.remove('hidden');
            return;
        }

        // Proceed to the next section
        nextSection(4);
    }
</script>
