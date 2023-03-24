<?php

namespace App\Enums;

enum CompatibilityStatus: string
{
    case compatible = 'compatible';

    case compatibleOverride = 'compatible-override';

    case compatiblePreviously = 'compatible-previously';

    case incompatible = 'incompatible';

    case incompatibleOverride = 'incompatible-override';

    case incompatiblePreviously = 'incompatible-previously';

    case unknown = 'unknown';

    public function description(string $series, bool $hasResults = false): string
    {
        return match ($this) {
            self::compatible => 'Members of the community have confirmed this add-on works with '.$series,
            self::compatibleOverride => 'This add-on works with '.$series,
            self::compatiblePreviously => "Members of the community confirmed this add-on worked in a previous version, but haven't confirmed that this specific version of the add-on works with {$series}",
            self::incompatible => 'Members of the community have confirmed this add-on does not work with '.$series,
            self::incompatibleOverride => 'This add-on does not work with '.$series,
            self::incompatiblePreviously => "Members of the community confirmed this add-on did not work in a previous version, but haven't confirmed that this specific version of the add-on does not work with {$series}",
            self::unknown => $hasResults
                ? "This add-on may work with {$series}, but there aren't enough members of the community that have confirmed"
                : "This add-on may work with {$series}, but members of the community haven't confirmed",
        };
    }

    public function displayName(): string
    {
        return match ($this) {
            self::compatible => 'Compatible',
            self::compatibleOverride => 'Compatible (Override)',
            self::incompatible => 'Incompatible',
            self::incompatibleOverride => 'Incompatible (Override)',
            default => 'Unknown',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::compatible, self::compatiblePreviously, self::compatibleOverride => 'flex-check-square',
            self::incompatible, self::incompatiblePreviously, self::incompatibleOverride => 'flex-delete-square',
            default => 'flex-question-square',
        };
    }

    public function iconColor(): string
    {
        return match ($this) {
            self::compatible, self::compatibleOverride => 'text-success-400 dark:text-success-600',
            self::incompatible, self::incompatibleOverride => 'text-danger-400 dark:text-danger-600',
            default => 'text-warning-400 dark:text-warning-600',
        };
    }

    public function textColor(): string
    {
        return match ($this) {
            self::compatible, self::compatibleOverride => 'text-success-500',
            self::incompatible, self::incompatibleOverride => 'text-danger-500',
            default => 'text-warning-500',
        };
    }
}
