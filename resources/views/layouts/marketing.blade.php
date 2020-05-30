@extends('layouts.master')

@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

@section('layout')
    @yield('content')
@endsection