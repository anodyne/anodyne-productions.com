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
use Illuminate\Support\Number;

class RatingsReport extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationGroup = 'Reports';

    protected static ?string $navigationLabel = 'Poor Ratings Report';

    protected static ?string $navigationIcon = 'flex-thumbs-down';

    protected static ?int $navigationSort = 5;

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
            Tables\Columns\TextColumn::make('type')->badge(),
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
                ->options(AddonType::class),
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

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->isStaff || auth()->user()->isAdmin;
    }

    public static function getNavigationBadge(): ?string
    {
        $count = Addon::query()
            ->where('rating', '>', 0)
            ->where('rating', '<', 3)
            ->orderBy('rating')
            ->count();

        return $count > 0 ? Number::format($count) : null;
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'warning';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No addons with an average rating below 3.0 found';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-rating-click';
    }
}
