<?php

namespace App\Filament\Pages;

use App\Filament\Resources\GameResource\Widgets\GamesAverages;
use App\Filament\Resources\GameResource\Widgets\GamesStats;
use Filament\Pages\Page;

class NovaStats extends Page
{
    protected static ?string $navigationGroup = 'Reports';

    protected static ?string $navigationLabel = 'Nova Game Stats';

    protected static ?string $navigationIcon = 'flex-graph-dot';

    protected static ?int $navigationSort = 1;

    protected ?string $heading = 'Nova Game Stats';

    protected ?string $subheading = 'This report provides an overview of the various telemetry stats collected about Nova games.';

    protected static string $view = 'filament.pages.nova-stats';

    public function mount(): void
    {
        abort_unless(auth()->user()->isStaff || auth()->user()->isAdmin, 404);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->isStaff || auth()->user()->isAdmin;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            GamesStats::class,
            GamesAverages::class,
        ];
    }
}
