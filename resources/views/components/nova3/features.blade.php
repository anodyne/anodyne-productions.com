<div>
    <div class="max-w-7xl mx-auto pb-16 px-4 sm:px-6 lg:pb-24 lg:px-8">
        <div class="lg:text-center">
            <a name="features"></a>
            <h2 class="text-base text-amber-500 font-semibold tracking-wide uppercase">Features</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl">
                Better at... everything.
            </p>
        </div>

        <div class="pt-20">
            <div class="max-w-xl mx-auto lg:max-w-7xl">
                <dl class="space-y-16 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:gap-y-16">
                    <x-nova3.components.feature title="Mobile Friendly" text="Bring whatever device you want, Nova doesn't care! We've designed Nova from the ground up to work on devices of all sizes.">
                        <x-slot name="icon">
                            @svg('fluent-phone-desktop', 'h-8 w-8')
                        </x-slot>
                    </x-nova3.components.feature>

                    <x-nova3.components.feature title="Tell Your Stories" text="A brand-new way of thinking about stories led us to a innovative approach to help you tell your stories the way you want.">
                        <x-slot name="icon">
                            @svg('fluent-timeline', 'h-8 w-8')
                        </x-slot>
                    </x-nova3.components.feature>

                    <x-nova3.components.feature title="Post Types" text="Create different ways for players to contribute to the story through post types. Control what fields display as well as a range of other options.">
                        <x-slot name="icon">
                            @svg('fluent-edit-settings', 'h-8 w-8')
                        </x-slot>
                    </x-nova3.components.feature>

                    <x-nova3.components.feature title="Ranks Done Right" text="A re-imagined system for handling ranks makes it infinitely easier to manage your ranks and build them exactly how you want them.">
                        <x-slot name="icon">
                            @svg('fluent-layer', 'h-8 w-8')
                        </x-slot>
                    </x-nova3.components.feature>

                    <x-nova3.components.feature title="Application Review" text="Game masters rarely decide alone on an application, so why shouldn't reviewing it involve everyone making the decision?">
                        <x-slot name="icon">
                            @svg('fluent-checkmark-circle', 'h-8 w-8')
                        </x-slot>
                    </x-nova3.components.feature>

                    <x-nova3.components.feature title="Hello Darkness, My Old Friend" text="Want your admin panel to use a dark theme instead of light theme? Just flip a switch and enjoy the darkness.">
                        <x-slot name="icon">
                            @svg('fluent-moon', 'h-8 w-8')
                        </x-slot>
                    </x-nova3.components.feature>
                </dl>
            </div>
        </div>
    </div>
</div>