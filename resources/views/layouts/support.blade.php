@extends('layouts.master')

@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

@section('layout')
    <div>
        <x-layouts.dark-header>
            Support
        </x-layouts.dark-header>

        <main class="-mt-32">
            <div class="max-w-6xl mx-auto pb-12 px-4 | sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg shadow overflow-hidden">
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
                                    Docs
                                </x-support.mobile-nav-item>
                                <x-support.mobile-nav-item :href="route('support.forum-search')" route="support.forum-search">
                                    Forum Search
                                </x-support.mobile-nav-item>
                                <x-support.mobile-nav-item :href="route('support.contact')" route="support.contact">
                                    Contact
                                </x-support.mobile-nav-item>
                            </select>
                        </div>
                        <div class="hidden | sm:block">
                            <div class="px-6 border-b border-gray-200">
                                <nav class="flex -mb-px">
                                    <x-support.nav-item :href="route('support.index')" route="support.index">
                                        <x-slot name="icon">
                                            @svg('outline-help-circle', 'h-6 w-6')
                                        </x-slot>
                                        Get Support
                                    </x-support.nav-item>
                                    <x-support.nav-item :href="route('support.chat')" route="support.chat">
                                        <x-slot name="icon">
                                            @svg('outline-chat', 'h-6 w-6')
                                        </x-slot>
                                        Chat
                                    </x-support.nav-item>
                                    <x-support.nav-item :href="route('docs.root')" route="docs.root">
                                        <x-slot name="icon">
                                            @svg('outline-class', 'h-6 w-6')
                                        </x-slot>
                                        Docs
                                    </x-support.nav-item>
                                    <x-support.nav-item :href="route('support.forum-search')" route="support.forum-search">
                                        <x-slot name="icon">
                                            @svg('outline-search', 'h-6 w-6')
                                        </x-slot>
                                        Search the Forums
                                    </x-support.nav-item>
                                    <x-support.nav-item :href="route('support.contact')" route="support.contact">
                                        <x-slot name="icon">
                                            @svg('outline-mail', 'h-6 w-6')
                                        </x-slot>
                                        Contact
                                    </x-support.nav-item>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div>
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