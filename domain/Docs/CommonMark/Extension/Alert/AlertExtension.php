<?php

namespace Domain\Docs\CommonMark\Extension\Alert;

use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Extension\ExtensionInterface;

class AlertExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new AlertParser());
        $environment->addBlockRenderer(Alert::class, new AlertRenderer());
    }
}
