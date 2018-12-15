@extends('layouts.auth')

@section('title', 'Log In')

@section('content')
    @component('components.page-header')
        Log In

        @slot('extra')
            <a href="{{ route('home') }}" class="text-blue hover:text-blue-dark">
                <anodyne-logo></anodyne-logo>
            </a>
        @endslot
    @endcomponent

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <form-field-group field-id="email" label="Email Address">
            <div class="flex items-center rounded bg-white border-2 text-grey-dark p-3 focus-within:border-blue-light focus-within:text-blue-light">
                <app-icon name="read-email-at" class="h-6 w-6 mr-2"></app-icon>

                <input id="email" type="email" class="appearance-none w-full focus:outline-none focus:text-grey-darker{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            </div>
        </form-field-group>

        <form-field-group field-id="password" label="Password">
            <div class="flex items-center rounded bg-white border-2 p-3 focus-within:border-blue-light focus-within:text-blue-light">
                <app-icon name="login-key" class="h-6 w-6 mr-2 text-grey-dark"></app-icon>

                <input id="password" type="password" class="appearance-none w-full focus:outline-none{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            </div>
        </form-field-group>

        <div class="flex items-center justify-between">
            <button type="submit" class="py-3 px-6 bg-blue text-white font-bold rounded hover:bg-blue-dark">
                Log In
            </button>

            <a class="no-underline text-grey-dark hover:text-grey-darker font-medium" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </div>
    </form>
@endsection
