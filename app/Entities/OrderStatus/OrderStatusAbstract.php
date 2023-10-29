<?php

namespace App\Entities\OrderStatus;

use App\Entities\Order;
use DomainException;

abstract class OrderStatusAbstract{
    public function concluded(Order $orde){
        throw new DomainException("Falhou ao concluír pedido");
    }

    public function rejected(Order $orde){
        throw new DomainException("Falhou ao rejeitar pedido");
    }
}