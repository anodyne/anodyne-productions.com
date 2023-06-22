<x-addon-detail-layout :title="$addon->name" :type="$addon->type->displayName()">
  <!-- Product -->
  <div class="lg:grid lg:grid-cols-7 lg:grid-rows-1 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
    <!-- Product image -->
    <div class="lg:col-span-4 lg:row-end-1" x-data="{ image: 0 }">
      <div class="aspect-w-4 aspect-h-3 overflow-hidden rounded-xl bg-slate-100 dark:bg-slate-800">
        @if ($addon->getMedia('primary-preview')->count() === 1)
          <img src="{{ $addon->getFirstTemporaryUrl(now()->addMinutes(5), 'primary-preview') }}" alt="" class="object-cover object-left" x-show="image === 0" x-cloak>
        @else
          <div class="bg-slate-300 dark:bg-slate-800 flex items-center justify-center">
            <x-logos.nova.mark class="text-slate-400 dark:text-slate-700 h-60 w-auto" :colors="false"></x-logos.nova.mark>
          </div>
        @endif

        @if ($addon->getMedia('additional-previews')->count() > 0)
          @foreach ($addon->getMedia('additional-previews') as $preview)
            <img src="{{ $preview->getTemporaryUrl(now()->addMinutes(5)) }}" alt="" class="object-cover object-left" x-show="image === {{ $loop->iteration }}" x-cloak>
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
            <img src="{{ $addon->getFirstTemporaryUrl(now()->addMinutes(5), 'primary-preview') }}" alt="" class="object-cover object-left">
          </button>

          @foreach ($addon->getMedia('additional-previews') as $preview)
            <button
              type="button"
              class="aspect-w-4 aspect-h-3 overflow-hidden rounded-lg bg-slate-100 dark:bg-slate-800"
              :class="{ 'ring-2 ring-purple-500 ring-offset-4 ring-offset-white dark:ring-offset-slate-900': image === {{ $loop->iteration }} }"
              @click="image = {{ $loop->iteration }}"
            >
              <img src="{{ $preview->getTemporaryUrl(now()->addMinutes(5)) }}" alt="" class="object-cover object-left">
            </button>
          @endforeach
        </div>
      @endif
    </div>

    <!-- Product details -->
    <div class="mx-auto mt-14 max-w-2xl sm:mt-16 lg:col-span-3 lg:row-span-2 lg:row-end-2 lg:mt-0 lg:max-w-none">
      <div class="flex flex-col-reverse">
        <div class="mt-4">
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

          <h1 class="mt-4 text-2xl font-display font-bold text-slate-900 dark:text-white sm:text-3xl">{{ $addon->name }}</h1>

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

        <div>
          <h3 class="sr-only">Reviews</h3>
          <div class="flex items-center">
            @for ($s = 1; $s <= 5; $s++)
              <svg
                @class([
                  'h-5 w-5 shrink-0',
                  'text-slate-300 dark:text-slate-600' => $addon->rating < $s,
                  'text-amber-400 dark:text-amber-500' => $addon->rating >= $s,
                ])
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
            @endfor
            <div class="ml-3 text-sm text-slate-500">{{ $addon->rating }} <span class="sr-only">out of 5 stars</span></div>
          </div>
        </div>
      </div>

      <p class="mt-6 prose dark:prose-invert">{!! str($addon->description)->markdown() !!}</p>

      <a href="{{ route('addons.index', $addon->user) }}" class="mt-6 flex items-center space-x-3">
        <div class="squircle overflow-hidden ring ring-white bg-white">
          <img src="{{ $addon->user->getFirstMediaUrl('avatar') }}" alt="" class="h-10 w-10">
        </div>
        <span class="text-slate-700 dark:text-slate-300 font-medium">{{ $addon->user->name }}</span>
      </a>

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

          <div class="mt-4 text-slate-600 dark:text-slate-400">
            <dl class="space-y-6" role="list">
              @foreach ($this->releaseSeries as $series)
                @php
                  $compatibility = $series->checkVersionCompatibility($version);
                  $totalReports = $compatibility['versionStats']->compatible + $compatibility['versionStats']->incompatible;
                @endphp

                <div>
                  <dt class="flex items-center space-x-3 font-display font-bold text-lg">
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
                    {!!
                      $compatibility['status']->description(
                        series: $series->name,
                        hasResults: ($compatibility['versionStats']->incompatible > 0 || $compatibility['versionStats']->compatible > 0)
                      )
                    !!}
                  </dd>

                  @auth
                    @if ($compatibility['status'] !== $compatibility['status']::compatibleOverride && $compatibility['status'] !== $compatibility['status']::incompatibleOverride && auth()->id() !== $addon->user_id)
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

              @if (filled($addon->credits))
                <h3>Add-on credits</h3>
                {!! str($addon->credits)->markdown() !!}
              @endif

              @if (filled($version->credits))
                <h3>Version credits</h3>
                {!! str($version->credits)->markdown() !!}
              @endif

              @if (isset($addon->links) && count($addon->links) > 0)
                <h3>Links</h3>
                <dl class="space-y-3">
                  @foreach ($addon->links as $link)
                    <div>
                      <dt class="font-medium flex items-center space-x-2">
                        @svg($link['type']->icon(), 'h-5 w-5 shrink-0')
                        <span>{{ $link['type']->displayName() }}</span>
                      </dt>
                      <dd><a href="{{ $link['value'] }}">{{ $link['value'] }}</a></dd>
                    </div>
                  @endforeach
                </dl>
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
            @if ($addon->reviews->count() > 0)
              <div class="prose dark:prose-invert mt-10">
                <h2>Customer Reviews</h2>
              </div>

              <div class="mt-3 flex items-center w-full xl:w-2/3">
                <div>
                  <div class="flex items-center">
                    @for ($s = 1; $s <= 5; $s++)
                      <svg
                        @class([
                          'h-5 w-5 shrink-0',
                          'text-slate-300 dark:text-slate-600' => floor($addon->rating) < $s,
                          'text-amber-400 dark:text-amber-500' => floor($addon->rating) >= $s,
                        ])
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                      >
                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                      </svg>
                    @endfor
                  </div>
                  <p class="sr-only">{{ floor($addon->rating) }} out of 5 stars</p>
                </div>
                <p class="ml-3 text-sm text-slate-600 dark:text-slate-500">Based on {{ $addon->reviews->count() }} {{ str('review')->plural($addon->reviews->count()) }}</p>
              </div>

              <div class="mt-6 w-full xl:w-2/3">
                <h3 class="sr-only">Review data</h3>

                <dl class="space-y-3">
                  @for ($r = 5; $r >= 1; $r--)
                    <div class="flex items-center text-sm">
                      <dt class="flex flex-1 items-center">
                        <p class="w-3 font-medium text-slate-700 dark:text-slate-300">{{ $r }}<span class="sr-only"> star reviews</span></p>
                        <div aria-hidden="true" class="ml-1 flex flex-1 items-center">
                          <svg class="h-5 w-5 flex-shrink-0 text-amber-400 dark:text-amber-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                          </svg>

                          <div class="relative ml-3 flex-1">
                            <div class="h-3 rounded-full bg-slate-200 dark:bg-slate-700"></div>

                            @php($rating = $this->reviewStats->{"rating$r"} / $addon->reviews->count())

                            @if ($rating > 0)
                              <div style="width: calc({{ $rating }} * 100%)" class="absolute inset-y-0 rounded-full bg-amber-400 dark:bg-amber-500"></div>
                            @endif
                          </div>
                        </div>
                      </dt>
                      <dd class="ml-3 w-10 text-right text-sm tabular-nums text-slate-700 dark:text-slate-300">{{ $rating * 100 }}%</dd>
                    </div>
                  @endfor
                </dl>
              </div>

              <div class="prose dark:prose-invert mt-6">
                <h3>Share your thoughts</h3>
                <p>If you’ve used this add-on, share your thoughts with other users.</p>
              </div>

              @auth
                @if (auth()->id() !== $addon->user_id)
                  <x-button
                    type="button"
                    wire:click="$emit('modal.open', 'addon-review', {'addonId': {{ $addon->id }}})"
                    class="mt-6"
                  >
                    Write a review
                  </x-button>
                @endif
              @endauth
            @endif

            @forelse ($addon->reviews as $review)
              <div class="flex space-x-4 text-sm text-slate-500">
                <div class="flex-none py-10">
                  <img src="{{ $review->user->getFirstMediaUrl('avatar') }}" alt="" class="h-10 w-10 squircle bg-slate-100">
                </div>
                <div
                  @class([
                    'flex-1 py-10',
                    'border-t border-slate-200 dark:border-slate-200/10' => !$loop->first
                  ])
                >
                  <h3 class="font-medium text-slate-900 dark:text-white">{{ $review->user->name }}</h3>
                  <p><time datetime="{{ $review->updated_at->format('Y-m-d') }}">{{ $review->updated_at->format('F d, Y') }}</time></p>

                  <div class="mt-4 flex items-center">
                    @for ($s = 1; $s <= 5; $s++)
                      <svg
                        @class([
                          'h-5 w-5 shrink-0',
                          'text-slate-300 dark:text-slate-600' => $review->rating < $s,
                          'text-amber-400 dark:text-amber-500' => $review->rating >= $s,
                        ])
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                      >
                        <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                      </svg>
                    @endfor
                  </div>
                  <p class="sr-only">{{ $review->rating }} out of 5 stars</p>

                  <div class="prose prose-sm dark:prose-invert mt-4 max-w-none">
                    {!! str($review->content)->markdown() !!}
                  </div>
                </div>
              </div>
            @empty
              <div class="text-center py-10">
                @svg('flex-favorite-star', 'h-12 w-12 mx-auto text-slate-400')
                <h3 class="mt-2 text-sm font-semibold text-slate-900 dark:text-white">No reviews</h3>

                @auth
                  @if (auth()->id() !== $addon->user_id)
                    <p class="mt-1 text-sm text-slate-500">Be the first to review this add-on</p>
                    <div class="mt-6">
                      <x-button type="button" wire:click="$emit('modal.open', 'addon-review', {'addonId': {{ $addon->id }}})">
                        Write a review
                      </x-button>
                    </div>
                  @endif
                @endauth
              </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</x-addon-detail-layout>