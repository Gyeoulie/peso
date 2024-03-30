<h1 class="text-2xl font-bold">Employment Status</h1>
<div class="flex flex-row mt-4">
    <div class="flex flex-col w-full">
        <x-input-label for="empStatus" :value="__('Employment Status')" />
        <select onchange="updateEmpDesc()" id="empStatus" name="empstatusPost" class="block mt-1 w-full">
            <option value="" disabled selected>Select Employment Status</option>
            <option value="1">Employed</option>
            <option value="2">Unemployed</option>
        </select>
        <h1 id="empStatusError" class="text-red-600 hidden">This Field is Required!</h1>
    </div>
    <div class="flex flex-col ml-4 w-full">
        <x-input-label for="empDesc" :value="__('Description')" />
        <select id="empDesc" name="empdescPost" class="block mt-1 w-full">
            <option value="" disabled selected>Select Description</option>
        </select>
        <h1 id="empDescError" class="text-red-600 hidden">This Field is Required!</h1>
    </div>
</div>

<div class="mt-20 flex flex-row justify-end space-x-4">
    <button type="button"
        class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
        onclick="nextSection(2)">
        Previous
    </button>

    <button type="button"
        class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded "
        onclick="validateAndNext()">
        Next
    </button>
</div>


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
            addOption(empDescSelect, 'Wage employed', 1);
            addOption(empDescSelect, 'Self-employed', 2);
            addOption(empDescSelect, 'Others', 3);
        } else if (empStatus === '2') { // '2' corresponds to 'unemployed'
            empDescSelect.disabled = false;
            addOption(empDescSelect, 'New entrant/fresh graduate', 4);
            addOption(empDescSelect, 'Finished contract', 5);
            addOption(empDescSelect, 'Resigned', 6);
            addOption(empDescSelect, 'Retired', 7);
            addOption(empDescSelect, 'Terminated/Laid off due to calamity', 8);
            addOption(empDescSelect, 'Terminated/Laid off (local)', 9);
            addOption(empDescSelect, 'Terminated/Laid off (abroad)', 10);
            addOption(empDescSelect, 'Others', 3);
        } else {
            empDescSelect.disabled = true;
            addOption(empDescSelect, 'Select Employment Description', '');
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
