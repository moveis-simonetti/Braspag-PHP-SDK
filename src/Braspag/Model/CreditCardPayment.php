<?php

namespace Braspag\Model;

class CreditCardPayment extends Payment
{

    /**
     * @var double
     */
    protected $serviceTaxAmount;

    /**
     * @var int
     */
    protected $installments;

    /**
     * @var string
     */
    protected $interest;

    /**
     * @var boolean
     */
    protected $capture;

    /**
     * @var boolean
     */
    protected $authenticate;

    /**
     * @var boolean
     */
    protected $recurrent;

    /**
     * @var Card
     */
    protected $creditCard;

    /**
     * @var string
     */
    protected $softDescriptor;

    /**
     * @var string
     */
    protected $eci;

    public function toArray()
    {
        return \array_merge_recursive(parent::toArray(), [
            'serviceTaxAmount' => $this->getServiceTaxAmount(),
            'installments' => $this->getInstallments(),
            'interest' => $this->getInterest(),
            'capture' => $this->isCapture(),
            'authenticate' => $this->isAuthenticate(),
            'recurrent' => $this->isRecurrent(),
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
     * @return string
     */
    public function getInterest()
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
