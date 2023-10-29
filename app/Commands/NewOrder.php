<?php

namespace App\Commands;

use App\Entities\Customer\Customer;
use App\Entities\Order;
use App\Entities\Product;

class NewOrder{

    private float $total;
    private float $discount;
    private float $taxes;
    private array $products;
    private Customer $customer;

    public function __construct(Order $order)
    {
        $this->discount = $order->discount;
        $this->taxes = $order->taxes;
        $this->customer = $order->customer;
        $this->products = $order->products;
    }


    public function getTotal()
    {
        $this->total = 0;
        foreach($this->products as $product){
            
            $this->total += $product->price;
        }
        return $this->total;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getTaxes()
    {
        return $this->taxes;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getCustomer()
    {
        return $this->customer;
    }
}