<x-guest-layout>
    <header class="px-4 overflow-hidden relative pt-16 pb-24 bg-gray-800 | lg:pb-36">
        <svg class="block absolute right-0 bottom-0 w-full h-10 text-gray-100 transform rotate-180 z-10 | lg:h-24" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
            <polygon points="0,100 0,0 100,0 100,0" />
        </svg>

        <h1 class="text-center font-extrabold text-4xl | lg:text-6xl">
            <div class="block leading-tight text-white">RPG Management.</div>
            <div class="block leading-tight bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 to-orange-500">Re-imagined.</div>
        </h1>
    </header>

    <section class="py-16 bg-gray-100 space-y-24">
        {{-- Mobile --}}
        <div class="overflow-hidden">
            <div class="relative max-w-xl mx-auto px-4 | sm:px-6 lg:px-8 lg:max-w-screen-lg">
                <svg class="hidden absolute left-full transform -translate-x-1/2 -translate-y-1/4 | lg:block" width="404" height="784" fill="none" viewBox="0 0 404 784">
                    <defs>
                        <pattern id="b1e6e422-73f8-40a6-b5d9-c8586e37e0e7" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="784" fill="url(#b1e6e422-73f8-40a6-b5d9-c8586e37e0e7)" />
                </svg>

                <div class="relative lg:text-center">
                    <p class="text-base text-blue-500 font-semibold tracking-wide uppercase">Mobile</p>
                    <h3 class="text-3xl font-extrabold tracking-tight text-gray-900 | sm:text-4xl">
                        Freedom to play wherever you are
                    </h3>
                    <p class="mt-4 max-w-3xl mx-auto text-xl text-gray-500">
                        No matter where you are or what device you're on, Nova 3 just works. From day 1, we've designed it to work on phones and tablets as well as a computer.
                    </p>
                </div>

                <div class="relative mt-12 w-3/4 mx-auto">
                    <img src="{{ asset('images/devices.svg') }}" class="block w-full" alt="">
                    {{-- <img src="{{ asset('images/Macbook.svg') }}" class="block inset-y-0 w-128" alt=""> --}}

                    {{-- <div class="absolute bottom-0 right-0">
                        <img src="{{ asset('images/iPad.svg') }}" class="w-96" alt="">
                    </div> --}}
                </div>
            </div>

        </div>

        {{-- Storytelling --}}
        <div class="bg-gradient-to-l from-cool-gray-600 to-cool-gray-800 py-16">
            <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <p class="text-base text-blue-500 font-semibold tracking-wide uppercase">Storytelling</p>
                    <h3 class="mt-2 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        A new way to tell stories
                    </h3>
                    <p class="mt-4 max-w-2xl text-xl text-gray-400 lg:mx-auto">
                        A brand-new way of thinking about stories led us to a innovative approach to help you tell your stories the way you want.
                    </p>
                </div>

                <div class="mt-10">
                    <ul class="md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                        <li>
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                        @svg('timeline', 'h-7 w-7')
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-100">Unified story timeline</h4>
                                    <p class="mt-2 text-base text-gray-400">
                                        Stories live on a timeline to give chronological context to your game. Readers will be able to see how your game's adventures unfold in precisely the order you intended them.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mt-10 md:mt-0">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                        @svg('text-bullet-list-tree', 'h-7 w-7')
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-100">Non-sequential storytelling</h4>
                                    <p class="mt-2 text-base text-gray-400">
                                        You're no longer limited to telling stories one after another. With the unified timeline, you can go back and tell stories in whatever order you want, even including <em>inside</em> of other stories.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mt-10 md:mt-0">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                        @svg('edit-settings', 'h-7 w-7')
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-100">Flexible post types</h4>
                                    <p class="mt-2 text-base text-gray-400">
                                        Create different ways for players to contribute to the story through post types. Control what fields display as well as a wide range of options for any posts of that type.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mt-10 md:mt-0">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                        @svg('calligraphy-pen', 'h-7 w-7')
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-medium text-gray-100">Write anywhere in the story</h4>
                                    <p class="mt-2 text-base text-gray-400">
                                        Players can add new posts anywhere in the story. This provides for vastly improved chronological ordering based on the story being told and not on when the post was published.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Ranks --}}
        <div class="overflow-hidden">
            <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-screen-lg">
                <svg class="hidden lg:block absolute left-full transform -translate-x-1/2 -translate-y-1/4" width="404" height="784" fill="none" viewBox="0 0 404 784">
                    <defs>
                        <pattern id="b1e6e422-73f8-40a6-b5d9-c8586e37e0e7" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="784" fill="url(#b1e6e422-73f8-40a6-b5d9-c8586e37e0e7)" />
                </svg>

                <div class="relative lg:text-center">
                    <p class="text-base text-blue-500 font-semibold tracking-wide uppercase">Ranks</p>
                    <h3 class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Ranks done right
                    </h3>
                    <p class="mt-4 max-w-3xl mx-auto text-xl text-gray-500">
                        A re-imagined system for handling ranks makes it infinitely easier to manage your ranks and build them exactly how you want them.
                    </p>
                </div>

                <div class="relative mt-12 lg:mt-24 lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                    <div class="relative">
                        <ul>
                            <li>
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                            @svg('grid', 'h-7 w-7')
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h5 class="text-lg font-medium text-gray-900">Organize ranks into your own groups</h5>
                                        <p class="mt-2 text-base text-gray-500">
                                            Easily create groups for organizing your ranks that make it easy to find the ranks you're looking for when you need them.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-10">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                            <!-- Heroicon name: scale -->
                                            <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h5 class="text-lg font-medium text-gray-900">Re-use rank information</h5>
                                        <p class="mt-2 text-base text-gray-500">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-10">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                            @svg('layer', 'h-7 w-7')
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h5 class="text-lg font-medium text-gray-900">Ultimate flexibility</h5>
                                        <p class="mt-2 text-base text-gray-500">
                                            Compose your rank images from a base image and a pip image for the ultimate flexibility. With a few clicks, you can create an entirely new rank without touching any photo editing software.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-10">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                            <!-- Heroicon name: lightning-bolt -->
                                            <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h5 class="text-lg font-medium text-gray-900">Preview your new rank in realtime</h5>
                                        <p class="mt-2 text-base text-gray-500">
                                            As you make selections, the preview of your rank will update in front of you. No more guessing what rank you're building.
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-10 -mx-4 relative lg:mt-0">
                        <svg class="absolute left-1/2 transform -translate-x-1/2 translate-y-16 lg:hidden" width="784" height="404" fill="none" viewBox="0 0 784 404">
                            <defs>
                                <pattern id="ca9667ae-9f92-4be7-abcb-9e3d727f2941" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                </pattern>
                            </defs>
                            <rect width="784" height="404" fill="url(#ca9667ae-9f92-4be7-abcb-9e3d727f2941)" />
                        </svg>
                        <img class="relative mx-auto" width="490" src="{{ asset('images/feature-example-1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        {{-- Everything else --}}
        <div class="bg-gradient-to-br from-blue-500 to-blue-700 py-16">
            <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">
                <div>
                    <p class="text-3xl font-extrabold text-white">Better at... everything</p>
                    <p class="mt-4 text-lg text-blue-200">From the ground-up, Nova 3 takes everything that Nova has done for years and aims to make it better. The end result is a product that's faster, smarter, and easier to use than its ever been.</p>
                </div>
                <div class="mt-12 lg:mt-0 lg:col-span-2">
                    <dl class="space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:grid-rows-4 sm:grid-flow-col sm:gap-x-6 sm:gap-y-4 lg:gap-x-8">
                        <div class="flex space-x-3">
                            @svg('checkmark', 'flex-shrink-0 h-6 w-6 text-blue-400')
                            <div class="space-y-2">
                                <dt class="text-lg font-medium text-blue-100">Creating new users</dt>
                                <dd class="flex space-x-3">
                                    <span class="text-base text-blue-300">No need to use the join form anymore, simply click and add a new user.</span>
                                </dd>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            @svg('checkmark', 'flex-shrink-0 h-6 w-6 text-blue-400')
                            <div class="space-y-2">
                                <dt class="text-lg font-medium text-blue-100">Streamlined character assignment</dt>
                                <dd class="flex space-x-3">
                                    <span class="text-base text-blue-300">Assign characters to users and vice versa from their management pages.</span>
                                </dd>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            @svg('checkmark', 'flex-shrink-0 h-6 w-6 text-blue-400')
                            <div class="space-y-2">
                                <dt class="text-lg font-medium text-blue-100">Multi-user character ownership</dt>
                                <dd class="flex space-x-3">
                                    <span class="text-base text-blue-300">Manage a character with another player seamlessly to help tell stories better.</span>
                                </dd>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            @svg('checkmark', 'flex-shrink-0 h-6 w-6 text-blue-400')
                            <div class="space-y-2">
                                <dt class="text-lg font-medium text-blue-100">Granular access control</dt>
                                <dd class="flex space-x-3">
                                    <span class="text-base text-blue-300">You can manage phone, email and chat conversations all from a single mailbox.</span>
                                </dd>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            @svg('checkmark', 'flex-shrink-0 h-6 w-6 text-blue-400')
                            <div class="space-y-2">
                                <dt class="text-lg font-medium text-blue-100">Flexible default roles</dt>
                                <dd class="flex space-x-3">
                                    <span class="text-base text-blue-300">Find what you need with advanced filters, bulk actions, and quick views.</span>
                                </dd>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            @svg('checkmark', 'flex-shrink-0 h-6 w-6 text-blue-400')
                            <div class="space-y-2">
                                <dt class="text-lg font-medium text-blue-100">Robust application review process</dt>
                                <dd class="flex space-x-3 lg:border-t-0 lg:py-0 lg:pb-4">
                                    <span class="text-base text-blue-300">Find what you need with advanced filters, bulk actions, and quick views.</span>
                                </dd>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            @svg('checkmark', 'flex-shrink-0 h-6 w-6 text-blue-400')
                            <div class="space-y-2">
                                <dt class="text-lg font-medium text-blue-100">Powerful page manager</dt>
                                <dd class="flex space-x-3">
                                    <span class="text-base text-blue-300">Find what you need with advanced filters, bulk actions, and quick views.</span>
                                </dd>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            @svg('checkmark', 'flex-shrink-0 h-6 w-6 text-blue-400')
                            <div class="space-y-2">
                                <dt class="text-lg font-medium text-blue-100">All-new form builder</dt>
                                <dd class="flex space-x-3">
                                    <span class="text-base text-blue-300">Find what you need with advanced filters, bulk actions, and quick views.</span>
                                </dd>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="bg-gray-100">
            <div class="max-w-2xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    <span class="block">Ready to dive in?</span>
                    <span class="block text-blue-500">Check out the demo today.</span>
                </h2>
                <p class="mt-4 text-lg leading-6 text-gray-500">
                    Username &ndash; <span class="font-mono">admin@admin.com</span><br>
                    Password &ndash; <span class="font-mono">secret</span></p>
                <div class="mt-8 inline-flex rounded-md shadow">
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                        Get started
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-800">
        <div class="max-w-screen-lg mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="xl:col-span-1">
                    <x-jet-application-logo class="text-gray-300 h-10 w-auto" />
                    <p class="mt-8 text-gray-400 text-base">
                        Making the world a better place through constructing elegant hierarchies.
                    </p>
                    <div class="mt-8 flex">
                        <a href="#" class="text-gray-400 hover:text-gray-300">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="ml-6 text-gray-400 hover:text-gray-300">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                        <a href="#" class="ml-6 text-gray-400 hover:text-gray-300">
                            <span class="sr-only">GitHub</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="ml-6 text-gray-400 hover:text-gray-300">
                            <span class="sr-only">Discord</span>
                            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 146 146"><title>Discord</title><path d="M107.75 125.001s-4.5-5.375-8.25-10.125c16.375-4.625 22.625-14.875 22.625-14.875-5.125 3.375-10 5.75-14.375 7.375-6.25 2.625-12.25 4.375-18.125 5.375-12 2.25-23 1.625-32.375-.125-7.125-1.375-13.25-3.375-18.375-5.375-2.875-1.125-6-2.5-9.125-4.25-.375-.25-.75-.375-1.125-.625-.25-.125-.375-.25-.5-.375-2.25-1.25-3.5-2.125-3.5-2.125s6 10 21.875 14.75c-3.75 4.75-8.375 10.375-8.375 10.375-27.625-.875-38.125-19-38.125-19 0-40.25 18-72.875 18-72.875 18-13.5 35.125-13.125 35.125-13.125l1.25 1.5c-22.5 6.5-32.875 16.375-32.875 16.375s2.75-1.5 7.375-3.625c13.375-5.875 24-7.5 28.375-7.875.75-.125 1.375-.25 2.125-.25 7.625-1 16.25-1.25 25.25-.25 11.875 1.375 24.625 4.875 37.625 12 0 0-9.875-9.375-31.125-15.875l1.75-2S110 19.626 128 33.126c0 0 18 32.625 18 72.875 0 0-10.625 18.125-38.25 19zM49.625 66.626c-7.125 0-12.75 6.25-12.75 13.875s5.75 13.875 12.75 13.875c7.125 0 12.75-6.25 12.75-13.875.125-7.625-5.625-13.875-12.75-13.875zm45.625 0c-7.125 0-12.75 6.25-12.75 13.875s5.75 13.875 12.75 13.875c7.125 0 12.75-6.25 12.75-13.875s-5.625-13.875-12.75-13.875z" fill-rule="nonzero"></path></svg>
                        </a>
                    </div>
                </div>
                <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h4 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                                Solutions
                            </h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="#" class="text-base text-gray-300 hover:text-white">
                                        Nova 2
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-300 hover:text-white">
                                        Nova 3
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-300 hover:text-white">
                                        AnodyneXtras
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h4 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                                Support
                            </h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="#" class="text-base text-gray-300 hover:text-white">
                                        Support Home
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-300 hover:text-white">
                                        Discord
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-300 hover:text-white">
                                        Documentation
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h4 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                                Company
                            </h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="#" class="text-base text-gray-300 hover:text-white">
                                        About
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-300 hover:text-white">
                                        Blog
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h4 class="text-sm font-semibold tracking-wider text-gray-400 uppercase">
                                Legal
                            </h4>
                            <ul class="mt-4">
                                <li>
                                    <a href="#" class="text-base text-gray-300 hover:text-white">
                                        Privacy
                                    </a>
                                </li>
                                <li class="mt-4">
                                    <a href="#" class="text-base text-gray-300 hover:text-white">
                                        Terms
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-8">
                <p class="text-base text-gray-400 xl:text-center">
                    &copy; 2020 Anodyne Productions, All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</x-guest-layout>
