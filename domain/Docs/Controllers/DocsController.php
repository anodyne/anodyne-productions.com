<?php

declare(strict_types = 1);

namespace Domain\Docs\Controllers;

use Domain\Docs\Documentation;

class DocsController
{
    private const DEFAULT_VERSION = '2.6';

    private const DEFAULT_PAGE = 'introduction';

    private const EXCLUDED = ['readme', 'license'];

    public function __invoke(Documentation $docs, string $version = null, string $page = null)
    {
        $cleanVersion = str_replace('.', '_', $version);

        if ($page === null) {
            if ($version !== null) {
                return redirect()->route('docs', [$version, self::DEFAULT_PAGE]);
            }

            return redirect()->route('docs', [self::DEFAULT_VERSION, self::DEFAULT_PAGE]);
        }

        if (! $docs->exists($version, $page) || in_array($page, self::EXCLUDED)) {
            abort(404);
        }

        $path = "docs.{$cleanVersion}.{$page}";

        $sections = $docs->toc($version);
        $markdown = $docs->get($version, $page);
        $title = $docs->title($markdown);

        return view('docs', compact('version', 'page', 'sections', 'title', 'markdown', 'path'));
    }
}
