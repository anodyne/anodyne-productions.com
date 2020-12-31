<?php

namespace Domain\Docs\CommonMark\Extension\Alert;

use BladeUI\Icons\Svg;
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\Block\Renderer\BlockRendererInterface;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;
use League\CommonMark\Util\Xml;

class AlertRenderer implements BlockRendererInterface
{
    /**
     * @param FencedCode               $block
     * @param ElementRendererInterface $htmlRenderer
     * @param bool                     $inTightList
     *
     * @return HtmlElement
     */
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, bool $inTightList = false)
    {
        if (! ($block instanceof Alert)) {
            throw new \InvalidArgumentException('Incompatible block type: '.\get_class($block));
        }

        $attrs = $block->getData('attributes', ['class' => 'alert']);

        $infoWords = $block->getInfoWords();
        $type = $infoWords[0];

        if (\count($infoWords) !== 0 && \strlen($type) !== 0) {
            $attrs['class'] = isset($attrs['class']) ? $attrs['class'].' ' : '';
            $attrs['class'] .= "is-{$type}";
        }

        return new HtmlElement(
            'div',
            $attrs,
            [
                new HtmlElement('div', ['class' => 'accent'], null),
                new HtmlElement('div', ['class' => 'identifier'], [
                    svg($this->getIconForType($type))->class('h-6 w-6')->toHtml(),
                    new HtmlElement('span', [], ucfirst($type)),
                ]),
                new HtmlElement('div', ['class' => 'content'], Xml::escape($block->getStringContent())),
            ]
        );
    }

    protected function getIconForType(string $type): string
    {
        switch ($type) {
            case 'note':
            case 'info':
            default:
                return 'fluent-info';

                break;

            case 'warning':
            case 'danger':
            case 'failure':
            case 'caution':
            case 'attention':
            case 'error':
                return 'fluent-warning';

                break;

            case 'tip':
            case 'hint':
                return 'fluent-flash';

                break;

            case 'callout':
                return 'fluent-star';

                break;

            case 'question':
                return 'fluent-question-circle';

                break;

            case 'success':
            case 'done':
            case 'check':
                return 'fluent-checkmark-circle';

                break;
        }
    }
}
