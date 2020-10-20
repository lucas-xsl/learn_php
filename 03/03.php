<?php

class ShopProduct
{
    public $title;
    public $producerFirstName;
    public $producerMainName;
    public $price = 0;


    public function __construct(
        $title,
        $firstName,
        $mainName,
        $price
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

$product1 = new ShopProduct(
    '七匹狼衬衫123',
    'xu',
    'shunli',
    255
);

print "author： {$product1->getProducer()}\n";
