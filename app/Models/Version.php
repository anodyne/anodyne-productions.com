<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Version extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'addon_versions';

    protected $fillable = [
        'addon_id',
        'version',
        'release_notes',
        'install_instructions',
        'upgrade_instructions',
        'published',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function addon(): BelongsTo
    {
        return $this->belongsTo(Addon::class);
    }

    public function downloads(): HasMany
    {
        return $this->hasMany(Download::class);
    }

    public function product(): MorphToMany
    {
        return $this->morphToMany(Product::class, 'productable');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('downloads')
            ->acceptsMimeTypes(['application/zip'])
            ->singleFile();
    }
}
