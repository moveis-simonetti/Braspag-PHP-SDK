<?php

namespace Braspag\Model;

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
    private $interest;

    /**
     * @var boolean
     */
    private $capture;

    /**
     * @var boolean
     */
    private $authenticate;

    /**
     * @var boolean
     */
    private $recurrent;

    /**
     * @var string
     */
    private $creditCard;

    /**
     * @var string
     */
    private $authenticationUrl;

    /**
     * @var string
     */
    private $authorizationCode;

    /**
     * @var string
     */
    private $proofOfSale;

    /**
     * @var string
     */
    private $acquirerTransactionId;

    /**
     * @var string
     */
    private $softDescriptor;

    /**
     * @var string
     */
    private $eci;

    /**
     * @var FraudAnalysis
     */
    private $fraudAnalysis;

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
    public function isInterest()
    {
        return $this->interest;
    }

    /**
     * @param boolean $interest
     * @return CreditCardPayment
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;
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
     * @return boolean
     */
    public function isRecurrent()
    {
        return $this->recurrent;
    }

    /**
     * @param boolean $recurrent
     * @return CreditCardPayment
     */
    public function setRecurrent($recurrent)
    {
        $this->recurrent = $recurrent;
        return $this;
    }

    /**
     * @return string
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
     * @return CreditCardPayment
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
     * @return CreditCardPayment
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
     * @return CreditCardPayment
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
     * @return CreditCardPayment
     */
    public function setAcquirerTransactionId($acquirerTransactionId)
    {
        $this->acquirerTransactionId = $acquirerTransactionId;
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
