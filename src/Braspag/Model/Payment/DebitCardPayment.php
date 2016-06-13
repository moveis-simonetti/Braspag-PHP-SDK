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

class DebitCardPayment extends Payment
{
    /**
     * @var double
     */
    private $serviceTaxAmount;

    /**
     * @var Card
     */
    private $debitCard;

    /**
     * @var string
     */
    private $softDescriptor;

    /**
     * @var string
     */
    private $eci;

    /**
     * @var boolean
     */
    private $authenticate;

    /**
     * @var boolean
     */
    private $capture;

    public function toArray()
    {
        return [
            'serviceTaxAmount' => $this->getServiceTaxAmount(),
            'debitCard' => $this->getDebitCard()->toArray(),
            'softDescriptor' => $this->getSoftDescriptor(),
            'eci' => $this->getEci(),
            'authenticate' => $this->isAuthenticate(),
            'capture' => $this->isCapture(),
            'interest' => $this->getInterest()
        ];
    }

    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->type = "DebitCard";
    }

    /**
     * @return float
     */
    public function getServiceTaxAmount()
    {
        return $this->serviceTaxAmount;
    }

    /**
     * @param float $serviceTaxAmount
     * @return DebitCardPayment
     */
    public function setServiceTaxAmount($serviceTaxAmount)
    {
        $this->serviceTaxAmount = $serviceTaxAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getDebitCard()
    {
        return $this->debitCard;
    }

    /**
     * @param string $debitCard
     * @return DebitCardPayment
     */
    public function setDebitCard($debitCard)
    {
        $this->debitCard = $debitCard;

        if (\is_object($debitCard) && !($debitCard instanceof Card)) {
            throw new \InvalidArgumentException('Item must be a debitCard object.');
        } else if (\is_array($debitCard)) {
            $this->debitCard = new Card($debitCard);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getSoftDescriptor()
    {
        return $this->softDescriptor;
    }

    /**
     * @param string $softDescriptor
     * @return DebitCardPayment
     */
    public function setSoftDescriptor($softDescriptor)
    {
        $this->softDescriptor = $softDescriptor;
        return $this;
    }

    /**
     * @return string
     */
    public function getEci()
    {
        return $this->eci;
    }

    /**
     * @param string $eci
     * @return DebitCardPayment
     */
    public function setEci($eci)
    {
        $this->eci = $eci;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAuthenticate()
    {
        return $this->authenticate;
    }

    /**
     * @param boolean $authenticate
     * @return DebitCardPayment
     */
    public function setAuthenticate($authenticate)
    {
        $this->authenticate = $authenticate;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCapture()
    {
        return $this->capture;
    }

    /**
     * @param boolean $capture
     * @return DebitCardPayment
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;
        return $this;
    }

}
