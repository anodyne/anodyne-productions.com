<?php

namespace Domain\Docs\CommonMark\Extensions\Note;

use League\CommonMark\Block\Parser\BlockParserInterface;
use League\CommonMark\ContextInterface;
use League\CommonMark\Cursor;

class NoteParser implements BlockParserInterface
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

        // fenced note block
        $fence = \ltrim($fence, " \t");
        $fenceLength = \strlen($fence);
        $context->addBlock(new Note($fenceLength, $fence[0], $indent));

        return true;
    }
}
