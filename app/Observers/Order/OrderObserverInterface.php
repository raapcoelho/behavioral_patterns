<?php

namespace App\Observers\Order;

use App\Entities\Order;

interface OrderObserverInterface{
    public function execute(Order $order) : void;
}