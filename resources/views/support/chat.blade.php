@extends('layouts.support')

@section('title', 'Chat')

@section('content')
    <div class="p-6">
        <div class="w-full max-w-xl mx-auto text-center ">
            <h2 class="text-3xl leading-9 font-extrabold tracking-tight text-gray-900 | sm:text-4xl sm:leading-10">
                Need help? Join us on Discord!
            </h2>
            <p class="mt-4 text-lg leading-6 text-gray-500">
                <a href="https://discord.com/register" target="_blank" class="font-medium text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out">Register</a> for a Discord account and join the server to get support or engage with the community.
            </p>
            <span class="mt-6 inline-flex rounded-md shadow-sm w-full | sm:w-auto">
                <a href="https://discord.gg/7WmKUks" target="_blank" class="inline-flex items-center justify-center w-full px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition ease-in-out duration-150 | sm:w-auto">
                    <svg class="-ml-1 mr-3 h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 146 146"><title>Discord</title><path d="M107.75 125.001s-4.5-5.375-8.25-10.125c16.375-4.625 22.625-14.875 22.625-14.875-5.125 3.375-10 5.75-14.375 7.375-6.25 2.625-12.25 4.375-18.125 5.375-12 2.25-23 1.625-32.375-.125-7.125-1.375-13.25-3.375-18.375-5.375-2.875-1.125-6-2.5-9.125-4.25-.375-.25-.75-.375-1.125-.625-.25-.125-.375-.25-.5-.375-2.25-1.25-3.5-2.125-3.5-2.125s6 10 21.875 14.75c-3.75 4.75-8.375 10.375-8.375 10.375-27.625-.875-38.125-19-38.125-19 0-40.25 18-72.875 18-72.875 18-13.5 35.125-13.125 35.125-13.125l1.25 1.5c-22.5 6.5-32.875 16.375-32.875 16.375s2.75-1.5 7.375-3.625c13.375-5.875 24-7.5 28.375-7.875.75-.125 1.375-.25 2.125-.25 7.625-1 16.25-1.25 25.25-.25 11.875 1.375 24.625 4.875 37.625 12 0 0-9.875-9.375-31.125-15.875l1.75-2S110 19.626 128 33.126c0 0 18 32.625 18 72.875 0 0-10.625 18.125-38.25 19zM49.625 66.626c-7.125 0-12.75 6.25-12.75 13.875s5.75 13.875 12.75 13.875c7.125 0 12.75-6.25 12.75-13.875.125-7.625-5.625-13.875-12.75-13.875zm45.625 0c-7.125 0-12.75 6.25-12.75 13.875s5.75 13.875 12.75 13.875c7.125 0 12.75-6.25 12.75-13.875s-5.625-13.875-12.75-13.875z" fill-rule="nonzero"></path></svg>
                    Chat on Discord
                </a>
            </span>
        </div>

        <div class="mt-12 rounded-md bg-gray-50 px-6 py-5">
            <div>
                <dl class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <div>
                            <dd>
                                <ul>
                                    <li>
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                    @svg('outline-chat-help', 'h-6 w-6')
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <h5 class="leading-6 font-medium text-gray-900">#help</h5>
                                                <p class="mt-2 text-sm leading-5 text-gray-500">
                                                    Having trouble installing Nova? Seeing an error and you're not sure what's going on? Get your Nova questions answered here.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mt-8">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                    @svg('outline-color', 'h-6 w-6')
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <h5 class="leading-6 font-medium text-gray-900">#xtras</h5>
                                                <p class="mt-2 text-sm leading-5 text-gray-500">
                                                    Looking for help with an Xtra or to get in touch with an Xtra author? This channel is all things skinning and modding.
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
                            <dd>
                                <ul>
                                    <li>
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                    @svg('outline-comment', 'h-6 w-6')
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <h5 class="leading-6 font-medium text-gray-900">#lounge</h5>
                                                <p class="mt-2 text-sm leading-5 text-gray-500">
                                                    Looking for a place to just chat with folks in the community? Jump in and start a conversation in the lounge.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mt-8">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <div class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-200 text-gray-600">
                                                    @svg('outline-lightbulb', 'h-6 w-6')
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <h5 class="leading-6 font-medium text-gray-900">#nextgen-general</h5>
                                                <p class="mt-2 text-sm leading-5 text-gray-500">
                                                    Nova 3 is coming. Get your burning questions answered, chat about what's next, or float your ideas for Nova 3.
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
    </div>
@endsection