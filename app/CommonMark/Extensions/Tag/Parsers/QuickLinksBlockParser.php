<?php

namespace App\CommonMark\Extensions\Tag\Parsers;

use App\CommonMark\Extensions\Tag\Tag;
use App\CommonMark\Extensions\Tag\TagBlockParser;
use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Parser\Block\BlockContinue;
use League\CommonMark\Parser\Block\BlockContinueParserInterface;
use League\CommonMark\Parser\Cursor;

class QuickLinksBlockParser extends TagBlockParser
{
    public function canContain(AbstractBlock $childBlock): bool
    {
        if (! $childBlock instanceof Tag) {
            return false;
        }

        return true;
    }

    public function tryContinue(Cursor $cursor, BlockContinueParserInterface $activeBlockParser): ?BlockContinue
    {
        // Check for closing tag
        if ($cursor->match('^({% /quick-links %})$^')) {
            return BlockContinue::finished();
        }

        return BlockContinue::at($cursor);
    }
}
