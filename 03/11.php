<?php

class ShopProduct
{
    public $numPages;
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
        float $price,
        int $numPages,
        int $playLength
    ) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
        $this->numPages = $numPages;
        $this->playLength = $playLength;
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
    public function getPlayLength()
    {
        return $this->playLength;
    }

    public function getSummaryLine()
    {
        $base = "{$this->title} （{$this->producerMainName},";
        $base .= "{$this->producerFirstName}）";
        $base .= "：playing time - {$this->playLength}";
        return $base;
    }
}

class BookProduct extends ShopProduct
{
    public function getNumPages()
    {
        return $this->numPages;
    }


    public function getSummaryLine()
    {
        $base = "{$this->title} （{$this->producerMainName},";
        $base .= "{$this->producerFirstName}）";
        $base .= "：page count - {$this->numPages}";
        return $base;
    }
}


$cdProduct1 = new CdProduct('cd', 'x', 'sl', 60, 0, 500);
print "artist：" . $cdProduct1->getProducer();
