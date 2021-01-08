<?php

declare(strict_types = 1);

namespace Domain\Exchange\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $table = 'products_files';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
