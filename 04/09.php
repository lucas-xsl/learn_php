<?php

class Conf
{
    private $file;
    private $xml;
    private $lastmatch;

    public function __construct(string $file)
    {
        $this->file = $file;
        $this->xml = simplexml_load_file($file);
    }

    public function write()
    {
        file_put_contents($this->file, $this->xml->asXML());
    }

    public function get(string $str)
    {
        $matchs = $this->xml->xpath('/conf/item[@name="' . $str . '"]');
        if (count($matchs)) {
            $this->lastmatch = $matchs[0];
            return (string)$matchs[0];
        }
        return null;
    }

    public function set(string $key, string $value)
    {
        if (!is_null($this->lastmatch)) {
            $this->lastmatch[0] = $value;
            return;
        }
        $conf = $this->xml->conf;
        $this->xml->addChild('item', $value)->addAttribute('name', $key);
    }
}

$oConf = new Conf('09.xml');

$oConf->set('test', 'test');
$oConf->write();

var_dump($oConf->get('test'));

