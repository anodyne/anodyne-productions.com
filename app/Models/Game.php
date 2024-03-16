<?php

namespace App\Models;

use App\Enums\GameGenre;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'genre',
        'php_version',
        'db_driver',
        'db_version',
        'server_software',
        'release_id',
        'release_series_id',
        'created_at',
        'is_excluded',
        'active_users',
        'active_characters',
        'total_stories',
        'total_story_groups',
        'total_posts',
        'total_post_words',
    ];

    protected $casts = [
        'is_excluded' => 'boolean',
        'genre' => GameGenre::class,
    ];

    public function release(): BelongsTo
    {
        return $this->belongsTo(Release::class);
    }

    public function scopeIsExcluded(Builder $query): Builder
    {
        return $query->where('is_excluded', '=', true);
    }

    public function scopeIsIncluded(Builder $query): Builder
    {
        return $query->where('is_excluded', '=', false);
    }
}
