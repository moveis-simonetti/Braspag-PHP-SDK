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

use Braspag\Model\Antifraud\FraudAnalysis;

class CreditCardPayment extends Payment
{

    /**
     * @var double
     */
    private $serviceTaxAmount;

    /**
     * @var int
     */
    private $installments;

    /**
     * @var boolean
     */
    private $capture;

    /**
     * @var boolean
     */
    private $authenticate;

    /**
     * @var Card
     */
    private $creditCard;

    /**
     * @var string
     */
    private $softDescriptor;

    /**
     * @var string
     */
    private $eci;

    public function toArray()
    {
        return \array_merge_recursive(parent::toArray(), [
            'serviceTaxAmount' => $this->getServiceTaxAmount(),
            'installments' => $this->getInstallments(),
            'interest' => $this->getInterest(),
            'capture' => $this->isCapture(),
            'authenticate' => $this->isAuthenticate(),
            'creditCard' => $this->getCreditCard()->toArray(),
            'softDescriptor' => $this->getSoftDescriptor(),
            'eci' => $this->getEci(),
            'fraudAnalysis' => ($this->getFraudAnalysis()) ? $this->getFraudAnalysis()->toArray() : null
        ]);
    }

    /**
     * @var FraudAnalysis
     */
    protected $fraudAnalysis;

    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->type = "CreditCard";
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
     * @return CreditCardPayment
     */
    public function setServiceTaxAmount($serviceTaxAmount)
    {
        $this->serviceTaxAmount = $serviceTaxAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
     * @param int $installments
     * @return CreditCardPayment
     */
    public function setInstallments($installments)
    {
        $this->installments = $installments;
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
     * @return CreditCardPayment
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;
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
     * @return CreditCardPayment
     */
    public function setAuthenticate($authenticate)
    {
        $this->authenticate = $authenticate;
        return $this;
    }

    /**
     * @return Card
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * @param string $creditCard
     * @return CreditCardPayment
     */
    public function setCreditCard($creditCard)
    {
        $this->creditCard = $creditCard;

        if (\is_object($creditCard) && !($creditCard instanceof Card)) {
            throw new \InvalidArgumentException('Item must be a creditCard object.');
        } else if (\is_array($creditCard)) {
            $this->creditCard = new Card($creditCard);
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
     * @return CreditCardPayment
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
     * @return CreditCardPayment
     */
    public function setEci($eci)
    {
        $this->eci = $eci;
        return $this;
    }

    /**
     * @return FraudAnalysis
     */
    public function getFraudAnalysis()
    {
        return $this->fraudAnalysis;
    }

    /**
     * @param FraudAnalysis $fraudAnalysis
     * @return CreditCardPayment
     */
    public function setFraudAnalysis($fraudAnalysis)
    {
        $this->fraudAnalysis = $fraudAnalysis;

        if (\is_object($fraudAnalysis) && !($fraudAnalysis instanceof FraudAnalysis)) {
            throw new \InvalidArgumentException('Item must be a FraudAnalysis object.');
        } else if (\is_array($fraudAnalysis)) {
            $this->fraudAnalysis = new FraudAnalysis($fraudAnalysis);
        }
        return $this;
    }


}
