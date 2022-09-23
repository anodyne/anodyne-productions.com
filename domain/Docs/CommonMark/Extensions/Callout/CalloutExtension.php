<?php

declare(strict_types=1);

namespace Domain\Docs\CommonMark\Extensions\Badge;

use Domain\Docs\CommonMark\Extensions\Callout\CalloutParser;
use Domain\Docs\CommonMark\Extensions\Callout\CalloutRenderer;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;

class CalloutExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment
            ->addBlockStartParser(new CalloutParser(), 20)
            ->addRenderer(Callout::class, new CalloutRenderer());
    }
}
