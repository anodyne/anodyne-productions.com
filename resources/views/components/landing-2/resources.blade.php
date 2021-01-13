<div class="relative max-w-7xl mx-auto bg-white pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div class="text-center">
        <a name="resources"></a>
        <h2 class="text-base text-anodyne-orange-4 font-semibold tracking-wide uppercase">Learn</h2>
        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            Helpful Resources
        </p>
        {{-- <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed.
        </p> --}}
    </div>

    <div class="mt-12 max-w-lg mx-auto grid gap-x-6 gap-y-12 lg:grid-cols-{{ config('services.anodyne.exchange') ? '3' : '2' }} lg:max-w-none">
        <x-landing-2.components.resource :href="route('docs')" category="Docs" title="Learn all about Nova 2">
            Nova's documentation has been re-written to be clearer and more helpful than before. We've added all-new sections about getting started, added pages to explain complex features, and dug deeper into the core of Nova to help users understand how to get the most out Nova 2.
        </x-landing-2.components.resource>

        <x-landing-2.components.resource href="https://discord.gg/7WmKUks" target="_blank" category="Community" title="Join the community">
            Over the years Nova has fostered a global community of artists, developers, and writers who are passionate about the stories they tell. No matter if you're looking to chat with people, find a new game, or get help with Nova, the Anodyne community is ready to welcome you.
        </x-landing-2.components.resource>

        @if (config('services.anodyne.exchange'))
            <x-landing-2.components.resource :href="route('exchange.index')" category="Exchange" title="Make Nova your own">
                Nova provides immense flexibility to truly make your game stand out.  Whether you're trying to change the way it looks with a new theme or rank set or even update how it works with an extension, the talented community artisans on the Nova Exchange have you covered.
            </x-landing-2.components.resource>
        @endif
    </div>
</div>