<?php

namespace Domain\Docs\CommonMark\Extensions\Badge;

use League\CommonMark\Cursor;
use League\CommonMark\Delimiter\DelimiterInterface;
use League\CommonMark\EnvironmentAwareInterface;
use League\CommonMark\EnvironmentInterface;
use League\CommonMark\Inline\AdjacentTextMerger;
use League\CommonMark\Inline\Parser\InlineParserInterface;
use League\CommonMark\InlineParserContext;
use League\CommonMark\Reference\ReferenceMapInterface;
use League\CommonMark\Util\LinkParserHelper;

final class CloseBraceParser implements InlineParserInterface, EnvironmentAwareInterface
{
    private EnvironmentInterface $environment;

    public function getCharacters(): array
    {
        return ['}'];
    }

    public function parse(InlineParserContext $inlineContext): bool
    {
        // Look through stack of delimiters for a { or !
        $opener = $inlineContext->getDelimiterStack()->searchByCharacter(['{', '!']);

        if ($opener === null) {
            return false;
        }

        if (! $opener->isActive()) {
            // no matched opener; remove from emphasis stack
            $inlineContext->getDelimiterStack()->removeDelimiter($opener);

            return false;
        }

        $cursor = $inlineContext->getCursor();

        $startPos = $cursor->getPosition();
        $previousState = $cursor->saveState();

        $cursor->advanceBy(1);

        $type = $this->tryParse($cursor, $inlineContext->getReferenceMap(), $opener, $startPos);

        $inline = new Badge($type);
        $opener->getInlineNode()->replaceWith($inline);

        while (($label = $inline->next()) !== null) {
            $inline->appendChild($label);
        }

        // Process delimiters such as emphasis inside link/image
        $delimiterStack = $inlineContext->getDelimiterStack();
        $stackBottom = $opener->getPrevious();
        $delimiterStack->processDelimiters($stackBottom, $this->environment->getDelimiterProcessors());
        $delimiterStack->removeAll($stackBottom);

        // Merge any adjacent Text nodes together
        AdjacentTextMerger::mergeChildNodes($inline);

        return true;
    }

    public function setEnvironment(EnvironmentInterface $environment)
    {
        $this->environment = $environment;
    }

    private function tryParse(Cursor $cursor, ReferenceMapInterface $referenceMap, DelimiterInterface $opener, int $startPos)
    {
        // Check to see if we have a type
        if ($result = $this->tryParseInlineType($cursor)) {
            return $result;
        }

        return false;
    }

    private function tryParseInlineType(Cursor $cursor)
    {
        if ($cursor->getCharacter() !== '(') {
            return false;
        }

        $previousState = $cursor->saveState();

        $cursor->advanceBy(1);
        $cursor->advanceToNextNonSpaceOrNewline();

        if (($type = LinkParserHelper::parseLinkDestination($cursor)) === null) {
            $cursor->restoreState($previousState);

            return false;
        }

        $cursor->advanceToNextNonSpaceOrNewline();

        if ($cursor->getCharacter() !== ')') {
            $cursor->restoreState($previousState);

            return false;
        }

        $cursor->advanceBy(1);

        return $type;
    }
}
