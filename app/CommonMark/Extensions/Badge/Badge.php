<?php

namespace App\CommonMark\Extensions\Badge;

use League\CommonMark\Node\Inline\AbstractInline;
use League\CommonMark\Node\Inline\DelimitedInterface;

class Badge extends AbstractInline implements DelimitedInterface
{
    public ?string $type;

    public function __construct($type = null)
    {
        $this->type = $type;
    }

    public function getOpeningDelimiter(): string
    {
        return '{';
    }

    public function getClosingDelimiter(): string
    {
        return '}';
    }

    public function isContainer(): bool
    {
        return true;
    }
}
