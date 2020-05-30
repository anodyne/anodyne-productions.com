@extends('layouts.xtras')

@section('title', 'AnodyneXtras')

@section('content')
    <h3 class="text-lg leading-6 font-medium text-gray-900">
        Need help? We've got options!
    </h3>

    <div class="mt-10 lg:grid lg:grid-cols-3 lg:gap-8">
        <div class="bg-gray-50 rounded-lg p-6">
            <div class="flex items-center justify-center h-20 w-20 rounded-md bg-gray-200 text-gray-600">
                <svg class="h-10 w-10 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 146 146"><title>Discord</title><path d="M107.75 125.001s-4.5-5.375-8.25-10.125c16.375-4.625 22.625-14.875 22.625-14.875-5.125 3.375-10 5.75-14.375 7.375-6.25 2.625-12.25 4.375-18.125 5.375-12 2.25-23 1.625-32.375-.125-7.125-1.375-13.25-3.375-18.375-5.375-2.875-1.125-6-2.5-9.125-4.25-.375-.25-.75-.375-1.125-.625-.25-.125-.375-.25-.5-.375-2.25-1.25-3.5-2.125-3.5-2.125s6 10 21.875 14.75c-3.75 4.75-8.375 10.375-8.375 10.375-27.625-.875-38.125-19-38.125-19 0-40.25 18-72.875 18-72.875 18-13.5 35.125-13.125 35.125-13.125l1.25 1.5c-22.5 6.5-32.875 16.375-32.875 16.375s2.75-1.5 7.375-3.625c13.375-5.875 24-7.5 28.375-7.875.75-.125 1.375-.25 2.125-.25 7.625-1 16.25-1.25 25.25-.25 11.875 1.375 24.625 4.875 37.625 12 0 0-9.875-9.375-31.125-15.875l1.75-2S110 19.626 128 33.126c0 0 18 32.625 18 72.875 0 0-10.625 18.125-38.25 19zM49.625 66.626c-7.125 0-12.75 6.25-12.75 13.875s5.75 13.875 12.75 13.875c7.125 0 12.75-6.25 12.75-13.875.125-7.625-5.625-13.875-12.75-13.875zm45.625 0c-7.125 0-12.75 6.25-12.75 13.875s5.75 13.875 12.75 13.875c7.125 0 12.75-6.25 12.75-13.875s-5.625-13.875-12.75-13.875z" fill-rule="nonzero"></path></svg>
            </div>
            <div class="mt-5">
                <h5 class="text-lg leading-6 font-medium text-gray-900">Discord</h5>
                <p class="mt-2 text-base leading-6 text-gray-500">
                    We've moved all of our support from forums to our Discord server.
                </p>
            </div>
        </div>
        <div class="bg-gray-50 rounded-lg p-6 mt-10 | lg:mt-0">
            <div class="flex items-center justify-center h-20 w-20 rounded-md bg-gray-200 text-gray-600">
                @svg('outline-class', 'h-10 w-10')
            </div>
            <div class="mt-5">
                <h5 class="text-lg leading-6 font-medium text-gray-900">Online Docs</h5>
                <p class="mt-2 text-base leading-6 text-gray-500">
                    We have a complete documentation site for Nova 2 and Nova 3.
                </p>
            </div>
        </div>
        <div class="bg-gray-50 rounded-lg p-6 mt-10 | lg:mt-0">
            <div class="flex items-center justify-center h-20 w-20 rounded-md bg-gray-200 text-gray-600">
                @svg('outline-search', 'h-10 w-10')
            </div>
            <div class="mt-5">
                <h5 class="text-lg leading-6 font-medium text-gray-900">Forum Search</h5>
                <p class="mt-2 text-base leading-6 text-gray-500">
                    If you're looking for information from the old forums, we've archived the data and built a simple search to find what you're looking for.
                </p>
            </div>
        </div>
    </div>
@endsection