<div>
    <a name="faq"></a>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8" x-data="{ openPanel: 0 }">
        <div class="max-w-3xl mx-auto divide-y-2 divide-gray-700">
            <h2 class="text-center text-3xl font-extrabold text-white sm:text-4xl">
                Frequently asked questions
            </h2>
            <dl class="mt-6 space-y-6 divide-y divide-gray-700">
                <x-nova3.components.question question="When is Nova 3 going to be released?" :index="0">
                    There is no timeframe right now. Our goal is to continue building Nova 3 until we feel that it's rock solid and ready for use with a wide range of games.
                </x-nova3.components.question>

                <x-nova3.components.question question="Where can I download Nova 3?" :index="1">
                    At the moment, we do not offer a download of the work that's been done on Nova 3. People who support Anodyne through our <a href="https://patreon.com/anodyneproductions" target="_blank" class="underline text-amber-500">Patreon</a> are given early access to a downloadable copy of Nova 3 that is updated regularly as an exclusive benefit of their support. The wider community will be given access to alpha and beta milestones in the future.
                </x-nova3.components.question>

                <x-nova3.components.question question="Will I be able to migrate my Nova 2 site to Nova 3?" :index="2">
                    Like the transition from Nova 1 to Nova 2, we'll build scripts to migrate Nova 2 sites to Nova 3. Given the huge changes coming in Nova 3 though, there will be certain things we won't be able to migrate from Nova 2. More information about those items and the migration process will be available at a later date.
                </x-nova3.components.question>

                <x-nova3.components.question question="Can I use my existing skins and MODs in Nova 3?" :index="3">
                    No. The format for themes and extensions in Nova 3 is completely different from Nova 2. All add-ons for Nova 3 will have to be written from scratch.
                </x-nova3.components.question>

                <x-nova3.components.question question="I've heard the term Nova NextGen used a lot. Is Nova 3 the same thing or something different?" :index="4">
                    Yes. Several years ago there were a lot of discussions around Nova 3 and what it would be, but over time, those ideas evolved significantly. To avoid confusion between what had been discussed previously and what was actually being worked on, we chose to use the term "Nova NextGen" to differentiate the ideas. For all intents and purposes, Nova 3 and Nova NextGen can now be used interchangeably.
                </x-nova3.components.question>
            </dl>
        </div>
    </div>
</div>
