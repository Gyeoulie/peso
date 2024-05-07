<x-admin-layout>

    <div class="container mx-auto py-8">

        {{-- GRID --}}
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

            {{-- TITLE --}}
            <div class="col-span-4 sm:col-span-12">
                <h1 class="text-2xl font-bold">Certificates</h1>
            </div>

            <div class="col-span-4 sm:col-span-6">
                @livewire('certificates-admin.certificates-table')
            </div>




            <div class="col-span-4 sm:col-span-6">
                @livewire('certificates-admin.certificates-add')
            </div>




        </div>
    </div>

    @livewire('certificates-admin.certificates-edit')

</x-admin-layout>
