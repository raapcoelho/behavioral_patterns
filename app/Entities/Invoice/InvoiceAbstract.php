<?php

namespace App\Entities\Invoice;

use App\Entities\Customer\Customer;
use App\Entities\Order;

abstract class InvoiceAbstract{

    protected int $invoiceId;
    protected Customer $customer;
    protected Order $order;

    public function generateInvoice(Customer $customer, Order $order) {
        
        return $this->generateHeader($customer) .
        $this->generateItems($order) .
        $this->generateBody($order) .
        $this->generateFooter();
    }

    protected function generateHeader(Customer $customer) : string{
        return 'Cabe çalho da Nota Fiscal';
    }

    protected function generateItems(Order $order) : string{
        return "Itens da Nota Fiscal\n";
    }

    abstract protected function generateBody(Order $order) : string;

    protected function generateFooter() {
        return "Rodapé da Nota Fiscal\n";
    }    
}