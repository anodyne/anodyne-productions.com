<?php

declare(strict_types=1);

namespace App\Enums;

enum ReleaseSeverity: string
{
    case major = 'major';

    case minor = 'minor';

    case patch = 'patch';

    case critical = 'critical';

    case security = 'security';

    public function displayName(): string
    {
        return ucfirst($this->value);
    }
}
