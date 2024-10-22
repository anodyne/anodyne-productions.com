<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum AddonType: string implements HasColor, HasLabel
{
    case Extension = 'extension';

    // case genre = 'genre';

    case Rank = 'rank';

    case Theme = 'theme';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Extension => 'success',
            self::Rank => 'warning',
            self::Theme => 'info',
            default => 'gray',
        };
    }

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }

    public function displayName(): string
    {
        return ucfirst($this->value);
    }

    public function badgeColor(): string
    {
        return match ($this) {
            self::Extension => 'success',
            self::Rank => 'warning',
            self::Theme => 'info',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::Extension => 'flex-puzzle',
            self::Rank => 'flex-chevron-double-up',
            self::Theme => 'flex-paint-brush',
        };
    }
}
