<?php

namespace Braspag\Model;

class CaptureRequest extends AbstractModel
{

    /**
     * @var double
     */
    private $amount;

    /**
     * @var double
     */
    private $serviceTaxAmount;

    public function toArray()
    {
        return [
            'amount' => $this->getAmount(),
            'serviceTaxAmount' => $this->getServiceTaxAmount()
        ];
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
     * @return CaptureRequest
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
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
     * @return CaptureRequest
     */
    public function setServiceTaxAmount($serviceTaxAmount)
    {
        $this->serviceTaxAmount = $serviceTaxAmount;
        return $this;
    }


}
