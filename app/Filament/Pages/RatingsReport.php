<?php

namespace App\Filament\Pages;

use App\Enums\AddonType;
use App\Filament\Resources\AddonResource;
use App\Models\Addon;
use Closure;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class RatingsReport extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationGroup = 'Reports';

    protected static ?string $navigationLabel = 'Poor Ratings Report';

    protected static ?string $navigationIcon = 'flex-thumbs-down';

    protected ?string $heading = 'Poor Ratings Report';

    protected ?string $subheading = 'This report provides an overview of add-ons with an average rating below 3.0.';

    protected static string $view = 'filament.pages.ratings-report';

    public function mount(): void
    {
        abort_unless(auth()->user()->isStaff || auth()->user()->isAdmin, 404);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->description(fn (Model $record) => $record->user->name)
                ->searchable(),
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
            Tables\Columns\TextColumn::make('products.name')
                ->label('Nova version(s)'),
            Tables\Columns\TextColumn::make('rating')
                ->icon('flex-favorite-star')
                ->iconPosition('before'),
            Tables\Columns\TextColumn::make('reviews_count')
                ->counts('reviews')
                ->label('# of ratings')
                ->alignCenter(),
            Tables\Columns\IconColumn::make('published')
                ->alignCenter()
                ->trueIcon('flex-check-square')
                ->falseIcon('flex-delete-square'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\SelectFilter::make('type')
                ->multiple()
                ->options(
                    collect(AddonType::cases())->flatMap(fn ($type) => [$type->value => $type->displayName()])->all()
                ),
            Tables\Filters\SelectFilter::make('author')
                ->relationship('user', 'name')
                ->multiple(),
        ];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Model $record): string => AddonResource::getUrl('view', ['record' => $record]);
    }

    protected function getTableQuery(): Builder
    {
        return Addon::query()
            ->where('rating', '>', 0)
            ->where('rating', '<', 3)
            ->orderBy('rating');
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->isStaff || auth()->user()->isAdmin;
    }
}
