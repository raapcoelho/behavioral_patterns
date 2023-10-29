<?php

namespace  App\Entities;

use App\Entities\Customer\Customer;
use App\Entities\OrderStatus\Concluded;
use App\Entities\OrderStatus\OrderStatusAbstract;
use App\Entities\OrderStatus\Pending;
use App\Entities\OrderStatus\Rejected;
use App\Entities\OrderStatus\InProgress;

class Order{
    public float $total;
    public float $discount;
    public float $taxes;
    public ProductList $products;
    public OrderStatusAbstract $status;
    public Customer $customer;

    public function __construct()
    {
        $this->total = 0;
        $this->discount = 0;
        $this->taxes = 0;
        
        $this->status = new Pending();
    }

    public function concluded(){
        $this->status = new Concluded();
    }

    public function rejected(){
        $this->status = new Rejected();
    }
    public function inProgress(){
        $this->status = new InProgress();
    }
}