<?php

namespace Braspag\Model;

class DebitCardPayment extends Payment
{
    /**
     * @var double
     */
    private $serviceTaxAmount;

    /**
     * @var string
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

    /**
     * @var string
     */
    private $interest;

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

    /**
     * @return string
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * @param string $interest
     * @return DebitCardPayment
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;
        return $this;
    }


}
