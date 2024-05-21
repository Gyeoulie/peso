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


                @livewire('admin.location-management.location-table')




            </div>


            @livewire('admin.location-management.add-locations')
        </div>
    </div>

    @livewire('admin.location-management.mun-modal')
    @livewire('admin.location-management.prov-modal')
    @livewire('admin.location-management.bar-edit-modal')
    @livewire('admin.location-management.mun-edit-modal')
    @livewire('admin.location-management.prov-edit-modal')



</x-admin-layout>
