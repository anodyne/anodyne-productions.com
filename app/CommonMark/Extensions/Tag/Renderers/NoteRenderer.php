<?php

namespace App\CommonMark\Extensions\Tag\Renderers;

use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class NoteRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        return new HtmlElement(
            'div',
            [
                'class' => 'my-8 flex gap-2.5 rounded-2xl p-4 leading-6 border border-purple-500/20 bg-purple-50/50 text-purple-700 dark:border-purple-500/30 dark:bg-purple-500/5 dark:text-purple-200 dark:[--tw-prose-links:theme(colors.white)] dark:[--tw-prose-links-hover:theme(colors.purple.300)',
            ],
            [
                svg('flex-lightbulb')->class('h-6 w-6 flex-none')->toHtml(),
                new HtmlElement('div', [], [
                    new HtmlElement(
                        'p',
                        [
                            'class' => 'm-0 font-medium text-lg leading-6',
                        ],
                        $node->getAttribute('title') ?? 'Tip'
                    ),
                    new HtmlElement(
                        'div',
                        [
                            'class' => 'prose dark:prose-invert mt-2.5 text-purple-600 dark:text-purple-300 prose-strong:text-purple-700 dark:prose-strong:text-purple-100',
                        ],
                        $childRenderer->renderNodes($node->children())
                    ),
                ]),
            ]
        );
    }
}
