<?php

abstract class DomainObject
{
    private $group;

    public function __construct()
    {
        $this->group = static::getGroup();
    }

    public static function create(): DomainObject
    {
        return new static();
    }

    public static function getGroup() :string
    {
        return "default";
    }
}

class User extends DomainObject
{

}

class Domain extends DomainObject
{
    public static function getGroup(): string
    {
        return "document";
    }
}

class SpreadSheet extends Domain
{

}

print_r(User::create());
echo '<hr>';
print_r(SpreadSheet::create());