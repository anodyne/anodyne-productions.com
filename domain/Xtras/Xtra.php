<?php

namespace Domain\Xtras;

use Domain\Xtras\Events;
use Illuminate\Database\Eloquent\Model;

class Xtra extends Model
{
    protected $table = 'xtras_items';

    protected $dispatchesEvents = [
        'created' => Events\XtraCreated::class,
        'deleted' => Events\XtraDeleted::class,
        'updated' => Events\XtraUpdated::class,
    ];
}
