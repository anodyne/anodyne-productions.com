<?php

declare(strict_types=1);

namespace App\CommonMark\Extensions\Callout;

use League\CommonMark\Parser\Block\BlockStart;
use League\CommonMark\Parser\Block\BlockStartParserInterface;
use League\CommonMark\Parser\Cursor;
use League\CommonMark\Parser\MarkdownParserStateInterface;

final class CalloutStartParser implements BlockStartParserInterface
{
    public function tryStart(Cursor $cursor, MarkdownParserStateInterface $parserState): ?BlockStart
    {
        if ($cursor->isIndented() || ! \in_array($cursor->getNextNonSpaceCharacter(), [':'], true)) {
            return BlockStart::none();
        }

        $indent = $cursor->getIndent();
        $fence = $cursor->match('/^[ \t]*(?::{3,}(?!.*`))/');
        if ($fence === null) {
            return BlockStart::none();
        }

        // fenced code block
        $fence = \ltrim($fence, " \t");

        return BlockStart::of(new CalloutParser(\strlen($fence), $fence[0], $indent))->at($cursor);
    }
}
