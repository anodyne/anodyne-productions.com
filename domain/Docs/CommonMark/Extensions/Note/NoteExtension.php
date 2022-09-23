<?php

declare(strict_types=1);

namespace Domain\Docs\CommonMark\Extensions\Note;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;

class NoteExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        // $environment->addBlockParser(new NoteParser);
        // $environment->addBlockRenderer(Note::class, new NoteRenderer);
    }
}
