<?php

namespace App\Handlers\Discounts;

use App\Entities\Product;

class Discount15Items extends DiscountAbstract{
   
    public function calculateDiscount(Product $product) : float{
        if($product->quantity >= 15){
            return $product->price * 0.05;
        }

        return $this->nextDiscount->calculateDiscount($product);
    }
}