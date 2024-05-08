<x-admin-layout>


    <div class="container mx-auto py-8">

        {{-- CONTIANER --}}
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

            {{-- TITLE --}}
            <div class="col-span-4 sm:col-span-12">
                <h1 class="text-2xl font-bold ">Management</h1>
            </div>

            {{-- JOB POSITION CONTAINER --}}
            <div class="col-span-4 sm:col-span-6">
                @livewire('admin.position-industry.position-table')

            </div>



            {{-- INDUSTRY CONTAINER --}}
            <div class="col-span-4 sm:col-span-6">
                @livewire('admin.position-industry.industry-table')

            </div>


        </div>

    </div>


    {{-- JOB POSITION MODAL --}}
    @livewire('admin.position-industry.position-add-modal')
    @livewire('admin.position-industry.position-edit-modal')

    {{-- INDUSTRY MODAL --}}
    @livewire('admin.position-industry.industry-add-modal')
    @livewire('admin.position-industry.industry-edit-modal')




</x-admin-layout>
