<?php

namespace Domain\Docs\CommonMark\Extensions\Badge;

use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Renderer\InlineRendererInterface;

final class BadgeRenderer implements InlineRendererInterface
{
    public function render(AbstractInline $inline, ElementRendererInterface $htmlRenderer)
    {
        if (! ($inline instanceof Badge)) {
            throw new \InvalidArgumentException('Incompatible inline type: '.get_class($inline));
        }

        $attributes = $inline->getData('attributes', ['class' => 'badge']);

        if ($inline->type) {
            $attributes['class'] = isset($attributes['class']) ? $attributes['class'].' ' : '';
            $attributes['class'] .= "is-{$inline->type}";
        }

        return new HtmlElement(
            'span',
            $attributes,
            $htmlRenderer->renderInlines($inline->children())
        );
    }
}
