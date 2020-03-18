@extends('layouts.templates.left-sidebar')

@section('left-sidebar')
    <a href="{{ route('account.info') }}" class="group flex items-center w-full p-3 rounded leading-none no-underline text-grey-500 font-medium mb-4 border border-transparent transition hover:text-grey-600{{ (request()->is('account/info')) ? ' bg-white border-grey-100' : '' }}">
        <app-icon name="single-neutral-actions" class="h-5 w-5 mr-3 text-grey-400 group-hover:text-grey-500"></app-icon>
        My Info
    </a>

    <a href="{{ route('account.preferences') }}" class="group flex items-center w-full p-3 rounded leading-none no-underline text-grey-500 font-medium mb-4 border border-transparent transition hover:text-grey-600{{ (request()->is('account/preferences')) ? ' bg-white border-grey-100' : '' }}">
        <app-icon name="settings-toggle-horizontal" class="h-5 w-5 mr-3 text-grey-400 group-hover:text-grey-500"></app-icon>
        Preferences
    </a>

    <a href="{{ route('account.notifications') }}" class="group flex items-center w-full p-3 rounded leading-none no-underline text-grey-500 font-medium mb-4 border border-transparent transition hover:text-grey-600{{ (request()->is('account/notifications')) ? ' bg-white border-grey-100' : '' }}">
        <app-icon name="alarm-bell" class="h-5 w-5 mr-3 text-grey-400 group-hover:text-grey-500"></app-icon>
        Notifications
    </a>

    <a href="{{ route('account.delete') }}" class="group flex items-center w-full p-3 rounded leading-none no-underline text-red-500 font-medium mb-4 border border-transparent transition hover:text-red-600{{ (request()->is('account/delete')) ? ' bg-red-50 border-red-100' : '' }}">
        <app-icon name="bin-2-alternate" class="h-5 w-5 mr-3 text-red-400 group-hover:text-red-500"></app-icon>
        Delete My Account
    </a>
@endsection