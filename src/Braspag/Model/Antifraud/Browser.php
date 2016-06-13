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

namespace Braspag\Model\Antifraud;

use Braspag\Lib\Hydrator;

class Browser
{

    /**
     * @var boolean
     */
    private $cookiesAccepted;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $hostName;

    /**
     * @var string
     */
    private $ipAddress;

    /**
     * @var string
     */
    private $type;

    public function toArray()
    {
        return [
            'cookieAccepted' => $this->isCookiesAccepted(),
            'email' => $this->getEmail(),
            'hostName' => $this->getHostName(),
            'ipAddress' => $this->getIpAddress(),
            'type' => $this->getType()
        ];
    }

    /**
     * Browser constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        Hydrator::hydrate($this, $options);
    }
    
    /**
     * @return boolean
     */
    public function isCookiesAccepted()
    {
        return $this->cookiesAccepted;
    }

    /**
     * @param boolean $cookiesAccepted
     * @return Browser
     */
    public function setCookiesAccepted($cookiesAccepted)
    {
        $this->cookiesAccepted = $cookiesAccepted;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Browser
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getHostName()
    {
        return $this->hostName;
    }

    /**
     * @param string $hostName
     * @return Browser
     */
    public function setHostName($hostName)
    {
        $this->hostName = $hostName;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     * @return Browser
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Browser
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }


}