<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Heartbeat extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'last_published_post' => 'datetime',
    ];

    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('created_at', DB::raw('CURDATE()'));
    }
}
