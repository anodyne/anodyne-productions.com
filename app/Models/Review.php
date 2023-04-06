<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    public $table = 'reviews';

    protected $fillable = [
        'rating',
        'content',
        'addon_id',
        'user_id',
    ];

    public function addon(): BelongsTo
    {
        return $this->belongsTo(Addon::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeAddon(Builder $query, $addonId): Builder
    {
        return $query->where('addon_id', $addonId);
    }

    public function scopeUser(Builder $query, $userId): Builder
    {
        return $query->where('user_id', $userId);
    }
}
