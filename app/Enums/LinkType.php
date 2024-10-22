<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum LinkType: string implements HasLabel
{
    case Discord = 'discord';
    case Email = 'email';
    case Facebook = 'facebook';
    case Github = 'github';
    case Twitter = 'twitter';
    case Website = 'website';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Discord => 'Discord server',
            self::Email => 'Email address',
            self::Facebook => 'Facebook',
            self::Github => 'Github repo',
            self::Twitter => 'Twitter',
            self::Website => 'Website URL',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::Discord => 'flex-discord',
            self::Email => 'flex-at-symbol',
            self::Facebook => 'flex-facebook',
            self::Github => 'flex-git',
            self::Twitter => 'flex-twitter',
            self::Website => 'flex-www',
        };
    }
}
