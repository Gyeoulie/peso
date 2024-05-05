<x-admin-layout>

    <div class="container mx-auto py-8">

        {{-- GRID --}}
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-4">

            {{-- TITLE --}}
            <div class="col-span-4 sm:col-span-12">
                <h1 class="text-2xl font-bold">Admin Accounts (BALIWAG)</h1>
            </div>

            <div class="col-span-4 sm:col-span-12">
                <div class="bg-white shadow rounded-lg p-6">


                    @livewire('account-management-admin.account-table')


                </div>

            </div>

        </div>
    </div>

    @livewire('account-management-admin.editmodal');

    @livewire('account-management-admin.modal');

</x-admin-layout>
