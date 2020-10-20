<?php

//继承
class ShopProduct
{

    public $playLength;
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price;

    public function __construct
    (
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
    public function getSummaryLine()
    {
        $base = "{$this->title} （{$this->producerMainName},";
        $base .= "{$this->producerFirstName}）";
        return $base;
    }
}

class CdProduct extends ShopProduct
{

    public $playLength;

    public function __construct(string $title, string $firstName, string $mainName, float $price, int $playLength)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
    }

    public function getPlayLength()
    {
        return $this->playLength;
    }

    public function getSummaryLine()
    {
        $base = parent::getSummaryLine();
        $base .= "：playing time - {$this->playLength}";
        return $base;
    }
}

class BookProduct extends ShopProduct
{
    public $numPages;

    public function __construct(string $title, string $firstName, string $mainName, float $price, int $numPages)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages = $numPages;
    }

    public function getNumPages()
    {
        return $this->numPages;
    }

    public function getSummaryLine()
    {
        $base = parent::getSummaryLine();
        $base .= "：page count - {$this->numPages}";
        return $base;
    }
}


$cdProduct1 = new CdProduct('cd', 'x', 'sl', 60, 500);
print "artist：" . $cdProduct1->getProducer();
