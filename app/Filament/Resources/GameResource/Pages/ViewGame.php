<?php

namespace App\Filament\Resources\GameResource\Pages;

use App\Filament\Resources\GameResource;
use App\Filament\Resources\GameResource\Widgets\GamePostsChart;
use App\Jobs\CheckHeartbeat;
use App\Models\Game;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Auth;

class ViewGame extends ViewRecord
{
    protected static string $resource = GameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('heartbeat')
                ->label('Queue heartbeat')
                ->color('gray')
                ->action(fn () => dispatch(new CheckHeartbeat($this->record)))
                ->visible(fn (Game $record): bool => Auth::user()->is_admin && $record->release->has_heartbeat_endpoint),
            EditAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            // GamePostsChart::class,
        ];
    }
}
