<?php

namespace App\Models\Legacy;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Xtra extends Model
{
    use SoftDeletes;

    protected $connection = 'legacy_xtras';

    protected $table = 'xtras_items';

    public function orders(): HasMany
    {
        return $this->hasMany(XtraOrder::class, 'item_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(XtraFile::class, 'item_id')->withTrashed();
    }

    public function metadata(): HasOne
    {
        return $this->hasOne(XtraMetadata::class, 'item_id')->withTrashed();
    }
}
