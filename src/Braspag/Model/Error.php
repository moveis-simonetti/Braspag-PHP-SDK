<?php

namespace Braspag\Model;

class Error extends AbstractModel
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

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Error
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
     * @return Error
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }


}
