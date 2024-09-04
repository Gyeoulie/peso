<div class="container mx-auto py-8">
    <div class="grid grid-cols-4 sm:grid-cols-12 gap-4 p-3 sm:p-0">

        <div class="col-span-4 sm:col-span-12">
            <h1 class="text-2xl font-bold">Maintenance / Audit Logs</h1>
        </div>

        <div class="col-span-4 sm:col-span-12">
            <div wire:poll class="bg-white shadow rounded-lg p-6" x-data="{
                openTab: 1,
                activeClasses: 'text-gray-900 bg-gray-400 active',
                inactiveClasses: 'bg-gray-100 hover:text-gray-700 hover:bg-gray-50'
            }">


                <div class="relative overflow-x-auto p-1">



                    {{-- TABLE --}}
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-1/4">
                                    Backup
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($files as $file)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        {{ $file['name'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $file['date'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button wire:click="restoreDatabase('{{ $file['path'] }}')"
                                            class="text-blue-500 hover:text-blue-700">
                                            Restore
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <div class="flex flex-col items-center justify-center mt-24 mb-24">
                                            <div class="p-6 bg-gray-100 rounded-full">
                                                <svg class="w-24 h-24 text-black" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                                </svg>
                                            </div>
                                            <p class="text-xl font-bold text-black text-center mt-2">
                                                No backups available!
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>



                </div>

                {{-- PAGINATION --}}
                <div class="mt-4">
                    {{-- {{ $audits->links('vendor.livewire.tailwind') }} --}}
                </div>

            </div>



        </div>

    </div>
</div>
