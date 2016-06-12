<?php

namespace Braspag\Lib;

use GuzzleHttp\Client as HttpClient;
use Braspag\Model\Link;
use Braspag\Model\Message;

trait Util
{
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

    public function addLink($data)
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
            $link = $this->addLink($l);
            \array_push($linkCollection, $link);
        }

        return $linkCollection;
    }

    /**
     * @param $data
     * @return Message|null
     */
    public function setMessage($data)
    {
        if (!$data) {
            return null;
        }
        return new Message((array)$data);
    }


    /**
     * @param $messages
     * @return $this
     */
    public function parseMessages($messages)
    {

        $messageCollection = array();

        foreach ($messages as $message) {
            if (\is_array($message)) {
                $message = $this->setMessage($message);
                \array_push($messageCollection, $message);
            }
        }

        return $messageCollection;
    }

}