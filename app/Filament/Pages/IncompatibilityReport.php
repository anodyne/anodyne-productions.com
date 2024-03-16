<?php

namespace App\Filament\Pages;

use App\Enums\AddonType;
use App\Enums\CompatibilityStatus;
use App\Models\Compatibility;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class IncompatibilityReport extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationGroup = 'Reports';

    protected static ?string $navigationLabel = 'Incompatibility Report';

    protected static ?string $navigationIcon = 'flex-delete-square';

    protected ?string $heading = 'Incompatibility Report';

    protected ?string $subheading = 'This report provides an overview of the published add-on versions that the community has reported as incompatible with a Nova release series.';

    protected static string $view = 'filament.pages.incompatibility-report';

    public function mount(): void
    {
        abort_unless(auth()->user()->isStaff || auth()->user()->isAdmin, 404);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('addon.name')
                ->label('Add-on')
                ->size('lg')
                ->weight('bold')
                ->searchable(),
            Tables\Columns\TextColumn::make('version.version')->label('Version'),
            Tables\Columns\TextColumn::make('releaseSeries.name')->label('Nova version'),
            Tables\Columns\BadgeColumn::make('addon.type')
                ->label('Type')
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
            Tables\Columns\TextColumn::make('user.name')->label('Reported by'),
            Tables\Columns\TextColumn::make('updated_at')->date()->label('Date'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\SelectFilter::make('release_series')
                ->relationship('releaseSeries', 'name')
                ->label('Nova version'),
            Tables\Filters\SelectFilter::make('type')
                ->relationship('addon', 'type')
                ->options(
                    collect(AddonType::cases())
                        ->flatMap(fn ($type) => [$type->value => $type->getLabel()])
                        ->all()
                )
                ->label('Type'),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return Compatibility::query()
            ->with('addon', 'releaseSeries')
            ->withWhereHas('version', fn ($query) => $query->published())
            ->where('status', CompatibilityStatus::incompatible)
            ->latest();
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('viewReport')
                ->modalHeading('View compatibility report')
                ->form([
                    Forms\Components\Group::make([
                        Forms\Components\TextInput::make('addon_id')
                            ->formatStateUsing(fn (Model $record) => $record->addon->name)
                            ->label('Add-on')
                            ->columnSpan(1)
                            ->disabled(),
                        Forms\Components\TextInput::make('version_id')
                            ->formatStateUsing(fn (Model $record) => $record->version->version)
                            ->label('Add-on version')
                            ->columnSpan(1)
                            ->disabled(),
                        Forms\Components\TextInput::make('user_id')
                            ->formatStateUsing(fn (Model $record) => $record->user->name)
                            ->label('Reported by')
                            ->columnSpan(1)
                            ->disabled(),
                        Forms\Components\TextInput::make('release_series_id')
                            ->formatStateUsing(fn (Model $record) => $record->releaseSeries->name)
                            ->label('Nova version')
                            ->columnSpan(1)
                            ->disabled(),
                        Forms\Components\MarkdownEditor::make('notes')
                            ->label('Notes')
                            ->columnSpanFull()
                            ->disabled(),
                    ])->columns(2),
                ])
                ->action(fn () => null),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->isStaff || auth()->user()->isAdmin;
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No incompatibility reports found';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-like-sparkling';
    }
}
