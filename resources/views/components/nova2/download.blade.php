@props([
    'version',
])

<a name="download"></a>
<section
  id="download"
  class="relative isolate overflow-hidden bg-slate-900"
  x-data="{
    selectedGenre: null,
    selectedVersion: null,
    genres: [
      { id: 6, value: 'sga', name: 'Atlantis', content: 'Stargate' },
      { id: 1, value: 'bl5', name: 'Babylon 5' },
      { id: 8, value: 'baj', name: 'Bajorans', content: 'Star Trek' },
      { id: 3, value: 'bsg', name: 'Battlestar Galactica' },
      { id: 2, value: 'blank', name: 'Blank' },
      { id: 9, value: 'crd', name: 'Cardassians', content: 'Star Trek' },
      { id: 10, value: 'ds9', name: 'Deep Space 9', content: 'Star Trek' },
      { id: 4, value: 'dnd', name: 'Dungeons & Dragons' },
      { id: 11, value: 'ent', name: 'Enterprise era', content: 'Star Trek' },
      { id: 12, value: 'kli', name: 'Klingons', content: 'Star Trek' },
      { id: 13, value: 'mov', name: 'Movie era', content: 'Star Trek' },
      { id: 14, value: 'rom', name: 'Romulans', content: 'Star Trek' },
      { id: 5, value: 'dsv', name: 'seaQuest DSV' },
      { id: 7, value: 'sg1', name: 'SG-1', content: 'Stargate' },
      { id: 16, value: 'sto', name: 'Star Trek: Online', content: 'Star Trek' },
      { id: 15, value: 'tos', name: 'The Original Series era', content: 'Star Trek' },
    ],
    versions: [
      {
        id: 1,
        name: '{{ $version }}',
        value: '{{ $version }}',
        content: 'Latest version',
      },
      {
        id: 2,
        name: '2.6.2',
        value: '2.6.2',
        content: 'Legacy version for PHP 5.6',
      },
      {
        id: 3,
        name: '2.3.2',
        value: '2.3.2',
        content: 'Legacy version for PHP 5.2',
      },
    ],
    downloadLink () {
      return '{{ config('anodyne.download-url') }}/nova-' + this.selectedVersion?.value + '-' + this.selectedGenre?.value + '.zip'
    }
  }"
  x-init="() => selectedVersion = versions[0]"
>
  <div class="py-24 px-6 sm:px-6 sm:py-32 lg:px-8">
    <div class="mx-auto max-w-4xl text-center">
      <h2 class="text-3xl tracking-tight text-white/50 sm:text-4xl">
        Ready to get started?
      </h2>

      <h2 class="mt-1.5 font-bold text-3xl tracking-tight text-white sm:text-4xl">
        Download Nova today.
      </h2>

      <div class="mt-12">
        <label class="text-slate-100 text-lg">Choose your version</label>

        <div class="mt-4 flex flex-col md:flex-row md:items-center md:justify-center gap-y-6 md:gap-y-0 md:gap-x-6">
          <template x-for="version in versions" :key="version.id">
            <button
              type="button"
              @click="selectedVersion = version"
              :class="{
                'bg-purple-600 ring-opacity-20': selectedVersion === version,
                'bg-white bg-opacity-10 text-slate-200 hover:bg-opacity-15 ring-opacity-10': selectedVersion !== version,
              }"
              class="flex flex-col flex-1 px-3 py-1.5 transition rounded-lg text-left ring-1 ring-inset ring-white"
            >
              <div
                x-text="version.name"
                class="text-base font-semibold"
                :class="{
                  'text-white': selectedVersion === version,
                  'text-slate-200': selectedVersion !== version,
                }"
              ></div>
              <div
                x-text="version.content"
                class="text-xs font-normal"
                :class="{
                  'text-purple-200': selectedVersion === version,
                  'text-slate-400': selectedVersion !== version,
                }"
              ></div>
            </button>
          </template>
        </div>
      </div>

      <div class="mt-8 flex space-x-3 text-white font-medium text-sm leading-6 text-left max-w-lg mx-auto" x-show="selectedVersion?.value.includes('2.6')" x-cloak>
        @svg('flex-alert-diamond', 'h-8 w-8 text-danger-500 shrink-0')
        <span>Nova 2.6.2 is a legacy version and intended only for games hosted on a server running PHP 5.3 - 5.6. This version of Nova is no longer receiving updates.</span>
      </div>

      <div class="mt-8 flex space-x-3 text-white font-medium text-sm leading-6 text-left max-w-lg mx-auto" x-show="selectedVersion?.value.includes('2.3')" x-cloak>
        @svg('flex-alert-diamond', 'h-8 w-8 text-danger-500 shrink-0')
        <span>Nova 2.3.2 is a legacy version and intended only for games hosted on a server running PHP 5.2. This version of Nova is no longer receiving updates.</span>
      </div>

      <div class="mt-8">
        <label class="text-slate-100 text-lg">Choose your genre</label>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-4 gap-y-6 md:gap-x-6 md:gap-y-3">
          <template x-for="genre in genres" :key="genre.id">
            <button
              type="button"
              @click="selectedGenre = genre"
              :class="{
                'bg-purple-600 ring-opacity-20': selectedGenre === genre,
                'bg-white bg-opacity-10 text-slate-200 hover:bg-opacity-15 ring-opacity-10': selectedGenre !== genre,
              }"
              class="flex-1 px-3 py-1.5 transition rounded-lg text-left ring-1 ring-inset ring-white"
            >
              <div
                x-text="genre.name"
                class="text-sm font-semibold"
                :class="{
                  'text-white': selectedGenre === genre,
                  'text-slate-200': selectedGenre !== genre,
                }"
              ></div>
              <div
                x-text="genre.content"
                class="text-xs font-normal"
                :class="{
                  'text-purple-200': selectedGenre === genre,
                  'text-slate-400': selectedGenre !== genre,
                }"
              ></div>
            </button>
          </template>
        </div>
      </div>

      <div x-show="selectedVersion && selectedGenre">
        <x-button x-bind:href="downloadLink()" variant="brand" class="mt-12 flex items-center space-x-2.5">
          <div>
            Download Nova
            <span x-text="selectedVersion?.name"></span>
            &ndash;
            <span x-text="selectedGenre?.name"></span>
          </div>
          @svg('flex-cloud-download', 'h-5 w-5 shrink-0')
        </x-button>
      </div>
    </div>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" class="absolute top-1/2 left-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2" aria-hidden="true">
    <circle cx="512" cy="512" r="512" fill="url(#8d958450-c69f-4251-94bc-4e091a323369)" fill-opacity="0.7" />
    <defs>
      <radialGradient id="8d958450-c69f-4251-94bc-4e091a323369" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(512 512) rotate(90) scale(512)">
        <stop stop-color="#7775D6" />
        <stop offset="1" stop-color="#7dd3fc" stop-opacity="0" />
      </radialGradient>
    </defs>
  </svg>
</section>