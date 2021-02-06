<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
        <div class="grid grid-cols-1 gap-8 items-start lg:grid-cols-3">
            <div class="grid grid-cols-1 gap-8 lg:col-span-2 order-2 lg:order-1">
                <div class="flex flex-col space-y-4">
                    <div class="shadow-md overflow-hidden sm:rounded-xl bg-white divide-y divide-gray-200">
                        <x-table>
                            <x-slot name="head">
                                <x-table.heading sortable wire:click="sortBy('name')" :direction="$sorts['name'] ?? null" class="flex-1">Name</x-table.heading>
                                <x-table.heading sortable wire:click="sortBy('role')" :direction="$sorts['role'] ?? null" class="flex-1">Role</x-table.heading>
                                <x-table.heading class="flex flex-1 justify-center">Exchange Access</x-table.heading>
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
                                    <x-table.cell class="text-center">
                                        @if ($user->is_exchange_author)
                                            @svg('fluent-checkmark-circle', 'h-6 w-6 text-green-500 mx-auto')
                                        @else
                                            @svg('fluent-block', 'h-6 w-6 text-red-500 mx-auto')
                                        @endif
                                    </x-table.cell>
                                    <x-table.cell>
                                        @can('update', $user)
                                            <x-button wire:click="edit({{ $user->id }})" color="gray-text">
                                                @svg('fluent-edit', 'h-6 w-6')
                                            </x-button>
                                        @endcan
                                    </x-table.cell>
                                </x-table.row>
                                @endforeach
                            </x-slot>
                        </x-table>

                        @if ($users->total() > $users->perPage())
                            <div class="px-6 py-3 bg-gray-50">
                                {{ $users->links() }}
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 order-1 lg:order-2">
                <section aria-labelledby="filters-title">
                    <div class="sm:rounded-xl bg-white overflow-hidden shadow-md">
                        <div class="p-6">
                            <div class="space-y-6">
                                <x-input.group label="Filter by name or email" for="search">
                                    <x-input.text wire:model="filters.search" placeholder="Find a user by name or email..." />
                                </x-input.group>

                                <x-input.group label="Role">
                                    <div class="flex flex-col space-y-2">
                                        <x-input.checkbox for="role_admin" wire:model="filters.role" value="admin">
                                            <x-slot name="label"><x-badge color="amber">Admin</x-badge></x-slot>
                                        </x-input.checkbox>
                                        <x-input.checkbox for="role_staff" wire:model="filters.role" value="staff">
                                            <x-slot name="label"><x-badge color="purple">Staff</x-badge></x-slot>
                                        </x-input.checkbox>
                                        <x-input.checkbox for="role_user" wire:model="filters.role" value="user">
                                            <x-slot name="label"><x-badge color="gray">User</x-badge></x-slot>
                                        </x-input.checkbox>
                                    </div>
                                </x-input.group>

                                <x-input.group label="Nova Exchange access" for="exchange">
                                    <x-input.select id="exchange" wire:model="filters.exchange">
                                        <option value="">All users</option>
                                        <option value="true">Only users with access</option>
                                        <option value="false">Only users without access</option>
                                    </x-input.select>
                                </x-input.group>

                                {{-- <x-input.group>
                                    <x-input.toggle wire:model="filters.exchange">
                                        Has Nova Exchange access
                                    </x-input.toggle>
                                </x-input.group> --}}

                                <x-button class="w-full justify-center" wire:click="resetFilters">Reset Filters</x-button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <x-slideover wire:model="showEditSlideover" :title="optional($editing)->name" subtitle="Get started by filling in the information below to create your new project.">
        <x-slot name="content">
            <div class="space-y-6 pt-6 pb-5">
                <x-input.group label="Name" for="name" :error="$errors->first('name')">
                    <x-input.text id="name" wire:model="editing.name" />
                </x-input.group>

                <x-input.group label="Email Address" for="email" :error="$errors->first('email')">
                    <x-input.email id="email" wire:model="editing.email" />
                </x-input.group>

                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                        wire:model="photo"
                        x-ref="photo"
                        x-on:change="
                            photoName = $refs.photo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.photo.files[0]);
                        " />

                    <x-jet-label for="photo" value="{{ __('Photo') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ optional($editing)->profile_photo_url }}" alt="{{ optional($editing)->name }}" class="squircle h-20 w-20 object-cover">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview">
                        <span class="block squircle w-20 h-20"
                            x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-button class="mt-2 mr-2" x-on:click.prevent="$refs.photo.click()">Select a New Photo</x-button>

                    @if (optional($editing)->profile_photo_path)
                        <x-button class="mt-2" wire:click="deleteProfilePhoto">Remove Photo</x-button>
                    @endif

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>
            @endif
            </div>

            <div class="space-y-6 pt-6 pb-5">
                @can('updateRole', $editing)
                <x-input.group label="Role" for="role">
                    <x-input.select id="role" wire:model="editing.role">
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                        <option value="user">User</option>
                    </x-input.select>
                </x-input.group>
                @endcan

                <fieldset>
                    <legend class="text-sm font-medium text-gray-900">
                        Permissions
                    </legend>
                    <div class="mt-2 space-y-5">
                        <x-input.checkbox label="Exchange Author" for="is_exchange_author" wire:model="editing.is_exchange_author" />
                    </div>
                </fieldset>
            </div>

            <div class="space-y-4 pt-6 pb-5">
                <h2 class="text-lg font-medium">Delete account?</h2>

                <p class="text-sm leading-6 text-gray-600">Once this account is deleted, all of its resources and data will be permanently deleted. Before deleting the account, please verify this is the correct account and you have downloaded any data or information that should be retained.</p>

                <x-button color="red-soft">Delete account</x-button>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button @click="show = false">Cancel</x-button>
            <x-button color="dark" wire:click="save">Save</x-button>
        </x-slot>
    </x-slideover>
</div>