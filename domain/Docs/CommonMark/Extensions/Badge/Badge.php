<?php

namespace Domain\Docs\CommonMark\Extensions\Badge;

use League\CommonMark\Inline\Element\AbstractInline;

class Badge extends AbstractInline
{
    public ?string $type;

    public function __construct($type = null)
    {
        $this->type = $type;
    }

    public function isContainer(): bool
    {
        return true;
    }
}
