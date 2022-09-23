<?php

declare(strict_types = 1);

namespace Domain\Exchange\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    protected $table = 'addon_questions';

    protected $fillable = ['question', 'answer', 'published'];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function addon(): BelongsTo
    {
        return $this->belongsTo(Addon::class);
    }
}
