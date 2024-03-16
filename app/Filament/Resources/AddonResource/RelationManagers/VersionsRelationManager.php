<?php

namespace App\Filament\Resources\AddonResource\RelationManagers;

use App\Models\Version;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class VersionsRelationManager extends RelationManager
{
    protected static string $relationship = 'versions';

    protected static ?string $recordTitleAttribute = 'version';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('version')->required(),
                Forms\Components\Select::make('product')
                    ->label('Supported Nova version')
                    ->required()
                    ->multiple()
                    ->placeholder('Select Nova version')
                    ->relationship('product', 'name', fn (Builder $query) => $query->published())
                    ->preload()
                    ->maxItems(1),
                Forms\Components\Select::make('releaseSeries')
                    ->label('Supported Nova release series')
                    ->required()
                    ->multiple()
                    ->placeholder('Select Nova release series')
                    ->relationship('releaseSeries', 'name')
                    ->preload(),
                Forms\Components\MarkdownEditor::make('release_notes')->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('install_instructions')
                    ->helperText('If you provide install instructions for the version, those will be displayed when the version is selected. Otherwise, the install instructions on the add-on will be used.')
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('upgrade_instructions')->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('credits')
                    ->helperText('Provide any credits you feel are necessary and specific to this version of your add-on')
                    ->columnSpanFull(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('filename')
                    ->columnSpanFull()
                    ->collection('downloads')
                    ->disk(app()->environment('local') ? 'public' : 'r2-addons')
                    ->customProperties(fn (Model $record) => ['user_id' => $record->addon->user_id]),
                Forms\Components\Toggle::make('published')->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('version')
                    ->sortable()
                    ->description(
                        fn (Version $record): string => $record->getFirstMedia('downloads')?->name ?? ''
                    ),
                Tables\Columns\TextColumn::make('downloads_count')
                    ->counts('downloads')
                    ->label('Downloads'),
                Tables\Columns\TextColumn::make('product.name')->label('Nova version'),
                Tables\Columns\TextColumn::make('releaseSeries.name')->label('Nova releases'),
                Tables\Columns\ToggleColumn::make('published'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->successNotificationTitle('New add-on version created'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('flex-edit-circle')
                    ->size('md')
                    ->iconButton()
                    ->color('gray')
                    ->successNotificationTitle('Add-on version updated'),
                Tables\Actions\DeleteAction::make()
                    ->icon('flex-delete-bin')
                    ->size('md')
                    ->iconButton()
                    ->successNotificationTitle('Add-on version deleted'),
            ])
            ->bulkActions([])
            ->defaultSort('version', 'desc');
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No versions found';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Create a new version and upload a zip file.';
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'uxl-download';
    }

    protected function getTableQuery(): Builder|Relation
    {
        return parent::getTableQuery()->with('product');
    }
}
