<?php

class BookProduct
{
    public $title;
    public $producerFirstName;
    public $producerMainName;
    public $price = 0;
    public $numPages;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPages = 0
    )
    {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
        $this->numPages = $numPages;
    }

    public function getNumPages()
    {
        return $this->numPages;
    }

    public function getProducer()
    {
        return $this->producerFirstName . " " . $this->producerMainName;
    }

    //打印商品摘要
    public function getSummaryLine()
    {

        $base = "{$this->title}({$this->producerMainName})，";
        $base .= "{$this->producerFirstName}";
        $base .= "：page count - {$this->numPages}";

        return $base;
    }
}
$oBook1 = new BookProduct('图书', 'x', 'sl', 50, 60);
print $oBook1->getSummaryLine();