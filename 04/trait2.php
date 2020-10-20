<?php

trait PriceUtilities
{
    private $taxrate = 17;

    public function calculateTax(float $price): float
    {
        return (($this->taxrate) / 100) * $price;
    }
}

trait IdentityTrait
{
    public function geterateId() : string
    {
        return uniqid();
    }
}

class ShopProduct
{
    use PriceUtilities, IdentityTrait;
}

abstract class Service
{
    //面向服务的抽象类
}

class UtilityService extends Service
{
    use PriceUtilities;
}

$shopProduct = new ShopProduct();
$utilityService = new UtilityService();

echo $shopProduct->calculateTax(100) . PHP_EOL;
echo $utilityService->calculateTax(200) . PHP_EOL;

echo $shopProduct->geterateId();



