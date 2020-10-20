<?php

//在trict中使用静态方法
trait PriceUtilities
{
    private static $taxrate = 17;

    public static function calculateTax(float $price) :float
    {
        return (self::$taxrate / 100) * $price;
    }
}

class Service
{

}

class UtilityService extends Service
{
    use PriceUtilities;
}

$oU = new UtilityService();
echo $oU->calculateTax(200);
