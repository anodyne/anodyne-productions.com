<?php

namespace App\CommonMark\Extensions\Tag;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;

class TagExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment
            ->addBlockStartParser(TagBlockParser::blockStartParser())
            ->addRenderer(Tag::class, new TagRenderer());
    }
}
