<?php

class ShopProduct
{
    private $taxrate = 17;

    public function calculateTax(float $price): float
    {
        return (($this->taxrate / 100) * $price);
    }
}

$shop1 = new ShopProduct();
echo $shop1->calculateTax(100) . PHP_EOL;


abstract class Service
{
    //面向服务的抽象类
}

//如果UtilityService类需要使用calculateTax方法，需要复制calculateTax方法；解决方案是使用trait；
class UtilityService extends Service
{
    private $taxrate = 17;

    public function calculateTax(float $price): float
    {
        return (($this->taxrate / 100) * $price);
    }
}