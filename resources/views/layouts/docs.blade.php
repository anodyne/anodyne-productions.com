@extends('layouts.master')

@push('styles')
    <link href="{{ asset('css/docs.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/docs.js') }}" defer></script>
@endpush

@section('layout')
    <div>
        <x-layouts.dark-header>
            {{ $title }}

            <x-slot name="controls">
                <div
                    class="mt-4 flex | md:mt-0 md:ml-4 md:w-48"
                    x-data="{ version: false }"
                    x-init="$watch('version', value => window.location = value)"
                >
                    <select
                        class="form-select block w-full"
                        aria-label="Nova version"
                        @change="version = $event.target.value"
                    >
                        @foreach ($versions as $key => $display)
                        <option {{ $currentVersion == $key ? 'selected' : '' }} value="{{ url('docs/'.$key.$currentSection) }}">
                            {{ $display }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </x-slot>
        </x-layouts.dark-header>

        <main class="-mt-32">
            <div class="max-w-6xl mx-auto pb-12 px-4 | sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg shadow px-5 py-6 overflow-hidden | sm:px-6">
                    @yield('content')
                </div>
            </div>
        </main>

        <div class="text-sm text-gray-500 text-center mb-8">
            &copy; {{ date('Y') }} Anodyne Productions. All rights reserved.
        </div>
    </div>
@endsection