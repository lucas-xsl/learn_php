<?php

//在trict中使用静态方法
trait PriceUtilities
{
    public function calculateTax(float $price) :float
    {
        //可以访问宿主类种的属性；
        return ($this->taxrate / 100) * $price;
    }
}

class Service
{

}

class UtilityService extends Service
{
    public $taxrate = 17;
    use PriceUtilities;
}

$oU = new UtilityService();
echo $oU->calculateTax(200);
