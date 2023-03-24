<?php

declare(strict_types=1);

namespace App\Enums;

enum AddonType: string
{
    case extension = 'extension';

    // case genre = 'genre';

    case rank = 'rank';

    case theme = 'theme';

    public function displayName(): string
    {
        return ucfirst($this->value);
    }

    public function badgeColor(): string
    {
        return match ($this) {
            self::extension => 'emerald',
            self::rank => 'amber',
            self::theme => 'purple',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::extension => 'flex-puzzle',
            self::rank => 'flex-chevron-double-up',
            self::theme => 'flex-paint-brush',
        };
    }
}
