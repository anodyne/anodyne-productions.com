<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CompatibilityStatus: string implements HasLabel
{
    case Compatible = 'compatible';

    case CompatibleOverride = 'compatible-override';

    case CompatiblePreviously = 'compatible-previously';

    case Incompatible = 'incompatible';

    case IncompatibleOverride = 'incompatible-override';

    case IncompatiblePreviously = 'incompatible-previously';

    case Unknown = 'unknown';

    public function description(string $series, bool $hasResults = false): string
    {
        return match ($this) {
            self::Compatible => 'Members of the community have confirmed this add-on works with '.$series,
            self::CompatibleOverride => 'This add-on works with '.$series,
            self::CompatiblePreviously => "Members of the community confirmed this add-on worked in a previous version, but haven&rsquo;t confirmed that this specific version of the add-on works with {$series}",
            self::Incompatible => 'Members of the community have confirmed this add-on does not work with '.$series,
            self::IncompatibleOverride => 'This add-on does not work with '.$series,
            self::IncompatiblePreviously => "Members of the community confirmed this add-on did not work in a previous version, but haven&rsquo;t confirmed that this specific version of the add-on does not work with {$series}",
            self::Unknown => $hasResults
                ? "This add-on may work with {$series}, but there aren&rsquo;t enough members of the community that have confirmed"
                : "This add-on may work with {$series}, but members of the community haven&rsquo;t confirmed",
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Compatible => 'Compatible',
            self::CompatibleOverride => 'Compatible (Override)',
            self::Incompatible => 'Incompatible',
            self::IncompatibleOverride => 'Incompatible (Override)',
            default => 'Unknown',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::Compatible, self::CompatiblePreviously, self::CompatibleOverride => 'flex-check-square',
            self::Incompatible, self::IncompatiblePreviously, self::IncompatibleOverride => 'flex-delete-square',
            default => 'flex-question-square',
        };
    }

    public function iconColor(): string
    {
        return match ($this) {
            self::Compatible, self::CompatibleOverride => 'text-success-400 dark:text-success-600',
            self::Incompatible, self::IncompatibleOverride => 'text-danger-400 dark:text-danger-600',
            default => 'text-warning-400 dark:text-warning-600',
        };
    }

    public function textColor(): string
    {
        return match ($this) {
            self::Compatible, self::CompatibleOverride => 'text-success-500',
            self::Incompatible, self::IncompatibleOverride => 'text-danger-500',
            default => 'text-warning-500',
        };
    }
}
