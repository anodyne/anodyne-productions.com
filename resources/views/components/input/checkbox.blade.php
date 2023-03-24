@props([
    'label' => false,
    'for' => false,
    'checked' => false,
    'help' => false,
])

<div @class([
  'relative flex',
  'items-start' => $help,
  'items-center' => !$help
])>
  <div class="flex items-center h-5">
    <input
      aria-describedby="{{ $attributes->get('id', $for) }}-description"
      type="checkbox"
      @class([
        'form-checkbox rounded h-4 w-4',
        'bg-white checked:bg-purple-500 border-slate-300 focus:ring-purple-100 focus:ring-offset-white checked:hover:bg-purple-500 focus:text-purple-500',
        'dark:bg-slate-800 dark:checked:bg-purple-500 dark:border-slate-200/[15%] dark:checked:border-purple-500 dark:focus:ring-purple-900 dark:focus:ring-offset-slate-800 dark:checked:hover:bg-purple-500 dark:focus:text-purple-500',
      ])
      {{ $attributes }}
      @checked($checked)
    >
  </div>

  @if ($label || $help)
    <div class="ml-3 text-sm">
      <label for="{{ $attributes->get('id', $for) }}" class="font-medium text-slate-700 dark:text-slate-300">{{ $label }}</label>

      @if ($help)
        <p id="{{ $attributes->get('id', $for) }}-description" class="text-slate-500">{{ $help }}</p>
      @endif
    </div>
  @endif
</div>
