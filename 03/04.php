<?php

//强类型声明；像下面的例子中，$resolve要求布尔类型，传入"false",会报类型错误，如果不加这个，会发生隐式转换；
declare(strict_types=1);


class AddressManager
{
    private $address = [
        '209.131.36.159',
        '216.58.213.174'
    ];

    /**
     * 输出IP地址列表
     * 如果$resove为true，那么解析所有的ip地址
     * @param $resolve boolean 是否解析ip地址
     */
    public function outPutAddresses(bool $resolve)
    {

//        var_dump($resolve);die;

        //方案1， 将字符串false，转换为boolean类型
//        if (is_string($resolve)) {
//            $resolve = (preg_match("/^(false|no|off)$/i", $resolve)) ? false : true;
//        }
//
//        //方案2：如果$resolve不是布尔型直接返回错误提示
//        if (! is_bool($resolve)) {
//            print "警告...";
//            die;
//        }

        foreach($this->address as $address)
        {
            print($address);

            //解析
            if ($resolve) {
                print "(" . gethostbyaddr($address) . ")";
            }
            print "<hr>";
        }
    }
}

$settings = simplexml_load_file( '04.xml');
$manager = new AddressManager();
//xml中拿到的false，是一个字符串，传到方法中 == true，所以运行了
$manager->outPutAddresses((string) $settings->resolvedomains);
