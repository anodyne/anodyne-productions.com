<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'published'];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function addons(): MorphToMany
    {
        return $this->morphedByMany(Addon::class, 'productable');
    }

    public function versions(): MorphToMany
    {
        return $this->morphedByMany(Version::class, 'productable');
    }

    public function scopePublished($query): void
    {
        $query->where('published', '=', true);
    }
}
