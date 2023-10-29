<?php

namespace App\Entities;

class ProductList implements \IteratorAggregate{
    private array $products;

    public function __construct()
    {
        $this->products = [];
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function getIterator(): \Traversable {
        return new \ArrayIterator($this->products);
    }
}