<x-admin-layout>

    <div class="container mx-auto py-8">

        {{-- GRID --}}
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

            {{-- TITLE --}}
            <div class="col-span-4 sm:col-span-12">
                <h1 class="text-2xl font-bold">Location Management </h1>
            </div>

            {{-- TABLE CONTAINER --}}
            <div class="col-span-4 sm:col-span-6">
                <div class="bg-white shadow rounded-lg p-6">

                    @livewire('location-management-admin.location-table')


                </div>

            </div>


            @livewire('location-management-admin.add-locations')
        </div>
    </div>

    @livewire('location-management-admin.municipality-modal')
    @livewire('location-management-admin.province-modal')
    @livewire('location-management-admin.baredit-modal')
    @livewire('location-management-admin.munedit-modal')
    @livewire('location-management-admin.provedit-modal')



</x-admin-layout>
