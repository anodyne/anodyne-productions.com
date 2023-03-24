<?php

namespace App\Models;

use App\Actions\GetAddonCompatibility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class ReleaseSeries extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    protected $fillable = ['name', 'order_column'];

    protected $hidden = ['created_at', 'updated_at', 'id'];

    public function releases(): HasMany
    {
        return $this->hasMany(Release::class);
    }

    public function checkVersionCompatibility(Version $version)
    {
        return GetAddonCompatibility::run($version, $this);
    }
}
