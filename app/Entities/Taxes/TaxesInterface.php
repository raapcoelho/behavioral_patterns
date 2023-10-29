<?php

namespace App\Entities\Taxes;

use App\Entities\Product;

interface TaxesInterface{
    public function calculateTax(Product $product) : float;
}