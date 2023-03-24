<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Support\Documentation;
use GrahamCampbell\Markdown\Facades\Markdown;

class DocsController
{
    private const DEFAULT_VERSION = '2.7';

    private const DEFAULT_PAGE = 'introduction';

    private const EXCLUDED = ['readme', 'license'];

    public function __invoke(Documentation $docs, string $version = null, string $page = null)
    {
        if ($page === null) {
            if ($version !== null) {
                return redirect()->route('docs', [$version, self::DEFAULT_PAGE]);
            }

            return redirect()->route('docs', [self::DEFAULT_VERSION, self::DEFAULT_PAGE]);
        }

        if (! $docs->exists($version, $page) || in_array($page, self::EXCLUDED)) {
            abort(404);
        }

        $cleanVersion = str_replace('.', '_', $version);

        $path = "docs.{$cleanVersion}.{$page}";

        [
            'frontmatter' => $frontmatter,
            'markdown' => $markdown,
        ] = $docs->get($version, $page);
        $sections = $docs->toc($markdown);
        $markdown = Markdown::convert($markdown)->getContent();

        return view('docs', compact('version', 'page', 'sections', 'markdown', 'path', 'frontmatter'));
    }
}
