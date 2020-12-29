<?php

namespace Domain\Docs\CommonMark\Extension\CodeBlockHighlighter;

use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\Block\Element\IndentedCode;
use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Extension\ExtensionInterface;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;

class CodeBlockHighlighterExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $languages = [
            'html',
            'php',
            'js',
        ];

        $environment->addBlockRenderer(FencedCode::class, new FencedCodeRenderer($languages), 50);
        $environment->addBlockRenderer(IndentedCode::class, new IndentedCodeRenderer($languages), 50);
    }
}
