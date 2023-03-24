<?php

declare(strict_types=1);

namespace App\CommonMark\Extensions\Badge;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;

class BadgeExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addDelimiterProcessor(new BadgeDelimiterProcess());

        $environment->addRenderer(Badge::class, new BadgeRenderer(), 21);
    }
}
