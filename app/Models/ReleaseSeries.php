<?php

namespace App\Models;

use App\Actions\GetAddonCompatibility;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class ReleaseSeries extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    protected $fillable = ['name', 'order_column', 'include_in_compatibility'];

    protected $hidden = ['created_at', 'updated_at', 'id'];

    protected $casts = [
        'include_in_compatibility' => 'boolean',
    ];

    public function releases(): HasMany
    {
        return $this->hasMany(Release::class);
    }

    public function scopeNova3($query)
    {
        return $query->where('name', 'like', 'Nova 3%');
    }

    public function checkVersionCompatibility(Version $version)
    {
        return GetAddonCompatibility::run($version, $this);
    }

    public function isNova2(): Attribute
    {
        return Attribute::make(
            get: fn (): bool => str($this->name)->startsWith('Nova 2')
        );
    }

    public function isNova3(): Attribute
    {
        return Attribute::make(
            get: fn (): bool => str($this->name)->startsWith('Nova 3')
        );
    }
}
