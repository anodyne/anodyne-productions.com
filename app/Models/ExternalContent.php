<?php

namespace App\Models;

use App\Observers\ExternalContentObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(ExternalContentObserver::class)]
class ExternalContent extends Model
{
    protected $table = 'external_content';

    protected $fillable = ['name', 'key', 'value', 'active'];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }
}
