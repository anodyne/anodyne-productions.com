<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heartbeat extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'last_published_post' => 'datetime',
    ];
}
