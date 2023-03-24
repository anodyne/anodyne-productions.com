<?php

namespace App\CommonMark\Extensions\Tag\Parsers;

use App\CommonMark\Extensions\Tag\TagBlockParser;
use League\CommonMark\Parser\Block\BlockContinue;
use League\CommonMark\Parser\Block\BlockContinueParserInterface;
use League\CommonMark\Parser\Cursor;

class SelfClosingBlockParser extends TagBlockParser
{
    public function tryContinue(Cursor $cursor, BlockContinueParserInterface $activeBlockParser): ?BlockContinue
    {
        // For self-closing tags, we can just stop right here
        return BlockContinue::finished();
    }
}
