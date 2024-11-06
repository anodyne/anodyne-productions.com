<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum HeartbeatType: string implements HasColor, HasLabel
{
    case Daily = 'daily';

    case Inactive = 'inactive';

    case Abandoned = 'abandoned';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Daily => 'success',
            self::Inactive => 'warning',
            self::Abandoned => 'danger',
            default => 'gray',
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Daily => 'Active games checks',
            self::Inactive => 'Inactive games checks',
            self::Abandoned => 'Abandoned games deactivation',
            default => null,
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::Daily => 'Daily check of active games',
            self::Inactive => 'Monthly check of games previously marked as inactive',
            self::Abandoned => 'Daily deactivation of abandoned and errored games',
            default => null,
        };
    }
}
