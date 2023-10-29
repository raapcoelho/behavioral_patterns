<?php

namespace App\Handlers\Discounts;

use App\Entities\Product;

class Discount50Items extends DiscountAbstract{
   
    public function calculateDiscount(Product $product) : float{
        if($product->quantity >= 50){
            return $product->price * 0.10;
        }

        return $this->nextDiscount->calculateDiscount($product);
    }
}