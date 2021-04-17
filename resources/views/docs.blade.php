<x-docs-layout :sections="$sections" :current="$page" :version="$version">
    <div class="min-w-0 flex-auto px-4 sm:px-6 xl:px-8">
        <div class="docs prose lg:prose-lg prose-amber">
            @include($path)
        </div>
    </div>

    <div class="z-10 flex-shrink-0 order-2 hidden w-64 min-w-0 xl:block xl:pl-8">
        <div class="sticky top-0 max-h-screen pt-[28px] pb-10 overflow-y-auto mt-[-72px]">
            <div>
                <h5 class="text-gray-900 text-xs font-semibold tracking-wide uppercase">On this page</h5>

                <x-buk-toc class="overflow-x-hidden text-gray-500 font-medium toc text-sm">
                    {!! $markdown !!}
                </x-buk-toc>
            </div>
        </div>
    </div>
</x-docs-layout>