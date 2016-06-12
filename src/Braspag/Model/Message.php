<?php

namespace Braspag\Model;

use Braspag\Lib\Hydrator;

class Message
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    public function toArray()
    {
        return [
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
        ];
    }

    public function __construct($options = [])
    {
        Hydrator::hydrate($this, $options);
    }


    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     * @return Message
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }


}
