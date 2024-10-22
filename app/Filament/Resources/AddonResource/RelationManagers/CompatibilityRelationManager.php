<?php

namespace App\Filament\Resources\AddonResource\RelationManagers;

use App\Enums\CompatibilityStatus;
use App\Models\Compatibility;
use App\Models\ReleaseSeries;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CompatibilityRelationManager extends RelationManager
{
    protected static string $relationship = 'compatibility';

    protected static ?string $modelLabel = 'compatibility report';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->preload()
                    ->searchable()
                    ->visible(fn (): bool => ! auth()->user()->is_user),
                Select::make('status')
                    ->options([
                        CompatibilityStatus::Compatible->value => 'Compatible',
                        CompatibilityStatus::CompatibleOverride->value => 'Compatible (Override)',
                        CompatibilityStatus::Incompatible->value => 'Incompatible',
                        CompatibilityStatus::IncompatibleOverride->value => 'Incompatible (Override)',
                    ]),
                Select::make('version_id')
                    ->label('Add-on version')
                    ->options(function (RelationManager $livewire): array {
                        return $livewire->ownerRecord->versions()->pluck('version', 'id')->toArray();
                    }),
                Select::make('release_series_id')
                    ->label('Release series')
                    ->options(ReleaseSeries::ordered()->get()->pluck('name', 'id')),
                MarkdownEditor::make('notes')->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->icon(fn (Compatibility $record): ?string => filled($record->notes) ? 'flex-notepad-text' : null)
                    ->iconPosition('after')
                    ->visible(fn (): bool => ! auth()->user()->is_user),
                TextColumn::make('version.version')->label('Add-on version'),
                TextColumn::make('releaseSeries.name'),
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'success' => 'compatible',
                        'danger' => 'incompatible',
                    ])
                    ->formatStateUsing(fn (Compatibility $record): ?string => $record->status->getLabel()),
            ])
            ->filters([
                SelectFilter::make('releaseSeries.name')
                    ->label('Release series')
                    ->options(fn () => ReleaseSeries::ordered()->get()->pluck('name', 'id')),
                SelectFilter::make('status')
                    ->multiple()
                    ->options([
                        CompatibilityStatus::Compatible->value => 'Compatible',
                        CompatibilityStatus::CompatibleOverride->value => 'Compatible (Override)',
                        CompatibilityStatus::Incompatible->value => 'Incompatible',
                        CompatibilityStatus::IncompatibleOverride->value => 'Incompatible (Override)',
                    ]),
                Filter::make('has_notes')
                    ->toggle()
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('notes')),
                Filter::make('is_override')
                    ->label('Override status')
                    ->toggle()
                    ->query(fn (Builder $query): Builder => $query->where('status', 'like', '%-override')),
                Filter::make('addon_scope')
                    ->label('Add-on level report')
                    ->toggle()
                    ->query(fn (Builder $query): Builder => $query->whereNull('version_id')),
            ])
            ->headerActions([
                CreateAction::make()->label('New compatibility report'),
            ])
            ->actions([
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->emptyStateHeading('No compatibility reports found')
            ->emptyStateDescription(null)
            ->emptyStateIcon('uxl-like-sparkling');
    }

    public static function getBadge(Model $ownerRecord, string $pageClass): ?string
    {
        $count = $ownerRecord->compatibility()->count();

        return $count > 0 ? $count : null;
    }
}
