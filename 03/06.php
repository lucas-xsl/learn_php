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


class ConfReader
{
    public function getValues(array $default = null)
    {
        $product1 = new ShopProduct('七匹狼abc', 'x', 'sl', 5.99);
        $product2 = new ShopProduct('七匹狼def', 'z', 'xl', 5.88);

        print "author:" . $product1->getProducer() . "<br>";
        print "author:" . $product2->getProducer();
    }
}

$oConfReader = new ConfReader();
print $oConfReader->getValues();