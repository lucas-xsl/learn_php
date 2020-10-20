<?php

trait PriceUtilities
{
    function calculateTax(float $price) : float
    {
        //这是一种更好的设计，因为知道getTaxRate()一定会被实现
        return ($this->getTaxRate() / 100) * $price;
    }

    //trait中定义抽象方法，声明该方法的类必须实现抽象方法；
    abstract function getTaxRate() : float;
}

class Service
{

}

class  UtilityService extends Service
{
    use PriceUtilities;

    public function getTaxRate(): float
    {
        return 17;
    }
}

$u = new UtilityService();
print $u->calculateTax(100);