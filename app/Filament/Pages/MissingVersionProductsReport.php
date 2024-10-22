<?php

namespace App\Filament\Pages;

use App\Filament\Resources\AddonResource;
use App\Models\Version;
use Closure;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class MissingVersionProductsReport extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationGroup = 'Reports';

    protected static ?string $navigationLabel = 'Missing Version Product(s) Report';

    protected static ?string $navigationIcon = 'flex-alert-diamond';

    protected static ?int $navigationSort = 3;

    protected ?string $heading = 'Missing Version Product(s) Report';

    protected ?string $subheading = 'This report provides an overview of add-on versions that do not have a product associated with them.';

    protected static string $view = 'filament.pages.missing-version-product-report';

    public function mount(): void
    {
        abort_unless(auth()->user()->isStaff || auth()->user()->isAdmin, 404);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('addon.name')->searchable(),
            Tables\Columns\TextColumn::make('version'),
            Tables\Columns\TextColumn::make('addon.type')
                ->badge()
                ->label('Type'),
            Tables\Columns\IconColumn::make('published')
                ->alignCenter()
                ->trueIcon('flex-check-square')
                ->falseIcon('flex-delete-square'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [];
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Model $record): string => AddonResource::getUrl('view', ['record' => $record->addon]);
    }

    protected function getTableQuery(): Builder
    {
        return Version::with('addon')->whereDoesntHave('product');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->isStaff || auth()->user()->isAdmin;
    }

    public static function getNavigationBadge(): ?string
    {
        $count = Version::with('addon')->whereDoesntHave('product')->count();

        return $count > 0 ? Number::format($count) : null;
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'danger';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No versions found with missing products';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-rating-click';
    }
}
