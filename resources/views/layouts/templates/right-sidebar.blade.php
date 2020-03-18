@extends('layouts.app')

@section('template')
    <div class="container">
        <div class="flex mb-12">
            <main class="flex-1 bg-white border p-6 rounded">
                @yield('content')
            </main>

            <nav class="w-64 ml-8">
                @yield('right-sidebar')
            </nav>
        </div>
    </div>
@endsection