<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $table = 'products_reviews';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
