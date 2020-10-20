<?php

class ShopProduct
{
    public $title = 'default product';
    public $producerMainName = 'main name';
    public $producerFirstName = 'first name';
    public $price = 0;
}

$product1 = new ShopProduct();
var_dump($product1->title);

$product2 = new ShopProduct();
$product2->title = 'shunli';
var_dump($product2->title);