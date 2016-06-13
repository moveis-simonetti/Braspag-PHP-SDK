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

class Shipping
{

    /**
     * @var string
     */
    private $addressee;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $phone;

    public function toArray()
    {
        return [
            'addressee' => $this->getAddressee(),
            'method' => $this->getMethod(),
            'phone' => $this->getPhone(),
        ];
    }

    /**
     * Shipping constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        Hydrator::hydrate($this, $options);
    }

    /**
     * @return string
     */
    public function getAddressee()
    {
        return $this->addressee;
    }

    /**
     * @param string $addressee
     * @return Shipping
     */
    public function setAddressee($addressee)
    {
        $this->addressee = $addressee;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return Shipping
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Shipping
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

}
