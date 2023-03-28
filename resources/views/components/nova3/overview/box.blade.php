@props([
  'bgDirection' => 'bg-gradient-to-br',
  'bgFrom',
  'bgVia' => false,
  'bgTo',
  'borderDirection' => 'bg-gradient-to-br',
  'borderFrom',
  'borderVia' => false,
  'borderTo',
])

<div @class([
  'relative flex w-full p-[1px] overflow-hidden rounded-xl',
  "{$borderDirection} {$borderFrom} {$borderVia} {$borderTo}",
])>
  <div @class([
    'flex flex-col justify-between min-w-0 flex-1 p-4 rounded-xl',
    "{$bgDirection} {$bgFrom} {$bgVia} {$bgTo}",
  ])>
    <span class="absolute inset-0" aria-hidden="true"></span>
    {{ $slot }}
  </div>
</div>