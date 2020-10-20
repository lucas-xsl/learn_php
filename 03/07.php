<?php

class ShopProduct
{
    public $numPages;
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
        int $numPages = 0,
        int $playLength = 0
    ) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
        $this->numPages = $numPages;
        $this->playLength = $playLength;
    }

    public function getNumPages()
    {
        return $this->numPages;
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
    public function getSummaryLine($type)
    {
        if ( ! in_array($type, ['book', 'cd'])) {
            return '';
        }
        $base = "{$this->title}({$this->producerMainName})，";
        $base .= "{$this->producerFirstName}";
        if ($type == 'book') {
            $base .= "：page count - {$this->numPages}";
        } elseif ($type == 'cd') {
            $base .= "：playing time - {$this->playLength}";
        }
        return $base;
    }
}
$bookProduct = new ShopProduct('图书', '张', '三', 20, 120);
$cdProduct = new ShopProduct('CD', '李', '四', 50, 0, 500);

echo $bookProduct->getSummaryLine('book') . '<br>';
echo $cdProduct->getSummaryLine('cd') . '<br>';

