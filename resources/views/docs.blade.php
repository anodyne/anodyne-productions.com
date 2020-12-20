<x-layouts.docs>
    <x-docs.nav :sections="$sections" :current="$page" :version="$version"/>

    <div id="content-wrapper" class="min-w-0 w-full flex-auto lg:static lg:max-h-full lg:overflow-visible">
        <div class="pt-10 pb-24 lg:pb-16 w-full flex">
            <div class="min-w-0 flex-auto px-4 sm:px-6 xl:px-8">
                <x-markdown anchors class="docs prose lg:prose-lg prose-light-blue">
                    {!! $markdown !!}
                </x-markdown>
            </div>

            <div class="hidden xl:text-sm xl:block flex-none w-64 pl-8 mr-8">
                <div class="flex flex-col justify-between overflow-y-auto sticky max-h-(screen-18) -mt-10 pt-10 pb-4 top-18">
                    <div class="mb-8">
                        <h5 class="text-gray-900 uppercase tracking-wide font-semibold mb-3 text-sm lg:text-xs">On this page</h5>

                        <x-toc class="overflow-x-hidden text-gray-500 font-medium toc">
                            {!! $markdown !!}
                        </x-toc>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.docs>