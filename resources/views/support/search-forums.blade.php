@extends('layouts.support')

@section('title', 'Forum Search')

@section('content')
<div class="text-lg leading-loose p-6 pb-0">
    <form action="{{ route('support.forum-search') }}" method="GET">
        <div class="w-full max-w-xl mx-auto">
            <h2 class="text-3xl leading-9 font-extrabold tracking-tight text-gray-900 text-center | sm:text-4xl sm:leading-10">
                Find an old forum post
            </h2>
            <p class="mt-4 text-lg leading-6 text-gray-500">
                We no longer handle product support on forums (if you need help, be sure to <a href="{{ route('support.chat') }}" class="font-medium text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out">join our Discord server</a>). There's still a wealth of information on the forums though, so we've archived them and made them searchable for easy access.
            </p>

            <div class="w-full my-12">
                <label for="query" class="sr-only block text-sm font-medium leading-5 text-gray-700">Search</label>
                <div class="flex items-center mt-1 relative rounded-md shadow-sm border px-4 py-3 transition ease-in-out duration-150 focus-within:border-blue-300 focus-within:shadow-outline-blue">
                    <div class="pointer-events-none mr-3">
                        @svg('outline-search', 'h-7 w-7 text-gray-400')
                    </div>

                    <input id="query" name="query" class="block w-full appearance-none focus:outline-none" placeholder="Find a forum post..." value="{{ $query ?? '' }}" />

                    <span class="inline-flex rounded-md shadow-sm ml-3">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition ease-in-out duration-150">
                            Search
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>
</div>


@if (isset($query))
<ul>
    @foreach ($results->items() as $item)
    {{-- <li class="border-t border-gray-200">
        <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
            <div class="px-4 py-4 flex items-center sm:px-6">
                <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <div class="text-sm leading-5 font-medium text-blue-600 truncate">
                            {{ $item->topic->topic_title }}
                            <span class="ml-1 font-normal text-gray-500">
                                in Engineering
                            </span>
                        </div>
                        <div class="mt-2 flex">
                            <div class="flex items-center text-sm leading-5 text-gray-500">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                <span>
                                    Posted on
                                    <time datetime="{{ $item->post_time->format('Y-m-d') }}">{{ $item->post_time->format('F jS, Y') }}</time>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex-shrink-0 sm:mt-0">
                        <div class="flex overflow-hidden">
                            {{ $item->author->username }}
                        </div>
                    </div>
                </div>
                <div class="ml-5 flex-shrink-0">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>

            <div class="px-4 pt-0 pb-4 sm:px-6">
                {!! nl2br($item->post_text) !!}
            </div>
        </a>
    </li> --}}
    <li class="border-t border-gray-200 odd:bg-gray-50">
        <div class="block">
            <div class="px-4 py-4 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="leading-7 font-medium text-blue-600 truncate">
                        {{ $item->topic->topic_title }} ({{ $item->post_id}})
                    </div>
                </div>
                <div class="mt-2 sm:flex sm:justify-between">
                    <div class="sm:flex">
                        <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                            @svg('outline-person', 'flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400')
                            {{ $item->author->username }}
                        </div>
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                            @svg('outline-calendar', 'flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400')
                            <time datetime="{{ $item->post_time->format('Y-m-d') }}">{{ $item->post_time->format('F jS, Y') }}</time>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bbcode px-4 pt-0 pb-4 sm:px-6">
                {!! BBCode::convertToHtml($item->post_text) !!}
            </div>
        </div>
    </li>
    {{-- {{ dd($item, $item->topic) }} --}}
    {{-- <h3>{{ $item->topic->topic_title }}</h3> --}}
    {{-- <h3>{{ $item->post_subject }}</h3> --}}
    {{-- {{ nl2br($item->post_text) }} --}}
    @endforeach
</ul>

<div class="border-t border-gray-200 px-6 py-3">
    {{ $results->links() }}
</div>
@endif
@endsection