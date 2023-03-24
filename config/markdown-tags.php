<?php

use App\CommonMark\Extensions\Tag\Parsers;
use App\CommonMark\Extensions\Tag\Renderers;

return [

    'note' => Renderers\NoteRenderer::class,
    'quick-link' => [
        'parser' => Parsers\SelfClosingBlockParser::class,
        'renderer' => Renderers\QuickLinkRenderer::class,
    ],
    'quick-links' => [
        'parser' => Parsers\QuickLinksBlockParser::class,
        'renderer' => Renderers\QuickLinksRenderer::class,
    ],
    'screenshot' => [
        'parser' => Parsers\SelfClosingBlockParser::class,
        'renderer' => Renderers\ScreenshotRenderer::class,
    ],
    'tip' => Renderers\TipRenderer::class,
    'warning' => Renderers\WarningRenderer::class,

];
