<?php

namespace Domain\Docs\CommonMark\Extensions\Badge;

use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Extension\ExtensionInterface;

class BadgeExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addInlineParser(new OpenBraceParser, 21);
        $environment->addInlineParser(new CloseBraceParser, 31);

        $environment->addInlineRenderer(Badge::class, new BadgeRenderer);
    }
}
