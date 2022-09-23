<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
        <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
            <div class="grid grid-cols-1 gap-8 lg:col-span-2">
                <div class="flex flex-col space-y-4">
                    <div class="shadow-md overflow-hidden sm:rounded-xl bg-white divide-y divide-gray-200">
                        <x-table>
                            <x-slot name="head">
                                <x-table.heading sortable wire:click="sortBy('name')" :direction="$sorts['name'] ?? null" class="w-full">Name</x-table.heading>
                                <x-table.heading sortable wire:click="sortBy('role')" :direction="$sorts['role'] ?? null" class="w-full">Role</x-table.heading>
                                <x-table.heading sortable wire:click="sortBy('exchange')" :direction="$sorts['exchange'] ?? null" class="w-full">Exchange Author</x-table.heading>
                                <x-table.heading />
                            </x-slot>

                            <x-slot name="body">
                                @foreach ($users as $user)
                                <x-table.row>
                                    <x-table.cell>
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 squircle" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $user->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <x-badge :color="$user->role_color">{{ ucfirst($user->role) }}</x-badge>
                                    </x-table.cell>
                                    <x-table.cell>
                                        {{ $user->is_exchange_author }}
                                    </x-table.cell>
                                    <x-table.cell>
                                        @can('update', $user)
                                            Edit
                                        @endcan
                                    </x-table.cell>
                                </x-table.row>
                                @endforeach
                            </x-slot>
                        </x-table>

                        <div class="px-6 py-3 bg-gray-50">
                            {{ $users->links() }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <section aria-labelledby="filters-title">
                    <div class="rounded-xl bg-white overflow-hidden shadow-md">
                        <div class="p-6">
                            <h2 class="text-base font-medium text-gray-900 mb-6" id="filters-title">Filters</h2>

                            <div class="space-y-8">
                                <div>
                                    <label for="email" class="sr-only block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <div>
                                        <x-input.text wire:model="filters.search" placeholder="Find a user by name or email..." />
                                    </div>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                                    <div class="flex flex-col space-y-2">
                                        <x-input.checkbox label="Admin" checked />
                                        <x-input.checkbox label="Staff" checked />
                                        <x-input.checkbox label="User" checked />
                                    </div>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Permissions</label>
                                    <div class="flex flex-col space-y-2">
                                        <x-input.checkbox label="Exchange Author" checked />
                                        <x-input.checkbox label="Galaxy Author" checked />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>