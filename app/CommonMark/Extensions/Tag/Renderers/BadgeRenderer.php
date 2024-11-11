<?php

namespace App\CommonMark\Extensions\Tag\Renderers;

use Illuminate\Support\Arr;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class BadgeRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        return new HtmlElement(
            'div',
            ['class' => 'not-prose inline-flex'],
            new HtmlElement(
                'span',
                [
                    'class' => Arr::toCssClasses([
                        'font-mono text-[0.625rem] font-semibold leading-6 rounded-lg px-1.5 ring-1 ring-inset',

                        'ring-amber-300 bg-amber-400/10 text-amber-500 dark:ring-amber-400/30 dark:bg-amber-400/10 dark:text-amber-400' => $node->getAttribute('variant') === 'warning',

                        'ring-emerald-300 bg-emerald-400/10 text-emerald-500 dark:ring-emerald-400/30 dark:bg-emerald-400/10 dark:text-emerald-400' => $node->getAttribute('variant') === 'success',

                        'ring-purple-300 bg-purple-400/10 text-purple-500 dark:ring-purple-400/30 dark:bg-purple-400/10 dark:text-purple-400' => $node->getAttribute('variant') === 'info',

                        'ring-sky-300 bg-sky-400/10 text-sky-500 dark:ring-sky-400/30 dark:bg-sky-400/10 dark:text-sky-400' => $node->getAttribute('variant') === 'primary',

                        'ring-rose-300 bg-rose-400/10 text-rose-500 dark:ring-rose-400/30 dark:bg-rose-400/10 dark:text-rose-400' => $node->getAttribute('variant') === 'danger',
                    ]),
                ],
                $childRenderer->renderNodes($node->children())
            )
        );
    }
}
