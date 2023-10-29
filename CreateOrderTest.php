<?php

use App\Commands\NewOrder;
use App\Entities\Customer\Customer;
use App\Entities\Email;
use App\Entities\Invoice\InvoiceMg;
use App\Entities\Invoice\InvoiceRj;
use App\Entities\Invoice\InvoiceSp;
use App\Entities\Order;
use App\Strategies\CalculateTaxe;
use App\Entities\Product;
use App\Entities\Taxes\Confis;
use App\Entities\Taxes\Icms;
use App\Entities\Taxes\Ipi;
use App\Entities\Taxes\Pis;
use App\Handlers\CalculateDiscount;
use App\Handlers\NewOrderHandler;

require 'vendor/autoload.php';

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;


$customer = new Customer('Rafael', new Email('rafael@gmail.com'));

$product = new Product;
$product->price = 10;
$product->quantity = 350;


$order = new Order();
$order->customer = $customer;
$order->addProduct($product);


echo "-> Design Patterns - Strategy".PHP_EOL;
echo "----------------------------------------------------------------------".PHP_EOL;

$icms = new Icms();
$ipi = new Ipi();
$pis = new Pis();
$confis = new Confis();

$calculateTaxe = new CalculateTaxe();
echo "- Adiciona o Imposto ICMS".PHP_EOL;
$order->taxes += $calculateTaxe->calculate($product, $icms);
echo "- Adiciona o Imposto IPI".PHP_EOL;
$order->taxes += $calculateTaxe->calculate($product, $ipi);
echo "- Adiciona o Imposto PIS".PHP_EOL;
$order->taxes += $calculateTaxe->calculate($product, $pis);
echo "- Adiciona o Imposto CONFIS".PHP_EOL;
$order->taxes += $calculateTaxe->calculate($product, $confis);

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;



echo "-> Design Patterns - Chain of Responsability".PHP_EOL;
echo "----------------------------------------------------------------------".PHP_EOL;

echo "- Calcula os descontos".PHP_EOL;
$calculateDiscount = new CalculateDiscount($product);
$order->discount += $calculateDiscount->calculate($product);


echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;



echo "-> Design Patterns - Template Method".PHP_EOL;
echo "----------------------------------------------------------------------".PHP_EOL;
echo "- Cria a nota Fiscal para MG".PHP_EOL;
$invoiceMg = new InvoiceMg();
$invoiceMgCreated = $invoiceMg->generateInvoice($customer, $order);


echo "- Cria a nota Fiscal para RJ".PHP_EOL;
$invoiceRj = new InvoiceRj();
$invoiceRjCreated = $invoiceRj->generateInvoice($customer, $order);

echo "- Cria a nota Fiscal para SP".PHP_EOL;
$invoiceSp = new InvoiceSp();
$invoiceSpCreated = $invoiceSp->generateInvoice($customer, $order);


echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

echo "-> Design Patterns - State".PHP_EOL;
echo "----------------------------------------------------------------------".PHP_EOL;
echo "- Validando o pedido".PHP_EOL;
$order->inProgress();

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;


echo "-> Design Patterns - Command".PHP_EOL;
echo "----------------------------------------------------------------------".PHP_EOL;
echo "- Gerando um novo pedido".PHP_EOL;

$newOrder = new NewOrder($order);
$newOrderHandler = new NewOrderHandler();
$newOrderHandler->execute($newOrder);

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;