<?php

namespace App\CommonMark\Extensions\Tag\Renderers;

use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class ScreenshotRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        return new HtmlElement(
            'div',
            [
                'class' => 'px-8 overflow-hidden rounded-xl w-full bg-gradient-to-tr from-purple-500 dark:from-purple-600 to-cyan-400 dark:to-cyan-500 via-sky-500 dark:via-sky-600',
            ],
            new HtmlElement(
                'img',
                [
                    'src' => $node->getAttribute('src'),
                    'alt' => $node->getAttribute('alt'),
                    'height' => '1700',
                    'width' => '2700',
                    'class' => 'overflow-hidden rounded-lg shadow-xl ring-1 ring-black/5',
                ],
                '',
                true
            )
        );
    }
}
