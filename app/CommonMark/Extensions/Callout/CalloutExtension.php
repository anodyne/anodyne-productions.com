<?php

declare(strict_types=1);

namespace App\CommonMark\Extensions\Callout;

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
