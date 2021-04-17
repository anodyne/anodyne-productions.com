<x-base-layout bg-color="gray-800" text-color="gray-400">
    <div class="min-h-screen">
        <x-nova3.header />

        <main>
            <a name="features"></a>
            <!-- Alternating Feature Sections -->
            <div class="relative pt-16 pb-32 overflow-hidden space-y-24">
                <x-nova3.feature-large icon="st-quill" title="A new way to tell stories." image="/images/nova3-stories.webp">
                    <dl class="space-y-6">
                        <div>
                            <dt class="font-semibold text-lg text-gray-300">Chronological context</dt>
                            <dd>Stories live on a timeline, giving readers the chance to experience your game's adventures in precisely the order you intend them.</dd>
                        </div>

                        <div>
                            <dt class="font-semibold text-lg text-gray-300">Non-linear storytelling</dt>
                            <dd>Add stories and posts in whatever order you want to ensure chronological integrity. You can even add stories <strong>inside</strong> of other stories.</dd>
                        </div>

                        <div>
                            <dt class="font-semibold text-lg text-gray-300">Post types</dt>
                            <dd>Create different ways for players to contribute through post types with fine-tuned control over a host of options for any post of that type.</dd>
                        </div>
                    </dl>
                </x-nova3.feature-large>

                <x-nova3.feature-large icon="st-responsive-design" title="Play wherever you are." image="/images/nova3-dashboard.webp" right>
                    <dl class="space-y-6">
                        <div>
                            <dt class="font-semibold text-lg text-gray-300">Bring any device</dt>
                            <dd>Whether you're playing on a mobile phone or an 4k monitor, Nova is designed to let you manage and play your game from any device.</dd>
                        </div>

                        <div>
                            <dt class="font-semibold text-lg text-gray-300">Mobile-specific designs</dt>
                            <dd>We took cues from mobile operating systems so that Nova feels natural when you're using it on your phone or tablet.</dd>
                        </div>

                        <div>
                            <dt class="font-semibold text-lg text-gray-300">Progressive web app</dt>
                            <dd>Nova 3 sites can be added to your home screen and will act and behave more like a native app than a webpage.</dd>
                        </div>
                    </dl>
                </x-nova3.feature-large>

                <x-nova3.feature-large icon="st-army-badge" title="Ranks. Done right." image="/images/nova3-ranks.webp">
                    <dl class="space-y-6">
                        <div>
                            <dt class="font-semibold text-lg text-gray-300">Rank groups</dt>
                            <dd>Easily create groups to organize your ranks and make it easy to find the ranks you're looking for when you need them.</dd>
                        </div>

                        <div>
                            <dt class="font-semibold text-lg text-gray-300">Re-usable rank information</dt>
                            <dd>Save time by re-using basic rank information like name across multiple ranks. Change it once and it's updated everywhere.</dd>
                        </div>

                        <div>
                            <dt class="font-semibold text-lg text-gray-300">Rank composition</dt>
                            <dd>Compose your rank images from a base image and a pip image for the ultimate flexibility. With a few clicks, you can create an entirely new rank without touching any photo editing software.</dd>
                        </div>
                    </dl>
                </x-nova3.feature-large>
            </div>

            <!-- Gradient Feature Section -->
            <div class="hidden bg-gradient-to-br from-green-700 to-green-500">
                <div class="max-w-4xl mx-auto px-4 py-16 sm:px-6 sm:pt-20 sm:pb-24 lg:max-w-7xl lg:pt-24 lg:px-8">
                    <h2 class="text-3xl font-extrabold text-white tracking-tight">
                        Better at... everything.
                    </h2>
                    <p class="mt-4 max-w-3xl text-lg text-green-200">
                        From the ground-up, Nova 3 takes everything that Nova has done for years and aims to make it better. The end result is a product that's faster, smarter, and easier to use than its ever been.
                    </p>
                    <div class="mt-12 grid grid-cols-1 gap-x-6 gap-y-12 sm:grid-cols-2 lg:mt-16 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-16">
                        <x-nova3.feature-small body-color="green-300" icon="fluent-rocket" title="Unlimited Inboxes">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small body-color="green-300" icon="fluent-people-community" title="Manage Team Members">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small body-color="green-300" icon="fluent-warning" title="Spam Report">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small body-color="green-300" icon="fluent-timeline" title="Compose in Markdown">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small body-color="green-300" icon="fluent-layer" title="Team Reporting">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small body-color="green-300" icon="fluent-edit-settings" title="Saved Replies">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small body-color="green-300" icon="fluent-comment-multiple" title="Email Commenting">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small body-color="green-300" icon="fluent-chat-bubbles-help" title="Connect with Customers">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>
                    </div>
                </div>
            </div>

            <x-nova3.demo />

            <x-nova3.faq />
        </main>

        <x-footer text-color="gray-500" hover-color="gray-400" />
    </div>
</x-base-layout>