<?php

namespace App\Entities\OrderStatus;

use App\Entities\Order;

class Pending extends OrderStatusAbstract{
    public function InProgress(Order $order) : void{
        $order->status = new InProgress();
    }
}