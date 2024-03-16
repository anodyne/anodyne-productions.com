<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorResource\Pages;
use App\Models\Sponsor;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SponsorResource extends Resource
{
    protected static ?string $model = Sponsor::class;

    protected static ?string $navigationIcon = 'flex-cash-bag-share';

    protected static ?string $navigationGroup = 'Sponsorships';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('display_name'),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User')
                    ->placeholder('Select a user'),
                Forms\Components\Select::make('tier_id')
                    ->relationship('tier', 'name')
                    ->label('Sponsorship tier')
                    ->reactive(),
                Forms\Components\Toggle::make('active')->columnSpan(2),
                Forms\Components\Fieldset::make('Gold / Platinum Perks')
                    ->schema([
                        Forms\Components\TextInput::make('link'),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('logo')->collection('logo'),
                    ])
                    ->hidden(fn (\Filament\Forms\Get $get) => ! in_array($get('sponsor_tier_id'), ['6330679', '6330702'])),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->getStateUsing(fn (Model $record) => $record->formattedName)
                    ->description(fn (Model $record) => $record->email)
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where(
                            fn ($q) => $q
                                ->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%")
                        );
                    })
                    ->icon(fn (Model $record) => $record->requiresAttention ? 'flex-alert-diamond' : '')
                    ->iconPosition('after')
                    ->color(fn (Model $record) => $record->requiresAttention ? 'danger' : ''),
                Tables\Columns\TextColumn::make('tier.name'),
                Tables\Columns\IconColumn::make('active')
                    ->boolean()
                    ->trueIcon('flex-check-square')
                    ->falseIcon('flex-delete-square'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('active')->default(),
                Tables\Filters\SelectFilter::make('tier')
                    ->relationship('tier', 'name')
                    ->multiple()
                    ->label('Sponsorship tier'),
                Tables\Filters\Filter::make('requires_attention')
                    ->toggle()
                    ->query(fn (Builder $query) => $query->attentionRequired()),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->icon('flex-eye')
                    ->size('md')
                    ->iconButton()
                    ->color('gray'),
                Tables\Actions\EditAction::make()
                    ->icon('flex-edit-circle')
                    ->size('md')
                    ->iconButton()
                    ->color('gray'),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSponsors::route('/'),
            'create' => Pages\CreateSponsor::route('/create'),
            'view' => Pages\ViewSponsor::route('/{record}'),
            'edit' => Pages\EditSponsor::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::premiumTier()->whereNull('link')->count();

        if ($count === 0) {
            return null;
        }

        return $count;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }
}
