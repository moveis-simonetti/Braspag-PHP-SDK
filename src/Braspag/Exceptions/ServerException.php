<?php

namespace Braspag\Exceptions;

class ServerException extends \Exception
{
    public function __construct(string $message, int $code, \Throwable $trace)
    {
        parent::__construct($message, $code, $trace);
    }
}
