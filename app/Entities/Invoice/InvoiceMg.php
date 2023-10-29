<?php

namespace App\Entities\Invoice;

use App\Entities\Order;

class InvoiceMg extends InvoiceAbstract {
    protected function generateBody(Order $order) : string {
        return "Itens da Nota Fiscal de MG\n";
    }
}