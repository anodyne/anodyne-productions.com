@extends('layouts.master')

@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

@section('layout')
    <div>
        <nav class="bg-white shadow mb-12">
            <div class="max-w-5xl mx-auto px-4 | sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center">
                            <anodyne-mark class="hidden h-8 w-auto text-blue-500"></anodyne-mark>
                            <x-logo-anodyne class="block h-8 w-auto text-blue-500"></x-logo-anodyne>
                        </a>

                        <!-- Desktop header nav -->
                        <div class="hidden | sm:ml-6 sm:flex">
                            <a href="{{ route('account.info') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-blue-500 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-blue-700 transition duration-150 ease-in-out">
                                Account
                            </a>
                            <a href="https://xtras.anodyne-productions.com" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Xtras
                            </a>
                            <a href="{{ route('support.index') }}" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Support
                            </a>
                            <a href="{{ route('docs.root') }}" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Docs
                            </a>
                            <a href="{{ route('admin.dashboard') }}" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Admin
                            </a>
                        </div>
                    </div>

                    <!-- Notification button, hidden on mobile -->
                    <div class="hidden | sm:ml-6 sm:flex sm:items-center">
                        <x-user-menu />
                    </div>

                    <!-- Hamburger menu, hidden on desktop -->
                    <div class="-mr-2 flex items-center | sm:hidden">
                        <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" @click="open = !open">
                            <svg
                                class="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    :class="{ 'hidden': open, 'inline-flex': !open }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{ 'hidden': !open, 'inline-flex': open }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile nav -->
            <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">
                <div class="pt-2 pb-3">
                    <inertia-link :href="$route('account.info')" class="block pl-3 pr-4 py-2 border-l-4 border-blue-500 text-base font-medium text-blue-700 bg-blue-50 focus:outline-none focus:text-blue-800 focus:bg-blue-100 focus:border-blue-700 transition duration-150 ease-in-out">Account</inertia-link>
                    <a href="https://xtras.anodyne-productions.com" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Xtras</a>
                    <a href="https://help.anodyne-productions.com" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Docs</a>
                    <inertia-link :href="$route('admin.dashboard')" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Admin</inertia-link>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="flex-shrink-0">
                            <avatar image-url="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" size="sm"></avatar>
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-6 text-gray-800">{{ auth()->user()->name }}</div>
                            <div class="text-sm font-medium leading-5 text-gray-500">{{ auth()->user()->email }}</div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a :href="$route('account.info')" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out">Your Account</a>
                        <a href="#" class="mt-1 block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out">Sign Out</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="max-w-5xl mx-auto | sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden | sm:rounded-lg">
                <div>
                    <div class="px-4 pt-5 | sm:hidden">
                        <select class="form-select block w-full">
                            <option :selected="$route().current('account.info')">My Account</option>
                            <option :selected="$route().current('account.delete')">Delete My Account</option>
                        </select>
                    </div>
                    <div class="hidden sm:block">
                        <div class="px-4 border-b border-gray-200 | sm:px-6">
                            <nav class="flex -mb-px">
                                <x-support.nav-item :href="route('account.info')" route="account.info">
                                    <x-slot name="icon">
                                        @svg('outline-person', 'h-6 w-6')
                                    </x-slot>
                                    <span>My Account</span>
                                </x-support.nav-item>

                                <x-support.nav-item :href="route('account.delete')" route="account.delete">
                                    <x-slot name="icon">
                                        @svg('outline-delete', 'h-6 w-6')
                                    </x-slot>
                                    <span>Delete My Account</span>
                                </x-support.nav-item>
                            </nav>
                        </div>
                    </div>
                </div>

                @yield('content')
            </div>

            <div class="text-sm text-gray-500 text-center my-8">
                &copy; 2020 Anodyne Productions. All rights reserved.
            </div>
        </div>
    </div>
@endsection