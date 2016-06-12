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