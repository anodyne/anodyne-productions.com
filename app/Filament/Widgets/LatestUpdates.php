<?php

namespace App\Filament\Widgets;

use App\Enums\AddonType;
use App\Models\Addon;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestUpdates extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Addon::query()
                    ->with('user', 'latestVersion')
                    ->published()
                    ->latest('updated_at')
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')->description(fn (Addon $record) => $record->user->name),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (Addon $record): ?string => $record->type->badgeColor()),
                // ->colors([
                //     'ring-1 ring-emerald-300 bg-emerald-400/10 text-emerald-500 dark:ring-emerald-400/30 dark:bg-emerald-400/10 dark:text-emerald-400' => AddonType::Extension->value,
                //     'ring-1 ring-purple-300 dark:ring-purple-400/30 bg-purple-400/10 text-purple-500 dark:text-purple-400' => AddonType::Theme->value,
                //     // 'bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-400' => AddonType::Genre->value,
                //     'ring-1 ring-amber-300 bg-amber-400/10 text-amber-500 dark:ring-amber-400/30 dark:bg-amber-400/10 dark:text-amber-400' => AddonType::Rank->value,
                // ]),
                Tables\Columns\TextColumn::make('latestVersion.version')->label('Version'),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated')->since(),
            ])
            ->heading('Latest add-on updates');
    }
}
