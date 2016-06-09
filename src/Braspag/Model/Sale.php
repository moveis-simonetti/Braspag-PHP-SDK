<?php

namespace Braspag\Model;

class Sale extends AbstractModel
{

    /**
     * @var string
     */
    private $merchantOrderId;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var Payment
     */
    private $payment;

    public function toArray()
    {
        return [
            'merchantOrderId' => $this->getMerchantOrderId(),
            'customer' => $this->getCustomer()->toArray(),
            'payment' => $this->getPayment()->toArray(),
        ];
    }

    /**
     * @return string
     */
    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    /**
     * @param string $merchantOrderId
     * @return Sale
     */
    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return Sale
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        if (\is_object($customer) && !($customer instanceof Customer)) {
            throw new \InvalidArgumentException('Item must be a Customer object.');
        } else if (\is_array($customer)) {
            $this->customer = new Customer($customer);
        }
        return $this;
    }

    /**
     * @return Payment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     * @return Sale
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;

        if (\is_object($payment) && !($payment instanceof Payment)) {
            throw new \InvalidArgumentException('Item must be a Payment object.');
        } else if (\is_array($payment)) {
            $class = __NAMESPACE__ . '\\' . array_change_key_case($payment, CASE_LOWER)['type'] . 'Payment';
            $this->payment = new $class($payment);
        }
        return $this;
    }


}
