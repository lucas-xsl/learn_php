<?php

interface IdentityObejct
{
    public function generateId() : string;
}

trait IdentityTrait
{
    public function generateId() : string
    {
        return uniqid();
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

class ShopProduct implements IdentityObejct
{
    use PriceUtilities, IdentityTrait;


}

