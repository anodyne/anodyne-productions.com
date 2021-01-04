<?php

namespace Domain\Docs\CommonMark\Extension\Badge;

use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Extension\ExtensionInterface;

class BadgeExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addDelimiterProcessor(new BadgeDelimiterProcessor());
        $environment->addInlineRenderer(Badge::class, new BadgeRenderer());
    }
}
