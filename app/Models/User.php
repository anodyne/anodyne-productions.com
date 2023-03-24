<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Traits\InteractsWithMedia;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;

class User extends Authenticatable implements FilamentUser, HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use LogsActivity;
    use CausesActivity;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_addon_author',
    ];

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'role' => UserRole::class,
        'email_verified_at' => 'datetime',
        'is_addon_author' => 'boolean',
    ];

    public function sponsor(): HasOne
    {
        return $this->hasOne(Sponsor::class);
    }

    public function canAccessFilament(): bool
    {
        return true;
    }

    public function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn ($value): bool => $this->role === UserRole::admin
        );
    }

    public function isStaff(): Attribute
    {
        return Attribute::make(
            get: fn ($value): bool => $this->role === UserRole::staff
        );
    }

    public function isUser(): Attribute
    {
        return Attribute::make(
            get: fn ($value): bool => $this->role === UserRole::user
        );
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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=a855f7&background=f3e8ff';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->acceptsMimeTypes(['image/jpeg', 'image/jpg', 'image/png'])
            ->singleFile()
            ->useFallbackUrl($this->defaultProfilePhotoUrl());
    }

    public static function getMediaPath(): string
    {
        return 'users/{model_id}/';
    }
}
