<?php

namespace Braspag\Lib;

use GuzzleHttp\Client as HttpClient;

trait Util
{
    protected function http()
    {
        if (!$this->http) {
            $this->http = new HttpClient();
        }
        return $this->http;
    }

    static protected function capitalizeRequestData($data)
    {
        foreach ($data as $key => &$value) {
            if (\is_array($value)) {
                $value = self::capitalizeRequestData($value);
            }
            $data[\ucfirst($key)] = $value;
            if (ctype_lower($key{0})) {
                unset($data[$key]);
            }
        }
        return $data;
    }

}