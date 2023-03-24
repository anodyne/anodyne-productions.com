<?php

declare(strict_types=1);

namespace App\Enums;

enum UserRole: string
{
    case admin = 'admin';

    case staff = 'staff';

    case user = 'user';

    public function displayName(): string
    {
        return ucfirst($this->value);
    }
}
