<?php

namespace Domain\Account\Models;

/**
 * This model is used for ensuring policies can be correctly used without
 * needing to do convoluted logic to figure out if we're dealing with the
 * user management page or the profile edit page.
 */
class Profile extends User
{
    public $table = 'users';
}
