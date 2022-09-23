<?php

declare(strict_types = 1);

namespace Domain\Exchange\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Download extends Model
{
    protected $table = 'addon_downloads';

    public function addon(): BelongsTo
    {
        return $this->belongsTo(Addon::class);
    }

    public function version(): BelongsTo
    {
        return $this->belongsTo(Version::class);
    }
}
