<div class="relative ">

    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">

        <label for="table-search" class="sr-only">Search</label>

        <div class="relative">

            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            {{-- SEARCH --}}
            <input type="text" wire:model.live.prevent="search" id="table-search-users"
                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Search for users">
        </div>
        {{-- ADD BUTTON --}}
        <div>
            <button type="button"
                class="inline-flex text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 focus:outline-none"
                x-data="" x-on:click.prevent="$dispatch('open-modal', 'admin-modal')">Create an
                Account</button>
        </div>

    </div>

    {{-- REQUIREMENT TABLE --}}
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Admin ID
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Admin Type
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Date Created
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Date Updated
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adminAccounts as $account)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td scope="row" class="px-6 py-4 text-gray-900 text-center w-1/6">

                        <div class="ps-3 text-wrap text-center ">
                            <div class="text-base font-semibold text-center">{{ $account->email }}</div>

                        </div>

                    </td>
                    <td class="px-6 py-4">
                        <div class="text-base font-semibold text-center">{{ $account->id }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-base font-semibold text-center">{{ $account->usertype }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-base font-semibold text-center">
                            {{ $account->created_at->format('h:i A ') }}
                        </div>
                        <div class="text-base font-semibold text-center">
                            {{ $account->created_at->format('F j Y') }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-base font-semibold text-center">
                            {{ $account->updated_at->format('h:i A') }}

                        </div>
                        <div class="text-base font-semibold text-center">
                            {{ $account->updated_at->format('F j Y') }}
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="" wire:click.prevent="editUser({{ $account->id }})"
                            class="font-medium text-blue-600 hover:underline">Edit</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="mt-4">

        {{ $adminAccounts->links() }}
    </div>
    
</div>
