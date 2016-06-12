<?php

namespace Braspag\Model;

use Braspag\Lib\Hydrator;
use Braspag\Lib\Util;

abstract class AbstractModel
{

    use Util;

    private $messages = [];

    public function __construct($options = [])
    {
        $config = include __DIR__ . '/../../../config/braspag.config.php';

        try {
            if (is_array($options))
                $config = \array_merge($config, $options);
        } catch (\Exception $e) {
            echo $e->getFile();
        }

        Hydrator::hydrate($this, $config);
    }

    public function addMessage($message)
    {
        \array_push($this->messages, new Message($message));
        return $this;
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param mixed $messages
     * @return AbstractModel
     */
    public function setMessages($messages)
    {
        $this->messages = $this->parseMessages($messages);
        return $this;
    }

    public function isValid()
    {
        return !\count($this->messages);
    }


}