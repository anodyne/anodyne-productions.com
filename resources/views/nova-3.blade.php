<x-layouts.base bg-color="gray-800" text-color="gray-400">
    <div class="min-h-screen">
        <x-nova3.header />

        <main>
            <!-- Hero section -->
            <div class="relative">
                <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100"></div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="relative shadow-xl sm:rounded-2xl sm:overflow-hidden">
                        <div class="absolute inset-0">
                            <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2830&amp;q=80&amp;sat=-100" alt="People working on laptops">
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-800 to-indigo-700" style="mix-blend-mode: multiply;"></div>
                        </div>
                        <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
                            <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                                <span class="block text-white">Take control of your</span>
                                <span class="block text-indigo-200">customer support</span>
                            </h1>
                            <p class="mt-6 max-w-lg mx-auto text-center text-xl text-indigo-200 sm:max-w-3xl">
                                Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.
                            </p>
                            <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                                <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5">
                                    <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-indigo-700 bg-white hover:bg-indigo-50 sm:px-8">
                                        Get started
                                    </a>
                                    <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-500 bg-opacity-60 hover:bg-opacity-70 sm:px-8">
                                        Live demo
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logo Cloud -->
            <div class="bg-gray-100">
                <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
                    <p class="text-center text-sm font-semibold uppercase text-gray-500 tracking-wide">
                        Trusted by over 5 very average small businesses
                    </p>
                    <div class="mt-6 grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
                        <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                            <img class="h-12" src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg" alt="Tuple">
                        </div>
                        <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                            <img class="h-12" src="https://tailwindui.com/img/logos/mirage-logo-gray-400.svg" alt="Mirage">
                        </div>
                        <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                            <img class="h-12" src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg" alt="StaticKit">
                        </div>
                        <div class="col-span-1 flex justify-center md:col-span-2 md:col-start-2 lg:col-span-1">
                            <img class="h-12" src="https://tailwindui.com/img/logos/transistor-logo-gray-400.svg" alt="Transistor">
                        </div>
                        <div class="col-span-2 flex justify-center md:col-span-2 md:col-start-4 lg:col-span-1">
                            <img class="h-12" src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg" alt="Workcation">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alternating Feature Sections -->
            <div class="relative pt-16 pb-32 lg:overflow-hidden">
                <div aria-hidden="true" class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-gray-800"></div>
                <div class="relative">
                    <x-nova3.feature-large icon="st-quill" title="A new way to tell stories." image="https://tailwindui.com/img/component-images/inbox-app-screenshot-2.jpg">
                        A brand-new way of thinking about stories led us to a innovative approach to help you tell your stories the way you want.
                    </x-nova3.feature-large>
                </div>
                <div class="mt-24">
                    <x-nova3.feature-large icon="st-army-badge" title="Ranks. Done right." image="https://tailwindui.com/img/component-images/inbox-app-screenshot-1.jpg" right>
                        A re-imagined system for handling ranks makes it infinitely easier to manage your ranks and build them exactly how you want them.
                    </x-nova3.feature-large>
                </div>
            </div>

            <!-- Gradient Feature Section -->
            <div class="">
                <div class="max-w-4xl mx-auto px-4 py-16 sm:px-6 sm:pt-20 sm:pb-24 lg:max-w-7xl lg:pt-24 lg:px-8">
                    <h2 class="text-3xl font-extrabold text-white tracking-tight">
                        Better at... everything.
                    </h2>
                    <p class="mt-4 max-w-3xl text-lg text-gray-500">
                        From the ground-up, Nova 3 takes everything that Nova has done for years and aims to make it better. The end result is a product that's faster, smarter, and easier to use than its ever been.
                    </p>
                    <div class="mt-12 grid grid-cols-1 gap-x-6 gap-y-12 sm:grid-cols-2 lg:mt-16 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-16">
                        <x-nova3.feature-small icon="fluent-rocket" title="Unlimited Inboxes">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small icon="fluent-people-community" title="Manage Team Members">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small icon="fluent-warning" title="Spam Report">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small icon="fluent-timeline" title="Compose in Markdown">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small icon="fluent-layer" title="Team Reporting">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small icon="fluent-edit-settings" title="Saved Replies">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small icon="fluent-comment-multiple" title="Email Commenting">
                            Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.
                        </x-nova3.feature-small>

                        <x-nova3.feature-small icon="fluent-chat-bubbles-help" title="Connect with Customers">
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
</x-layouts.base>