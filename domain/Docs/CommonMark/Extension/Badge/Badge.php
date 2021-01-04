<?php

namespace Domain\Docs\CommonMark\Extension\Badge;

use League\CommonMark\Inline\Element\AbstractInline;

class Badge extends AbstractInline
{
    public function isContainer(): bool
    {
        return true;
    }
}
