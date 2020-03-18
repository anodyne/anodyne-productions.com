@extends('layouts.app')

@section('template')
    <div class="container">
        <div class="flex mb-12">
            <nav class="w-64 mr-8">
                @yield('left-sidebar')
            </nav>

            <main class="flex-1 bg-white border p-6 rounded">
                @yield('content')
            </main>

            <nav class="w-64 ml-8">
                @yield('right-sidebar')
            </nav>
        </div>
    </div>
@endsection