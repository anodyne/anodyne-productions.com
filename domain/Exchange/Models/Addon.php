<?php

declare(strict_types = 1);

namespace Domain\Exchange\Models;

use Domain\Users\Models\User;
use Domain\Exchange\Models\Builders\AddonBuilder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Addon extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'type', 'rating', 'published', 'user_id'];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function downloads(): HasMany
    {
        return $this->hasMany(Download::class);
    }

    public function products(): MorphToMany
    {
        return $this->morphToMany(Product::class, 'productable');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function versions(): HasMany
    {
        return $this->hasMany(Version::class);
    }

    public function typeColor(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => [
                'extension' => 'blue',
                'theme' => 'purple',
                'genre' => 'green',
                'rank' => 'amber',
            ][$this->type] ?? 'gray'
        );
    }

    public function newEloquentBuilder($query): AddonBuilder
    {
        return new AddonBuilder($query);
    }
}
