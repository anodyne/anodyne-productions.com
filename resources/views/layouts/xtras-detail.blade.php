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
                <div class="bg-white shadow overflow-hidden | sm:rounded-lg">
                    @yield('content')
                </div>
                {{-- <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        @yield('content')
                    </div>
                </div> --}}
            </div>
        </main>

        <div class="text-sm text-gray-500 text-center mb-8">
            &copy; {{ date('Y') }} Anodyne Productions. All rights reserved.
        </div>
    </div>
@endsection