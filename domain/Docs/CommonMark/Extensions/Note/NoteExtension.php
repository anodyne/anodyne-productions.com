<?php

namespace Domain\Docs\CommonMark\Extensions\Note;

use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Extension\ExtensionInterface;

class NoteExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new NoteParser);
        $environment->addBlockRenderer(Note::class, new NoteRenderer);
    }
}
