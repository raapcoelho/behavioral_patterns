<?php

namespace App\Entities\Invoice;

use App\Entities\Order;

class InvoiceSp extends InvoiceAbstract {
    protected function generateBody(Order $order) : string {
        return "Itens da Nota Fiscal de SP\n";
    }
}