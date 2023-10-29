<?php

namespace App\Handlers\Discounts;

use App\Entities\Product;

class NoDiscount extends DiscountAbstract{
   
    public function __construct()
    {
        parent::__construct(null);
    }

    public function calculateDiscount(Product $product) : float{
        return 0;
    }
}