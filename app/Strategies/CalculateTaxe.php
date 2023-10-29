<?php

namespace App\Strategies;

use App\Entities\Product;
use App\Entities\Taxes\TaxesInterface;

class CalculateTaxe{
    public function calculate(Product $product, TaxesInterface $taxe){
        return $taxe->calculateTax($product);
    }
}
