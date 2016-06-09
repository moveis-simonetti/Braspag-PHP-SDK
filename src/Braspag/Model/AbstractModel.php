<?php

namespace Braspag\Model;

use Braspag\Lib\Hydrator;

class AbstractModel
{

    public function __construct($options = [])
    {
        $config = include __DIR__ . '/../../../config/braspag.config.php';

        try {
            if (is_array($options) && is_array($config))
                $options = \array_merge($config, $options);
        } catch (\Exception $e) {
            echo $e->getFile();
        }

        Hydrator::hydrate($this, $options);
    }

    public function parseLink($data)
    {
        if (!$data) {
            return null;
        }
        return new Link((array)$data);
    }


    public function parseLinks($source)
    {
        $linkCollection = array();

        foreach ($source as $l) {
            $link = $this->parseLink($l);
            \array_push($linkCollection, $link);
        }

        return $linkCollection;
    }

}