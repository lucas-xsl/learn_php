<?php

/**
 * 管理类的访问，public private protected
 */
class ShopProduct
{

    private $title;
    private $producerMainName;
    private $producerFirstName;
    /**
     * 防止客户端直接获取价格，可以将$price属性设置为私有；
     * 但这么做过于严格，比如只有图书不打折，可以在图书中重写getPrice方法
     * 最好的做法是将$price属性设置为protected
     *
     */
    protected $price;
    //打折
    private $discount = 0;

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

    public function getProducerFirstName()
    {
        return $this->producerFirstName;
    }

    public function getProducerMainName()
    {
        return $this->producerMainName;
    }

    //作者、作家。谁创造的
    public function getProducer()
    {
        return $this->producerFirstName . " " . $this->producerMainName;
    }

    //摘要
    public function getSummaryLine()
    {
        $base = "{$this->title} （{$this->producerMainName},";
        $base .= "{$this->producerFirstName}）";
        return $base;
    }

    //获取折扣
    public function getDiscount()
    {
        return $this->discount;
    }

    //设置折扣
    public function setDiscount(int $num)
    {
        $this->discount = $num;
    }

    //打折
    public function getPrice()
    {
        return $this->price - $this->discount;
    }

    //获取标题
    public function getTitle()
    {
        return $this->title;
    }

}

class CdProduct extends ShopProduct
{

    private $playLength;

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
    private $numPages;

    public function __construct(string $title, string $firstName, string $mainName, float $price, int $numPages)
    {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages = $numPages;
    }

    public function getNumPages()
    {
        return $this->numPages;
    }

    //比如图书不打折
    public function getPrice()
    {
        return $this->price;
    }

    public function getSummaryLine()
    {
        $base = parent::getSummaryLine();
        $base .= "：page count - {$this->numPages}";
        return $base;
    }
}

class ShopProductWriter
{
    //为了防止客户端操作$products属性，将其设置为私有
    private $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    public function write()
    {
        $str = "";

        foreach ($this->products as $product)
        {
            $str .= "{$product->getTitle()}：";
            $str .= $product->getProducer();
            $str .= "({$product->getPrice()})";
        }
        return $str;
    }
}

$oWriter1 = new ShopProductWriter();
$oWriter1->addProduct(new BookProduct('book', 'x', 'sl', 60, 500));
echo $oWriter1->write() . '<hr>';


$oWriter2 = new ShopProductWriter();
$oCd1 = new CdProduct('cd', 'x', 'sl', 50, 600);
//设置打折
$oCd1->setDiscount(20);
$oWriter2->addProduct($oCd1);
//设置cd折扣
echo $oWriter2->write();


