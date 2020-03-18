<?php

namespace Domain\Account\Events;

use Illuminate\Foundation\Events\Dispatchable;

class AccountDeleted
{
    use Dispatchable;

    public $userId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }
}
