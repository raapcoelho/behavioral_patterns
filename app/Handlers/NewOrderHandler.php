<?php

namespace App\Handlers;

use App\Commands\NewOrder;
use App\Entities\Customer\Customer;
use App\Entities\Email;
use App\Entities\Invoice\InvoiceMg;
use App\Entities\Invoice\InvoiceRj;
use App\Entities\Invoice\InvoiceSp;
use App\Entities\Order;
use App\Entities\Product;
use App\Entities\Taxes\Confis;
use App\Entities\Taxes\Icms;
use App\Entities\Taxes\Ipi;
use App\Entities\Taxes\Pis;
use App\Handlers\CalculateDiscount;
use App\Observers\Order\OrderObserverInterface;
use App\Strategies\CalculateTaxe;

class NewOrderHandler{

    private array $orderPostActions;

    public function __construct()
    {

    }

    public function addAction(OrderObserverInterface $orderObserverInterface)
    {
        $this->orderPostActions[] = $orderObserverInterface;
    }

    public function execute(NewOrder $newOrder) : void{
        
        $order = new Order();
        
        $order->total = $newOrder->getTotal();
        $order->discount = $newOrder->getDiscount();
        $order->taxes = $newOrder->getTaxes();
        $order->products = $newOrder->getProducts();

        $order->concluded();
      
    


        $invoiceMg = new InvoiceMg();
        $invoiceMgCreated = $invoiceMg->generateInvoice($newOrder->getCustomer(), $order);
        
        
        $invoiceRj = new InvoiceRj();
        $invoiceRjCreated = $invoiceRj->generateInvoice($newOrder->getCustomer(), $order);
        
        $invoiceSp = new InvoiceSp();
        $invoiceSpCreated = $invoiceSp->generateInvoice($newOrder->getCustomer(), $order);

        foreach($this->orderPostActions as $orderPostAction){
            $orderPostAction->execute($order);
        }

    }
}