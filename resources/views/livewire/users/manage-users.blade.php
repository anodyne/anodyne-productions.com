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

                                @if (config('services.anodyne.exchange'))
                                    <x-table.heading class="flex-1">Nova Exchange</x-table.heading>
                                @endif

                                @if (config('services.anodyne.galaxy'))
                                    <x-table.heading class="flex-1">Galaxy</x-table.heading>
                                @endif
                                <x-table.heading />
                            </x-slot>

                            <x-slot name="body">
                                @foreach ($users as $user)
                                <x-table.row>
                                    <x-table.cell>
                                        <div class="flex items-center">
                                            <div class="shrink-0 h-10 w-10">
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

                                    @if (config('services.anodyne.exchange'))
                                        <x-table.cell class="text-center">
                                            @if ($user->is_exchange_author)
                                                @svg('fluent-checkmark-circle', 'h-6 w-6 text-green-500 mx-auto')
                                            @else
                                                @svg('fluent-block', 'h-6 w-6 text-red-500 mx-auto')
                                            @endif
                                        </x-table.cell>
                                    @endif

                                    @if (config('services.anodyne.galaxy'))
                                        <x-table.cell class="text-center">
                                            @svg('fluent-checkmark-circle', 'h-6 w-6 text-green-500 mx-auto')
                                        </x-table.cell>
                                    @endif
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

                                @if (config('services.anodyne.exchange'))
                                    <x-input.group label="Nova Exchange access" for="exchange">
                                        <x-input.select id="exchange" wire:model="filters.exchange">
                                            <option value="">All users</option>
                                            <option value="true">Only users with access</option>
                                            <option value="false">Only users without access</option>
                                        </x-input.select>
                                    </x-input.group>
                                @endif

                                @if (config('services.anodyne.galaxy'))
                                    <x-input.group label="Galaxy access" for="galaxy">
                                        <x-input.select id="galaxy" wire:model="filters.galaxy">
                                            <option value="">All users</option>
                                            <option value="true">Only users with access</option>
                                            <option value="false">Only users without access</option>
                                        </x-input.select>
                                    </x-input.group>
                                @endif

                                <x-button class="w-full justify-center" wire:click="resetFilters">Reset Filters</x-button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <x-slideover wire:model.defer="showEditSlideover" :title="optional($editing)->name">
        <x-slot name="content">
            <div x-data="{ activeTab: 'user' }" x-on:slideover-opened.window="activeTab = 'user'">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button type="button" x-on:click.prevent="activeTab = 'user'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors ease-in-out duration-150" :class="{ 'border-orange-500 text-orange-600': activeTab === 'user', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'user' }">User Info</button>
                        <button type="button" x-on:click.prevent="activeTab = 'activity'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors ease-in-out duration-150" :class="{ 'border-orange-500 text-orange-600': activeTab === 'activity', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'activity' }">Activity Log</button>
                    </nav>
                </div>

                <div x-show="activeTab === 'user'" class="divide-y divide-gray-200">
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

                    @if (auth()->user()->can('updateRole', $editing) || auth()->user()->can('updatePermissions', $editing))
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

                        @can('updatePermissions', $editing)
                        <fieldset>
                            <legend class="text-sm font-medium text-gray-900">
                                Permissions
                            </legend>
                            <div class="flex flex-col mt-2 space-y-3">
                                @if (config('services.anodyne.exchange'))
                                    <x-input.checkbox label="Exchange Author" for="is_exchange_author" wire:model="editing.is_exchange_author" />
                                @endif

                                @if (config('services.anodyne.galaxy'))
                                    <x-input.checkbox label="Galaxy Author" for="is_galaxy_author" wire:model="editing.is_galaxy_author" />
                                @endif
                            </div>
                        </fieldset>
                        @endcan
                    </div>
                    @endif

                    @can('delete', $editing)
                    <div class="space-y-4 pt-6 pb-5">
                        <h2 class="text-lg font-medium">Delete account?</h2>

                        <p class="text-sm leading-6 text-gray-600">Once this account is deleted, all of its resources and data will be permanently deleted. Before deleting the account, please verify this is the correct account and you have downloaded any data or information that should be retained.</p>

                        <x-button color="red-soft" wire:click="deleteUser">Delete account</x-button>
                    </div>
                    @endcan
                </div>

                <div x-show="activeTab === 'activity'">
                    @can('viewActivity', $editing)
                    <div class="space-y-6 pt-6 pb-5">
                        <div>
                            @if ($editing)
                                <dl class="space-y-4">
                                    @forelse (optional($editing)->activities->reverse() as $activity)
                                    <div class="space-y-1">
                                        <dt>{{ optional($activity->causer)->name ?? 'Anodyne System' }} {{ $activity->description }} {{ optional($activity->subject)->name }}'s account</dt>

                                        <dd class="flex items-center space-x-8 text-sm text-gray-500">
                                            <div class="flex items-center space-x-2">
                                                @svg('fluent-clock', 'h-5 w-5 text-gray-400')
                                                <span>{{ $activity->created_at->diffForHumans() }}</span>
                                            </div>
                                        </dd>

                                        @if ($activity->description === 'updated')
                                        <dd class="flex items-center space-x-8 text-sm text-gray-500">
                                            <div class="flex items-center space-x-2">
                                                @svg('fluent-edit-settings', 'h-5 w-5 text-gray-400 shrink-0')
                                                <span>{{ ucwords(str_replace('_', ' ', implode(', ', array_keys($activity->properties->get('attributes'))))) }}</span>
                                            </div>
                                        </dd>
                                        @endif
                                    </div>
                                    @empty
                                        No activity found
                                    @endforelse
                                </dl>
                            @endif
                        </div>
                    </div>
                    @endcan
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button @click="show = false">Cancel</x-button>
            <x-button color="dark" wire:click="save">Save</x-button>
        </x-slot>
    </x-slideover>
</div>