<?php

declare(strict_types = 1);

namespace Domain\Marketplace\Models;

use App\Models\User;
use Domain\Marketplace\Models\Builders\ProductBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getTypeColorAttribute(): string
    {
        return [
            'extension' => 'pink',
            'theme' => 'purple',
            'genre' => 'teal',
            'rank' => 'amber',
        ][$this->type] ?? 'gray';
    }

    public function newEloquentBuilder($query): ProductBuilder
    {
        return new ProductBuilder($query);
    }
}
