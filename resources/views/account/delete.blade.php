@extends('layouts.account')

@section('title', 'Delete Account')

@section('content')
    <div class="p-6">
        <form action="{{ route('account.destroy') }}" method="POST">
            @csrf
            @method('delete')

            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Delete your account
            </h3>

            <div class="mt-2 max-w-xl text-sm leading-5 text-gray-500">
                <p>
                    Once you delete your account, you will lose all data associated with it.
                </p>
            </div>

            <div class="mt-10 rounded-md bg-gray-50 px-6 py-5">
                <div>
                    <dl class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <div>
                                <dt class="text-sm leading-6 font-medium text-gray-700">
                                    The following information will be deleted:
                                </dt>
                                <dd class="mt-5">
                                    <ul>
                                        <li>
                                            <div class="flex">
                                                <div class="flex-shrink-0">
                                                    <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                        @svg('outline-person', 'h-6 w-6')
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <h5 class="leading-6 font-medium text-gray-900">User Info</h5>
                                                    <p class="mt-2 text-sm leading-5 text-gray-500">
                                                        Your basic user info such as username, email address, and any other profile data will be permanantly deleted from our system.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mt-5">
                                            <div class="flex">
                                                <div class="flex-shrink-0">
                                                    <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                        @svg('outline-color', 'h-6 w-6')
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <h5 class="leading-6 font-medium text-gray-900">Xtras</h5>
                                                    <p class="mt-2 text-sm leading-5 text-gray-500">
                                                        All of your mods and/or skins will be removed from AnodyneXtras and the files deleted from our servers. Be sure you have backups of your work.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mt-5">
                                            <div class="flex">
                                                <div class="flex-shrink-0">
                                                    <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                        @svg('outline-alert', 'h-6 w-6')
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <h5 class="leading-6 font-medium text-gray-900">Email Notifications</h5>
                                                    <p class="mt-2 text-sm leading-5 text-gray-500">
                                                        All emails notifications you enrolled in will be stopped immediately.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </dd>
                            </div>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <div>
                                <dt class="text-sm leading-6 font-medium text-gray-700">
                                    The following information will <span class="font-bold text-gray-900 underline">NOT</span> be deleted:
                                </dt>
                                <dd class="mt-5">
                                    <ul>
                                        <li>
                                            <div class="flex">
                                                <div class="flex-shrink-0">
                                                    <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                        @svg('outline-chat', 'h-6 w-6')
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <h5 class="leading-6 font-medium text-gray-900">Comments</h5>
                                                    <p class="mt-2 text-sm leading-5 text-gray-500">
                                                        Any comments you've made on Xtras or help articles will remain, but personally identifiable information will be removed.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mt-5">
                                            <div class="flex">
                                                <div class="flex-shrink-0">
                                                    <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                        @svg('outline-heart', 'h-6 w-6')
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <h5 class="leading-6 font-medium text-gray-900">Ratings</h5>
                                                    <p class="mt-2 text-sm leading-5 text-gray-500">
                                                        Ratings you've left for Xtras will remain, but any means of identifying you as the individual who left the rating will be removed.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mt-5">
                                            <div class="flex">
                                                <div class="flex-shrink-0">
                                                    <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                        @svg('outline-comment', 'h-6 w-6')
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <h5 class="leading-6 font-medium text-gray-900">Forum Posts</h5>
                                                    <p class="mt-2 text-sm leading-5 text-gray-500">
                                                        Forum posts you've created will not be deleted. We currently do not have the ability to remove personally identifiable information from the forums database. We are working on possible solutions.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </dd>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="mt-10">
                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-semibold uppercase tracking-wide rounded-md text-red-700 bg-red-100 hover:bg-red-50 focus:outline-none focus:border-red-300 focus:shadow-outline-red active:bg-red-200 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Delete account
                </button>
            </div>
        </form>
    </div>
@endsection