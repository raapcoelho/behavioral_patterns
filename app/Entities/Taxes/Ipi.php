<?php

namespace  App\Entities\Taxes;

use App\Entities\Product;

class Ipi implements TaxesInterface{
    public function calculateTax(Product $product) : float{

        return $product->price * 0.07;
    }
}