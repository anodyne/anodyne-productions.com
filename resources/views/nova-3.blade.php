<x-base-layout bg-color="gray-800" text-color="gray-400">
    <div class="min-h-screen">
        <x-nova3.header />

        <main>
            <a name="features"></a>

            <div class="lg:mx-auto lg:max-w-7xl lg:px-8 space-y-32">
                <div class="relative space-y-8" x-data="{ feature: 'chronological' }">
                    <div>
                        <div>
                            <span class="squircle w-16 h-16 flex items-center justify-center bg-gradient-to-r from-orange-500 to-amber-500">
                                @svg('st-quill', 'h-10 w-10 text-white')
                            </span>
                        </div>
                        <div class="mt-4 space-y-4">
                            <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-white">
                                A new way to tell stories.
                            </h2>
                            <p class="mt-4 max-w-3xl text-lg">
                                Experience a re-imagined storytelling experience in Nova 3 with greater chronological context for readers, a whole new level of flexibility in the way you write stories, and unparalleled control over the types of content that you and your players are able to write.
                            </p>
                        </div>
                    </div>

                    <div class="flex space-x-8">
                        <a role="button" @click.prevent="feature = 'chronological'" class="flex-1 flex flex-col space-y-1 pb-6 border-b-[3px] transition" :class="{ 'border-white': feature === 'chronological', 'border-transparent hover:border-gray-500': feature !== 'chronological' }">
                            <span :class="{ 'text-gray-500': feature !== 'chronological', 'text-amber-500': feature === 'chronological' }">
                                @svg('fluent-timeline', 'h-7 w-7')
                            </span>
                            <div class="font-semibold text-white">Chronological context</div>
                            <p class="text-gray-500">Stories live on a timeline, giving readers the chance to experience your game's adventures in exactly the order you intend them.</p>
                        </a>
                        <a role="button" @click.prevent="feature = 'non-linear'" class="flex-1 flex flex-col space-y-1 pb-6 border-b-[3px] transition" :class="{ 'border-white': feature === 'non-linear', 'border-transparent hover:border-gray-500': feature !== 'non-linear' }">
                            <span :class="{ 'text-gray-500': feature !== 'non-linear', 'text-amber-500': feature === 'non-linear' }">
                                @svg('fluent-clock', 'h-7 w-7')
                            </span>
                            <div class="font-semibold text-white">Non-linear storytelling</div>
                            <p class="text-gray-500">Add stories and posts in whatever order you want to ensure chronological integrity. You can even add stories <em>inside</em> of other stories.</p>
                        </a>
                        <a role="button" @click.prevent="feature = 'post-types'" class="flex-1 flex flex-col space-y-1 pb-6 border-b-[3px] transition" :class="{ 'border-white': feature === 'post-types', 'border-transparent hover:border-gray-500': feature !== 'post-types' }">
                            <span :class="{ 'text-gray-500': feature !== 'post-types', 'text-amber-500': feature === 'post-types' }">
                                @svg('fluent-edit-settings', 'h-7 w-7')
                            </span>
                            <div class="font-semibold text-white">Post types</div>
                            <p class="text-gray-500">Create different ways for players to contribute through post types with fine-tuned control over a host of options for any post of that type.</p>
                        </a>
                    </div>

                    <div>
                        <x-browser-window>
                            <div x-show="feature === 'chronological'">Stories live on a timeline, giving readers the chance to experience your game's adventures in exactly the order you intend them.</div>
                            <div x-show="feature === 'non-linear'">Add stories and posts in whatever order you want to ensure chronological integrity. You can even add stories <em>inside</em> of other stories.</div>
                            <div x-show="feature === 'post-types'">Create different ways for players to contribute through post types with fine-tuned control over a host of options for any post of that type.</div>
                        </x-browser-window>
                    </div>
                </div>

                <div class="relative space-y-8" x-data="{ feature: 'any-device' }">
                    <div>
                        <div>
                            <span class="squircle w-16 h-16 flex items-center justify-center bg-gradient-to-r from-orange-500 to-amber-500">
                                @svg('st-responsive-design', 'h-10 w-10 text-white')
                            </span>
                        </div>
                        <div class="mt-4 space-y-4">
                            <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-white">
                                Play wherever you are.
                            </h2>
                            <p class="mt-4 max-w-3xl text-lg">
                                You're no longer chained to a computer to get the optimal Nova experience. We've designed everything in Nova 3 to be easily accessible whether you're sitting on a train with your phone, lounging on the couch with your tablet, or sitting at a desk with your computer.
                            </p>
                        </div>
                    </div>

                    <div class="flex space-x-8">
                        <a role="button" @click.prevent="feature = 'any-device'" class="flex-1 flex flex-col space-y-1 pb-6 border-b-[3px] transition" :class="{ 'border-white': feature === 'any-device', 'border-transparent hover:border-gray-500': feature !== 'any-device' }">
                            <span :class="{ 'text-gray-500': feature !== 'any-device', 'text-amber-500': feature === 'any-device' }">
                                @svg('fluent-phone-desktop', 'h-7 w-7')
                            </span>
                            <div class="font-semibold text-white">Bring any device</div>
                            <p class="text-gray-500">Whether you're playing on a mobile phone or an 4k monitor, Nova is designed to let you manage and play your game from any device.</p>
                        </a>
                        <a role="button" @click.prevent="feature = 'mobile'" class="flex-1 flex flex-col space-y-1 pb-6 border-b-[3px] transition" :class="{ 'border-white': feature === 'mobile', 'border-transparent hover:border-gray-500': feature !== 'mobile' }">
                            <span :class="{ 'text-gray-500': feature !== 'mobile', 'text-amber-500': feature === 'mobile' }">
                                @svg('fluent-paint-bucket', 'h-7 w-7')
                            </span>
                            <div class="font-semibold text-white">Mobile-specific designs</div>
                            <p class="text-gray-500">We took cues from mobile operating systems so that Nova feels natural when you're using it on your phone or tablet.</p>
                        </a>
                        <a role="button" @click.prevent="feature = 'pwa'" class="flex-1 flex flex-col space-y-1 pb-6 border-b-[3px] transition" :class="{ 'border-white': feature === 'pwa', 'border-transparent hover:border-gray-500': feature !== 'pwa' }">
                            <span :class="{ 'text-gray-500': feature !== 'pwa', 'text-amber-500': feature === 'pwa' }">
                                @svg('fluent-phone-mobile', 'h-7 w-7')
                            </span>
                            <div class="font-semibold text-white">Progressive web app</div>
                            <p class="text-gray-500">Nova 3 sites can be added to your home screen and will act and behave more like a native app than a webpage.</p>
                        </a>
                    </div>

                    <div>
                        <x-browser-window>
                            <div x-show="feature === 'chronological'">Stories live on a timeline, giving readers the chance to experience your game's adventures in exactly the order you intend them.</div>
                            <div x-show="feature === 'non-linear'">Add stories and posts in whatever order you want to ensure chronological integrity. You can even add stories <em>inside</em> of other stories.</div>
                            <div x-show="feature === 'post-types'">Create different ways for players to contribute through post types with fine-tuned control over a host of options for any post of that type.</div>
                        </x-browser-window>
                    </div>
                </div>

                <div class="relative space-y-8" x-data="{ feature: 'groups' }">
                    <div>
                        <div>
                            <span class="squircle w-16 h-16 flex items-center justify-center bg-gradient-to-r from-orange-500 to-amber-500">
                                @svg('st-army-badge', 'h-10 w-10 text-white')
                            </span>
                        </div>
                        <div class="mt-4 space-y-4">
                            <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-white">
                                Ranks. Done right.
                            </h2>
                            <p class="mt-4 max-w-3xl text-lg">
                                Ranks in Nova 2 were cumbersome and complicated to manage. Instead of trying to improve on what's in Nova 2, we started over. What came from that is a rank system that's powerful and easy-to-use.
                            </p>
                        </div>
                    </div>

                    <div class="flex space-x-8">
                        <a role="button" @click.prevent="feature = 'groups'" class="flex-1 flex flex-col space-y-1 pb-6 border-b-[3px] transition" :class="{ 'border-white': feature === 'groups', 'border-transparent hover:border-gray-500': feature !== 'groups' }">
                            <span :class="{ 'text-gray-500': feature !== 'groups', 'text-amber-500': feature === 'groups' }">
                                @svg('fluent-group-list', 'h-7 w-7')
                            </span>
                            <div class="font-semibold text-white">Rank groups</div>
                            <p class="text-gray-500">Easily create groups to organize your ranks and make it easy to find the ranks you're looking for when you need them.</p>
                        </a>
                        <a role="button" @click.prevent="feature = 'info'" class="flex-1 flex flex-col space-y-1 pb-6 border-b-[3px] transition" :class="{ 'border-white': feature === 'info', 'border-transparent hover:border-gray-500': feature !== 'info' }">
                            <span :class="{ 'text-gray-500': feature !== 'info', 'text-amber-500': feature === 'info' }">
                                @svg('fluent-arrow-repeat-all', 'h-7 w-7')
                            </span>
                            <div class="font-semibold text-white">Re-usable rank information</div>
                            <p class="text-gray-500">Save time by re-using basic rank information like name across multiple ranks. Change it once and it's updated everywhere.</p>
                        </a>
                        <a role="button" @click.prevent="feature = 'composition'" class="flex-1 flex flex-col space-y-1 pb-6 border-b-[3px] transition" :class="{ 'border-white': feature === 'composition', 'border-transparent hover:border-gray-500': feature !== 'composition' }">
                            <span :class="{ 'text-gray-500': feature !== 'composition', 'text-amber-500': feature === 'composition' }">
                                @svg('fluent-layer', 'h-7 w-7')
                            </span>
                            <div class="font-semibold text-white">Rank composition</div>
                            <p class="text-gray-500">Nova 3 sites can be added to your home screen and will act and behave more like a native app than a webpage.</p>
                        </a>
                    </div>

                    <div>
                        <x-browser-window>
                            <div x-show="feature === 'chronological'">Stories live on a timeline, giving readers the chance to experience your game's adventures in exactly the order you intend them.</div>
                            <div x-show="feature === 'non-linear'">Add stories and posts in whatever order you want to ensure chronological integrity. You can even add stories <em>inside</em> of other stories.</div>
                            <div x-show="feature === 'post-types'">Create different ways for players to contribute through post types with fine-tuned control over a host of options for any post of that type.</div>
                        </x-browser-window>
                    </div>
                </div>
            </div>

            <!-- Alternating Feature Sections -->
            <div class="relative pt-16 pb-32 overflow-hidden space-y-24">
                {{-- <x-nova3.feature-large icon="st-quill" title="A new way to tell stories." image="/images/nova3-stories.webp">
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
                </x-nova3.feature-large> --}}

                {{-- <x-nova3.feature-large icon="st-responsive-design" title="Play wherever you are." image="/images/nova3-dashboard.webp" right>
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
                </x-nova3.feature-large> --}}

                {{-- <x-nova3.feature-large icon="st-army-badge" title="Ranks. Done right." image="/images/nova3-ranks.webp">
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
                </x-nova3.feature-large> --}}
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