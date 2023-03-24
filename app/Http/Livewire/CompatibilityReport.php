<?php

namespace App\Http\Livewire;

use App\Models\Addon;
use App\Models\Compatibility;
use App\Models\ReleaseSeries;
use App\Models\Version;
use Filament\Notifications\Notification;
use WireElements\Pro\Components\Modal\Modal;

class CompatibilityReport extends Modal
{
    public string|Addon $addon;

    public int|Version $version;

    public int|ReleaseSeries $series;

    public ?string $status = null;

    public ?string $notes = null;

    public function save(): void
    {
        Compatibility::updateOrCreate(
            [
                'addon_id' => $this->addon->id,
                'version_id' => $this->version->id,
                'release_series_id' => $this->series->id,
                'user_id' => auth()->id(),
            ],
            [
                'status' => $this->status,
                'notes' => $this->notes,
            ]
        );

        Notification::make()
            ->title('Compatibility report has been submitted')
            ->success()
            ->send();

        $this->close(
            andEmit: [
                AddonsDisplay::class => 'compatibilityReportSubmitted',
            ]
        );
    }

    public function toggleStatus(string $status): void
    {
        if (filled($this->status) && $this->status === $status) {
            $this->status = null;
        } else {
            $this->status = $status;
        }
    }

    public function mount(Addon $addon, Version $version, ReleaseSeries $series): void
    {
        $this->addon = $addon;
        $this->series = $series;
        $this->version = $version;
    }

    public function render()
    {
        return view('livewire.compatibility-report');
    }
}
