<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SponsorTier extends Model
{
    use HasFactory;

    protected $fillable = ['external_id', 'name', 'description'];

    public function sponsors(): HasMany
    {
        return $this->hasMany(Sponsor::class, 'sponsor_tier_id', 'external_id');
    }
}
