<?php

namespace App\CommonMark\Extensions\Tag\Renderers;

use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class WarningRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        return new HtmlElement(
            'div',
            [
                'class' => 'my-8 flex gap-2.5 rounded-2xl p-4 leading-6 border border-amber-500/20 bg-amber-50/50 text-amber-800 dark:border-amber-500/30 dark:bg-amber-500/5 dark:text-amber-200 dark:[--tw-prose-links:theme(colors.white)] dark:[--tw-prose-links-hover:theme(colors.amber.300)',
            ],
            [
                svg('flex-alert-diamond')->class('h-6 w-6 flex-none')->toHtml(),
                new HtmlElement('div', [], [
                    new HtmlElement(
                        'p',
                        [
                            'class' => 'm-0 font-medium text-lg leading-6',
                        ],
                        $node->getAttribute('title') ?? 'Warning'
                    ),
                    new HtmlElement(
                        'div',
                        [
                            'class' => 'prose dark:prose-invert mt-2.5 text-amber-700 dark:text-amber-300 prose-strong:text-amber-800 dark:prose-strong:text-amber-100',
                        ],
                        $childRenderer->renderNodes($node->children())
                    ),
                ]),
            ]
        );
    }
}
