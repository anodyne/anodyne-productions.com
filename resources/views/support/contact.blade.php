@extends('layouts.support')

@section('title', 'Contact Us')

@section('content')
<div class="relative max-w-lg mx-auto p-6">
    <div class="text-center">
        <h2 class="text-3xl leading-9 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
            Contact Anodyne
        </h2>
        <p class="mt-4 text-lg leading-6 text-gray-500">
            <span class="font-semibold">Please note:</span> we no longer handle product support over email. If you need help with one of our products, please <a href="{{ route('support.chat') }}" class="font-medium text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out">join our Discord server</a>.
        </p>
    </div>
    <div class="mt-12">
        <form action="#" method="POST" class="grid grid-cols-1 row-gap-6 | sm:grid-cols-2 sm:col-gap-8">
            <div class="sm:col-span-2">
                <label for="name" class="block text-sm font-medium leading-5 text-gray-700">Name</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="name" class="form-input py-3 px-4 block w-full transition ease-in-out duration-150" />
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="email" type="email" class="form-input py-3 px-4 block w-full transition ease-in-out duration-150" />
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block text-sm font-medium leading-5 text-gray-700">Message</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <textarea id="message" rows="6" class="form-textarea py-3 px-4 block w-full transition ease-in-out duration-150"></textarea>
                </div>
            </div>
            <div class="sm:col-span-2">
                <span class="w-full inline-flex rounded-md shadow-sm">
                    <button type="button" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition ease-in-out duration-150">
                        Let's talk
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
@endsection