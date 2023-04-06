<div class="flex flex-col h-full">
  <div class="p-4 sm:px-6 sm:py-5">
    <div class="flex items-center space-x-2">
      @svg('flex-favorite-star', 'h-5 w-5 text-slate-700 dark:text-slate-300')
      <h3 class="text-lg/4 font-display font-semibold text-slate-900 dark:text-white">Write a review</h3>
    </div>
    <div class="mt-1 pl-7 text-xs text-slate-600 dark:text-slate-400">Rate and review the {{ $addon->name }} {{ str($addon->type->displayName())->lower() }}</div>
  </div>

  <div class="overflow-y-auto px-4 pb-4 sm:px-6 sm:pb-4 prose lg:text-sm dark:prose-invert max-w-none space-y-6">
    <x-input.group label="Rating">
      <div class="flex items-center space-x-1">
        @for ($s = 1; $s <= 5; $s++)
          <label
            for="star{{ $s }}"
            @class([
              'text-slate-400 dark:text-slate-500 hover:text-slate-500 dark:hover:text-slate-400' => $review->rating < $s,
              'text-amber-400 dark:text-amber-500' => $review->rating >= $s,
            ])
          >
            <input wire:model="review.rating" type="radio" name="rating" id="star{{ $s }}" value="{{ $s }}" class="hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
          </label>
        @endfor
      </div>
    </x-input.group>

    <x-input.group label="Review">
      <x-input.textarea wire:model="review.content"></x-input.textarea>
    </x-input.group>
  </div>

  <div class="bg-slate-50 dark:bg-slate-900/50 border-t border-slate-900/5 px-4 py-3 sm:px-6 gap-x-2 space-y-2 sm:space-y-0 sm:flex sm:flex-row-reverse mt-auto">
    <x-button type="button" variant="primary" wire:click="save">
      Save
    </x-button>
    <x-button type="button" variant="secondary" wire:click="$emit('modal.close')">
      Close
    </x-button>
  </div>
</div>