<?php

namespace Domain\Account\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * @method PostData current
 */
class UserCollection extends DataTransferObjectCollection
{
    public static function create(array $data): UserCollection
    {
        return new static(UserData::arrayOf($data));
    }
}
