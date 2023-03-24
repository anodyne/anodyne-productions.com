@props([
  'placement' => 'bottom-start',
  'fixed' => false,
])

<div
  x-data="{
    open: false,
    toggle() {
      if (this.open) {
        return this.close()
      }

      this.$refs.button.focus()

      this.open = true
    },
    close(focusAfter) {
      if (! this.open) return

      this.open = false

      focusAfter && focusAfter.focus()
    }
  }"
  x-on:keydown.escape.prevent.stop="close($refs.button)"
  x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
  x-on:toggle-dropdown.window="close()"
  x-id="['dropdown-button']"
  class="relative"
>
  <button
    x-ref="button"
    @click="toggle()"
    :aria-expanded="open"
    :aria-controls="$id('dropdown-button')"
    type="button"
    {{ $trigger->attributes->merge(['class' => 'flex items-center gap-2']) }}
  >
    {{ $trigger }}
  </button>

  <div
    x-ref="panel"
    x-show="open"
    x-on:click.outside="close($refs.button)"
    :id="$id('dropdown-button')"
    x-cloak
    @class([
      'absolute top mt-2' => !$fixed,
      'overflow-hidden z-10 bg-white dark:bg-slate-800 shadow-md ring-1 ring-slate-900/10 dark:ring-0 dark:highlight-white/5 divide-y divide-slate-200 dark:divide-slate-200/10 rounded-lg outline-none font-medium transition',
      $attributes->get('class'),
      'right-0 origin-top-right' => $placement === 'bottom-end',
      'left-0 origin-top-left' => $placement === 'bottom-start',
    ])
  >
    {{ $slot }}
  </div>
</div>