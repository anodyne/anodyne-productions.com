<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Sponsor extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'display_name', 'email', 'sponsor_tier_id', 'link', 'active'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function tier(): BelongsTo
    {
        return $this->belongsTo(SponsorTier::class, 'sponsor_tier_id', 'external_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function formattedName(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($this->display_name) {
                    return $this->display_name;
                }

                if ($this->user) {
                    return $this->user->name;
                }

                return $this->name;
            }
        );
    }

    public function requiresAttention(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => in_array($this->sponsor_tier_id, ['6330679', '6330702']) && $this->link === null
        );
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();
    }

    public function scopeActive($query): Builder
    {
        return $query->where('active', true);
    }

    public function scopeAttentionRequired($query): Builder
    {
        return $query->premiumTier()->whereNull('link');
    }

    public function scopeShouldBeDisplayed($query): Builder
    {
        return $query->whereNotNull('link');
    }

    public function scopePremiumTier($query): Builder
    {
        return $query->whereIn('sponsor_tier_id', ['6330679', '6330702']);
    }
}
