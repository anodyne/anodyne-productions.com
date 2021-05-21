<?php

namespace Domain\Docs\CommonMark\Extensions\Note;

use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Renderer\BlockRendererInterface;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;

class NoteRenderer implements BlockRendererInterface
{
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, bool $inTightList = false)
    {
        if (! ($block instanceof Note)) {
            throw new \InvalidArgumentException('Incompatible block type: '.\get_class($block));
        }

        $attrs = $block->getData('attributes', ['class' => 'note']);

        $infoWords = $block->getInfoWords();
        $type = $infoWords[0];

        unset($infoWords[0]);
        $title = count($infoWords) > 0 ? implode(' ', $infoWords) : null;

        if (\strlen($type) !== 0) {
            $attrs['class'] = isset($attrs['class']) ? $attrs['class'].' ' : '';
            $attrs['class'] .= "is-{$type}";
        }

        $filling = [];
        $filling[] = new HtmlElement('div', ['class' => 'accent'], null);

        if ($type) {
            $filling[] = new HtmlElement('div', ['class' => 'identifier'], [
                svg($this->getIconForType($type))->class('h-6 w-6')->toHtml(),
                new HtmlElement('span', [], $title ?? ucfirst($type)),
            ]);
        }

        $filling[] = new HtmlElement('div', ['class' => 'content'], $htmlRenderer->renderInlines($block->children()));

        return new HtmlElement('div', $attrs, $filling);
    }

    protected function getIconForType(string $type): string
    {
        return match ($type) {
            'note' => 'fluent-info',
            'warning' => 'fluent-warning',
            'tip' => 'fluent-flash',
            'callout' => 'fluent-star',
            'question' => 'fluent-question-circle',
            'success' => 'fluent-checkmark-circle',
            default => 'fluent-info',
        };
    }
}
