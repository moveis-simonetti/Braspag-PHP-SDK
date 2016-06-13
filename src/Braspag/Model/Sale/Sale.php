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

namespace Braspag\Model\Sale;

use Braspag\Model\AbstractModel;
use Braspag\Model\Customer\Customer;
use Braspag\Model\Payment\Payment;

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
            'messages' => $this->getMessages(true),
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
            $class = 'Braspag\\Model\\Payment\\' . array_change_key_case($payment, CASE_LOWER)['type'] . 'Payment';
            $this->payment = new $class($payment);
        }
        return $this;
    }

    public function isValid()
    {
        if ($this->getPayment()->getReasonCode() != 0) {
            $this->addMessage([
                'code' => $this->getPayment()->getReasonCode(),
                'message' => $this->getReason($this->getPayment()->getReasonCode())
            ]);
        }

        return parent::isValid();
    }

}
