<?php

namespace Domain\Account\Models;

use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Domain\Account\Models\Builders\UserBuilder;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use LaratrustUserTrait;

    protected $fillable = [
        'name', 'username', 'email', 'password', 'bio', 'url', 'twitter',
        'facebook', 'google', 'discord',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function newEloquentBuilder($query)
    {
        return new UserBuilder($query);
    }
}
