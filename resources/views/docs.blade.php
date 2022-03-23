<x-docs-layout :sections="$sections" :current="$page" :version="$version">
    <div class="docs prose prose-lg prose-a:font-semibold prose-headings:text-spanish-roast prose-code:text-amber-500 prose-code:font-normal">
        <x-buk-markdown anchors>
            {!! $markdown !!}
        </x-buk-markdown>
    </div>

    <x-slot name="toc">
        <x-buk-toc class="text-gray-500 font-medium toc text-sm">
            {!! $markdown !!}
        </x-buk-toc>
    </x-slot>
</x-docs-layout>