<?php

namespace App\Filament\Pages;

use App\Enums\HeartbeatType;
use App\Models\HeartbeatReport;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class HeartbeatsReport extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationGroup = 'Reports';

    protected static ?string $navigationLabel = 'Heartbeats Report';

    protected static ?string $navigationIcon = 'flex-heart-rate';

    protected static ?int $navigationSort = 2;

    protected ?string $heading = 'Heartbeats Report';

    protected ?string $subheading = 'Reports of the Nova heartbeat checks.';

    protected static string $view = 'filament.pages.heartbeats-report';

    public function mount(): void
    {
        abort_unless(auth()->user()->isStaff || auth()->user()->isAdmin, 404);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('type')->badge(),
            TextColumn::make('attempted')
                ->default('-')
                ->alignCenter(),
            TextColumn::make('successful')
                ->default('-')
                ->alignCenter(),
            TextColumn::make('unreachable')
                ->default('-')
                ->alignCenter(),
            TextColumn::make('abandoned')
                ->default('-')
                ->alignCenter(),
            TextColumn::make('inactive')
                ->default('-')
                ->alignCenter(),
            TextColumn::make('created_at')
                ->label('Date')
                ->date(),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('type')->options(HeartbeatType::class),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return HeartbeatReport::query()->orderByDesc('created_at');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->isStaff || auth()->user()->isAdmin;
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No heartbeat reports found';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-magnifier-ekg';
    }
}
