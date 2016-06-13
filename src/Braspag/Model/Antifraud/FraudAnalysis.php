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

namespace Braspag\Model\Antifraud;

use Braspag\Model\AbstractModel;
use Braspag\Model\Payment\ExtraData;

class FraudAnalysis extends AbstractModel
{

    /**
     * @var string
     */
    private $sequence;

    /**
     * @var string
     */
    private $sequenceCriteria;

    /**
     * @var string
     */
    private $fingerPrintId;

    /**
     * @var boolean
     */
    private $captureOnLowRisk;

    /**
     * @var boolean
     */
    private $voidOnHighRisk;

    /**
     * @var string
     */
    private $status;

    /**
     * @var Browser
     */
    private $browser;

    /**
     * @var Cart
     */
    private $cart;

    /**
     * @var array
     */
    private $merchantDefinedFields;

    /**
     * @var Shipping
     */
    private $shipping;

    /**
     * @var Travel
     */
    private $travel;

    /**
     * @var FraudAnalysisReplyData
     */
    private $replyData;

    public function toArray()
    {
        return [
            'sequence' => $this->getSequence(),
            'sequenceCriteria' => $this->getSequenceCriteria(),
            'fingerPrintId' => $this->getFingerPrintId(),
            'captureOnLowRisk' => $this->isCaptureOnLowRisk(),
            'voidOnHighRisk' => $this->isVoidOnHighRisk(),
            'status' => $this->getStatus(),
            'browser' => $this->getBrowser()->toArray(),
            'cart' => $this->getCart()->toArray(),
            'replyData' => ($this->getReplyData()) ? $this->getReplyData()->toArray() : null,
        ];
    }

    /**
     * @return string
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @param string $sequence
     * @return FraudAnalysis
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
        return $this;
    }

    /**
     * @return string
     */
    public function getSequenceCriteria()
    {
        return $this->sequenceCriteria;
    }

    /**
     * @param string $sequenceCriteria
     * @return FraudAnalysis
     */
    public function setSequenceCriteria($sequenceCriteria)
    {
        $this->sequenceCriteria = $sequenceCriteria;
        return $this;
    }

    /**
     * @return string
     */
    public function getFingerPrintId()
    {
        return $this->fingerPrintId;
    }

    /**
     * @param string $fingerPrintId
     * @return FraudAnalysis
     */
    public function setFingerPrintId($fingerPrintId)
    {
        $this->fingerPrintId = $fingerPrintId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCaptureOnLowRisk()
    {
        return $this->captureOnLowRisk;
    }

    /**
     * @param boolean $captureOnLowRisk
     * @return FraudAnalysis
     */
    public function setCaptureOnLowRisk($captureOnLowRisk)
    {
        $this->captureOnLowRisk = $captureOnLowRisk;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isVoidOnHighRisk()
    {
        return $this->voidOnHighRisk;
    }

    /**
     * @param boolean $voidOnHighRisk
     * @return FraudAnalysis
     */
    public function setVoidOnHighRisk($voidOnHighRisk)
    {
        $this->voidOnHighRisk = $voidOnHighRisk;
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
     * @return FraudAnalysis
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Browser
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * @param Browser $browser
     * @return FraudAnalysis
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;

        if (\is_object($browser) && !($browser instanceof Browser)) {
            throw new \InvalidArgumentException('Item must be a Browser object.');
        } else if (\is_array($browser)) {
            $this->browser = new Browser($browser);
        }
        return $this;
    }

    /**
     * @return Cart
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param Cart $cart
     * @return FraudAnalysis
     */
    public function setCart($cart)
    {
        $this->cart = $cart;

        if (\is_object($cart) && !($cart instanceof Cart)) {
            throw new \InvalidArgumentException('Item must be a Cart object.');
        } else if (\is_array($cart)) {
            $this->cart = new Cart($cart);
        }
        return $this;
    }

    /**
     * @return Shipping
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param Shipping $shipping
     * @return FraudAnalysis
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

        if (\is_object($shipping) && !($shipping instanceof Shipping)) {
            throw new \InvalidArgumentException('Item must be a Shipping object.');
        } else if (\is_array($shipping)) {
            $this->shipping = new Shipping($shipping);
        }
        return $this;
    }

    /**
     * @return Travel
     */
    public function getTravel()
    {
        return $this->travel;
    }

    /**
     * @param Travel $travel
     * @return FraudAnalysis
     */
    public function setTravel($travel)
    {
        $this->travel = $travel;

        if (\is_object($travel) && !($travel instanceof Travel)) {
            throw new \InvalidArgumentException('Item must be a Travel object.');
        } else if (\is_array($travel)) {
            $this->travel = new Travel($travel);
        }
        return $this;
    }

    /**
     * @return FraudAnalysisReplyData
     */
    public function getReplyData()
    {
        return $this->replyData;
    }

    /**
     * @param $replyData
     * @return FraudAnalysis
     */
    public function setReplyData($replyData)
    {
        $this->replyData = $replyData;

        if (\is_object($replyData) && !($replyData instanceof FraudAnalysisReplyData)) {
            throw new \InvalidArgumentException('Item must be a FraudAnalysisReplyData object.');
        } else if (\is_array($replyData)) {
            $this->replyData = new FraudAnalysisReplyData($replyData);
        }
        return $this;
    }

    public function addMerchantDefinedFields($extraData)
    {
        if (\is_object($extraData) && ($extraData instanceof ExtraData)) {
            \array_push($this->merchantDefinedFields, $extraData);
        } else if (!($extraData instanceof ExtraData)) {
            throw new \InvalidArgumentException('Item must be a ExtraData object.');
        } else {
            \array_push($this->merchantDefinedFields, new ExtraData($extraData));
        }
    }

    /**
     * @return array
     */
    public function getMerchantDefinedFields()
    {
        return $this->merchantDefinedFields;
    }

    /**
     * @param $merchantDefinedFields
     * @return FraudAnalysis
     */
    public function setMerchantDefinedFields($merchantDefinedFields)
    {
        $this->merchantDefinedFields = $merchantDefinedFields;

        if (\is_object($merchantDefinedFields) && !($merchantDefinedFields instanceof ExtraData)) {
            throw new \InvalidArgumentException('Item must be a ExtraData object.');
        } else if (\is_array($merchantDefinedFields)) {
            $this->merchantDefinedFields = new ExtraData($merchantDefinedFields);
        }
        return $this;
    }

}