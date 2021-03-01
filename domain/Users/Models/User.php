<?php

namespace Domain\Users\Models;

use Domain\Exchange\Models\Addon;
use Domain\Users\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use LogsActivity;
    use CausesActivity;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_exchange_author',
        'is_galaxy_author',
    ];

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_exchange_author' => 'boolean',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function getIsAdminAttribute(): bool
    {
        return $this->role === Role::ADMIN;
    }

    public function getIsStaffAttribute(): bool
    {
        return $this->role === Role::STAFF;
    }

    public function getIsUserAttribute(): bool
    {
        return $this->role === Role::USER;
    }

    public function getRoleColorAttribute(): string
    {
        return [
            'admin' => 'amber',
            'staff' => 'purple',
        ][$this->role] ?? 'gray';
    }

    public function addons(): HasMany
    {
        return $this->hasMany(Addon::class);
    }

    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=f99c26&background=fef3c7';
    }
}
