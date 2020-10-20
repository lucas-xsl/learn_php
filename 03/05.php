<?php

class ShopProduct
{
    public $title;
    public $producerFirstName;
    public $producerMainName;
    public $price = 0;


    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price
    ) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    public function getProducer()
    {
        return $this->producerFirstName . " " . $this->producerMainName;
    }
}

class ShopProductWriter
{
    public function write(ShopProduct $shopProduct)
    {
        return $shopProduct->title . ': '
            . $shopProduct->getProducer()
            . '( ' . $shopProduct->price . ")\n";
    }
}

$product1 = new ShopProduct(
    '七匹狼衬衫123',
    'xu',
    'shunli',
    255
);

$write = new ShopProductWriter();
print $write->write($product1);

class Wrong
{

}
$write->write(new Wrong());
