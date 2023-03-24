<?php

namespace App\CommonMark\Extensions\Tag\Renderers;

use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class QuickLinksRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        // dd($node->children());

        return new HtmlElement(
            'div',
            [
                'class' => 'not-prose mt-4 grid grid-cols-1 gap-8 sm:grid-cols-2',
            ],
            $childRenderer->renderNodes($node->children())
        );
    }
}
