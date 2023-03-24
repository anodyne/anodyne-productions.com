<?php

namespace App\CommonMark\Extensions\Tag;

use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Node\StringContainerInterface;

class Tag extends AbstractBlock implements StringContainerInterface
{
    public function __construct(
        protected string $tag,
        protected array $attributes,
        protected string $literal = ''
    ) {
    }

    public function getAttribute(string $key): ?string
    {
        if (array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }

        return null;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function getLiteral(): string
    {
        return $this->literal;
    }

    public function setLiteral(string $literal): void
    {
        $this->literal = $literal;
    }
}
