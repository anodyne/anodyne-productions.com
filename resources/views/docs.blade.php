<x-docs-layout
  :sections="$sections"
  :current="$page"
  :version="$version"
  :frontmatter="$frontmatter"
>
  <x-buk-markdown anchors>
    {!! $markdown !!}
  </x-buk-markdown>
</x-docs-layout>