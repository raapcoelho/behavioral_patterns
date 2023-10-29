<?php

namespace App\Handlers\Discounts;

use App\Entities\Product;

abstract class DiscountAbstract{
    protected ?DiscountAbstract $nextDiscount;

    public function __construct(?DiscountAbstract $nextDiscount)
    {
        $this->nextDiscount = $nextDiscount;
    }

    abstract public function calculateDiscount(Product $product) : float;
}