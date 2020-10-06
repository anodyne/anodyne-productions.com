@extends('layouts.marketing')

@section('content')
<div class="relative bg-gray-100 overflow-hidden">
    <div class="hidden sm:block sm:absolute sm:inset-y-0 sm:h-full sm:w-full">
        <div class="relative h-full max-w-screen-xl mx-auto">
            <svg class="absolute right-full transform translate-y-1/4 translate-x-1/4 lg:translate-x-1/2" width="404" height="784" fill="none" viewBox="0 0 404 784">
                <defs>
                    <pattern id="svg-pattern-squares-1" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="784" fill="url(#svg-pattern-squares-1)" />
            </svg>
            <svg class="absolute left-full transform -translate-y-3/4 -translate-x-1/4 md:-translate-y-1/2 lg:-translate-x-1/2" width="404" height="784" fill="none" viewBox="0 0 404 784">
                <defs>
                    <pattern id="svg-pattern-squares-2" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="784" fill="url(#svg-pattern-squares-2)" />
            </svg>
        </div>
    </div>

    <div x-data="{ open: false }" class="relative pt-6 pb-12 sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6">
            <nav class="relative flex items-center justify-between sm:h-10 md:justify-center">
                <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                    <div class="flex items-center justify-between w-full md:w-auto">
                        <a href="{{ route('home') }}">
                            <x-logo-anodyne class="h-8 w-auto text-blue-500 | sm:h-10"></x-logo-anodyne>
                        </a>
                        <div class="-mr-2 flex items-center md:hidden">
                            <button @click="open = true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <a href="#" class="font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">Nova</a>
                    <a href="#" class="ml-10 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">Features</a>
                    <a href="#" class="ml-10 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">Marketplace</a>
                    <a href="#" class="ml-10 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">Company</a>
                </div>
                <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
                    <span class="inline-flex rounded-md shadow">
                        @auth
                        <a href="{{ route('account.info') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-blue-600 bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 active:text-blue-700 transition duration-150 ease-in-out">
                            Dashboard
                        </a>
                        @endauth

                        @guest
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-blue-600 bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 active:text-blue-700 transition duration-150 ease-in-out">
                            Log in
                        </a>
                        @endguest
                    </span>
                </div>
            </nav>
        </div>

        <div x-show="open" style="display: none;" class="absolute top-0 inset-x-0 p-2 md:hidden">
            <div class="rounded-lg shadow-md transition transform origin-top-right" x-show="open" x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                <div class="rounded-lg bg-white shadow-xs overflow-hidden">
                    <div class="px-5 pt-4 flex items-center justify-between">
                        <div>
                            <x-logo-anodyne class="h-8 w-auto text-blue-500"></x-logo-anodyne>
                        </div>
                        <div class="-mr-2">
                            <button @click="open = false" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="px-2 pt-2 pb-3">
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:text-gray-900 focus:bg-gray-100 transition duration-150 ease-in-out">Product</a>
                        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:text-gray-900 focus:bg-gray-100 transition duration-150 ease-in-out">Features</a>
                        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:text-gray-900 focus:bg-gray-100 transition duration-150 ease-in-out">Marketplace</a>
                        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:text-gray-900 focus:bg-gray-100 transition duration-150 ease-in-out">Company</a>
                    </div>
                    <div>
                        <a href="#" class="block w-full px-5 py-3 text-center font-medium text-blue-600 bg-gray-100 hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:bg-gray-100 focus:text-blue-700 transition duration-150 ease-in-out">
                            Log in
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 xl:mt-28">
            <div class="text-center">
                <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                    Data to enrich your
                    <br class="xl:hidden" />
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-teal-400">
                        online business
                    </span>
                </h2>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.
                </p>
                <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                    <div class="rounded-md shadow">
                        <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                            Get started
                        </a>
                    </div>
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                        <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-blue-600 bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline-blue transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                            Live demo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-16 bg-gray-100 overflow-hidden lg:py-24">
    <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-screen-xl">
        <svg class="hidden lg:block absolute left-full transform -translate-x-1/2 -translate-y-1/4" width="404" height="784" fill="none" viewBox="0 0 404 784">
            <defs>
                <pattern id="svg-pattern-squares-1" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                </pattern>
            </defs>
            <rect width="404" height="784" fill="url(#svg-pattern-squares-1)" />
        </svg>

        <div class="relative">
            <h3 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                A better way to send money
            </h3>
            <p class="mt-4 max-w-3xl mx-auto text-center text-xl leading-7 text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in, accusamus quisquam.
            </p>
        </div>

        <div class="relative mt-12 lg:mt-24 lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
            <div class="relative">
                <h4 class="text-2xl leading-8 font-extrabold text-gray-900 tracking-tight sm:text-3xl sm:leading-9">
                    Transfer funds world-wide
                </h4>
                <p class="mt-3 text-lg leading-7 text-gray-500">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur minima sequi recusandae, porro maiores officia assumenda aliquam laborum ab aliquid veritatis impedit odit adipisci optio iste blanditiis facere. Totam, velit.
                </p>

                <ul class="mt-10">
                    <li>
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h5 class="text-lg leading-6 font-medium text-gray-900">Competitive exchange rates</h5>
                                <p class="mt-2 text-base leading-6 text-gray-500">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="mt-10">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h5 class="text-lg leading-6 font-medium text-gray-900">No hidden fees</h5>
                                <p class="mt-2 text-base leading-6 text-gray-500">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="mt-10">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h5 class="text-lg leading-6 font-medium text-gray-900">Transfers are instant</h5>
                                <p class="mt-2 text-base leading-6 text-gray-500">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="mt-10 -mx-4 relative lg:mt-0">
                <svg class="absolute left-1/2 transform -translate-x-1/2 translate-y-16 lg:hidden" width="784" height="404" fill="none" viewBox="0 0 784 404">
                    <defs>
                        <pattern id="svg-pattern-squares-2" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="784" height="404" fill="url(#svg-pattern-squares-2)" />
                </svg>
                <img class="relative mx-auto" width="490" src="/images/feature-example-1.png" alt="" />
            </div>
        </div>

        <svg class="hidden lg:block absolute right-full transform translate-x-1/2 translate-y-12" width="404" height="784" fill="none" viewBox="0 0 404 784">
            <defs>
                <pattern id="svg-pattern-squares-3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                </pattern>
            </defs>
            <rect width="404" height="784" fill="url(#svg-pattern-squares-3)" />
        </svg>

        <div class="relative mt-12 sm:mt-16 lg:mt-24">
            <div class="lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div class="lg:col-start-2">
                    <h4 class="text-2xl leading-8 font-extrabold text-gray-900 tracking-tight sm:text-3xl sm:leading-9">
                        Always in the loop
                    </h4>
                    <p class="mt-3 text-lg leading-7 text-gray-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit ex obcaecati natus eligendi delectus, cum deleniti sunt in labore nihil quod quibusdam expedita nemo.
                    </p>

                    <ul class="mt-10">
                        <li>
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-lg leading-6 font-medium text-gray-900">Mobile notifications</h5>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mt-10">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-lg leading-6 font-medium text-gray-900">Reminder emails</h5>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="mt-10 -mx-4 relative lg:mt-0 lg:col-start-1">
                    <svg class="absolute left-1/2 transform -translate-x-1/2 translate-y-16 lg:hidden" width="784" height="404" fill="none" viewBox="0 0 784 404">
                        <defs>
                            <pattern id="svg-pattern-squares-4" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="784" height="404" fill="url(#svg-pattern-squares-4)" />
                    </svg>
                    <img class="relative mx-auto" width="490" src="/images/feature-example-2.png" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-100">
    <div class="max-w-screen-xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-yellow-300 via-orange-400 to-red-600 rounded-lg shadow-xl overflow-hidden lg:grid lg:grid-cols-2 lg:gap-4">
            <div class="pt-10 pb-12 px-6 sm:pt-16 sm:px-16 lg:py-16 lg:pr-0 xl:py-20 xl:px-20">
                <div class="lg:self-center">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        <span class="block">The next generation.</span>
                        <span class="block text-yellow-700">Explore Nova 3.</span>
                    </h2>
                    <p class="mt-4 text-lg font-medium text-yellow-800">Re-written from the ground up, Nova 3 is RPG management re-imagined for the modern web.</p>
                    <a href="#" class="mt-8 bg-white border border-transparent rounded-md shadow px-6 py-3 inline-flex items-center text-base font-medium text-yellow-600 hover:text-yellow-500 hover:bg-yellow-50 transition duration-150 ease-in-out">Learn more</a>
                </div>
            </div>
            <div class="relative pb-3/5 -mt-6 md:pb-1/2">
                <img class="absolute inset-0 w-full h-full transform translate-x-6 translate-y-6 rounded-md object-cover object-left-top sm:translate-x-16 lg:translate-y-20" src="https://tailwindui.com/img/component-images/full-width-with-sidebar.jpg" alt="App screenshot">
            </div>
        </div>
    </div>
</div>

<div class="relative bg-gray-800">
    <div class="h-56 bg-blue-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
        <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&blend=0288D1&sat=-100&blend-mode=multiply" alt="Support team" />
    </div>
    <div class="relative max-w-screen-xl mx-auto px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="md:ml-auto md:w-1/2 md:pl-10">
            <div class="text-base leading-6 font-semibold uppercase tracking-wider text-gray-300">
                Global community
            </div>
            <h2 class="mt-2 text-white text-3xl leading-9 font-extrabold tracking-tight sm:text-4xl sm:leading-10">
                We’re here to help
            </h2>
            <p class="mt-3 text-lg leading-7 text-gray-300">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et, egestas tempus tellus etiam sed. Quam a scelerisque amet ullamcorper eu enim et fermentum, augue. Aliquet amet volutpat quisque ut interdum tincidunt duis.
            </p>
            <div class="mt-8">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('support.index') }}" class="group inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-gray-900 bg-white hover:text-gray-600 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                        Visit our support site
                        @svg('filled-open', '-mr-1 ml-3 h-5 w-5 text-gray-500 group-hover:text-gray-400')
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-50">
    <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl leading-9 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
            Ready to get started?
            <br />
            <span class="text-blue-600">Download now.</span>
        </h2>
        <div class="mt-8 flex lg:flex-shrink-0 lg:mt-0">
            <div class="inline-flex rounded-md shadow">
                <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    Get started
                </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
                <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-blue-600 bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    Learn more
                </a>
            </div>
        </div>
    </div>
</div>

{{-- <div x-data="{ show: false }" x-show="show" x-init="localStorage.getItem('hideBanner') === null ? (setTimeout(() => show = true, 500)) : (show = false)" x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0 scale-95 translate-y-2" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95 translate-y-2" class="transition transform fixed z-100 bottom-0 inset-x-0 pb-2 sm:pb-5">
    <div class="max-w-screen-xl mx-auto px-2 sm:px-4">
        <div class="p-2 rounded-lg bg-gray-900 shadow-lg sm:p-3">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 flex items-center">
                    <x-logo-nova-with-version class="h-8 w-auto text-yellow-300"></x-logo-nova-with-version>
                    <p class="ml-4 font-medium text-white truncate">
                        <span class="lg:hidden">
                            <span class="sr-only">Nova 3 -</span> get a sneak peak today!
                        </span>
                        <span class="hidden lg:inline text-gray-400">
                            <strong class="text-white font-semibold mr-1">Get a sneak peak!</strong>
                            <span>RPG management re-imagined for the modern web.</span>
                        </span>
                    </p>
                </div>
                <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                    <div class="rounded-md shadow-sm">
                        <a href="https://nova-nextgen.anodyne-productions.com" target="_blank" class="flex items-center justify-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-gray-900 bg-white hover:text-gray-800 focus:outline-none focus:underline">
                            Try it now
                        </a>
                    </div>
                </div>
                <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-2">
                    <button @click="localStorage.setItem('hideBanner', true); show = false" type="button" class="-mr-1 flex p-2 rounded-md hover:bg-gray-800 focus:outline-none focus:bg-gray-800">
                        @svg('outline-dismiss', 'h-6 w-6 text-white')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="bg-gray-800">
    <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="xl:col-span-1">
                <x-logo-anodyne class="text-gray-300 h-10 w-auto"></x-logo-anodyne>
                <p class="mt-8 text-gray-400 text-base leading-6">
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
                        <h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase">
                            Solutions
                        </h4>
                        <ul class="mt-4">
                            <li>
                                <a href="#" class="text-base leading-6 text-gray-300 hover:text-white">
                                    Nova 2
                                </a>
                            </li>
                            <li class="mt-4">
                                <a href="#" class="text-base leading-6 text-gray-300 hover:text-white">
                                    Nova 3
                                </a>
                            </li>
                            <li class="mt-4">
                                <a href="#" class="text-base leading-6 text-gray-300 hover:text-white">
                                    AnodyneXtras
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase">
                            Support
                        </h4>
                        <ul class="mt-4">
                            <li>
                                <a href="{{ route('support.index') }}" class="text-base leading-6 text-gray-300 hover:text-white">
                                    Support Home
                                </a>
                            </li>
                            <li class="mt-4">
                                <a href="{{ route('support.chat') }}" class="text-base leading-6 text-gray-300 hover:text-white">
                                    Discord
                                </a>
                            </li>
                            <li class="mt-4">
                                <a href="#" class="text-base leading-6 text-gray-300 hover:text-white">
                                    Documentation
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase">
                            Company
                        </h4>
                        <ul class="mt-4">
                            <li>
                                <a href="#" class="text-base leading-6 text-gray-300 hover:text-white">
                                    About
                                </a>
                            </li>
                            <li class="mt-4">
                                <a href="#" class="text-base leading-6 text-gray-300 hover:text-white">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h4 class="text-sm leading-5 font-semibold tracking-wider text-gray-400 uppercase">
                            Legal
                        </h4>
                        <ul class="mt-4">
                            <li>
                                <a href="#" class="text-base leading-6 text-gray-300 hover:text-white">
                                    Privacy
                                </a>
                            </li>
                            <li class="mt-4">
                                <a href="#" class="text-base leading-6 text-gray-300 hover:text-white">
                                    Terms
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-12 border-t border-gray-700 pt-8">
            <p class="text-base leading-6 text-gray-400 xl:text-center">
                &copy; 2020 Anodyne Productions, All rights reserved.
            </p>
        </div>
    </div>
</div>
@endsection
