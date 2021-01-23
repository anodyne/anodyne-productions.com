<x-layouts.docs :sections="$sections" :current="$page" :version="$version">
    <div class="min-w-0 flex-auto px-4 sm:px-6 xl:px-8">
        <div class="docs prose lg:prose-lg prose-amber">
            @include($path)
        </div>
    </div>

    <div class="hidden xl:text-sm xl:block flex-none w-64 pl-8 mr-8">
        <div class="flex flex-col justify-between overflow-y-auto sticky -mt-10 pt-10 pb-4 top-0">
            <div class="mb-8">
                <h5 class="text-gray-900 uppercase tracking-wide font-semibold mb-3 text-sm lg:text-xs">On this page</h5>

                <x-buk-toc class="overflow-x-hidden text-gray-500 font-medium toc">
                    {!! $markdown !!}
                </x-buk-toc>
            </div>
        </div>
    </div>
</x-layouts.docs>