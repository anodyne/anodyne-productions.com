<?php

declare(strict_types = 1);

namespace Domain\Exchange\Models;

use App\Models\User;
use Domain\Exchange\Models\Builders\AddonBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Addon extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getTypeColorAttribute(): string
    {
        return [
            'extension' => 'blue',
            'theme' => 'purple',
            'genre' => 'green',
            'rank' => 'amber',
        ][$this->type] ?? 'gray';
    }

    public function newEloquentBuilder($query): AddonBuilder
    {
        return new AddonBuilder($query);
    }
}
