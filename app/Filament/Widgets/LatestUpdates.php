<?php

namespace App\Filament\Widgets;

use App\Enums\AddonType;
use App\Models\Addon;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LatestUpdates extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Addon::query()
            ->with('user', 'latestVersion')
            ->published()
            ->latest('updated_at')
            ->limit(10);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')->description(fn (Model $record) => $record->user->name),
            Tables\Columns\BadgeColumn::make('type')
                ->enum(
                    collect(AddonType::cases())
                        ->flatMap(fn ($type) => [$type->value => $type->displayName()])
                        ->all()
                )
                ->colors([
                    'ring-1 ring-emerald-300 bg-emerald-400/10 text-emerald-500 dark:ring-emerald-400/30 dark:bg-emerald-400/10 dark:text-emerald-400' => AddonType::extension->value,
                    'ring-1 ring-purple-300 dark:ring-purple-400/30 bg-purple-400/10 text-purple-500 dark:text-purple-400' => AddonType::theme->value,
                    // 'bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-400' => AddonType::genre->value,
                    'ring-1 ring-amber-300 bg-amber-400/10 text-amber-500 dark:ring-amber-400/30 dark:bg-amber-400/10 dark:text-amber-400' => AddonType::rank->value,
                ]),
            Tables\Columns\TextColumn::make('latestVersion.version')->label('Version'),
            Tables\Columns\TextColumn::make('updated_at')->label('Updated')->since(),
        ];
    }

    protected function getTableHeading(): string|Htmlable|Closure|null
    {
        return 'Latest add-on updates';
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
