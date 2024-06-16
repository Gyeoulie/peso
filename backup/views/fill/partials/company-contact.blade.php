<h1 class="text-2xl font-bold">Contact Information</h1>

<div class="flex flex-col mt-4 w-full">
    <x-input-label for="presentAddress" :value="__('Contact Person')" />
    <x-text-input id="presentAddress" class="block mt-1 w-2/3" type="text" name="cpersonPost" />
</div>
<div class="flex flex-col mt-4 w-full">
    <x-input-label for="presentAddress" :value="__('Position')" />
    <x-text-input id="presentAddress" class="block mt-1 w-2/3" type="tel" name="postionPost" />
</div>
<div class="flex flex-col mt-4 w-full">
    <x-input-label for="presentAddress" :value="__('Telephone No.')" />
    <x-text-input id="presentAddress" class="block mt-1 w-2/3" type="tel" name="telPost" />
</div>
<div class="flex flex-col mt-4 w-full">
    <x-input-label for="presentAddress" :value="__('Mobile No.')" />
    <x-text-input id="presentAddress" class="block mt-1 w-2/3" type="tel" name="mobPost" />
</div>
<div class="flex flex-col mt-4 w-full">
    <x-input-label for="presentAddress" :value="__('Fax No.')" />
    <x-text-input id="presentAddress" class="block mt-1 w-2/3" type="tel" name="faxPost" />
</div>
<div class="flex flex-col mt-4 w-full">
    <x-input-label for="presentAddress" :value="__('Email Address')" />
    <x-text-input id="presentAddress" class="block mt-1 w-2/3" type="email" name="emailPost" />
</div>

<div class="flex flex-row mt-4 justify-end space-x-4">
    <button type="button"
        class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
        onclick="nextSection(1)">
        Previous
    </button>

    <button type="button"
        class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
        onclick="nextSection(3)">
        Next
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkbox = document.getElementById('checkboxDefault6');
        var otherDisabilityInput = document.getElementById('otherDisability');

        checkbox.addEventListener('change', function() {
            otherDisabilityInput.style.display = checkbox.checked ? 'block' : 'none';
        });

        // Initially hide the input if the checkbox is unchecked
        if (!checkbox.checked) {
            otherDisabilityInput.style.display = 'none';
        }
    });
</script>
