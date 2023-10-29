<?php

use App\Commands\NewOrder;
use App\Handlers\NewOrderHandler;
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
use App\Observers\Order\GenerateOrderLog;
use App\Observers\Order\SendOrderEmail;
use App\Observers\Order\StoreOrder;

require 'vendor/autoload.php';

$customer = new Customer('Rafael', new Email('rafael@gmail.com'));


$product = new Product;
$product->price = 10;
$product->quantity = 350;

$product2 = new Product;
$product2->price = 36.10;
$product2->quantity = 350;

$productList = new ProductList();
$productList->addProduct($product);
$productList->addProduct($product2);

$order = new Order();
$order->customer = $customer;
$order->products = $productList;

$calculateTaxe = new CalculateTaxe();

$taxes = 0;
$taxes += $calculateTaxe->calculate($product, new Icms());
$taxes += $calculateTaxe->calculate($product, new Ipi());
$taxes += $calculateTaxe->calculate($product, new Pis());
$taxes += $calculateTaxe->calculate($product, new Confis());

$taxes += $calculateTaxe->calculate($product2, new Icms());
$taxes += $calculateTaxe->calculate($product2, new Ipi());
$taxes += $calculateTaxe->calculate($product2, new Pis());
$taxes += $calculateTaxe->calculate($product2, new Confis());


$discount = 0;
$calculateDiscount = new CalculateDiscount();
$discount += $calculateDiscount->calculate($product);
$discount += $calculateDiscount->calculate($product2);

$newOrder = new NewOrder($order);

$newOrderHandler = new NewOrderHandler();
$newOrderHandler->addAction(new StoreOrder);
$newOrderHandler->addAction(new GenerateOrderLog);
$newOrderHandler->addAction(new SendOrderEmail);
$newOrderHandler->execute($newOrder);