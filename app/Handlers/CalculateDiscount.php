<?php

namespace App\Handlers;

use App\Entities\Product;
use App\Entities\Taxes\TaxesInterface;
use App\Handlers\Discounts\Discount100Items;
use App\Handlers\Discounts\Discount15Items;
use App\Handlers\Discounts\Discount50Items;
use App\Handlers\Discounts\NoDiscount;

class CalculateDiscount{
    public function calculate(Product $product){
        $discounts = new Discount100Items(
            new Discount50Items(
            new Discount15Items(
            new NoDiscount(
        ))));

        return $discounts->calculateDiscount($product);
    }
}
