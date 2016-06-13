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

use Braspag\Model\AbstractModel;

class Payment extends AbstractModel
{

    const InterestByMerchant = 'ByMerchant';
    const InterestByIssuer = 'ByIssuer';

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $paymentId;

    /**
     * @var double
     */
    protected $amount;

    /**
     * @var double
     */
    protected $capturedAmount;

    /**
     * @var double
     */
    protected $voidedAmount;

    /**
     * @var \DateTime
     */
    protected $receivedDate;

    /**
     * @var \DateTime
     */
    protected $capturedDate;

    /**
     * @var \DateTime
     */
    protected $voidedDate;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $provider;

    /**
     * @var array
     */
    protected $credentials;

    /**
     * @var ExtraData
     */
    protected $extraDataCollection;

    /**
     * @var string
     */
    protected $returnUrl;

    /**
     * @var int
     */
    protected $reasonCode;

    /**
     * @var string
     */
    protected $reasonMessage;

    /**
     * @var int
     */
    protected $providerReturnCode;

    /**
     * @var string
     */
    protected $providerReturnMessage;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var array
     */
    protected $links;

    /**
     * @var RecurrentPayment
     */
    protected $recurrentPayment;

    /**
     * @var string
     */
    protected $authenticationUrl;

    /**
     * @var string
     */
    protected $authorizationCode;

    /**
     * @var string
     */
    protected $proofOfSale;

    /**
     * @var string
     */
    protected $acquirerTransactionId;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var string
     */
    protected $interest;

    public function toArray()
    {
        return [
            'type' => $this->getType(),
            'paymentId' => $this->getPaymentId(),
            'amount' => $this->getAmount(),
            'capturedAmount' => $this->getCapturedAmount(),
            'voidedAmount' => $this->getVoidedAmount(),
            'receivedDate' => ($this->getReceivedDate()) ? $this->getReceivedDate()->format('Y-m-d') : null,
            'voidedDate' => ($this->getVoidedDate()) ? $this->getVoidedDate()->format('Y-m-d') : null,
            'capturedDate' => ($this->getCapturedDate()) ? $this->getCapturedDate()->format('Y-m-d') : null,
            'currency' => $this->getCurrency(),
            'country' => $this->getCountry(),
            'provider' => $this->getProvider(),
            'credentials' => $this->getCredentials(),
            'extraDataCollection' => $this->getExtraDataCollection(true),
            'returnUrl' => $this->getReturnUrl(),
            'reasonCode' => $this->getReasonCode(),
            'reasonMessage' => $this->getReasonMessage(),
            'providerReturnCode' => $this->getProviderReturnCode(),
            'providerReturnMessage' => $this->getProviderReturnMessage(),
            'status' => $this->getStatus(),
            'links' => $this->getLinks(true),
            'recurrentPayment' => ($this->getRecurrentPayment()) ? $this->getRecurrentPayment()->toArray() : null,
            'authenticationUrl' => $this->getAuthenticationUrl(),
            'authorizationCode' => $this->getAuthorizationCode(),
            'proofOfSale' => $this->getProofOfSale(),
            'acquirerTransactionId' => $this->getAcquirerTransactionId(),
        ];
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
     * @return Payment
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param string $paymentId
     * @return Payment
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return Payment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getCapturedAmount()
    {
        return $this->capturedAmount;
    }

    /**
     * @param float $capturedAmount
     * @return Payment
     */
    public function setCapturedAmount($capturedAmount)
    {
        $this->capturedAmount = $capturedAmount;
        return $this;
    }

    /**
     * @return float
     */
    public function getVoidedAmount()
    {
        return $this->voidedAmount;
    }

    /**
     * @param float $voidedAmount
     * @return Payment
     */
    public function setVoidedAmount($voidedAmount)
    {
        $this->voidedAmount = $voidedAmount;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getReceivedDate()
    {
        return $this->receivedDate;
    }

    /**
     * @param \DateTime $receivedDate
     * @return Payment
     */
    public function setReceivedDate($receivedDate)
    {
        $this->receivedDate = ($receivedDate) ? new \DateTime($receivedDate) : null;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCapturedDate()
    {
        return $this->capturedDate;
    }

    /**
     * @param \DateTime $capturedDate
     * @return Payment
     */
    public function setCapturedDate($capturedDate)
    {
        $this->capturedDate = ($capturedDate) ? new \DateTime($capturedDate) : null;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getVoidedDate()
    {
        return $this->voidedDate;
    }

    /**
     * @param \DateTime $voidedDate
     * @return Payment
     */
    public function setVoidedDate($voidedDate)
    {
        $this->voidedDate = ($voidedDate) ? new \DateTime($voidedDate) : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Payment
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Payment
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     * @return Payment
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return array
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @param array $credentials
     * @return Payment
     */
    public function setCredentials($credentials)
    {
        $this->credentials = $credentials;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    /**
     * @param string $returnUrl
     * @return Payment
     */
    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }

    /**
     * @return int
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @param int $reasonCode
     * @return Payment
     */
    public function setReasonCode($reasonCode)
    {
        if ($reasonCode != 0) {

        }

        $this->reasonCode = $reasonCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getReasonMessage()
    {
        return $this->reasonMessage;
    }

    /**
     * @param string $reasonMessage
     * @return Payment
     */
    public function setReasonMessage($reasonMessage)
    {
        $this->reasonMessage = $reasonMessage;
        return $this;
    }

    /**
     * @return int
     */
    public function getProviderReturnCode()
    {
        return $this->providerReturnCode;
    }

    /**
     * @param int $providerReturnCode
     * @return Payment
     */
    public function setProviderReturnCode($providerReturnCode)
    {
        $this->providerReturnCode = $providerReturnCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderReturnMessage()
    {
        return $this->providerReturnMessage;
    }

    /**
     * @param string $providerReturnMessage
     * @return Payment
     */
    public function setProviderReturnMessage($providerReturnMessage)
    {
        $this->providerReturnMessage = $providerReturnMessage;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Payment
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function getLinks($asArray = false)
    {
        if ($asArray && \is_array($this->links)) {
            $links = [];
            foreach ($this->links as $link) {
                $link = ($link instanceof \Braspag\Model\Link) ? $link->toArray() : $link;
                \array_push($links, $link);
            }

            return $links;
        }
        return $this->links;
    }

    /**
     * @param array $links
     * @return Payment
     */
    public function setLinks($links)
    {
        $this->links = $this->parseLinks($links);
        return $this;
    }

    /**
     * @return RecurrentPayment
     */
    public function getRecurrentPayment()
    {
        return $this->recurrentPayment;
    }

    /**
     * @param string $recurrentPayment
     * @return RecurrentPayment
     */
    public function setRecurrentPayment($recurrentPayment)
    {
        $this->recurrentPayment = $recurrentPayment;

        if (\is_object($recurrentPayment) && !($recurrentPayment instanceof RecurrentPayment)) {
            throw new \InvalidArgumentException('Item must be a recurrentPayment object.');
        } else if (\is_array($recurrentPayment)) {
            $this->recurrentPayment = new RecurrentPayment($recurrentPayment);
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     * @return Payment
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthenticationUrl()
    {
        return $this->authenticationUrl;
    }

    /**
     * @param string $authenticationUrl
     * @return Payment
     */
    public function setAuthenticationUrl($authenticationUrl)
    {
        $this->authenticationUrl = $authenticationUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * @param string $authorizationCode
     * @return Payment
     */
    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorizationCode = $authorizationCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getProofOfSale()
    {
        return $this->proofOfSale;
    }

    /**
     * @param string $proofOfSale
     * @return Payment
     */
    public function setProofOfSale($proofOfSale)
    {
        $this->proofOfSale = $proofOfSale;
        return $this;
    }

    /**
     * @return string
     */
    public function getAcquirerTransactionId()
    {
        return $this->acquirerTransactionId;
    }

    /**
     * @param string $acquirerTransactionId
     * @return Payment
     */
    public function setAcquirerTransactionId($acquirerTransactionId)
    {
        $this->acquirerTransactionId = $acquirerTransactionId;
        return $this;
    }

    /**
     * @return array
     */
    public function getExtraDataCollection($asArray = false)
    {
        if ($asArray && \is_array($this->extraDataCollection)) {
            $extraData = [];
            foreach ($this->extraDataCollection as $link) {
                \array_push($extraData, $link->toArray());
            }
            return $extraData;
        }
        return $this->extraDataCollection;
    }

    /**
     * @param array $extraData
     * @return Payment
     */
    public function setExtraDataCollection($extraData)
    {
        $extraDataCollection = [];

        if (!\is_array($extraData)) {
            return [];
        }

        foreach ($extraData as $data) {
            \array_push($extraDataCollection, new ExtraData($data));
        }

        $this->extraDataCollection = $extraDataCollection;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * @param string $interest
     * @return Payment
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;
        return $this;
    }

}
