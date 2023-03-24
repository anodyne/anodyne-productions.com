<?php

namespace App\Models\Legacy;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class XtraOrder extends Model
{
    protected $connection = 'legacy_xtras';

    protected $table = 'xtras_orders';

    public function xtra(): BelongsTo
    {
        return $this->belongsTo(Xtra::class);
    }
}
