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

namespace Braspag\Model\Payment;

use Braspag\Lib\Hydrator;

class Card
{

    /**
     * @var string
     */
    private $cardNumber;

    /**
     * @var string
     */
    private $holder;

    /**
     * @var string
     */
    private $expirationDate;

    /**
     * @var string
     */
    private $securityCode;

    /**
     * @var boolean
     */
    private $saveCard;

    /**
     * @var string
     */
    private $cardToken;

    /**
     * @var string
     */
    private $cardAlias;

    /**
     * @var string
     */
    private $brand;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'cardNumber' => $this->getCardNumber(),
            'holder' => $this->getHolder(),
            'expirationDate' => $this->getExpirationDate(),
            'securityCode' => $this->getSecurityCode(),
            'saveCard' => $this->isSaveCard(),
            'cardToken' => $this->getCardToken(),
            'cardAlias' => $this->getCardAlias(),
            'brand' => $this->getBrand()

        ];
    }

    public function __construct($options = [])
    {
        Hydrator::hydrate($this, $options);
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     * @return Card
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param string $holder
     * @return Card
     */
    public function setHolder($holder)
    {
        $this->holder = $holder;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param string $expirationDate
     * @return Card
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * @param int $securityCode
     * @return Card
     */
    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSaveCard()
    {
        return $this->saveCard;
    }

    /**
     * @param boolean $saveCard
     * @return Card
     */
    public function setSaveCard($saveCard)
    {
        $this->saveCard = $saveCard;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardToken()
    {
        return $this->cardToken;
    }

    /**
     * @param string $cardToken
     * @return Card
     */
    public function setCardToken($cardToken)
    {
        $this->cardToken = $cardToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardAlias()
    {
        return $this->cardAlias;
    }

    /**
     * @param string $cardAlias
     * @return Card
     */
    public function setCardAlias($cardAlias)
    {
        $this->cardAlias = $cardAlias;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return Card
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }


}
