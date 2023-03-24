<div class="flex flex-col h-full">
  <div class="p-4 sm:px-6 sm:py-5">
    <div class="flex items-center space-x-2">
      @svg('flex-info-circle', 'h-5 w-5 text-slate-700 dark:text-slate-300')
      <h3 class="text-lg leading-4 font-semibold text-slate-900 dark:text-white">How does compatibility work?</h3>
    </div>
    <div class="mt-1 pl-7 text-xs text-slate-600 dark:text-slate-400">Understanding the community-driven approach to add-on compatibility reports</div>
  </div>

  <div class="overflow-y-auto px-4 pb-4 sm:px-6 sm:pb-4 prose lg:text-sm dark:prose-invert max-w-none">
    <p>There's nothing more frustrating than finding an add-on that you'd like to use on your Nova site only to try to install it and realize it isn't compatibile with the version of Nova you're using. We offer the Nova Add-on Exchange as a way for add-on authors to get their work out to the wider community, but we don't offer any assurances or guarantees that add-ons will work; that falls to the add-on authors. Still, it can be very frustrating to potentially waste time and energy trying to install an add-on that doesn't work with your version of Nova.</p>

    <p>Our solution to this problem is to engage with the larger community to help understand what game masters are experiencing with add-ons. This provides feedback to the add-on author from the community about the status of their add-on, but also helps users understand add-ons that will and won't work with the version of Nova they're using for their game.</p>

    <h3>What determines if an add-on is marked as compatible or incompatible?</h3>
    <p>An add-on is marked as compatible/incompatible if we have received 3 reports of either status <span class="font-bold">AND</span> there are more of one type of status than the other. For example, if we have received 3 compatible reports and 2 incompatible reports, we consider that to have a status of compatible. (We also display a status bar with a representation of how many compatibile and incompatible reports we've received.)</p>
    <p>If those criteria aren't met, then we fallback to a status of unknown.</p>

    <h3>What happens when an add-on author releases a new version?</h3>
    <p>Since compatibility reports are submitted based on the version of the add-on, when an add-on author releases a new version, the compatibility status is reset. We understand that could be a potentially frustrating situation for add-on authors and one that could in fact de-incentivize add-on authors from releasing new versions knowing their compatibility status will be reset with each release.</p>
    <p>To avoid that situation, if there are no compatibility reports for the current version, we look back at other versions of the add-on and use that information to try to determine compatibility. Like before, if we can't determine a compatibile/incompatible status from that information, we fallback to a status of unknown.</p>
  </div>

  <div class="bg-slate-50 dark:bg-slate-900/50 border-t border-slate-900/5 px-4 py-3 sm:px-6 gap-x-2 space-y-2 sm:space-y-0 sm:flex sm:flex-row-reverse mt-auto">
    <x-button type="button" variant="primary" wire:click="$emit('modal.close')">
      Close
    </x-button>
  </div>
</div>