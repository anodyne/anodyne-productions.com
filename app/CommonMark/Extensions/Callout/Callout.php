<?php

declare(strict_types=1);

namespace App\CommonMark\Extensions\Callout;

use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Node\StringContainerInterface;

final class Callout extends AbstractBlock implements StringContainerInterface
{
    private ?string $info = null;

    private string $literal = '';

    private int $length;

    private string $char;

    private int $offset;

    public function __construct(int $length, string $char, int $offset)
    {
        parent::__construct();

        $this->length = $length;
        $this->char = $char;
        $this->offset = $offset;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    /**
     * @return string[]
     */
    public function getInfoWords(): array
    {
        return \preg_split('/\s+/', $this->info ?? '') ?: [];
    }

    public function setInfo(string $info): void
    {
        $this->info = $info;
    }

    public function getLiteral(): string
    {
        return $this->literal;
    }

    public function setLiteral(string $literal): void
    {
        $this->literal = $literal;
    }

    public function getChar(): string
    {
        return $this->char;
    }

    public function setChar(string $char): void
    {
        $this->char = $char;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): void
    {
        $this->offset = $offset;
    }
}
