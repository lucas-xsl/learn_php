<?php

class StaticExample
{
    static public $hello = 'hello';

    public static function sayHello()
    {
        return 'say ' . self::$hello;
    }
}

echo StaticExample::$hello . '<br>';


StaticExample::$hello = '张三';
echo StaticExample::sayHello();