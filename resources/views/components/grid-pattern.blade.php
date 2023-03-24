@props([
  'height',
  'width',
  'x',
  'y',
  'squares' => [],
])

<div class="absolute inset-0 -z-10 mx-0 max-w-none" x-data x-id="['grid-pattern']">
  <div class="absolute left-1/2 top-0 ml-[-38rem] h-[30rem] w-[81.25rem] dark:[mask-image:linear-gradient(white,transparent)]">
    <div class="absolute inset-0 bg-gradient-to-r from-sky-500 to-purple-300 opacity-40 [mask-image:radial-gradient(farthest-side_at_top,white,transparent)] dark:from-sky-500/50 dark:to-purple-500/40 dark:opacity-100">
      <svg aria-hidden="true" class="absolute inset-x-0 inset-y-[-50%] h-[200%] w-full skew-y-[-18deg] fill-black/40 stroke-black/50 mix-blend-overlay dark:fill-white/2.5 dark:stroke-white/5">
        <defs>
          <pattern :id="$id('grid-pattern')" width="72" height="56" patternUnits="userSpaceOnUse" x="-12" y="4">
            <path d="M.5 56V.5H72" fill="none"></path>
          </pattern>
        </defs>
        <rect width="100%" height="100%" stroke-width="0" :fill="`url(#${$id('grid-pattern')})`"></rect>

        @if (count($squares) > 0)
          <svg x="-12" y="4" class="overflow-visible">
            @foreach ($squares as [$x, $y])
              <rect stroke-width="0" width="{{ $width + 1 }}" height="{{ $height + 1 }}" x="{{ $x * $width }}" y="{{ $y * $height }}"></rect>
            @endforeach
          </svg>
        @endif
      </svg>
    </div>

    <svg viewBox="0 0 1113 440" aria-hidden="true" class="absolute top-0 left-1/2 ml-[-19rem] w-[69.5625rem] fill-white blur-[26px] dark:hidden"><path d="M.016 439.5s-9.5-300 434-300S882.516 20 882.516 20V0h230.004v439.5H.016Z"></path></svg>
  </div>
</div>