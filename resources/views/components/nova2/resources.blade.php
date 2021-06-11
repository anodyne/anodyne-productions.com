<div class="relative max-w-7xl mx-auto pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div class="text-center">
        <a name="resources"></a>
        <h2 class="text-base text-orange-500 font-semibold tracking-wide uppercase">Learn</h2>
        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            Helpful Resources
        </p>
    </div>

    <div class="mt-12 max-w-lg mx-auto grid gap-x-6 gap-y-12 lg:grid-cols-3 }} lg:max-w-none">
        <x-nova2.resource :href="route('docs')" category="Documentation" title="Learn all about Nova">
            Nova's documentation has been re-written to be clearer and more helpful. We've added all-new sections about getting started, added pages to explain complex features, and dug deeper into the core of Nova to help users understand how to get the most out Nova.
        </x-nova2.resource>

        <x-nova2.resource href="https://discord.gg/7WmKUks" target="_blank" category="Community" title="Join the community">
            Over the years Nova has fostered a global community of artists, developers, and writers who are passionate about the stories they tell. No matter if you're looking to chat with people, find a new game, or get help with Nova, the Anodyne community is ready to welcome you.
        </x-nova2.resource>

        @if (config('services.anodyne.exchange'))
            <x-nova2.resource :href="route('exchange.index')" category="Add-Ons" title="Make Nova your own">
                Nova provides immense flexibility to truly make your game stand out.  Whether you're trying to change the way it looks with a new theme or rank set or even update how it works with an extension, the talented community artisans on the Nova Exchange have you covered.
            </x-nova2.resource>
        @else
            <x-nova2.resource href="https://xtras.anodyne-productions.com" category="Add-Ons" title="Make Nova your own">
                Nova provides incredible flexibility to truly make your game stand out from others.  Whether you're trying to change the way it looks with a brand-new skin or rank set or even update how it works with a MOD, the talented authors on the AnodyneXtras site have you covered.
            </x-nova2.resource>
        @endif
    </div>
</div>