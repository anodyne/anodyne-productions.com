<x-addons-list-layout
  title="Make Nova your own"
  description="Nova provides the flexibility to make your game stand out from others. Whether you're trying to change the way it looks with a theme or rank set or even update how it works with an extension, the community's talented add-on authors here have you covered."
  eyebrow="Add-ons"
>
  <x-slot:sidebar>
    <div class="space-y-8">
      <div>
        <x-input.text placeholder="Search for add-ons..." wire:model.debounce.500ms="search">
          @if (filled($filters['search']))
            <x-slot:trailingAddOn>
              <button wire:click="$set('filters.search', '')">
                @svg('flex-delete-circle', 'h-4 w-4')
              </button>
            </x-slot:trailingAddOn>
          @endif
        </x-input.text>
      </div>

      <div>
        <h2 class="text-xs font-semibold text-slate-900 dark:text-white">
          Version
        </h2>

        <div class="relative mt-3 pl-2">
          <ul class="space-y-1">
            @foreach ($this->products as $id => $name)
              <li class="relative flex items-center">
                <x-input.checkbox :label="$name" id="product_{{ $id }}" wire:model="filters.products" :value="$id" />
              </li>
            @endforeach
          </ul>
        </div>
      </div>

      <div>
        <h2 class="text-xs font-semibold text-slate-900 dark:text-white">
          Type
        </h2>

        <div class="relative mt-3 pl-2">
          <ul class="space-y-1">
            @foreach (App\Enums\AddonType::cases() as $type)
              <li class="relative flex items-center">
                <x-input.checkbox :label="$type->displayName()" id="type_{{ $type->value }}" wire:model="filters.types" :value="$type->value" />
              </li>
            @endforeach
          </ul>
        </div>
      </div>

      {{-- <div>
        <h2 class="text-xs font-semibold text-slate-900 dark:text-white">
          Compatibility
        </h2>

        <div class="relative mt-3 pl-2">
          @php
            $compat = App\Enums\CompatibilityStatus::class
          @endphp
          <ul class="space-y-1">
            <li class="relative flex items-center">
              <x-input.checkbox :label="$compat::compatible->displayName()" id="compat_series_{{ $compat::compatible->value }}" :value="$compat::compatible->value" wire:model="filters.compat_status" />
            </li>
            <li>
              <x-input.checkbox :label="$compat::incompatible->displayName()" id="compat_series_{{ $compat::incompatible->value }}" :value="$compat::incompatible->value" wire:model="filters.compat_status" />
            </li>
            <li>
              <x-input.checkbox :label="$compat::unknown->displayName()" id="compat_series_{{ $compat::unknown->value }}" :value="$compat::unknown->value" wire:model="filters.compat_status" />
            </li>
          </ul>

          <ul class="space-y-1 mt-4">
            @foreach (App\Models\ReleaseSeries::get()->pluck('name', 'id') as $id => $name)
              <li class="relative flex items-center">
                <x-input.checkbox :label="$name" id="compat_series_{{ $id }}" :value="$id" wire:model="filters.compat_series" />
              </li>
            @endforeach
          </ul>
        </div>
      </div> --}}

      <div>
        <x-button class="w-full" variant="secondary" size="sm" wire:click="resetFilters">Reset filters</x-button>
      </div>
    </div>
  </x-slot:sidebar>

  <div class="block lg:hidden mb-8" x-data="{ open: false }">
    <x-button @click="open = !open" variant="primary" class="w-full">
      <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" class="h-5 w-5"><path stroke="currentColor" stroke-linejoin="round" d="M11.5518 1.31079C8.47592 0.989562 5.52397 0.989566 2.44805 1.31091C1.18438 1.44293 0.388506 2.73124 0.9895 3.85066C1.95727 5.65323 3.33709 7.32436 5.27247 8.58037V12.0129C5.27247 12.7328 6.01032 13.2168 6.6707 12.9301L8.12579 12.2984C8.49117 12.1398 8.72756 11.7795 8.72756 11.3811V8.58023C10.6629 7.32415 12.0427 5.65308 13.0105 3.85054C13.6115 2.7311 12.7056 1.43128 11.5518 1.31079Z"></path></svg>

        <span>Toggle filters</span>
      </div>
    </x-button>

    <div class="mt-6 grid grid-cols-1 gap-6" x-show="open" x-cloak x-collapse>
      <div>
        <x-input.text placeholder="Search for add-ons..." wire:model.debounce.500ms="search">
          @if (filled($filters['search']))
            <x-slot:trailingAddOn>
              <button wire:click="$set('filters.search', '')">
                @svg('flex-delete-circle', 'h-4 w-4')
              </button>
            </x-slot:trailingAddOn>
          @endif
        </x-input.text>
      </div>

      <div>
        <h2 class="text-xs font-semibold text-slate-900 dark:text-white">
          Version
        </h2>

        <div class="relative mt-3 pl-2">
          <ul class="space-y-1">
            @foreach ($this->products as $id => $name)
              <li class="relative flex items-center">
                <x-input.checkbox :label="$name" id="product_{{ $id }}" wire:model="filters.products" :value="$id" />
              </li>
            @endforeach
          </ul>
        </div>
      </div>

      <div>
        <h2 class="text-xs font-semibold text-slate-900 dark:text-white">
          Type
        </h2>

        <div class="relative mt-3 pl-2">
          <ul class="space-y-1">
            @foreach (App\Enums\AddonType::cases() as $type)
              <li class="relative flex items-center">
                <x-input.checkbox :label="$type->displayName()" id="type_{{ $type->value }}" wire:model="filters.types" :value="$type->value" />
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div @class([
    'grid',
    'grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-x-6 gap-y-12' => $this->addons->count() > 0,
    'grid-cols-1' => $this->addons->count() === 0,
  ])>
    @forelse ($this->addons as $addon)
      <a href="{{ route('addons.show', $addon) }}" class="flex flex-col bg-white dark:bg-slate-800 overflow-hidden shadow hover:shadow-lg dark:shadow-lg rounded-xl ring-1 ring-slate-900/5 transition">
        <div class="relative">
          @if ($addon->getMedia('primary-preview')->count() === 1)
            <img src="{{ $addon->getFirstTemporaryUrl(now()->addMinutes(5), 'primary-preview') }}" alt="" class="w-full h-56 bg-cover">
          @else
            <div class="bg-slate-300 dark:bg-slate-700 flex items-center justify-center px-6 py-16">
              <x-logos.nova.mark class="text-slate-400 dark:text-slate-600 h-24 w-auto" :colors="false"></x-logos.nova.mark>
            </div>
          @endif
        </div>

        <div class="flex-1 w-full px-4 py-5 sm:p-6">
          <h2 class="font-extrabold text-slate-900 dark:text-white tracking-tight text-lg">
            {{ ucfirst($addon->name) }}
          </h2>
          <div class="mt-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
              <div class="squircle overflow-hidden ring ring-white bg-white">
                <img src="{{ $addon->user->getFirstMediaUrl('avatar') }}" alt="" class="h-10 w-10">
              </div>
              <span class="text-slate-700 dark:text-slate-300 font-medium">{{ $addon->user->name }}</span>
            </div>
          </div>
        </div>
        <div class="px-4 py-4 sm:px-6 bg-slate-50 dark:bg-slate-900/50 border-t border-slate-900/5 space-x-2.5 flex items-center">
          <x-badge size="xs" :color="$addon->type->badgeColor()" fill="neutral">
            <x-slot:leading>
              @svg($addon->type->icon(), 'h-4 w-4')
            </x-slot:leading>
            {{ $addon->type->displayName() }}
          </x-badge>

          @foreach ($addon->products as $product)
            <div>
              <x-badge size="xs" fill="neutral">{{ $product->name }}</x-badge>
            </div>
          @endforeach
        </div>
      </a>
    @empty
      <div class="flex gap-2.5 rounded-2xl p-4 leading-6 border border-amber-500/20 bg-amber-50/50 text-amber-800 dark:border-amber-500/30 dark:bg-amber-500/5 dark:text-amber-200 max-w-3xl">
        @svg('flex-alert-diamond', 'h-6 w-6 flex-none')
        <div class="w-full">
          <h2 class="m-0 font-medium text-lg leading-6">No add-ons found</h2>
          <p class="prose dark:prose-invert mt-2.5 text-amber-700 dark:text-amber-300 prose-strong:text-amber-800 dark:prose-strong:text-amber-100">We couldn't find any add-ons that matched your search criteria. Please try a different search.</p>
        </div>
      </div>
    @endforelse
  </div>

  <div class="mt-12">
    {{ $this->addons->links() }}
  </div>
</x-addons-list-layout>