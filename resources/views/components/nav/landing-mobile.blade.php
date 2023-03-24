@props([
  'items' => [],
  'dark' => false,
])

<div x-data x-popover>
  <button x-popover:button type="button" class="relative z-10 flex h-8 w-8 items-center justify-center [&:not(:focus-visible)]:focus:outline-none" aria-label="Toggle Navigation">
      <svg aria-hidden="true" class="h-3.5 w-3.5 overflow-visible stroke-slate-700" fill="none" stroke-width="2" stroke-linecap="round">
        <path
          d="M0 1H14M0 7H14M0 13H14"
          class="origin-center transition"
          :class="{
            'scale-90 opacity-0': $popover.isOpen,
          }"
        />
        <path
          d="M2 2L12 12M12 2L2 12"
          class="origin-center transition"
          :class="{
            'scale-90 opacity-0': ! $popover.isOpen,
          }"
        />
      </svg>
  </button>

  <div
    class="fixed inset-0 bg-slate-300/50"
    x-panel:overlay
    x-show="$popover.isOpen"
    x-transition:enter="duration-150 ease-out"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="duration-150 ease-in"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
  ></div>

  <div
    class="absolute inset-x-0 top-full mt-4 flex origin-top flex-col rounded-2xl bg-white p-4 text-lg tracking-tight text-slate-900 shadow-xl ring-1 ring-slate-900/5"
    x-popover:panel
    {{-- x-trap.inert.noscroll="$popover.isOpen" --}}
    x-cloak
    x-transition:enter="duration-150 ease-out"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="duration-100 ease-in"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
  >
    @foreach ($items as $item)
      <x-nav.link-mobile :href="$item['href']" @click="$popover.close()">
        {{ $item['title'] }}
      </x-nav.link-mobile>
    @endforeach

    <hr class="m-2 border-slate-300/40" />

    @auth
      <p class="truncate w-full p-2 font-medium" role="none">
        <span class="block text-sm text-slate-500" role="none">Signed in as</span>
        <span class="mt-0.5 font-semibold" role="none">{{ auth()->user()->email }}</span>
      </p>
      <x-nav.link-mobile :href="route('filament.pages.dashboard')">
        Dashboard
      </x-nav.link-mobile>
      <x-nav.link-mobile :href="route('filament.pages.my-profile')">
        My profile
      </x-nav.link-mobile>
      <form action="{{ route('filament.auth.logout') }}" method="post">
        @csrf
        <x-nav.button-mobile type="submit">
          Sign out
        </x-nav.button-mobile>
      </form>
    @endauth

    @guest
      <x-nav.link-mobile :href="route('filament.auth.login')">
        Sign in
      </x-nav.link-mobile>
    @endguest
  </div>
</div>