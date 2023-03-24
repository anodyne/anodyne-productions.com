<?php

namespace App\Models\Legacy;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class XtraFile extends Model
{
    use SoftDeletes;

    protected $connection = 'legacy_xtras';

    protected $table = 'xtras_items_files';

    public function xtra(): BelongsTo
    {
        return $this->belongsTo(Xtra::class);
    }
}
