<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\CompatibilityStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compatibility extends Model
{
    use HasFactory;

    protected $table = 'addon_compatibility';

    protected $fillable = ['user_id', 'addon_id', 'version_id', 'release_series_id', 'status', 'notes'];

    protected $casts = [
        'status' => CompatibilityStatus::class,
    ];

    public function addon(): BelongsTo
    {
        return $this->belongsTo(Addon::class);
    }

    public function releaseSeries(): BelongsTo
    {
        return $this->belongsTo(ReleaseSeries::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function version(): BelongsTo
    {
        return $this->belongsTo(Version::class);
    }
}
