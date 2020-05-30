@extends('layouts.master')

@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

@section('layout')
    <div>
        <x-layouts.dark-header>
            AnodyneXtras

            <x-slot name="controls">
                <div class="flex items-center rounded-md bg-gray-600 px-4 py-2 text-sm text-gray-400 focus-within:bg-gray-300 focus-within:text-gray-800">
                    <div class="flex-shrink-0 mr-2">
                        @svg('outline-search', 'h-5 w-5')
                    </div>
                    <input
                        type="text"
                        name=""
                        id=""
                        class="bg-transparent appearance-none w-full focus:outline-none placeholder-gray-300"
                        placeholder="Find Xtras..."
                    >
                </div>
            </x-slot>
        </x-layouts.dark-header>

        <main class="-mt-32">
            <div class="max-w-6xl mx-auto pb-12 px-4 | sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg shadow">
                    <div>
                        <div class="px-4 pt-5 | sm:hidden" x-data>
                            <select class="form-select block w-full" @change="window.location = $event.target.value">
                                <x-support.mobile-nav-item :href="route('support.index')" route="support.index">
                                    Get Support
                                </x-support.mobile-nav-item>
                                <x-support.mobile-nav-item :href="route('support.chat')" route="support.chat">
                                    Chat
                                </x-support.mobile-nav-item>
                                <x-support.mobile-nav-item :href="route('docs.root')" route="docs.root">
                                    Chat
                                </x-support.mobile-nav-item>
                                <x-support.mobile-nav-item :href="route('support.forum-search')" route="support.forum-search">
                                    Forum Search
                                </x-support.mobile-nav-item>
                                <x-support.mobile-nav-item :href="route('support.contact')" route="support.contact">
                                    Contact Us
                                </x-support.mobile-nav-item>
                            </select>
                        </div>
                        <div class="hidden | sm:block">
                            <div class="px-6 border-b border-gray-200">
                                <nav class="flex -mb-px">
                                    <x-support.nav-item :href="route('xtras.index')" route="xtras.index">
                                        <x-slot name="icon">
                                            @svg('outline-important', 'h-6 w-6')
                                        </x-slot>
                                        What's New
                                    </x-support.nav-item>

                                    <x-support.nav-item :href="route('xtras.themes')" route="xtras.themes">
                                        <x-slot name="icon">
                                            @svg('outline-color', 'h-6 w-6')
                                        </x-slot>
                                        Themes
                                    </x-support.nav-item>

                                    <x-support.nav-item :href="route('xtras.themes')" route="xtras.themes">
                                        <x-slot name="icon">
                                            @svg('outline-extension', 'h-6 w-6')
                                        </x-slot>
                                        Extensions
                                    </x-support.nav-item>

                                    <x-support.nav-item :href="route('xtras.themes')" route="xtras.themes">
                                        <x-slot name="icon">
                                            @svg('outline-organization-chart', 'h-6 w-6')
                                        </x-slot>
                                        Ranks
                                    </x-support.nav-item>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

        <div class="text-sm text-gray-500 text-center mb-8">
            &copy; {{ date('Y') }} Anodyne Productions. All rights reserved.
        </div>
    </div>
@endsection