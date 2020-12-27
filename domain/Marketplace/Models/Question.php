<?php

declare(strict_types = 1);

namespace Domain\Marketplace\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $table = 'products_questions';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
