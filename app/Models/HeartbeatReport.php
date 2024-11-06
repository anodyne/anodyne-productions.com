<?php

namespace App\Models;

use App\Enums\HeartbeatType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeartbeatReport extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'attempted', 'successful', 'abandoned', 'unreachable', 'inactive'];

    protected $casts = [
        'type' => HeartbeatType::class,
        'attempted' => 'integer',
        'successful' => 'integer',
        'abandoned' => 'integer',
        'unreachable' => 'integer',
        'inactive' => 'integer',
    ];

    public static function createDailyReport(int $attempted, int $successful): static
    {
        return static::create([
            'type' => HeartbeatType::Daily,
            'attempted' => $attempted,
            'successful' => $successful,
            'unreachable' => $attempted - $successful,
        ]);
    }

    public static function createInactiveReport(int $attempted): static
    {
        return static::create([
            'type' => HeartbeatType::Inactive,
            'attempted' => $attempted,
        ]);
    }

    public static function createAbandonedReport(int $abandoned, int $inactive): static
    {
        return static::create([
            'type' => HeartbeatType::Abandoned,
            'abandoned' => $abandoned,
            'inactive' => $inactive,
        ]);
    }
}
