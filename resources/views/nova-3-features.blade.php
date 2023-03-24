<x-base-layout
  class="bg-slate-900 text-slate-400"
  title="Features &bull; Nova 3"
  :has-appearance-modes="false"
>
  <x-nova3.features-header />

  <x-nova3.features />

  <x-footer.landing
    :items="[
      ['name' => 'Nova 3', 'href' => route('nova-3') ],
      ['name' => 'Features', 'href' => route('nova-3-features') ],
      ['name' => 'Demo', 'href' => route('nova-3').'#demo' ],
      ['name' => 'Docs', 'href' => route('docs', '3.0') ],
      ['name' => 'FAQs', 'href' => route('nova-3').'#faq' ],
      ['name' => 'Discuss', 'href' => 'https://discord.gg/7WmKUks' ],
      ['name' => 'Nova 2', 'href' => route('home') ],
    ]"
    :dark="true"
  />
</x-base-layout>