<?php

trait TaxTools
{
    public function calculateTax(float $price): float
    {
        return 222;
    }
}

trait PriceUtilities
{
    private $taxrate = 17;

    public function calculateTax(float $price): float
    {
        return (($this->taxrate) / 100) * $price;
    }
}

abstract class Service
{
    //面向服务的抽象类
}


//由于2个trait中有同名的方法，可以使用insteadof关键字解决冲突，使用as重新命名
class UtilityService extends Service
{
    use PriceUtilities, TaxTools {
        TaxTools::calculateTax insteadof PriceUtilities;
        PriceUtilities::calculateTax as bisicTax;
    }
}

$u = new UtilityService();
echo $u->bisicTax(200);
