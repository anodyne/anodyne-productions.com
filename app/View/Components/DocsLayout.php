<?php

namespace App\View\Components;

use App\Support\Documentation;
use Illuminate\View\Component;

class DocsLayout extends Component
{
    public ?object $nextPage = null;

    public ?object $previousPage = null;

    public array $navigation = [];

    public function __construct(
        public array $sections = [],
        public string $current = '',
        public string $version = 'main',
        public array $frontmatter = []
    ) {
        $this->navigation = $this->navigation($version);
    }

    public function navigation(): array
    {
        $docs = app(Documentation::class);

        $navigation = $docs->navigation($this->version);

        $allLinks = collect($navigation)->flatMap(fn ($navItem) => $navItem->links);
        $linkIndex = $allLinks->search(fn ($link) => $link->href === request()->route('page'));

        $this->previousPage = ($linkIndex > 0) ? $allLinks[$linkIndex - 1] : null;
        $this->nextPage = ($linkIndex < $allLinks->count() - 1) ? $allLinks[$linkIndex + 1] : null;

        return $navigation;
    }

    public function pageNavigation(string $direction)
    {
        return match ($direction) {
            'next' => 'Next',
            default => 'Previous'
        };
    }

    public function render()
    {
        return view('layouts.docs');
    }
}
