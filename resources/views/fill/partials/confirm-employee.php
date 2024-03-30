<h1 class="text-2xl font-bold"> Certification And Authorization</h1>
<div class="flex flex-col mt-4 w-full justify-center items-center">

    <p class="text-xl w-3/4">

        This is to certify that, before signing up, you understand and acknowledge that by submitting this form, you are
        certifying that all the data and information provided herein are true and accurate to the best of your
        knowledge. You also agree that the information you provide may be accessed and utilized by authorized
        individuals or entities who have access to the system for legitimate purposes related to job hiring and
        employment. This includes potential employers, recruiters, and relevant administrative personnel involved in the
        operation of the platform. Please ensure that all details provided are genuine and up-to-date, as any false or
        misleading information may adversely affect your eligibility for job opportunities and could potentially impact
        your reputation within the system. Your cooperation and honesty in providing accurate information are crucial
        for maintaining the integrity and effectiveness of the job hiring process facilitated through this platform.
    </p>
    <div class="inline-flex items-center">
        <label class="relative flex items-center p-3 rounded-full cursor-pointer" htmlFor="check">
            <input type="checkbox"
                class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10"
                id="agreeBox" />
            <span
                class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                    stroke="currentColor" stroke-width="1">
                    <path fill-rule="evenodd"l
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
        </label>
        <label class="mt-px font-light text-gray-700 cursor-pointer select-none" htmlFor="agreeBox">
            I agree
        </label>
    </div>
</div>
<div class="flex flex-row justify-end mt-12 space-x-10">
<button type="button"
            class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded"
            onclick="nextSection(10)">
            Previous
        </button>
    <button disabled type="submit"
        class="bg-transparent  hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded ">
        Submit
    </button>
</div>
</div>

<script>
    $(document).ready(function() {
        // Add event listener to the checkbox
        $('#agreeBox').change(function() {
            // Check if the checkbox is checked
            if ($(this).is(':checked')) {
                // Remove the 'disabled' attribute from the button
                $('button[type="submit"]').prop('disabled', false);
            } else {
                // Add the 'disabled' attribute to the button
                $('button[type="submit"]').prop('disabled', true);
            }
        });
    });
</script>
