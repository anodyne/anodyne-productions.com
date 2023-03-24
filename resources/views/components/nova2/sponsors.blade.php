@props(['sponsors'])

<a name="sponsors"></a>
<section
  id="sponsors"
  aria-labelledby="sponsors-title"
  class="relative overflow-hidden bg-blue-600 py-20 sm:py-32"
>
  <img src="/images/background-features.jpg" class="absolute top-0 max-w-none translate-x-[-30%] -translate-y-1/4" alt="" width="1558" height="946" />

  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2
        id="sponsors-title"
        class="font-bold text-3xl tracking-tight text-white sm:text-4xl"
      >
        Thanks to our incredible sponsors
      </h2>

      <p class="mt-4 text-lg tracking-tight text-blue-100">
        We launched a Patreon as a way for people to support Anodyne and help us continue to provide Nova and all of its resources to the community for free. As a patron, you&rsquo;ll have access to a private Discord community, early access to Nova 3, and more. Join today!
      </p>

      <x-button href="https://www.patreon.com/anodyneproductions" variant="primary" class="mt-6" target="_blank">
        <span>Become a patron</span>
        <span>&rarr;</span>
      </x-button>
    </div>

    @if ($sponsors->count() > 0)
      <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3">
        @foreach ($sponsors as $sponsor)
          <li class="group relative rounded-lg p-4 bg-white/10 hover:bg-white/[15%] ring-1 ring-inset ring-white/10 space-y-4 text-center transition">
            <h3 class="font-display text-xl leading-7 text-white">
              {{ $sponsor->formattedName }}
            </h3>

            <img src="{{ $sponsor->getFirstMediaUrl('logo') }}" alt="{{ $sponsor->formattedName }}" width="500" height="500" class="block mx-auto w-auto h-32 rounded-md" />

            <div class='flex items-center justify-center space-x-1.5 text-blue-100 font-medium text-sm'>
              <span>Visit site</span>
              @svg('flex-external-link', 'h-3 w-3')
            </div>

            <a href="{{ $sponsor->link }}" target="_blank" class="absolute inset-0 group-hover:shadow-xl" rel="noreferrer">
              <span></span>
            </a>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</section>