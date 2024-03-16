<?php

namespace App\Filament\Pages;

use App\Enums\AddonType;
use App\Filament\Resources\AddonResource;
use App\Models\Version;
use Closure;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MissingVersionProductsReport extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationGroup = 'Reports';

    protected static ?string $navigationLabel = 'Missing Version Product(s) Report';

    protected static ?string $navigationIcon = 'flex-alert-diamond';

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
            Tables\Columns\BadgeColumn::make('addon.type')
                ->enum(
                    collect(AddonType::cases())
                        ->flatMap(fn ($type) => [$type->value => $type->getLabel()])
                        ->all()
                )
                ->colors([
                    'ring-1 ring-emerald-300 bg-emerald-400/10 text-emerald-500 dark:ring-emerald-400/30 dark:bg-emerald-400/10 dark:text-emerald-400' => AddonType::extension->value,
                    'ring-1 ring-purple-300 dark:ring-purple-400/30 bg-purple-400/10 text-purple-500 dark:text-purple-400' => AddonType::theme->value,
                    // 'bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-400' => AddonType::genre->value,
                    'ring-1 ring-amber-300 bg-amber-400/10 text-amber-500 dark:ring-amber-400/30 dark:bg-amber-400/10 dark:text-amber-400' => AddonType::rank->value,
                ]),
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

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No versions found with missing products';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-rating-click';
    }
}
