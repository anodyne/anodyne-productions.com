<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h1 class="sr-only">Profile</h1>
        <!-- Main 3 column grid -->
        <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
            <!-- Left column -->
            <div class="grid grid-cols-1 gap-8 lg:col-span-2">
                <!-- Welcome panel -->
                <section aria-labelledby="profile-overview-title">
                    <div class="rounded-xl bg-white overflow-hidden shadow-md">
                        <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
                        <div class="bg-white p-6">
                            <div class="sm:flex sm:items-center sm:justify-between">
                                <div class="sm:flex sm:items-center sm:space-x-5">
                                    <div class="shrink-0">
                                        <img class="mx-auto h-20 w-20 squircle" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                        <p class="text-sm font-medium text-gray-600">Welcome back,</p>
                                        <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                <div class="mt-5 flex justify-center sm:mt-0">
                                    <a href="#" class="flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50">
                                        View public profile
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 bg-gray-50 grid grid-cols-1 divide-y divide-gray-200 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                            <div class="px-6 py-5 text-sm font-medium text-center">
                                <span class="text-gray-900">12</span>
                                <span class="text-gray-600">Vacation days left</span>
                            </div>

                            <div class="px-6 py-5 text-sm font-medium text-center">
                                <span class="text-gray-900">4</span>
                                <span class="text-gray-600">Sick days left</span>
                            </div>

                            <div class="px-6 py-5 text-sm font-medium text-center">
                                <span class="text-gray-900">2</span>
                                <span class="text-gray-600">Personal days left</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Actions panel -->
                <section aria-labelledby="quick-links-title">
                    <div class="rounded-xl bg-gray-200 overflow-hidden shadow-md divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-2 sm:gap-px">
                        <h2 class="sr-only" id="quick-links-title">Quick links</h2>

                        <div class="rounded-tl-xl rounded-tr-xl sm:rounded-tr-none relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                            <div>
                                <span class="squircle inline-flex p-3 bg-gray-100 text-gray-500 group-hover:bg-amber-100 group-hover:text-amber-700 ring-4 ring-white transition-colors ease-in-out duration-200">
                                    @svg('fluent-class', 'h-7 w-7')
                                </span>
                            </div>
                            <div class="mt-8">
                                <h3 class="text-lg font-medium">
                                    <a href="{{ route('docs') }}" class="focus:outline-none">
                                        <!-- Extend touch target to entire panel -->
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        Nova Documentation
                                    </a>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    Read Nova's completely re-written documentation and learn about everything from start to finish about Nova.
                                </p>
                            </div>
                            <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400 transition-colors ease-in-out duration-200" aria-hidden="true">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"></path>
                                </svg>
                            </span>
                        </div>

                        <div class="sm:rounded-tr-xl relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                            <div>
                                <span class="squircle inline-flex p-3 bg-gray-100 text-gray-500 group-hover:bg-amber-100 group-hover:text-amber-700 ring-4 ring-white transition-colors ease-in-out duration-200">
                                    @svg('fluent-apps-add-in', 'h-7 w-7')
                                </span>
                            </div>
                            <div class="mt-8">
                                <h3 class="flex items-center space-x-3 text-lg font-medium">
                                    <a href="#" class="focus:outline-none">
                                        <!-- Extend touch target to entire panel -->
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        Nova Exchange
                                    </a>
                                    @if (config('services.anodyne.exchange') === false)
                                        <x-badge color="amber" size="sm">Coming this Summer</x-badge>
                                    @endif
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    Discover and share add-ons for Nova from around the community, including themes, extensions, and rank sets.
                                </p>
                            </div>
                            <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400 transition-colors ease-in-out duration-200" aria-hidden="true">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"></path>
                                </svg>
                            </span>
                        </div>

                        <div class="sm:rounded-bl-xl relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                            <div>
                                <span class="squircle inline-flex p-3 bg-orange-100 text-orange-700 ring-4 ring-white">
                                    <svg class="h-6 w-6" x-description="Heroicon name: receipt-refund" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h3 class="text-lg font-medium">
                                    <a href="#" class="focus:outline-none">
                                        <!-- Extend touch target to entire panel -->
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        Submit an expense
                                    </a>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.
                                </p>
                            </div>
                            <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"></path>
                                </svg>
                            </span>
                        </div>

                        <div class="rounded-bl-xl rounded-br-xl sm:rounded-bl-none relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                            <div>
                                <span class="squircle inline-flex p-3 bg-gray-100 text-gray-700 ring-4 ring-white">
                                    <svg class="h-6 w-6" x-description="Heroicon name: academic-cap" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                        <path fill="#fff" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h3 class="text-lg font-medium">
                                    <a href="#" class="focus:outline-none">
                                        <!-- Extend touch target to entire panel -->
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        Training
                                    </a>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.
                                </p>
                            </div>
                            <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"></path>
                                </svg>
                            </span>
                        </div>

                    </div>
                </section>
            </div>

            <!-- Right column -->
            <div class="grid grid-cols-1 gap-4">
                <!-- Announcements -->
                <section aria-labelledby="announcements-title">
                    <div class="rounded-xl bg-white overflow-hidden shadow-md">
                        <div class="p-6">
                            <h2 class="text-base font-medium text-gray-900" id="announcements-title">From Anodyne</h2>
                            <div class="flow-root mt-6">
                                <ul class="-my-5 divide-y divide-gray-200">

                                    <li class="py-5">
                                        <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                            <h3 class="text-sm font-semibold text-gray-800">
                                                <a href="#" class="hover:underline focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    Office closed on July 2nd
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                                Cum qui rem deleniti. Suscipit in dolor veritatis sequi aut. Vero ut earum quis deleniti. Ut a sunt eum cum ut repudiandae possimus. Nihil ex tempora neque cum consectetur dolores.
                                            </p>
                                        </div>
                                    </li>

                                    <li class="py-5">
                                        <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                            <h3 class="text-sm font-semibold text-gray-800">
                                                <a href="#" class="hover:underline focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    New password policy
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                                Alias inventore ut autem optio voluptas et repellendus. Facere totam quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel natus. Est sit autem mollitia.
                                            </p>
                                        </div>
                                    </li>

                                    <li class="py-5">
                                        <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                            <h3 class="text-sm font-semibold text-gray-800">
                                                <a href="#" class="hover:underline focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    Office closed on July 2nd
                                                </a>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                                Tenetur libero voluptatem rerum occaecati qui est molestiae exercitationem. Voluptate quisquam iure assumenda consequatur ex et recusandae. Alias consectetur voluptatibus. Accusamus a ab dicta et. Consequatur quis dignissimos voluptatem nisi.
                                            </p>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <div class="mt-6">
                                <a href="#" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50">
                                    View all
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
