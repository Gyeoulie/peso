<x-admin-layout>

    <div class="container mx-auto py-8">
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">
            <div class="col-span-4 sm:col-span-12">
                <h1 class="text-2xl font-bold">Management</h1>
            </div>


            <div class="col-span-4 sm:col-span-6">
                @livewire('eligibility-license.eligibility-table')

            </div>




            <div class="col-span-4 sm:col-span-6">
                @livewire('eligibility-license.license-table')
            </div>
        </div>




        {{-- ELIGIBILITY MODAL --}}
        @livewire('eligibility-license.eligibility-add-modal')
        @livewire('eligibility-license.eligibility-edit-modal')


        {{-- LICENSE MODAL --}}
        @livewire('eligibility-license.license-add-modal')
        @livewire('eligibility-license.license-edit-modal')


</x-admin-layout>
