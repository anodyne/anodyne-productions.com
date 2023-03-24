<?php

namespace App\Actions;

use App\Enums\CompatibilityStatus;
use App\Models\Compatibility;
use App\Models\ReleaseSeries;
use App\Models\Version;
use Lorisleiva\Actions\Concerns\AsAction;

class GetAddonCompatibility
{
    use AsAction;

    public function __construct(
        public readonly int $threshold = 3
    ) {
    }

    public function handle(Version $version, ReleaseSeries $series): array
    {
        $versionStats = Compatibility::toBase()
            ->selectRaw("count(case when status = 'compatible' then 1 end) as compatible")
            ->selectRaw("count(case when status = 'compatible-override' then 1 end) as compatible_override")
            ->selectRaw("count(case when status = 'incompatible' then 1 end) as incompatible")
            ->selectRaw("count(case when status = 'incompatible-override' then 1 end) as incompatible_override")
            ->where('addon_id', $version->addon_id)
            ->where('version_id', $version->id)
            ->where('release_series_id', $series->id)
            ->first();

        $addonStats = Compatibility::toBase()
            ->selectRaw("count(case when status = 'compatible' then 1 end) as compatible")
            ->selectRaw("count(case when status = 'compatible-override' then 1 end) as compatible_override")
            ->selectRaw("count(case when status = 'incompatible' then 1 end) as incompatible")
            ->selectRaw("count(case when status = 'incompatible-override' then 1 end) as incompatible_override")
            ->where('addon_id', $version->addon_id)
            ->where('release_series_id', $series->id)
            ->first();

        return [
            'status' => $this->getStatus($versionStats, $addonStats),
            'addonStats' => $addonStats,
            'versionStats' => $versionStats,
        ];
    }

    protected function getStatus($versionStats, $addonStats): CompatibilityStatus
    {
        if ($versionStats->compatible_override > 0 || $addonStats->compatible_override) {
            return CompatibilityStatus::compatibleOverride;
        }

        if ($versionStats->incompatible_override > 0 || $addonStats->incompatible_override) {
            return CompatibilityStatus::incompatibleOverride;
        }

        if ($versionStats->compatible >= $this->threshold && $versionStats->compatible > $versionStats->incompatible) {
            return CompatibilityStatus::compatible;
        }

        if ($versionStats->incompatible >= $this->threshold && $versionStats->incompatible > $versionStats->compatible) {
            return CompatibilityStatus::incompatible;
        }

        if ($versionStats->compatible === 0 && $versionStats->incompatible === 0) {
            if ($addonStats->compatible >= $this->threshold && $addonStats->compatible > $addonStats->incompatible) {
                return CompatibilityStatus::compatiblePreviously;
            }

            if ($addonStats->incompatible >= $this->threshold && $addonStats->incompatible > $addonStats->compatible) {
                return CompatibilityStatus::incompatiblePreviously;
            }
        }

        return CompatibilityStatus::unknown;
    }
}
