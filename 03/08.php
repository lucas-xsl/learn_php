<?php

class CdProduct
{
    public $playLength;
    public $title;
    public $producerFirstName;
    public $producerMainName;
    public $price = 0;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $playLength = 0
    )
    {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
        $this->playLength = $playLength;
    }


    public function getPlayLength()
    {
        return $this->playLength;
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
        $base .= "：playing time - {$this->playLength}";
        return $base;
    }
}

$oCd1 = new CdProduct('CD', 'x', 'sl', 50, 600);
print $oCd1->getSummaryLine();
