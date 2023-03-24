<form class="flex flex-col h-full" wire:submit.prevent="save">
  <div class="p-4 sm:px-6 sm:py-5">
    <div class="flex items-center space-x-2">
      @svg('flex-flash', 'h-5 w-5 text-slate-700 dark:text-slate-300')
      <h3 class="text-lg leading-4 font-semibold text-slate-900 dark:text-white">Submit compatibility report</h3>
    </div>
    <div class="mt-1 pl-7 text-xs text-slate-600 dark:text-slate-400">Let the community know your experience using this add-on</div>
  </div>

  <div class="overflow-y-auto px-4 pb-4 sm:px-6 sm:pb-4">
    <div class="font-medium text-slate-900 dark:text-white">
      {{ $addon->name }} (Version {{ $version->version }})
    </div>
    <div class="mt-6 font-medium text-sm text-slate-700 dark:text-slate-300">
      Is this add-on compatible with {{ $series->name }}?
    </div>
    <div class="mt-3 grid grid-cols-2 gap-8">
      <button
        type="button"
        wire:click="toggleStatus('compatible')"
        @class([
          'flex flex-col items-center justify-center rounded-xl ring-2 p-6 space-y-1.5',
          'bg-emerald-50/50 dark:bg-emerald-900/25 ring-emerald-200 dark:ring-emerald-800 text-emerald-500' => $status === 'compatible',
          'ring-slate-200 dark:ring-slate-700 text-slate-400 dark:text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-900/25' => $status !== 'compatible',
        ])
      >
        @svg('flex-check-square', 'h-10 w-10')
        <div
          @class([
            'text-sm font-semibold',
            'text-emerald-600 dark:text-emerald-400' => $status === 'compatible',
            'text-slate-600 dark:text-slate-400' => $status !== 'compatible',
          ])
        >
          Yes
        </div>
      </button>
      <button
        type="button"
        wire:click="toggleStatus('incompatible')"
        @class([
          'flex flex-col items-center justify-center rounded-xl ring-2 p-6 space-y-1.5',
          'bg-rose-50/50 dark:bg-rose-900/15 ring-rose-200 dark:ring-rose-900 text-rose-500' => $status === 'incompatible',
          'ring-slate-200 dark:ring-slate-700 text-slate-400 dark:text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-900/25' => $status !== 'incompatible',
        ])
      >
        @svg('flex-delete-square', 'h-10 w-10')
        <div
          @class([
            'text-sm font-semibold',
            'text-rose-600 dark:text-rose-300' => $status === 'incompatible',
            'text-slate-600 dark:text-slate-400' => $status !== 'incompatible',
          ])
        >
          No
        </div>
      </button>
    </div>

    @if ($status === 'incompatible')
      <div class="mt-6 font-medium text-sm text-slate-700 dark:text-slate-300">
        <div>What issues did you experience with this add-on?</div>
        <div class="mt-1 text-xs font-normal leading-5 text-slate-600 dark:text-slate-400">Describing what issues you encountered, any error messages you saw, and everything you did to get it working can help the add-on author fix any compatibility issues.</div>
      </div>
      <div class="mt-3">
        <x-input.textarea wire:model="notes"></x-input.textarea>
      </div>
    @endif
  </div>

  <div class="bg-slate-50 dark:bg-slate-900/50 border-t border-slate-900/5 px-4 py-3 sm:px-6 gap-x-2 space-y-2 sm:space-y-0 sm:flex sm:flex-row-reverse mt-auto">
    <x-button type="submit" variant="primary">
      Submit
    </x-button>
    <x-button type="button" variant="secondary" wire:click="$emit('modal.close')">
      Cancel
    </x-button>
  </div>
</form>