<?php

namespace Domain\Xtras\Events;

use Domain\Xtras\Xtra;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class XtraCreated
{
    use Dispatchable, SerializesModels;

    public $xtra;

    public function __construct(Xtra $xtra)
    {
        $this->xtra = $xtra;
    }
}
