<?php

namespace App\Entities\OrderStatus;

use App\Entities\Order;

class InProgress extends OrderStatusAbstract{
    public function concluded(Order $order) : void{
        $order->status = new Concluded();
    }
    public function rejected(Order $order) : void{
        $order->status = new Rejected();
    }
}