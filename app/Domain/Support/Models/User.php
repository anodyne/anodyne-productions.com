<?php

namespace Domain\Support\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'phpbb_users';

    protected $primaryKey = 'user_id';
}
