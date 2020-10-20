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

class ShopProductWriter
{
    public function write($shopProduct)
    {
        if (! $shopProduct instanceof CdProduct &&
            ! $shopProduct instanceof BookProduct
           ) {
            die("wrong type supplied");
        }

        return $shopProduct->title . ': '
            . $shopProduct->getProducer()
            . '(' . $shopProduct->price . ")<br>";
    }
}

$oWriter = new ShopProductWriter();
echo $oWriter->write(new CdProduct('cd', 'x', 'xsl', 60, 600));

echo $oWriter->write(new BookProduct('book', 'x', 'xsl', 30, 500));