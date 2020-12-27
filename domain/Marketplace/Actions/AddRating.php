<?php

namespace Domain\Marketplace\Actions;

use Domain\Marketplace\Models\Product;

class AddRating
{
    public function execute(Product $product): Product
    {
        // Add the rating

        $product->update(['rating' => $product->ratings->average()]);

        return $product->refresh();
    }
}
