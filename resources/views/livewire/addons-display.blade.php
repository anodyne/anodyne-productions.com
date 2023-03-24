<x-addons-display-layout :title="$addon->name" :type="$addon->type->displayName()">
  <!-- Product -->
  <div class="lg:grid lg:grid-cols-7 lg:grid-rows-1 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
    <!-- Product image -->
    <div class="lg:col-span-4 lg:row-end-1" x-data="{ image: 0 }">
      <div class="aspect-w-4 aspect-h-3 overflow-hidden rounded-xl bg-slate-100 dark:bg-slate-800">
        @if ($addon->getMedia('primary-preview')->count() === 1)
          <img src="{{ $addon->getFirstMediaUrl('primary-preview') }}" alt="" class="object-cover object-center" x-show="image === 0" x-cloak>
        @else
          <div class="bg-slate-300 dark:bg-slate-800 flex items-center justify-center">
            <x-logos.nova.mark class="text-slate-400 dark:text-slate-700 h-60 w-auto" :colors="false"></x-logos.nova.mark>
          </div>
        @endif

        @if ($addon->getMedia('additional-previews')->count() > 0)
          @foreach ($addon->getMedia('additional-previews') as $preview)
            <img src="{{ $preview->getUrl() }}" alt="" class="object-cover object-center" x-show="image === {{ $loop->iteration }}" x-cloak>
          @endforeach
        @endif
      </div>

      @if ($addon->getMedia('additional-previews')->count() > 0)
        <div class="grid grid-cols-5 gap-6 mt-6 px-1.5">
          <button
            type="button"
            class="aspect-w-4 aspect-h-3 overflow-hidden rounded-lg bg-slate-100 dark:bg-slate-800"
            :class="{ 'ring-2 ring-purple-500 ring-offset-4 ring-offset-white dark:ring-offset-slate-900': image === 0 }"
            @click="image = 0"
          >
            <img src="{{ $addon->getFirstMediaUrl('primary-preview') }}" alt="" class="object-cover object-center">
          </button>

          @foreach ($addon->getMedia('additional-previews') as $preview)
            <button
              type="button"
              class="aspect-w-4 aspect-h-3 overflow-hidden rounded-lg bg-slate-100 dark:bg-slate-800"
              :class="{ 'ring-2 ring-purple-500 ring-offset-4 ring-offset-white dark:ring-offset-slate-900': image === {{ $loop->iteration }} }"
              @click="image = {{ $loop->iteration }}"
            >
              <img src="{{ $preview->getUrl() }}" alt="" class="object-cover object-center">
            </button>
          @endforeach
          {{-- <button
            type="button"
            class="aspect-w-4 aspect-h-3 overflow-hidden rounded-lg bg-slate-100 dark:bg-slate-800"
            :class="{ 'ring-2 ring-purple-500 ring-offset-4 ring-offset-white dark:ring-offset-slate-900': image === 2 }"
            @click="image = 2"
          >
            <img src="https://images.unsplash.com/photo-1614926857083-7be149266cda?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=512&q=80" alt="Sample of 30 icons with friendly and fun details in outline, filled, and brand color styles." class="object-cover object-center">
          </button>
          <button
            type="button"
            class="aspect-w-4 aspect-h-3 overflow-hidden rounded-lg bg-slate-100 dark:bg-slate-800"
            :class="{ 'ring-2 ring-purple-500 ring-offset-4 ring-offset-white dark:ring-offset-slate-900': image === 3 }"
            @click="image = 3"
          >
            <img src="https://images.unsplash.com/photo-1586348943529-beaae6c28db9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80" alt="Sample of 30 icons with friendly and fun details in outline, filled, and brand color styles." class="object-cover object-center">
          </button>
          <button
            type="button"
            class="aspect-w-4 aspect-h-3 overflow-hidden rounded-lg bg-slate-100 dark:bg-slate-800"
            :class="{ 'ring-2 ring-purple-500 ring-offset-4 ring-offset-white dark:ring-offset-slate-900': image === 4 }"
            @click="image = 4"
          >
            <img src="https://images.unsplash.com/photo-1497436072909-60f360e1d4b1?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=512&q=80" alt="Sample of 30 icons with friendly and fun details in outline, filled, and brand color styles." class="object-cover object-center">
          </button> --}}
        </div>
      @endif
    </div>

    <!-- Product details -->
    <div class="mx-auto mt-14 max-w-2xl sm:mt-16 lg:col-span-3 lg:row-span-2 lg:row-end-2 lg:mt-0 lg:max-w-none">
      <div class="flex flex-col-reverse">
        <div @class([
          'mt-4' => false
        ])>
          <h2 class="sr-only">Tags</h2>
          <div class="flex items-center space-x-2.5">
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

          <h1 class="mt-4 text-2xl font-bold tracking-tight text-slate-900 dark:text-white sm:text-3xl">{{ $addon->name }}</h1>

          <div class="flex items-center space-x-1.5 relative mt-2">
            <div class="text-slate-700 dark:text-slate-300 font-medium text-sm">
              Version

              @if ($this->versions->count() === 1)
                {{ $version->version}}
              @endif
            </div>

            @if ($this->versions->count() > 1)
              <x-dropdown class="w-40">
                <x-slot:trigger class="group relative inline-flex items-center justify-center rounded-full leading-none py-2 px-3 text-xs font-semibold bg-slate-200/60 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white transition">
                  <span>{{ $version->version }}</span>
                  <svg width="6" height="3" class="overflow-visible" aria-hidden="true"><path d="M0 0L3 3L6 0" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
                </x-slot:trigger>

                <x-dropdown.group>
                  @foreach ($addon->versions as $addonVersion)
                    <x-dropdown.item type="button" wire:click="setVersion({{ $addonVersion->id }})">
                      {{ $addonVersion->version }}
                    </x-dropdown.item>
                  @endforeach
                </x-dropdown.group>
              </x-dropdown>
            @endif
          </div>
        </div>

        <div class="hidden">
          <h3 class="sr-only">Reviews</h3>
          <div class="flex items-center">
            <!--
              Heroicon name: mini/star

              Active: "text-yellow-400", Default: "text-slate-300"
            -->
            <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
            </svg>

            <!-- Heroicon name: mini/star -->
            <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
            </svg>

            <!-- Heroicon name: mini/star -->
            <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
            </svg>

            <!-- Heroicon name: mini/star -->
            <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
            </svg>

            <!-- Heroicon name: mini/star -->
            <svg class="text-slate-300 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
            </svg>
          </div>
          <p class="sr-only">4 out of 5 stars</p>
        </div>
      </div>

      <p class="mt-6 text-slate-600 dark:text-slate-400">{{ $addon->description }}</p>

      <div class="mt-6 flex items-center space-x-3">
        <div class="squircle overflow-hidden ring ring-white bg-white">
          <img src="{{ $addon->user->getFirstMediaUrl('avatar') }}" alt="" class="h-10 w-10">
        </div>
        <span class="text-slate-700 dark:text-slate-300 font-medium">{{ $addon->user->name }}</span>
      </div>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
        <x-button type="button" wire:click="download" variant="primary">Download</x-button>
      </div>

      @if ($version->product->first()?->name !== 'Nova 1')
        <div class="mt-10 border-t border-slate-200 dark:border-slate-200/10 pt-10">
          <div class="flex items-center space-x-1">
            <h3 class="text-sm font-medium text-slate-900 dark:text-white">Compatibility</h3>
            <button type="button" wire:click="$emit('modal.open', 'explain-compatibility')">
              {{-- @svg('flex-info-circle', 'h-4 w-4 text-slate-500') --}}
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-400 dark:text-slate-600"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" /></svg>
            </button>
          </div>

          <div class="prose prose-sm mt-4 text-slate-600 dark:text-slate-400">
            <dl class="space-y-6" role="list">
              @foreach ($this->releaseSeries as $series)
                @php
                  $compatibility = $series->checkVersionCompatibility($version);
                  $totalReports = $compatibility['versionStats']->compatible + $compatibility['versionStats']->incompatible;
                @endphp

                <div>
                  <dt class="flex items-center space-x-2 font-bold tracking-tight">
                    @svg($compatibility['status']->icon(), 'h-5 w-5 shrink-0 ' . $compatibility['status']->iconColor())
                    <span class="{{ $compatibility['status']->textColor() }}">{{ $series->name }}</span>
                  </dt>

                  @if ($totalReports > 0 && ($compatibility['status'] === $compatibility['status']::compatible || $compatibility['status'] === $compatibility['status']::incompatible || $compatibility['status'] === $compatibility['status']::unknown))
                    <dd class="pl-8 my-2">
                      <div class="flex rounded-full h-3 w-full overflow-hidden">
                        <div class="bg-emerald-500" style="width:{{ ($compatibility['versionStats']->compatible / $totalReports) * 100 }}%"></div>

                        @if ($compatibility['versionStats']->compatible > 0 && $compatibility['versionStats']->incompatible > 0)
                          <div class="bg-white w-0.5"></div>
                        @endif

                        <div class="bg-rose-500" style="width:{{ ($compatibility['versionStats']->incompatible / $totalReports) * 100 }}%"></div>
                      </div>
                    </dd>
                  @endif

                  <dd class="text-sm pl-8">
                    {{
                      $compatibility['status']->description(
                        series: $series->name,
                        hasResults: ($compatibility['versionStats']->incompatible > 0 || $compatibility['versionStats']->compatible > 0)
                      )
                    }}
                  </dd>

                  @auth
                    @if ($compatibility['status'] !== $compatibility['status']::compatibleOverride && $compatibility['status'] !== $compatibility['status']::incompatibleOverride)
                      <dd class="pl-8">
                        <button
                          type="button"
                          wire:click="$emit('modal.open', 'compatibility-report', {'addon': '{{ $addon->slug }}', 'version': {{ $version->id }}, 'series': {{ $series->id }}})"
                          class="underline text-purple-500 dark:text-purple-400 text-sm"
                        >
                          Using this add-on in this version of Nova? Let us know your experience!
                        </button>
                      </dd>
                    @endif
                  @endauth
                </div>
              @endforeach
            </dl>
          </div>
        </div>
      @endif
    </div>

    <div class="mx-auto mt-16 w-full max-w-2xl lg:col-span-4 lg:mt-0 lg:max-w-none">
      <div x-data x-tabs>
        <div class="border-b border-slate-200 dark:border-slate-200/10">
          <div x-tabs:list class="-mb-px flex space-x-8" aria-orientation="horizontal" role="tablist">
            <!-- Selected: "border-purple-600 text-purple-600", Not Selected: "border-transparent text-slate-700 hover:text-slate-800 hover:border-slate-300" -->
            <button
              x-tabs:tab
              type="button"
              id="tab-info"
              class="flex items-center space-x-2 whitespace-nowrap border-b-2 py-6 text-sm font-medium"
              :class="$tab.isSelected ? 'border-purple-600 dark:border-purple-500 text-purple-600 dark:text-purple-400' : 'border-transparent text-slate-700 dark:text-slate-300 hover:text-slate-800 hover:border-slate-300'"
              aria-controls="tab-panel-info"
              role="tab"
            >
              <div :class="$tab.isSelected ? 'text-purple-500 dark:text-purple-500' : 'text-slate-500 dark:text-slate-500'">
                @svg('flex-info-circle', 'h-4 w-4')
              </div>
              <span>Info</span>
            </button>

            @if ($this->questions->count() > 0)
              <button
                x-tabs:tab
                type="button"
                id="tab-faq"
                class="flex items-center space-x-2 whitespace-nowrap border-b-2 py-6 text-sm font-medium"
                :class="$tab.isSelected ? 'border-purple-600 dark:border-purple-500 text-purple-600 dark:text-purple-400' : 'border-transparent text-slate-700 dark:text-slate-300 hover:text-slate-800 hover:border-slate-300'"
                aria-controls="tab-panel-faq"
                role="tab"
              >
                <div :class="$tab.isSelected ? 'text-purple-500 dark:text-purple-500' : 'text-slate-500 dark:text-slate-500'">
                  @svg('flex-question-square', 'h-4 w-4')
                </div>
                <span>FAQs</span>
              </button>
            @endif

            <button
              x-tabs:tab
              type="button"
              id="tab-info"
              class="flex items-center space-x-2 whitespace-nowrap border-b-2 py-6 text-sm font-medium"
              :class="$tab.isSelected ? 'border-purple-600 dark:border-purple-500 text-purple-600 dark:text-purple-400' : 'border-transparent text-slate-700 dark:text-slate-300 hover:text-slate-800 hover:border-slate-300'"
              aria-controls="tab-panel-info"
              role="tab"
            >
              <div :class="$tab.isSelected ? 'text-purple-500 dark:text-purple-500' : 'text-slate-500 dark:text-slate-500'">
                @svg('flex-favorite-star', 'h-4 w-4')
              </div>
              <span>Reviews</span>
            </button>
          </div>
        </div>

        <div x-tabs:panels>
          <!-- 'Info' panel, show/hide based on tab state -->
          <div x-tabs:panel id="tab-panel-info" class="mt-10 text-sm text-slate-500" aria-labelledby="tab-info" role="tabpanel" tabindex="0">
            <h3 class="sr-only">Version Info</h3>

            <div class="prose dark:prose-invert">
              <h2>{{ $version->version }}</h2>
              <p class="text-xs">Last updated <time datetime="{{ $version->updated_at }}">{{ $version->updated_at->format('F d, Y') }}</time></p>

              @if (filled($version->install_instructions) || filled($addon->install_instructions))
                <h3>Install instructions</h3>
                @if (filled($version->install_instructions))
                  {!! str($version->install_instructions)->markdown() !!}
                @else
                  {!! str($addon->install_instructions)->markdown() !!}
                @endif
              @endif

              @if (filled($version->release_notes))
                <h3>Release notes</h3>
                {!! str($version->release_notes)->markdown() !!}
              @endif

              @if (filled($version->upgrade_instructions))
                <h3>Upgrade instructions</h3>
                {!! str($version->upgrade_instructions)->markdown() !!}
              @endif
            </div>
          </div>

          <!-- 'FAQ' panel, show/hide based on tab state -->
          @if ($this->questions->count() > 0)
            <div x-tabs:panel id="tab-panel-faq" class="text-sm text-slate-500" aria-labelledby="tab-faq" role="tabpanel" tabindex="0">
              <h3 class="sr-only">Frequently Asked Questions</h3>

              <div class="prose dark:prose-invert mt-10">
                @foreach ($this->questions as $question)
                  <h3 class="mt-10">{{ $question->question }}</h3>
                  {!! str($question->answer)->markdown() !!}
                @endforeach
              </div>
            </div>
          @endif

          <!-- 'Customer Reviews' panel, show/hide based on tab state -->
          <div x-tabs:panel id="tab-panel-reviews" id="tab-panel-reviews" class="relative -mb-10 px-4" aria-labelledby="tab-reviews" role="tabpanel" tabindex="0">
            <div class="absolute inset-0 backdrop-blur bg-white bg-opacity-25">
              <div class="flex flex-col items-center justify-center min-h-full prose dark:prose-invert">
                <h2>Ratings and reviews are coming soon</h2>
                <p>We&rsquo;re hard at work adding more features, so stay tuned</p>
              </div>
            </div>

            <h3 class="sr-only">Customer Reviews</h3>

            <div class="flex space-x-4 text-sm text-slate-500">
              <div class="flex-none py-10">
                <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-slate-100">
              </div>
              <div class="flex-1 py-10">
                <h3 class="font-medium text-slate-900">Emily Selman</h3>
                <p><time datetime="2021-07-16">July 16, 2021</time></p>

                <div class="mt-4 flex items-center">
                  <!--
                    Heroicon name: mini/star

                    Active: "text-yellow-400", Default: "text-slate-300"
                  -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>
                </div>
                <p class="sr-only">5 out of 5 stars</p>

                <div class="prose prose-sm mt-4 max-w-none text-slate-500">
                  <p>This icon pack is just what I need for my latest project. There's an icon for just about anything I could ever need. Love the playful look!</p>
                </div>
              </div>
            </div>

            <div class="flex space-x-4 text-sm text-slate-500">
              <div class="flex-none py-10">
                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-slate-100">
              </div>
              <div class="flex-1 py-10 border-t border-slate-200 dark:border-slate-200/10">
                <h3 class="font-medium text-slate-900">Hector Gibbons</h3>
                <p><time datetime="2021-07-12">July 12, 2021</time></p>

                <div class="mt-4 flex items-center">
                  <!--
                    Heroicon name: mini/star

                    Active: "text-yellow-400", Default: "text-slate-300"
                  -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>
                </div>
                <p class="sr-only">5 out of 5 stars</p>

                <div class="prose prose-sm mt-4 max-w-none text-slate-500">
                  <p>Blown away by how polished this icon pack is. Everything looks so consistent and each SVG is optimized out of the box so I can use it directly with confidence. It would take me several hours to create a single icon this good, so it's a steal at this price.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-addons-display-layout>