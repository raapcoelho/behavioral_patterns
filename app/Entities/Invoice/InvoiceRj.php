<?php

namespace App\Entities\Invoice;

use App\Entities\Order;

class InvoiceRj extends InvoiceAbstract {
    protected function generateBody(Order $order) : string {
        return "Itens da Nota Fiscal de RJ\n";
    }
}