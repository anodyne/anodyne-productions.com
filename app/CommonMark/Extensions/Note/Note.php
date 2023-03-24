<?php

namespace App\CommonMark\Extensions\Note;

use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Element\AbstractStringContainerBlock;
use League\CommonMark\ContextInterface;
use League\CommonMark\Cursor;
use League\CommonMark\Util\RegexHelper;

class Note extends AbstractStringContainerBlock
{
    protected string $info;

    protected int $length;

    protected string $char;

    protected int $offset;

    public function __construct(int $length, string $char, int $offset)
    {
        parent::__construct();

        $this->length = $length;
        $this->char = $char;
        $this->offset = $offset;
    }

    public function getInfo(): string
    {
        return $this->info;
    }

    public function getInfoWords(): array
    {
        return \preg_split('/\s+/', $this->info) ?: [];
    }

    public function getChar(): string
    {
        return $this->char;
    }

    public function setChar(string $char): self
    {
        $this->char = $char;

        return $this;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function canContain(AbstractBlock $block): bool
    {
        return true;
    }

    public function isCode(): bool
    {
        return true;
    }

    public function matchesNextLine(Cursor $cursor): bool
    {
        if ($this->length === -1) {
            if ($cursor->isBlank()) {
                $this->lastLineBlank = true;
            }

            return false;
        }

        // Skip optional spaces of fence offset
        $cursor->match('/^ {0,'.$this->offset.'}/');

        return true;
    }

    public function finalize(ContextInterface $context, int $endLineNumber)
    {
        parent::finalize($context, $endLineNumber);

        // first line becomes info string
        $firstLine = $this->strings->first();

        if ($firstLine === false) {
            $firstLine = '';
        }

        $this->info = RegexHelper::unescape(\trim($firstLine));

        if ($this->strings->count() === 1) {
            $this->finalStringContents = '';
        } else {
            $this->finalStringContents = \implode("\n", $this->strings->slice(1))."\n";
        }
    }

    public function handleRemainingContents(ContextInterface $context, Cursor $cursor)
    {
        /** @var self $container */
        $container = $context->getContainer();

        // check for closing alert fence
        if ($cursor->getIndent() <= 3 && $cursor->getNextNonSpaceCharacter() === $container->getChar()) {
            $match = RegexHelper::matchAll('/^(?::{3,})(?= *$)/', $cursor->getLine(), $cursor->getNextNonSpacePosition());

            if ($match !== null && \strlen($match[0]) >= $container->getLength()) {
                // don't add closing fence to container; instead, close it:
                $this->setLength(-1); // -1 means we've passed closer

                return;
            }
        }

        $container->addLine($cursor->getRemainder());
    }

    public function shouldLastLineBeBlank(Cursor $cursor, int $currentLineNumber): bool
    {
        return false;
    }
}
