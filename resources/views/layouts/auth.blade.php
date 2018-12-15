@extends('layouts.master')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/auth.css') }}">
@endpush

@section('template')
    <div class="w-1/3 mx-auto flex flex-col bg-white rounded shadow-lg overflow-hidden">
        <div class="flex-1 p-6">
            @yield('content')
        </div>

        @if (View::hasSection('controls'))
            <div class="flex-1 bg-grey-lightest text-grey-dark p-6">
                @yield('controls')
            </div>
        @endif
    </div>
@endsection
