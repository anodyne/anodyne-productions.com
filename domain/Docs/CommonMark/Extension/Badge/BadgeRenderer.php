<?php

namespace Domain\Docs\CommonMark\Extension\Badge;

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

        return new HtmlElement(
            'span',
            $inline->getData('attributes', ['class' => 'badge']),
            $htmlRenderer->renderInlines($inline->children())
        );
    }
}
