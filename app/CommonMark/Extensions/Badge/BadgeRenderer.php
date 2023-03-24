<?php

declare(strict_types=1);

namespace App\CommonMark\Extensions\Badge;

use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class BadgeRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        $attributes = $node->data->getData('attributes', ['class' => 'badge']);

        if ($node->type) {
            $attributes['class'] = isset($attributes['class']) ? $attributes['class'].' ' : '';
            $attributes['class'] .= "is-{$node->type}";
        }

        return new HtmlElement(
            'span',
            (array) $attributes,
            $childRenderer->renderNodes($node->children())
        );
    }
}
