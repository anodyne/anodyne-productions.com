<?php

namespace Domain\Exchange\Actions;

use Domain\Exchange\Models\Product;

class AddRating
{
    public function execute(Product $product): Product
    {
        // Add the rating

        $product->update(['rating' => $product->ratings->average()]);

        return $product->refresh();
    }
}
