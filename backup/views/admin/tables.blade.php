<x-app-layout>
    <x-slot name="header">

    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <div class="flex flex-col">
                        <div class="p-6 text-gray-900">
                            {{ __('Welcome Admin!!') }}
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-center ml-auto">

                        <div class="flex flex-row">
                            <x-primary-button class="" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'addData-modal')">
                                {{ __('Add Data') }}
                            </x-primary-button>

                            <x-primary-button class="ml-4 mr-4" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'addPeso-modal')">
                                {{ __('Add PESO Account') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="flex flex-row mt-5">
                <div class="container my-12 py-12 mx-auto px-4 md:px-6 lg:px-12">



                    <!--Section: Design Block-->
                    <section class="mb-20 text-gray-800">

                        {{-- <livewire:Province/> --}}

                    </section>
                    <!--Section: Design Block-->

                </div>
                <div class="container my-12 py-12 mx-auto px-4 md:px-6 lg:px-12">

                    <!--Section: Design Block-->
                    <section class="mb-20 text-gray-800">
                        {{-- <livewire:JobPositions/>
                --}}

                    </section>
                </div>
                <!--Section: Design Block-->

            </div>
        </div>
    </div>



    <x-modal name="addData-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Edit Description') }}
            </h2>
            <hr>
            <form method="POST" action="{{ route('addDataAdmin') }}">
                @csrf
                <div class="flex flex-col mt-2">

                    <div class="flex flex-col mt-2 w-full">
                        <x-input-label for="addType" :value="__('Data to Add')" />
                        <select id="addType" name="addType" required class="block mt-1 w-full">
                            <option value="" disabled selected>Select Data</option>
                            <option value="1">Eligibility</option>
                            <option value="2">License</option>
                            <option value="3">Certification</option>
                            <option value="4">Industry</option>
                            <option value="5">Job Positions</option>
                        </select>
                    </div>
                    <div class="flex flex-col mt-2 w-full">
                        <x-input-label for="addTitle" :value="__('Title')" />
                        <x-text-input id="addTitle" name="addTitle" class="block mt-1 w-full" type="text"
                            required />
                    </div>
                    <div class="flex flex-col mt-2 w-full">
                        <x-input-label for="addCode" :value="__('Code')" />
                        <x-text-input id="addCode" name="addCode" class="block mt-1 w-full" type="text" required />
                    </div>

                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button class="ms-3" type="submit">
                        {{ __('Save') }}
                    </x-primary-button>

                </div>
            </form>
        </div>
    </x-modal>


    <x-modal name="addPeso-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Edit Description') }}
            </h2>
            <hr>
            <form method="POST" action="{{ route('addPesoAdmin') }}">
                @csrf
                <div class="flex flex-col mt-2">

                    <div class="flex flex-col mt-2 w-full">
                        <x-input-label for="addPESOMun" :value="__('Municipality')" />
                        <select id="addPESOMun" name="addPESOMun" required class="block mt-1 w-full">
                            <option value="" disabled selected>Select Municipality</option>

                            @foreach ($data['municipalities'] as $municipalities)
                                <option value="{{ $municipalities->municipality_id }}">
                                    {{ $municipalities->municipality_Name }}
                                </option>
                            @endforeach



                        </select>
                    </div>
                    <div class="flex flex-col mt-2 w-full">
                        <x-input-label for="addPESOEmail" :value="__('PESO Email')" />
                        <x-text-input id="addPESOEmail" name="addPESOEmail" class="block mt-1 w-full" type="email"
                            required />
                    </div>
                    <div class="flex flex-col mt-2 w-full">
                        <x-input-label for="addPwd" :value="__('PESO Password')" />
                        <x-text-input id="addPwd" name="addPwd" class="block mt-1 w-full" type="password"
                            required />
                    </div>

                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button class="ms-3" type="submit">
                        {{ __('Save') }}
                    </x-primary-button>

                </div>
            </form>
        </div>
    </x-modal>

    {{-- @if (session('success'))
        <script>
            window.dispatchEvent(new CustomEvent('open-modal', {
                detail: 'success-modal'
            }));
        </script>
    @endif --}}

    <x-modal name="success-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Success!') }}
            </h2>
            <hr>

            <div class="flex flex-col mt-2">
                <p class="mt-1 text-sm text-gray-600">
                    {{ session('success') }}
                </p>

            </div>
            <div class="mt-6 flex justify-end">
                <x-primary-button x-on:click="$dispatch('close')">
                    {{ __('Close') }}
                </x-primary-button>
            </div>
        </div>
    </x-modal>

    <x-modal name="error-modal" focusable>
        <div class="w-full max-w-4xl px-6 py-6 items-center border-b">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Success!') }}
            </h2>
            <hr>

            <div class="flex flex-col mt-2">
                <p class="mt-1 text-sm text-gray-600">
                    {{ session('error') }}
                </p>

            </div>
            <div class="mt-6 flex justify-end">
                <x-primary-button x-on:click="$dispatch('close')">
                    {{ __('Close') }}
                </x-primary-button>
            </div>
        </div>
    </x-modal>


    @if (session('success'))
        <script>
            window.onload = function() {
                window.dispatchEvent(new CustomEvent('open-modal', {
                    detail: 'success-modal'
                }));
            };
        </script>
    @elseif (session('error'))
        <script>
            window.onload = function() {
                window.dispatchEvent(new CustomEvent('open-modal', {
                    detail: 'error-modal'
                }));
            };
        </script>
    @endif



</x-app-layout>
<script>
    function successModal() {
        window.dispatchEvent(new CustomEvent('open-modal', {
            detail: 'success-modal' // Assuming $name holds the modal name
        }));
    }
</script>
