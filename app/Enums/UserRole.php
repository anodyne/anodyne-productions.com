<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum UserRole: string implements HasColor, HasLabel
{
    case Admin = 'admin';

    case Staff = 'staff';

    case User = 'user';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Admin => 'info',
            self::Staff => 'success',
            default => 'gray',
        };
    }

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }
}
