<button type="button" @class([
  'relative inline-flex items-center justify-center rounded-full transform-gpu',
  'h-8 h-[30px] w-auto px-3',
  'bg-white shadow-button',
  'border border-transparent border-none',
  'text-[13px] font-semibold leading-none text-slate-700 hover:text-purple-900',

  'after:block after:absolute after:-inset-[1px] after:rounded-full after:bg-gradient-to-t after:from-black/5 after:opacity-50 hover:after:opacity-100 hover:after:from-purple-400/15 after:transition-opacity',
  'dark:after:from-black/[0.15]',
])>
  <span class="relative z-[1] flex items-center justify-center space-x-1.5">
    <span>Forward</span>
    <span>&rarr;</span>
  </span>
</button>