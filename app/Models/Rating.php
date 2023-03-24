<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $table = 'products_ratings';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
