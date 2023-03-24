<?php

namespace App\CommonMark\Extensions\Tag;

use Exception;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;

class TagRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        Tag::assertInstanceOf($node);

        $tagConfig = config("markdown-tags.{$node->getTag()}");

        if (! $tagConfig) {
            throw new Exception("No Markdown tag info found for [{$node->getTag()}]");
        }

        $renderer = data_get($tagConfig, 'renderer', $tagConfig);

        return (new $renderer())->render($node, $childRenderer);
    }
}
