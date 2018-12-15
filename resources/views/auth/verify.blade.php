@extends('layouts.auth')

@section('content')
    @component('components.page-header')
        Verify Your Email Address

        @slot('extra')
            <anodyne-logo class="text-blue"></anodyne-logo>
        @endslot
    @endcomponent

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            A fresh verification link has been sent to your email address.
        </div>
    @endif

    <p class="mb-6">Before proceeding, please check your email for a verification link.</p>

    <p>If you did not receive the email, <a href="{{ route('verification.resend') }}">click here to request another</a>.</p>
@endsection
