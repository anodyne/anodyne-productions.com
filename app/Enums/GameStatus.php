<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum GameStatus: string implements HasColor, HasLabel
{
    case Active = 'active';

    case Inactive = 'inactive';

    case Errored = 'errored';

    case Redirecting = 'redirecting';

    case Unknown = 'unknown';

    case Abandoned = 'abandoned';

    case Unreachable = 'unreachable';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Active => 'success',
            self::Inactive => 'gray',
            self::Redirecting, self::Unknown => 'warning',
            default => 'danger',
        };
    }

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }
}
