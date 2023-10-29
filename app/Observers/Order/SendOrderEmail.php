<?php

namespace App\Observers\Order;

use App\Entities\Order;

class SendOrderEmail implements OrderObserverInterface{

    public function execute(Order $order) : void{

    }
}