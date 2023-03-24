<?php

namespace App\CommonMark\Extensions\Tag;

use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Parser\Block\AbstractBlockContinueParser;
use League\CommonMark\Parser\Block\BlockContinue;
use League\CommonMark\Parser\Block\BlockContinueParserInterface;
use League\CommonMark\Parser\Block\BlockStart;
use League\CommonMark\Parser\Block\BlockStartParserInterface;
use League\CommonMark\Parser\Cursor;
use League\CommonMark\Parser\MarkdownParserStateInterface;
use League\CommonMark\Util\ArrayCollection;

class TagBlockParser extends AbstractBlockContinueParser
{
    protected Tag $block;

    protected ArrayCollection $strings;

    public function __construct(string $tag, array $attributes = [])
    {
        $this->block = new Tag($tag, $attributes);
        $this->strings = new ArrayCollection();
    }

    public function getBlock(): Tag
    {
        return $this->block;
    }

    public function isContainer(): bool
    {
        return true;
    }

    public function canContain(AbstractBlock $childBlock): bool
    {
        return true;
    }

    public function addLine(string $line): void
    {
        $this->strings[] = $line;
    }

    public function closeBlock(): void
    {
        // first line becomes info string
        $firstLine = $this->strings->first();
        if ($firstLine === false) {
            $firstLine = '';
        }

        // $this->block->setInfo(RegexHelper::unescape(\trim($firstLine)));

        if ($this->strings->count() === 1) {
            $this->block->setLiteral('');
        } else {
            $this->block->setLiteral(\implode("\n", $this->strings->slice(1))."\n");
        }
    }

    public function tryContinue(Cursor $cursor, BlockContinueParserInterface $activeBlockParser): ?BlockContinue
    {
        // Check for closing code fence
        if (! $cursor->isIndented() && $cursor->getNextNonSpaceCharacter() === '{') {
            // $match = RegexHelper::matchFirst('/^(?:`{3,}|~{3,})(?= *$)/', $cursor->getLine(), $cursor->getNextNonSpacePosition());
            // if ($match !== null && \strlen($match[0]) >= $this->block->getLength()) {
            //     // closing fence - we're at end of line, so we can finalize now
            return BlockContinue::finished();
            // }
        }

        return BlockContinue::at($cursor);
    }

    public static function blockStartParser(): BlockStartParserInterface
    {
        return new class() implements BlockStartParserInterface
        {
            public function tryStart(Cursor $cursor, MarkdownParserStateInterface $parserState): ?BlockStart
            {
                if ($cursor->isIndented()) {
                    return BlockStart::none();
                }

                $cursor->advanceToNextNonSpaceOrTab();

                // The line must start with '{%'
                if ($cursor->match('/^{%/') === null) {
                    return BlockStart::none();
                }

                // There must be a type of tag next
                $cursor->advanceToNextNonSpaceOrTab();

                // Get the tag
                $tag = $cursor->match('/^[a-zA-Z-]+/');

                if ($tag === null) {
                    return BlockStart::none();
                }

                $cursor->advanceToNextNonSpaceOrTab();

                // Get the string of attributes and trim extra whitespace
                $attributesString = trim($cursor->match('/[^%]*/'));

                // The rest of the line must contain whitespace then '%}'
                $cursor->advanceToNextNonSpaceOrTab();

                if ($cursor->match('/^(\/?)%}$/') === null) {
                    return BlockStart::none();
                }

                $parser = config("markdown-tags.{$tag}.parser", TagBlockParser::class);

                return BlockStart::of(
                    new $parser($tag, $this->parseAttributes($attributesString))
                )->at($cursor);
            }

            public function parseAttributes(string $attributesString = ''): array
            {
                preg_match_all(
                    '/(?<attribute>[\w\-:.@]+)(=(?<value>(\"[^\"]+\"|\\\'[^\\\']+\\\'|[^\s>]+)))?/x',
                    $attributesString,
                    $matches,
                    PREG_SET_ORDER
                );

                if (count($matches) === 0) {
                    return [];
                }

                foreach ($matches as $match) {
                    $attributes[$match['attribute']] = str_replace('"', '', $match['value']);
                }

                return $attributes;
            }
        };
    }
}
