@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    @component('components.page-header')
        Reset Password

        @slot('extra')
            <anodyne-logo class="text-blue"></anodyne-logo>
        @endslot
    @endcomponent

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-6">
            <label for="email" class="uppercase tracking-wide text-xs text-grey-dark font-semibold mb-1 block leading-normal">
                Email Address
            </label>

            <div class="flex items-center rounded bg-white border-2 focus-within:border-blue-light p-3">
                <app-icon name="read-email-at" class="h-6 w-6 mr-2 text-grey-dark"></app-icon>

                <input id="email" type="email" class="appearance-none w-full focus:outline-none{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="mb-6">
            <label for="password" class="uppercase tracking-wide text-xs text-grey-dark font-semibold mb-1 block leading-normal">
                New Password
            </label>

            <div class="flex items-center rounded bg-white border-2 focus-within:border-blue-light p-3">
                <app-icon name="login-key" class="h-6 w-6 mr-2 text-grey-dark"></app-icon>

                <input id="password" type="password" class="appearance-none w-full focus:outline-none{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            </div>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div>
            <label for="password-confirm" class="uppercase tracking-wide text-xs text-grey-dark font-semibold mb-1 block leading-normal">
                Confirm New Password
            </label>

            <div class="flex items-center rounded bg-white border-2 focus-within:border-blue-light p-3">
                <app-icon name="login-key" class="h-6 w-6 mr-2 text-grey-dark"></app-icon>

                <input id="password-confirm" type="password" class="appearance-none w-full focus:outline-none" name="password_confirmation" required>
            </div>
        </div>
    </form>
@endsection

@section('controls')
    <div class="flex items-center justify-between">
        <button type="submit" class="py-3 px-6 bg-blue text-white font-bold rounded hover:bg-blue-dark">
            Reset Password
        </button>

        <a class="no-underline text-grey-dark hover:text-grey-darker font-medium" href="{{ route('login') }}">
            Cancel
        </a>
    </div>
@endsection
