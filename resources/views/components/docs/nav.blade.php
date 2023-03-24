@props([
    'sections' => [],
    'current' => '',
    'version' => 'main',
])

<x-nav>
    @foreach ($sections as $section)
        <div>
            @isset($section['title'])
                <h5 class="px-3 mb-3 lg:mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">
                    {{ $section['title'] }}
                </h5>
            @endisset

            <ul>
                @foreach ($section['pages'] as $page)
                    @php($slug = $page['file'] ?? $page)
                    <li>
                        <a
                            href="{{ $page['link'] ?? route('docs', [$version, $slug]) }}"
                            @isset($page['link']) target="_blank" @endisset
                            class="group px-3 py-2 transition-colors duration-200 relative flex items-center {{ $current === $slug ? 'text-amber-600' : 'hover:text-gray-900 text-gray-500' }}"
                            aria-current="page"
                        >
                            <span class="rounded-lg absolute inset-0 bg-amber-50 {{ $current === $slug ? 'opacity-50' : 'opacity-0' }}"></span>

                            <div class="group relative flex items-center">
                                @isset($page['icon'])
                                    @svg($page['icon'], 'shrink-0 -ml-1 mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-600 transition ease-in-out duration-150')
                                @endisset

                                <span class="truncate">
                                    {{ $page['name'] ?? str_replace('-', ' ', Illuminate\Support\Str::title($slug)) }}
                                </span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</x-nav>