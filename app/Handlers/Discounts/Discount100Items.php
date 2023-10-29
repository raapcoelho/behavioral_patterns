<?php

namespace App\Handlers\Discounts;

use App\Entities\Product;

class Discount100Items extends DiscountAbstract{
   
    public function calculateDiscount(Product $product) : float{
        if($product->quantity >= 100){
            return $product->price * 0.15;
        }

        return $this->nextDiscount->calculateDiscount($product);
    }
}