<div class="lg:flex">
    <x-nav>
        <div>
            <div class="px-3">
                <x-input.field>
                    <x-slot name="leadingAddOn">
                        @svg('fluent-search', 'h-5 w-5 text-gray-400')
                    </x-slot>

                    <input type="text" wire:model="filters.search" class="appearance-none bg-transparent border-none p-0 focus:outline-none focus:ring-0 block w-ful text-sm" placeholder="Find an add-on...">

                    @if ($filters['search'])
                        <x-slot name="trailingAddOn">
                            <x-button wire:click="$set('filters.search', '')" size="none" color="gray-text">
                                @svg('fluent-dismiss-filled', 'h-4 w-4')
                            </x-button>
                        </x-slot>
                    @endif
                </x-input.field>
            </div>
        </div>

        <div>
            <h5 class="px-3 mb-3 lg:mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">
                Type
            </h5>

            <ul class="space-y-1">
                <li class="px-3 relative flex items-center">
                    <x-input.checkbox label="Themes" for="type_theme" wire:model="filters.type" value="theme" />
                </li>
                <li class="px-3 relative flex items-center">
                    <x-input.checkbox label="Extensions" for="type_extension" wire:model="filters.type" value="extension" />
                </li>
                <li class="px-3 relative flex items-center">
                    <x-input.checkbox label="Rank Images" for="type_rank" wire:model="filters.type" value="rank" />
                </li>
                <li class="px-3 relative flex items-center">
                    <x-input.checkbox label="Genres" for="type_genre" wire:model="filters.type" value="genre" />
                </li>
            </ul>
        </div>

        <div>
            <h5 class="px-3 mb-3 lg:mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">
                Nova Version
            </h5>

            <div class="px-3 space-y-4">
                <div class="flex flex-col space-y-0.5">
                    <label class="font-medium">Minimum</label>
                    <x-input.select wire:model="filters.min-version" class="text-sm">
                        <option value="">All versions</option>
                        <option value="2.6.1">v2.6.1</option>
                        <option value="3.0.0">v3.0</option>
                        <option value="3.0.1">v3.0.1</option>
                        <option value="3.0.2">v3.0.2</option>
                        <option value="3.0.3">v3.0.3</option>
                    </x-input.select>
                </div>

                <div class="flex flex-col space-y-0.5">
                    <label class="font-medium">Maximum</label>
                    <x-input.select wire:model="filters.max-version" class="text-sm">
                        <option value="">All versions</option>
                        <option value="2.6.1">v2.6.1</option>
                        <option value="3.0.0">v3.0</option>
                        <option value="3.0.1">v3.0.1</option>
                        <option value="3.0.2">v3.0.2</option>
                        <option value="3.0.3">v3.0.3</option>
                    </x-input.select>
                </div>
            </div>
        </div>

        <div>
            <h5 class="px-3 mb-3 lg:mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">
                Average Rating
            </h5>

            <ul class="space-y-1.5">
                <li class="relative px-2">
                    <button class="flex items-center focus:outline-none focus:ring-0 rounded px-1 py-1 {{ $filters['rating'] === 4 ? 'bg-gray-200' : false }}" wire:click="$set('filters.rating', 4)">
                        @svg('fluent-star-filled', 'h-5 w-5 text-amber-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-amber-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-amber-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-amber-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-gray-400')
                        <span class="ml-1 text-gray-500 font-medium">&amp; up</span>
                    </button>
                </li>
                <li class="relative px-2">
                    <button class="flex items-center focus:outline-none focus:ring-0 rounded px-1 py-1 {{ $filters['rating'] === 3 ? 'bg-gray-200' : false }}" wire:click="$set('filters.rating', 3)">
                        @svg('fluent-star-filled', 'h-5 w-5 text-amber-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-amber-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-amber-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-gray-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-gray-400')
                        <span class="ml-1 text-gray-500 font-medium">&amp; up</span>
                    </button>
                </li>
                <li class="relative px-2">
                    <button class="flex items-center focus:outline-none focus:ring-0 rounded px-1 py-1 {{ $filters['rating'] === 2 ? 'bg-gray-200' : false }}" wire:click="$set('filters.rating', 2)">
                        @svg('fluent-star-filled', 'h-5 w-5 text-amber-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-amber-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-gray-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-gray-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-gray-400')
                        <span class="ml-1 text-gray-500 font-medium">&amp; up</span>
                    </button>
                </li>
                <li class="relative px-2">
                    <button class="flex items-center focus:outline-none focus:ring-0 rounded px-1 py-1 {{ $filters['rating'] === 1 ? 'bg-gray-200' : false }}" wire:click="$set('filters.rating', 1)">
                        @svg('fluent-star-filled', 'h-5 w-5 text-amber-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-gray-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-gray-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-gray-400')
                        @svg('fluent-star-filled', 'h-5 w-5 text-gray-400')
                        <span class="ml-1 text-gray-500 font-medium">&amp; up</span>
                    </button>
                </li>
            </ul>
        </div>

        <div>
            <x-button class="w-full justify-center" wire:click="resetFilters">Reset filters</x-button>
        </div>
    </x-nav>

    <div id="content-wrapper" class="min-w-0 w-full flex-auto lg:static lg:max-h-full lg:overflow-visible">
        <div class="pt-10 pb-24 lg:pb-16 w-full flex">
            <div class="min-w-0 flex-auto px-4 sm:px-6 xl:px-8">
                <div class="flex items-center justify-between mb-8 sm:mb-10">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl leading-none font-extrabold tracking-tight text-gray-900">Nova Exchange</h1>

                    <x-dropdown trigger-color="dark-gray-text" trigger-size="sm" placement="bottom-end">
                        <x-slot name="trigger">
                            <div class="flex items-center space-x-2">
                                @svg('fluent-arrow-sort', 'h-6 w-6')
                                @if ($sortField === 'created_at')
                                    <span>Sorted by newest</span>
                                @elseif ($sortField === 'updated_at')
                                    <span>Sorted by recently updated</span>
                                @elseif ($sortField === 'rating')
                                    <span>Sorted by highest rated</span>
                                @elseif ($sortField === 'downloads')
                                    <span>Sorted by most popular</span>
                                @endif
                            </div>
                        </x-slot>

                        <x-dropdown.group>
                            <x-dropdown.item type="button" icon="fluent-asterisk" wire:click="setSortField('created_at')">
                                <div class="flex items-center justify-between w-full">
                                    <span>Newest</span>
                                    @if ($sortField === 'created_at')
                                        @svg('fluent-checkmark-circle', 'h-6 w-6 text-amber-500')
                                    @endif
                                </div>
                            </x-dropdown.item>
                            <x-dropdown.item type="button" icon="fluent-clock" wire:click="setSortField('updated_at')">
                                <div class="flex items-center justify-between w-full">
                                    <span>Recently updated</span>
                                    @if ($sortField === 'updated_at')
                                        @svg('fluent-checkmark-circle', 'h-6 w-6 text-amber-500')
                                    @endif
                                </div>
                            </x-dropdown.item>
                            <x-dropdown.item type="button" icon="fluent-star" wire:click="setSortField('rating')">
                                <div class="flex items-center justify-between w-full">
                                    <span>Highest rated</span>
                                    @if ($sortField === 'rating')
                                        @svg('fluent-checkmark-circle', 'h-6 w-6 text-amber-500')
                                    @endif
                                </div>
                            </x-dropdown.item>
                            <x-dropdown.item type="button" icon="fluent-flash" wire:click="setSortField('downloads')">
                                <div class="flex items-center justify-between w-full">
                                    <span>Most popular</span>
                                    @if ($sortField === 'downloads')
                                        @svg('fluent-checkmark-circle', 'h-6 w-6 text-amber-500')
                                    @endif
                                </div>
                            </x-dropdown.item>
                        </x-dropdown.group>
                    </x-dropdown>
                </div>

                <div class="space-y-6">
                    <div class="grid gap-x-6 gap-y-12 max-w-lg mx-auto md:grid-cols-2 xl:grid-cols-3 md:max-w-none">
                        @forelse ($addons as $addon)
                            <x-card :image="Storage::url('images/brian-mcgowan-DsYv1KJHrlE-unsplash.jpg')">
                                <x-badge :color="$addon->type_color">{{ ucfirst($addon->type) }}</x-badge>

                                <div class="mt-1 font-extrabold text-gray-900 tracking-tight text-xl">{{ ucfirst($addon->name) }}</div>

                                <div class="mt-1 flex items-center">
                                    <x-ratings :rating="$addon->rating" />

                                    <span class="ml-2 text-gray-500 font-medium text-sm">{{ mt_rand(10, 50) }}</span>
                                </div>

                                <x-slot name="footer">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="squircle overflow-hidden ring ring-white bg-white">
                                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80" alt="" class="h-10 w-10">
                                            </div>
                                            <span class="text-gray-700 font-medium">{{ $addon->user->name }}</span>
                                        </div>

                                        <div class="flex items-center space-x-4">
                                            <a href="#" class="text-gray-400 hover:text-amber-500 transition ease-in-out duration-150">
                                                @svg('fluent-cloud-download', 'h-6 w-6')
                                            </a>
                                            <a href="#" class="text-gray-400 hover:text-amber-500 transition ease-in-out duration-150">
                                                @svg('fluent-arrow-right-circle', 'h-6 w-6')
                                            </a>
                                        </div>
                                    </div>
                                </x-slot>
                            </x-card>
                        @empty
                            No add-ons found.
                        @endforelse
                    </div>

                    <div>
                        {{ $addons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>