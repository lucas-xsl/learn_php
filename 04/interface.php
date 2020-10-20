<?php

/**
 * 定义接口，接口只能定义功能，不能有实现
 */
interface Chargeable
{
    public function getPrice() : float;
}

class ShopProduct implements Chargeable
{
    protected $price;

    public function getPrice(): float
    {
        return $this->price;
    }
}

class CdProduct extends ShopProduct
{

}
