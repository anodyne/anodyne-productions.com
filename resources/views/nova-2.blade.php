<x-base-layout
  class="bg-slate-50 text-slate-500"
  title="Nova by Anodyne Productions"
  :has-appearance-modes="false"
>
  <x-nova2.header />

  <x-nova2.features />

  <x-nova2.download :version="$latestVersion" />

  <x-nova2.resources />

  <x-nova2.sponsors :sponsors="$sponsors" />

  <x-footer.landing
    :items="[
      ['name' => 'Features', 'href' => '#features' ],
      ['name' => 'Download', 'href' => '#download' ],
      ['name' => 'Resources', 'href' => '#resources' ],
      ['name' => 'Docs', 'href' => route('docs') ],
      ['name' => 'Add-ons', 'href' => route('addons.index') ],
      ['name' => 'Get Help', 'href' => 'https://discord.gg/7WmKUks' ],
      ['name' => 'Nova 3', 'href' => '/nova-3' ],
    ]"
  />
</x-base-layout>