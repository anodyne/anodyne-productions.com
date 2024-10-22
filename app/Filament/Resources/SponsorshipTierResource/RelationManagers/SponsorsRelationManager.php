<?php

namespace App\Filament\Resources\SponsorshipTierResource\RelationManagers;

use App\Models\Sponsor;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SponsorsRelationManager extends RelationManager
{
    protected static string $relationship = 'sponsors';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->getStateUsing(fn (Sponsor $record) => $record->formattedName)
                    ->description(fn (Sponsor $record) => $record->email)
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->where(
                            fn ($q) => $q
                                ->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%")
                        );
                    })
                    ->icon(fn (Sponsor $record) => $record->requiresAttention ? 'flex-alert-diamond' : '')
                    ->iconPosition('after')
                    ->color(fn (Sponsor $record) => $record->requiresAttention ? 'danger' : ''),
                IconColumn::make('active')
                    ->boolean()
                    ->trueIcon('flex-check-square')
                    ->falseIcon('flex-delete-square'),
            ])
            ->filters([
                TernaryFilter::make('active')->default(),
                Filter::make('requires_attention')
                    ->toggle()
                    ->query(fn (Builder $query) => $query->attentionRequired()),
            ]);
    }
}
