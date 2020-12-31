<?php

namespace Domain\Docs\CommonMark\Extension\Alert;

use League\CommonMark\Block\Parser\BlockParserInterface;
use League\CommonMark\ContextInterface;
use League\CommonMark\Cursor;

class AlertParser implements BlockParserInterface
{
    public function parse(ContextInterface $context, Cursor $cursor): bool
    {
        if ($cursor->isIndented()) {
            return false;
        }

        $c = $cursor->getCharacter();

        if ($c !== ':') {
            return false;
        }

        $indent = $cursor->getIndent();
        $fence = $cursor->match('/^(?::{3,}(?!.*:))/');

        if ($fence === null) {
            return false;
        }

        // fenced alert block
        $fence = \ltrim($fence, " \t");
        $fenceLength = \strlen($fence);
        $context->addBlock(new Alert($fenceLength, $fence[0], $indent));

        return true;
    }
}
