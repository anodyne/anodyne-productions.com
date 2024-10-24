<?php

namespace App\Models;

use App\Enums\GameGenre;
use App\Enums\GameStatus;
use App\Models\Builders\GameBuilder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'active_primary_characters',
        'active_secondary_characters',
        'active_support_characters',
        'total_stories',
        'total_story_groups',
        'total_posts',
        'total_post_words',
        'status',
        'status_response_code',
        'status_inactive_days',
    ];

    protected $casts = [
        'is_excluded' => 'boolean',
        'genre' => GameGenre::class,
        'status' => GameStatus::class,
        'status_response_code' => 'integer',
        'status_inactive_days' => 'integer',
    ];

    public function heartbeats(): HasMany
    {
        return $this->hasMany(Heartbeat::class);
    }

    public function latestHeartbeat(): HasOne
    {
        return $this->hasOne(Heartbeat::class)->latestOfMany();
    }

    public function release(): BelongsTo
    {
        return $this->belongsTo(Release::class);
    }

    public function isMysql(): Attribute
    {
        return Attribute::make(
            get: fn (): bool => str($this->db_version)->lower()->contains('mariadb') ? false : true
        );
    }

    public function databaseDriver(): Attribute
    {
        return Attribute::make(
            get: fn (): string => $this->is_mysql ? 'MySQL' : 'MariaDB'
        );
    }

    public function databaseVersion(): Attribute
    {
        return Attribute::make(
            get: fn (): string => str($this->db_version)->before('-')
        );
    }

    public function databasePlatform(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $engine = $this->is_mysql ? 'MySQL' : 'MariaDB';
                $version = str($this->db_version)->before('-');

                return "{$engine} {$version}";
            }
        );
    }

    public function nova3Ready(): Attribute
    {
        return Attribute::make(
            get: function (): bool {
                if (version_compare($this->php_version, '8.3', '<')) {
                    return false;
                }

                if ($this->is_mysql && version_compare($this->database_version, '8.0', '<')) {
                    return false;
                }

                if (! $this->is_mysql && version_compare($this->database_version, '10.0', '<')) {
                    return false;
                }

                return true;
            }
        );
    }

    public function newEloquentBuilder($query): GameBuilder
    {
        return new GameBuilder($query);
    }
}
