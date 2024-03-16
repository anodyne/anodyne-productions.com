<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum UserRole: string implements HasLabel
{
    case admin = 'admin';

    case staff = 'staff';

    case user = 'user';

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }
}
