<div class="flex flex-col w-full h-full">
    <h1 class="text-2xl font-bold">Job and Industry Preference</h1>
    <span class="text-sm text-gray-600">Fields with * are required.</span>
    <div class="flex flex-col mt-5 w-full">
        <div class="flex-inline mt-2 ">


            @foreach ($jobpreference as $jobData)
                <span wire:key='jobPref-{{ $jobData['position_id'] }}'
                    class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ">
                    {{ $jobData['position_Title'] }}
                    <button wire:click.prevent='removePosition( {{ $jobData['position_id'] }})' type="button"
                        class="flex-shrink-0 size-4 inline-flex items-center justify-center rounded-full hover:bg-blue-200 focus:outline-none focus:bg-blue-200 focus:text-blue-500 ">
                        <span class="sr-only">Remove badge</span>
                        <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </span>
            @endforeach
        </div>
        <x-input-error :messages="$errors->get('jobpreference')" class="mt-2" />
    </div>

    <div class="flex flex-row mt-4">
        <div class="flex flex-row mt-4 ">
            <button type="button" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'job-position-modal')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                ADD JOB PREFERENCE
            </button>
        </div>
    </div>


    {{-- LOCATION --}}
    <h1 class="text-2xl font-bold mt-24">Choose Preferred Industry</h1>
    <div class="flex flex-col mt-2 w-full">
        <div class="flex-inline mt-2 ">


            @foreach ($industrypreference as $industryData)
                <span wire:key='jobPref-{{ $industryData['industry_id'] }}'
                    class="inline-flex items-center mr-1 my-1 gap-x-1.5 py-1.5 ps-3 pe-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ">
                    {{ $industryData['industry_Title'] }}
                    <button wire:click.prevent='removeIndustry( {{ $industryData['industry_id'] }})' type="button"
                        class="flex-shrink-0 size-4 inline-flex items-center justify-center rounded-full hover:bg-blue-200 focus:outline-none focus:bg-blue-200 focus:text-blue-500 ">
                        <span class="sr-only">Remove badge</span>
                        <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </span>
            @endforeach
        </div>
        <x-input-error :messages="$errors->get('industrypreference')" class="mt-2" />
    </div>

    <div class="flex flex-row mt-4">
        <div class="flex flex-row mt-4 ">
            <button type="button" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'industry-modal')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                ADD INDUSTRY PREFERENCE
            </button>
        </div>
    </div>

    <div class="flex flex-row justify-between space-x-4 mt-6">
        <x-secondary-button wire:click.prevent='prev' type="button">
            Previous
        </x-secondary-button>

        <x-blue-button wire:click.prevent='next' type="button">
            Next
        </x-blue-button>
    </div>


    <livewire:modals.job-position-modal />
    <livewire:modals.industry-modal />
</div>
