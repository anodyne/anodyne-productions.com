@extends('layouts.xtras-detail')

@section('content')
<div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
    <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
        <div class="ml-4 mt-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Pulsar
            </h3>
            <p class="mt-1 text-sm leading-5 text-gray-500">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium leading-4 bg-gray-200 text-gray-800">
                    Nova 3
                </span>
                <span class="ml-1 inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium leading-4 bg-gray-200 text-gray-800">
                    Theme
                </span>
            </p>
        </div>
        <div class="ml-4 mt-4 flex-shrink-0">
            <span class="inline-flex rounded-md shadow-sm">
                <button type="button" class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-700 active:bg-blue-700">
                    Download
                </button>
            </span>
        </div>
    </div>
</div>
<div class="px-4 py-5 sm:px-6">
    <dl class="grid grid-cols-1 col-gap-4 row-gap-8 sm:grid-cols-2">
        <div class="sm:col-span-1">
            <dt class="text-sm leading-5 font-medium text-gray-500">
                Full name
            </dt>
            <dd class="mt-1 text-sm leading-5 text-gray-900">
                Margot Foster
            </dd>
        </div>
        <div class="sm:col-span-1">
            <dt class="text-sm leading-5 font-medium text-gray-500">
                Application for
            </dt>
            <dd class="mt-1 text-sm leading-5 text-gray-900">
                Backend Developer
            </dd>
        </div>
        <div class="sm:col-span-1">
            <dt class="text-sm leading-5 font-medium text-gray-500">
                Email address
            </dt>
            <dd class="mt-1 text-sm leading-5 text-gray-900">
                margotfoster@example.com
            </dd>
        </div>
        <div class="sm:col-span-1">
            <dt class="text-sm leading-5 font-medium text-gray-500">
                Salary expectation
            </dt>
            <dd class="mt-1 text-sm leading-5 text-gray-900">
                $120,000
            </dd>
        </div>
        <div class="sm:col-span-2">
            <dt class="text-sm leading-5 font-medium text-gray-500">
                About
            </dt>
            <dd class="mt-1 text-sm leading-5 text-gray-900">
                Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
            </dd>
        </div>
        <div class="sm:col-span-2">
            <dt class="text-sm leading-5 font-medium text-gray-500">
                Attachments
            </dt>
            <dd class="mt-1 text-sm leading-5 text-gray-900">
                <ul class="border border-gray-200 rounded-md">
                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                        <div class="w-0 flex-1 flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-2 flex-1 w-0 truncate">
                                resume_back_end_developer.pdf
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out">
                                Download
                            </a>
                        </div>
                    </li>
                    <li class="border-t border-gray-200 pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                        <div class="w-0 flex-1 flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-2 flex-1 w-0 truncate">
                                coverletter_back_end_developer.pdf
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out">
                                Download
                            </a>
                        </div>
                    </li>
                </ul>
            </dd>
        </div>
    </dl>
</div>
@endsection