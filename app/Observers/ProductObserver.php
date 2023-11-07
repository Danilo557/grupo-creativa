<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->sort = Product::max('sort') + 1;
    }
}
