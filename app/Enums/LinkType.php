<?php

declare(strict_types=1);

namespace App\Enums;

enum LinkType: string
{
    case discord = 'discord';
    case email = 'email';
    case facebook = 'facebook';
    case github = 'github';
    case twitter = 'twitter';
    case website = 'website';

    public function displayName(): string
    {
        return match ($this) {
            self::discord => 'Discord server',
            self::email => 'Email address',
            self::facebook => 'Facebook',
            self::github => 'Github repo',
            self::twitter => 'Twitter',
            self::website => 'Website URL',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::discord => 'flex-discord',
            self::email => 'flex-at-symbol',
            self::facebook => 'flex-facebook',
            self::github => 'flex-git',
            self::twitter => 'flex-twitter',
            self::website => 'flex-www',
        };
    }
}
