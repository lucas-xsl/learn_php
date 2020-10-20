<?php

//抽象类可以继承不可以实例化
abstract class ShopProductWriter
{
    protected $products = [];

    public function addProduct(ShopProduct $product)
    {
        $this->products[] = $product;
    }

    //一个抽象类，通常包含一个抽象方法
    abstract public function write();
}

//继承自抽象类，必须实现其内部的抽象方法
class TextProducerWriter extends ShopProductWriter
{
    public function write()
    {
        // TODO: Implement write() method.
    }
}

class XmlProducerWriter extends ShopProductWriter
{
    public function write()
    {
        // TODO: Implement write() method.
    }
}

