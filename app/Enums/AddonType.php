<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum AddonType: string implements HasColor, HasLabel
{
    case extension = 'extension';

    // case genre = 'genre';

    case rank = 'rank';

    case theme = 'theme';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::extension => 'success',
            self::rank => 'warning',
            self::theme => 'info',
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
            self::extension => 'success',
            self::rank => 'warning',
            self::theme => 'info',
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
