<?php

abstract class DomainObject
{

}

class User extends DomainObject
{
    public static function create(): User
    {
        return new User();
    }
}

class Document extends DomainObject
{
    public static function create(): Document
    {
        return new Document();
    }
}

/**
 * 改造，静态延迟绑定
 */
abstract class DomainObject1
{
    public static function create() : DomainObject1
    {
        return new static();
    }
}

class User1 extends DomainObject1
{

}

class Docutment1 extends DomainObject1
{

}

$oUser1 = new User1();
var_dump($oUser1::create());

$Docutment1 = new Docutment1();
var_dump($Docutment1::create());