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
use App\Entities\ProductList;
use App\Entities\Taxes\Confis;
use App\Entities\Taxes\Icms;
use App\Entities\Taxes\Ipi;
use App\Entities\Taxes\Pis;
use App\Handlers\CalculateDiscount;
use App\Handlers\NewOrderHandler;
use App\Observers\Order\GenerateOrderLog;
use App\Observers\Order\SendOrderEmail;
use App\Observers\Order\StoreOrder;

require 'vendor/autoload.php';

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;


$customer = new Customer('Rafael', new Email('rafael@gmail.com'));

$product1 = new Product;
$product1->price = 10;
$product1->quantity = 350;

$product2 = new Product;
$product2->price = 10;
$product2->quantity = 350;

echo "-> Design Patterns - Iterator".PHP_EOL;
echo "----------------------------------------------------------------------".PHP_EOL;
echo "- Cria uma lista de produtos";

$productList = new ProductList();
$productList->addProduct($product1);
$productList->addProduct($product2);

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;



$order = new Order();
$order->customer = $customer;
$order->products = $productList;


echo "-> Design Patterns - Strategy".PHP_EOL;
echo "----------------------------------------------------------------------".PHP_EOL;

$icms = new Icms();
$ipi = new Ipi();
$pis = new Pis();
$confis = new Confis();

$calculateTaxe = new CalculateTaxe();
echo "- Adiciona o Imposto ICMS".PHP_EOL;
$order->taxes += $calculateTaxe->calculate($product1, $icms);
$order->taxes += $calculateTaxe->calculate($product2, $icms);
echo "- Adiciona o Imposto IPI".PHP_EOL;
$order->taxes += $calculateTaxe->calculate($product1, $ipi);
$order->taxes += $calculateTaxe->calculate($product2, $ipi);
echo "- Adiciona o Imposto PIS".PHP_EOL;
$order->taxes += $calculateTaxe->calculate($product1, $pis);
$order->taxes += $calculateTaxe->calculate($product2, $pis);
echo "- Adiciona o Imposto CONFIS".PHP_EOL;
$order->taxes += $calculateTaxe->calculate($product1, $confis);
$order->taxes += $calculateTaxe->calculate($product2, $confis);

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;



echo "-> Design Patterns - Chain of Responsability".PHP_EOL;
echo "----------------------------------------------------------------------".PHP_EOL;

echo "- Calcula os descontos".PHP_EOL;
$calculateDiscount = new CalculateDiscount();
$order->discount += $calculateDiscount->calculate($product1);
$order->discount += $calculateDiscount->calculate($product2);


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


echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;


echo "-> Design Patterns - Observer".PHP_EOL;
echo "----------------------------------------------------------------------".PHP_EOL;
echo "- Armazena no banco de dados".PHP_EOL;
echo "- Gera um log do pedido".PHP_EOL;
echo "- Envia um e-mail".PHP_EOL;
echo "- Finaliza a geração do pedido".PHP_EOL;


$newOrderHandler->addAction(new StoreOrder);
$newOrderHandler->addAction(new GenerateOrderLog);
$newOrderHandler->addAction(new SendOrderEmail);
$newOrderHandler->execute($newOrder);

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

