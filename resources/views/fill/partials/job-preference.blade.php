<h1 class="text-2xl font-bold">Job and Industry Preference</h1>
<div class="flex flex-row mt-2 w-full">
    <div id= "jobPrefRow" class="flex-inline mt-2">

    </div>
</div>
<div class="flex flex-row mt-4">
    <div class="flex flex-row mt-4 ">
        <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'jobpref-modal')"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            ADD JOB PREF
        </button>
    </div>
</div>


{{-- LOCATION --}}
<h1 class="text-2xl font-bold mt-24">Choose Preferred Industry</h1>
<div class="flex flex-row mt-2 w-full">
    <div id= "locPrefRow" class="flex-inline mt-2">

    </div>
</div>
<div class="flex flex-row mt-4">
    <div class="flex flex-row mt-4 ">
        <button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'locpref-modal')"
            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            ADD LOCATION PREF
        </button>
    </div>
</div>

<div class="flex flex-row justify-end space-x-4">
    <button type="button"
        class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
        onclick="nextSection(3)">
        Previous
    </button>

    <button type="button"
        class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "
        onclick="nextSection(5)">
        Next
    </button>
</div>


{{-- JOB PREFERENCE MODAL --}}
<x-modal name="jobpref-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Job Preference') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">
            <div class="flex flex-col mt-2 w-full">
                <x-input-label for="jobPrefType" :value="__('License')" />
                <select id="jobPrefType" class="block mt-1 w-full">
                    <option value="" disabled selected>Select Job Preference</option>

                    @foreach ($datainfo['jobPositions'] as $jobPositions)
                        <option value="{{ $jobPositions->position_id }}">{{ $jobPositions->position_Title }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button type="button" onclick="jobprefReset()">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" type="button" onclick="jobPrefAdd()">
                {{ __('Add Job Preference') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>


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
                    <option value="" disabled selected>Select Industry Preference</option>

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


{{-- ELIGIBILITY MODAL --}}
<x-modal name="duplicate-pref-modal" focusable>
    <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Duplicate Record') }}
        </h2>
        <hr>
        <div class="flex flex-col mt-2">
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Record already exist.') }}
            </p>

        </div>
        <div class="mt-6 flex justify-end">
            <x-danger-button class="ms-3" type="button" x-on:click="$dispatch('close')">
                {{ __('Ok') }}
            </x-danger-button>
        </div>
    </div>
</x-modal>




<script>
    function printHiddenInputs() {
        var hiddenInputs = document.querySelectorAll('input[type="hidden"]');
        for (var i = 0; i < hiddenInputs.length; i++) {
            var input = hiddenInputs[i];
            console.log('Hidden input ' + i + ':', input.name, '=', input.value);
        }
    }
    var jobPrefCounter = 0; // Initialize counter for naming
    function jobprefReset() {
        // Reset selected language dropdown
        window.dispatchEvent(new CustomEvent('close-modal', {
            detail: 'jobpref-modal' // Assuming $name holds the modal name
        }));
        $('#jobPrefType').prop('selectedIndex', 0);
    }

    function jobPrefAdd() {
        var jobPrefTypeSelect = document.getElementById('jobPrefType');
        var jobPrefId = jobPrefTypeSelect.value; // Assuming value is the municipality ID
        var jobPrefText = jobPrefTypeSelect.options[jobPrefTypeSelect.selectedIndex].textContent.trim();


        var jobPrefDuplicate = $('#jobPrefRow').find(`[data-jobpref-id="${jobPrefId}"]`).length > 0;

        if (jobPrefDuplicate) {
            console.error('Error: Duplicate job preference ID found.');
            jobprefReset();
            window.dispatchEvent(new CustomEvent('open-modal', {
                detail: 'duplicate-pref-modal' // Assuming $name holds the modal name
            }));
            return; // Exit the function if duplicate ID found
        }









        var jobPrefBadge = `<span class="inline-flex items-center mr-1 mt-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500" data-jobpref-id="${jobPrefId}">
        ${jobPrefText}
        <button type="button" onclick="jobPrefRemove(this)" class="flex-shrink-0 size-4 inline-flex items-center justify-center rounded-full hover:bg-blue-200 focus:outline-none focus:bg-blue-200 focus:text-blue-500 dark:hover:bg-blue-900">
            <span class="sr-only">Remove badge</span>
            <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
            </svg>
        </button>
        <input type="hidden" name="jobPref[${jobPrefCounter}]" value="${jobPrefId}" id="hiddenJobPref[${jobPrefCounter}]">
    </span>`;
        jobPrefCounter++
        $('#jobPrefRow').append(jobPrefBadge);

        jobprefReset();
        printHiddenInputs()
    }

    function jobPrefRemove(button) {
        var span = $(button).parent();
        var jobPrefId = span.attr('data-jobpref-id');

        // Remove the badge from HTML
        span.remove();
        console.log('Badge removed from HTML. Job Pref ID:', jobPrefId);

        // Remove the corresponding hidden input elements
        $('input[name^="jobPref"]').each(function() {
            if ($(this).val() === jobPrefId) {
                $(this).remove();
                console.log('Hidden input removed:', $(this).attr('name') + ' = ' + $(this).val());
            }
        });
        printHiddenInputs()
    }
</script>









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
        <input type="hidden" name="locPref[${locPrefCounter}]" value="${locPrefId}" id="hiddenLocPref[${locPrefCounter}]">
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
        $('input[name^="locPref"]').each(function() {
            if ($(this).val() === locPrefId) {
                $(this).remove();
                console.log('Hidden input removed:', $(this).attr('name') + ' = ' + $(this).val());
            }
        });
        printHiddenInputs()
    }
</script>
