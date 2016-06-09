<?php

namespace Braspag\Model;

class CaptureRequest extends AbstractModel
{

    /**
     * @var int
     */
    private $amount;

    /**
     * @var int
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
     * @param int $amount
     * @return CaptureRequest
     */
    public function setAmount($amount)
    {
        $this->amount = (int)\number_format($amount, 2, '', '');
        return $this;
    }

    /**
     * @return int
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
        $this->serviceTaxAmount = (int)\number_format($serviceTaxAmount, 2, '', '');
        return $this;
    }


}
