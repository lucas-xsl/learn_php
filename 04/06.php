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
    use PriceUtilities {
        //不想让外部实现代码调用
        PriceUtilities::calculateTax as private;
    }

    private $price;

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    public function getTaxRate(): float
    {
        return 17;
    }

    public function getFinalPrice() : float
    {
        return $this->price + $this->calculateTax($this->price);
    }
}

$u = new UtilityService(100);
print $u->calculateTax();