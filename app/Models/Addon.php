<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\AddonType;
use App\Traits\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Addon extends Model implements HasMedia
{
    use HasFactory;
    use HasSlug;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'type',
        'rating',
        'published',
        'user_id',
        'install_instructions',
    ];

    protected $casts = [
        'published' => 'boolean',
        'type' => AddonType::class,
    ];

    public function compatibility(): HasMany
    {
        return $this->hasMany(Compatibility::class);
    }

    public function downloads(): HasMany
    {
        return $this->hasMany(Download::class);
    }

    public function products(): MorphToMany
    {
        return $this->morphToMany(Product::class, 'productable');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function versions(): HasMany
    {
        return $this->hasMany(Version::class);
    }

    public function latestVersion()
    {
        return $this->hasOne(Version::class)->latestOfMany();
    }

    public function typeColor(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => [
                'extension' => 'blue',
                'theme' => 'purple',
                'genre' => 'green',
                'rank' => 'amber',
            ][$this->type] ?? 'gray'
        );
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public static function getMediaPath(): string
    {
        return 'addons/{model_id}/{media_id}/';
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('primary-preview')
            ->acceptsMimeTypes(['image/jpeg', 'image/jpg', 'image/png']);

        $this->addMediaCollection('additional-previews')
            ->acceptsMimeTypes(['image/jpeg', 'image/jpg', 'image/png']);
    }
}
