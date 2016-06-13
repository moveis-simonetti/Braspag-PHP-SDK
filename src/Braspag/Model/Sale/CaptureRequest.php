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

use Braspag\Lib\Hydrator;

class CaptureRequest
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

    public function __construct($options = [])
    {
        Hydrator::hydrate($this, $options);
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
