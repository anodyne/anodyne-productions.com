<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use League\CommonMark\Extension\FrontMatter\Data\SymfonyYamlFrontMatterParser;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;

class Documentation
{
    private Filesystem $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function exists(string $version, string $page): bool
    {
        return $this->filesystem->exists($this->path($version, "{$page}.md"));
    }

    public function get(string $version, string $page): array
    {
        $markdown = $this->filesystem->get($this->path($version, "{$page}.md"));

        $frontMatterParser = new FrontMatterParser(new SymfonyYamlFrontMatterParser());
        $result = $frontMatterParser->parse($markdown);

        return [
            'frontmatter' => $result->getFrontMatter(),
            'markdown' => $result->getContent(),
        ];
    }

    public function navigation(string $version)
    {
        return json_decode(
            $this->filesystem->get($this->path($version, 'navigation.json'))
        );
    }

    public function title(string $markdown): string
    {
        return Str::after(collect(explode(PHP_EOL, $markdown))->first(), '# ');
    }

    public function toc(string $markdown): array
    {
        // Remove code blocks which might contain headers.
        $markdown = preg_replace('(```[a-z]*\n[\s\S]*?\n```)', '', $markdown);

        return collect(explode(PHP_EOL, $markdown))
            ->reject(function (string $line) {
                // Only search for level 2 and 3 headings.
                return ! Str::startsWith($line, '## ') && ! Str::startsWith($line, '### ');
            })
            ->map(function (string $line) {
                return [
                    'level' => strlen(trim(Str::before($line, '# '))) + 1,
                    'title' => $title = trim(Str::after($line, '# ')),
                    'anchor' => Str::slug($title),
                ];
            })
            ->all();
    }

    private function path(string $version, string $file): string
    {
        $version = str_replace('.', '_', $version);

        return resource_path("views/docs/{$version}/{$file}");
    }
}
