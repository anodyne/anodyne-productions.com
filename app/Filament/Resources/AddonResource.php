<?php

namespace App\Filament\Resources;

use App\Enums\AddonType;
use App\Enums\LinkType;
use App\Filament\Resources\AddonResource\Pages;
use App\Filament\Resources\AddonResource\RelationManagers;
use App\Models\Addon;
use Filament\Forms\Components\Group as FormGroup;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddonResource extends Resource
{
    protected static ?string $model = Addon::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $modelLabel = 'add-on';

    protected static ?string $navigationIcon = 'flex-application-add';

    protected static ?string $navigationGroup = 'Add-ons';

    protected static ?string $navigationLabel = 'Add-ons';

    protected static ?string $pluralModelLabel = 'add-ons';

    protected static ?string $breadcrumb = 'Add-Ons';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Add-on')->tabs([
                    Tab::make('Basic info')->schema(self::getFormSchema()),
                    Tab::make('Links')->schema(self::getFormSchema('links')),
                    Tab::make('Preview images')->schema(self::getFormSchema('previews')),
                ])
                    ->columns(1)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query): Builder {
                return $query
                    ->with(['user'])
                    ->when(auth()->user()->is_user, fn (Builder $q): Builder => $q->where('user_id', auth()->id()))
                    ->withoutGlobalScopes([
                        SoftDeletingScope::class,
                    ]);
            })
            ->groups([
                Group::make('user.name')
                    ->label('Author')
                    ->collapsible(),
                Group::make('type')->collapsible(),
            ])
            ->defaultPaginationPageOption(25)
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')->badge(),
                TextColumn::make('user.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('products.name')
                    ->label('Nova version(s)')
                    ->toggleable(),
                TextColumn::make('downloads_count')
                    ->counts('downloads')
                    ->label('# of downloads')
                    ->toggleable(),
                TextColumn::make('rating')
                    ->sortable()
                    ->label('Avg rating')
                    ->icon('flex-favorite-star')
                    ->iconPosition('before')
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                ToggleColumn::make('published'),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->multiple()
                    ->options(AddonType::class),
                SelectFilter::make('author')
                    ->relationship('user', 'name')
                    ->hidden(fn (): bool => auth()->user()->isUser),
                TernaryFilter::make('published'),
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                ActionGroup::make([
                    DeleteAction::make()
                        ->grouped()
                        ->successNotificationTitle('Add-on deleted'),
                    ForceDeleteAction::make()
                        ->grouped()
                        ->successNotificationTitle('Add-on permanently deleted'),
                    RestoreAction::make()
                        ->grouped()
                        ->successNotificationTitle('Add-on restored'),
                ])
                    ->size(ActionSize::ExtraLarge)
                    ->color('gray'),
            ])
            ->emptyStateHeading('No add-ons found')
            ->emptyStateDescription('Create your first add-on to share it with the community.')
            ->emptyStateIcon('uxl-plugin-sharing')
            ->emptyStateActions([
                CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\VersionsRelationManager::class,
            RelationManagers\QuestionsRelationManager::class,
            RelationManagers\ReviewsRelationManager::class,
            RelationManagers\CompatibilityRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAddons::route('/'),
            'create' => Pages\CreateAddon::route('/create'),
            'view' => Pages\ViewAddon::route('/{record}'),
            'edit' => Pages\EditAddon::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details['Type'] = $record->type->getLabel();

        if (! auth()->user()->isUser) {
            $details['Author'] = $record->user->name;
        }

        return $details;
    }

    public static function getFormSchema(?string $section = null): array
    {
        return match ($section) {
            'links' => [
                Repeater::make('links')
                    ->schema([
                        Select::make('type')->options(LinkType::class),
                        TextInput::make('value')->requiredWith('type'),
                    ])
                    ->columnSpan(2)
                    ->columns(1),
            ],
            'previews' => [
                FormGroup::make([
                    SpatieMediaLibraryFileUpload::make('primary-preview')
                        ->label('Primary preview image')
                        ->collection('primary-preview')
                        ->disk(app()->environment('local') ? 'public' : 'r2-addons')
                        ->visibility('private')
                        ->columnSpanFull(),
                    SpatieMediaLibraryFileUpload::make('additional-previews')
                        ->label('Additional preview image(s)')
                        ->helperText('Upload up to 4 additional screenshots for your add-on to give users a preview of what they can expect')
                        ->multiple()
                        ->maxFiles(4)
                        ->collection('additional-previews')
                        ->disk(app()->environment('local') ? 'public' : 'r2-addons')
                        ->visibility('private')
                        ->columnSpanFull(),
                ])
                    ->columns(3)
                    ->columnSpanFull(),
            ],
            'static-previews' => [
                FormGroup::make([
                    SpatieMediaLibraryFileUpload::make('primary-preview')
                        ->label('Primary preview image')
                        ->collection('primary-preview')
                        ->disk(app()->environment('local') ? 'public' : 'r2-addons')
                        ->visibility('private')
                        ->columnSpanFull(),
                    SpatieMediaLibraryFileUpload::make('additional-previews')
                        ->label('Additional preview image(s)')
                        ->helperText('Upload up to 4 additional screenshots for your add-on to give users a preview of what they can expect')
                        ->maxFiles(4)
                        ->collection('additional-previews')
                        ->disk(app()->environment('local') ? 'public' : 'r2-addons')
                        ->visibility('private')
                        ->columnSpanFull(),
                ])
                    ->columns(3)
                    ->columnSpanFull(),
            ],
            'versions' => [
                Repeater::make('versions')
                    ->relationship()
                    ->label(false)
                    ->maxItems(1)
                    ->columnSpanFull()
                    ->deletable(false)
                    ->reorderable(false)
                    ->columns(4)
                    ->schema([
                        TextInput::make('version')
                            ->required()
                            ->columnSpan(2),
                        Select::make('product')
                            ->required()
                            ->multiple()
                            ->placeholder('Select product')
                            ->relationship('product', 'name', fn (Builder $query) => $query->published())
                            ->preload()
                            ->maxItems(1)
                            ->columnSpan(2),
                        MarkdownEditor::make('release_notes')
                            ->columnSpanFull(),
                        MarkdownEditor::make('install_instructions')
                            ->helperText('If you provide install instructions for the version, those will be displayed when the version is selected. Otherwise, the install instructions on the add-on will be used.')
                            ->columnSpanFull(),
                        MarkdownEditor::make('upgrade_instructions')->columnSpanFull(),
                        MarkdownEditor::make('credits')
                            ->helperText('Provide any credits you feel are necessary and specific to this version of your add-on')
                            ->columnSpanFull(),
                        SpatieMediaLibraryFileUpload::make('filename')
                            ->required()
                            ->collection('downloads')
                            ->disk(app()->environment('local') ? 'public' : 'r2-addons')
                            ->customProperties(fn (Model $record) => ['user_id' => $record->addon->user_id])
                            ->columnSpanFull(),
                        Toggle::make('published')
                            ->default(true)
                            ->columnSpan(2),
                    ]),
            ],
            default => [
                FormGroup::make([
                    TextInput::make('name')
                        ->required()
                        ->columnSpan(1),
                    Select::make('type')
                        ->placeholder('Select a type')
                        ->required()
                        ->options(AddonType::class)
                        ->columnSpan(1),
                    Select::make('products')
                        ->label('Supported Nova versions')
                        ->required()
                        ->multiple()
                        ->placeholder('Select Nova version(s)')
                        ->relationship('products', 'name', fn (Builder $query) => $query->published())
                        ->preload()
                        ->columnSpan(1),
                    MarkdownEditor::make('description')->columnSpanFull(),
                    MarkdownEditor::make('install_instructions')
                        ->helperText('These install instructions will be used unless you provide install instructions on a version')
                        ->columnSpanFull(),
                    MarkdownEditor::make('credits')
                        ->helperText('Provide any credits you feel are necessary for your add-on')
                        ->columnSpanFull(),
                    Toggle::make('published')
                        ->helperText('Only published add-ons will be available for download')
                        ->default(false)
                        ->columnSpanFull(),
                ])
                    ->columns(3)
                    ->columnSpanFull(),
            ],
        };
    }
}
