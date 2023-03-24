<x-base-layout
  class="bg-slate-900 text-slate-400"
  title="Nova 3 by Anodyne Productions"
  :has-appearance-modes="false"
>
  <x-nova3.header />

  <x-nova3.demo />

  <x-nova3.faq />

  <x-footer.landing
    :items="[
      ['name' => 'Features', 'href' => '#features' ],
      ['name' => 'Demo', 'href' => '#demo' ],
      ['name' => 'Docs', 'href' => route('docs', '3.0') ],
      ['name' => 'FAQs', 'href' => '#faq' ],
      ['name' => 'Discuss', 'href' => 'https://discord.gg/7WmKUks' ],
      ['name' => 'Nova 2', 'href' => '/' ],
    ]"
    :dark="true"
  />
</x-base-layout>