<div class="flex flex-col w-full h-full gap-4">
    <h1 class="text-2xl font-bold">Contact Information</h1>
    @foreach ($requirements->chunk(2) as $chunk)
        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-5 w-full mt-4">
            @foreach ($chunk as $requirement)
                <div wire:key='jobRequirement-{{ $requirement->requirement_id }}' class="flex flex-col w-full sm:w-1/2">
                    <label class="block text-sm font-medium text-gray-900"
                        for="file_input">{{ $requirement->requirement_Title }}</label>
                    <input wire:model='req.{{ $requirement->requirement_id }}'
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                        aria-describedby="file_input_help" type="file">
                    <p class="mt-1 text-sm text-gray-500 0">PDF ONLY.</p>
                    <x-input-error :messages="$errors->get('req.' . $requirement->requirement_id)" class="mt-2" />
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="flex flex-row justify-between space-x-4 mt-4 sm:mt-auto sm:mb-4">
        <x-secondary-button wire:click='prev' type="button">
            Previous
        </x-secondary-button>

        <x-blue-button wire:click='next' type="button">
            Next
        </x-blue-button>
    </div>



</div>
