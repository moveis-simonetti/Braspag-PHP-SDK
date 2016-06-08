<?php

namespace Braspag\Model;

use Braspag\Lib\Hydrator;

class AbstractModel
{
    public function __construct($options = [])
    {
        $config = include_once('../../config/braspag.config.php');
        $options = \array_merge_recursive($config, $options);
        Hydrator::hydrate($this, $options);
    }

    private function parseLink($data)
    {
        if (!$data) {
            return null;
        }
        return new Link((array)$data);
    }


    protected function parseLinks($source)
    {
        $linkCollection = array();

        foreach ($source as $l) {
            $link = $this->parseLink($l);
            \array_push($linkCollection, $link);
        }

        return $linkCollection;
    }

}