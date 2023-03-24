<?php

declare(strict_types=1);

namespace App\CommonMark\Extensions\Callout;

use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\CommonMark\Util\Xml;
use League\CommonMark\Xml\XmlNodeRendererInterface;

final class CalloutRenderer implements NodeRendererInterface, XmlNodeRendererInterface
{
    /**
     * @param  FencedCode  $node
     *
     * {@inheritDoc}
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): \Stringable
    {
        Callout::assertInstanceOf($node);

        $attrs = $node->data->getData('attributes');

        $infoWords = $node->getInfoWords();
        if (\count($infoWords) !== 0 && $infoWords[0] !== '') {
            $attrs->append('class', 'language-'.$infoWords[0]);
        }

        return new HtmlElement(
            'pre',
            [],
            new HtmlElement('code', $attrs->export(), Xml::escape($node->getLiteral()))
        );
    }

    public function getXmlTagName(Node $node): string
    {
        return 'callout';
    }

    /**
     * @param  FencedCode  $node
     * @return array<string, scalar>
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     */
    public function getXmlAttributes(Node $node): array
    {
        FencedCode::assertInstanceOf($node);

        if (($info = $node->getInfo()) === null || $info === '') {
            return [];
        }

        return ['info' => $info];
    }
}
