<?php

namespace App\Models;

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
    ];

    public function release(): BelongsTo
    {
        return $this->belongsTo(Release::class);
    }
}
