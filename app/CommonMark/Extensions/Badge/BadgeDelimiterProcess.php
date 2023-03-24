<?php

declare(strict_types=1);

namespace App\CommonMark\Extensions\Badge;

use League\CommonMark\Delimiter\DelimiterInterface;
use League\CommonMark\Delimiter\Processor\DelimiterProcessorInterface;
use League\CommonMark\Node\Inline\AbstractStringContainer;

class BadgeDelimiterProcess implements DelimiterProcessorInterface
{
    public function getOpeningCharacter(): string
    {
        return '{';
    }

    public function getClosingCharacter(): string
    {
        return '}';
    }

    public function getMinLength(): int
    {
        return 1;
    }

    public function getDelimiterUse(DelimiterInterface $opener, DelimiterInterface $closer): int
    {
        return 1;
    }

    public function process(AbstractStringContainer $opener, AbstractStringContainer $closer, int $delimiterUse): void
    {
        $badge = new Badge();

        $next = $opener->next();
        while ($next !== null && $next !== $closer) {
            $tmp = $next->next();
            $badge->appendChild($next);
            $next = $tmp;
        }

        $opener->insertAfter($badge);
    }
}
