<?php

/**
 * Braspag PHP SDK
 *
 * @link https://github.com/JotJunior/BraspagPhpSdk for the canonical source repository
 * @copyright Copyright (c) 2016 JotJunior
 *
 * This file is part of Braspag-PHP-SDK.
 *
 * Braspag PHP SDK is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Braspag-PHP-SDK is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Braspag-PHP-SDK. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Braspag\Model;

use Braspag\Lib\Hydrator;
use Braspag\Lib\Util;
use Braspag\Model\Sale\Message;

abstract class AbstractModel
{
    use Util;

    /**
     * @var array
     */
    private $messages = [];

    /**
     * @var array
     */
    private $reasonCodes;

    /**
     * @var array
     */
    private $statusCodes;

    public function __construct($options = [])
    {
        $config = include __DIR__ . '/../../../config/braspag.config.php';

        try {
            if (is_array($options))
                $config = array_merge($config, $options);
        } catch (\Exception $e) {
            echo $e->getFile();
        }

        Hydrator::hydrate($this, $config);
    }

    public function addMessage(array $message)
    {
        if (!is_array($this->messages)) {
            $this->messages = [];
        }
        $this->messages[] = new Message($message);

        return $this;
    }

    /**
     * @return array
     */
    public function getMessages($asArray = false)
    {
        if ($asArray && is_array($this->messages)) {
            $messages = [];
            foreach ($this->messages as $message) {
                $messages[] = ($message instanceof Message) ? $message->toArray() : $message;
            }

            return $messages;
        }

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

    /**
     * @return bool
     */
    public function isValid()
    {

        if ($this->messages === null) {
            $this->messages = [];
        }

        if (!is_array($this->messages) && !($this->messages instanceof \Countable)) {
            throw new \InvalidArgumentException(
                'Messages cannot be a ' . 
                    (is_object($this->messages) ? get_class($this->messages) : gettype($this->messages))
            );
        }

        return count($this->messages) === 0;
    }

    /**
     * @return array
     */
    public function getReasonCodes()
    {
        return $this->reasonCodes;
    }

    /**
     * @param array $reasonCodes
     * @return AbstractModel
     */
    public function setReasonCodes($reasonCodes)
    {
        $this->reasonCodes = $reasonCodes;
        return $this;
    }

    /**
     * @return array
     */
    public function getStatusCodes()
    {
        return $this->statusCodes;
    }

    /**
     * @param $statusCode
     * @return mixed|null
     */
    public function getStatusMessage($statusCode)
    {
        return $this->statusCodes[$statusCode] ?? null;
    }

    /**
     * @param $reasonCode
     * @return mixed|null
     */
    public function getReason($reasonCode)
    {
        return $this->reasonCodes[$reasonCode] ?? null;
    }

    /**
     * @param array $statusCodes
     * @return AbstractModel
     */
    public function setStatusCodes($statusCodes)
    {
        $this->statusCodes = $statusCodes;
        return $this;
    }
}
