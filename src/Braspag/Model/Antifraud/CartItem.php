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

class CartItem extends AbstractModel
{

    /**
     * @var string
     */
    private $giftCategory;

    /**
     * @var string
     */
    private $hostHedge;

    /**
     * @var string
     */
    private $nonSensicalHedge;

    /**
     * @var string
     */
    private $obscenitiesHedge;

    /**
     * @var string
     */
    private $phoneHedge;

    /**
     * @var string
     */
    private $name;

    /**
     * @var double
     */
    private $quantity;

    /**
     * @var string
     */
    private $sku;

    /**
     * @var double
     */
    private $unitPrice;

    /**
     * @var string
     */
    private $risk;

    /**
     * @var string
     */
    private $timeHedge;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $velocityHedge;

    /**
     * @var Passenger
     */
    private $passenger;

    public function toArray()
    {
        return [
            'giftCategory' => $this->getGiftCategory(),
            'hostHedge' => $this->getHostHedge(),
            'nonSensicalHedge' => $this->getNonSensicalHedge(),
            'obscenitiesHedge' => $this->getObscenitiesHedge(),
            'phoneHedge' => $this->getPhoneHedge(),
            'name' => $this->getName(),
            'quantity' => $this->getQuantity(),
            'sku' => $this->getSku(),
            'unitPrice' => $this->getUnitPrice(),
            'risk' => $this->getRisk(),
            'timeHedge' => $this->getTimeHedge(),
            'type' => $this->getType(),
            'velocityHedge' => $this->getVelocityHedge(),
            'passenger' => ($this->getPassenger()) ? $this->getPassenger()->toArray() : null

        ];
    }

    /**
     * @return string
     */
    public function getGiftCategory()
    {
        return $this->giftCategory;
    }

    /**
     * @param string $giftCategory
     * @return CartItem
     */
    public function setGiftCategory($giftCategory)
    {
        $this->giftCategory = $giftCategory;
        return $this;
    }

    /**
     * @return string
     */
    public function getHostHedge()
    {
        return $this->hostHedge;
    }

    /**
     * @param string $hostHedge
     * @return CartItem
     */
    public function setHostHedge($hostHedge)
    {
        $this->hostHedge = $hostHedge;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getNonSensicalHedge()
    {
        return $this->nonSensicalHedge;
    }

    /**
     * @param boolean $nonSensicalHedge
     * @return CartItem
     */
    public function setNonSensicalHedge($nonSensicalHedge)
    {
        $this->nonSensicalHedge = $nonSensicalHedge;
        return $this;
    }

    /**
     * @return string
     */
    public function getObscenitiesHedge()
    {
        return $this->obscenitiesHedge;
    }

    /**
     * @param string $obscenitiesHedge
     * @return CartItem
     */
    public function setObscenitiesHedge($obscenitiesHedge)
    {
        $this->obscenitiesHedge = $obscenitiesHedge;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneHedge()
    {
        return $this->phoneHedge;
    }

    /**
     * @param string $phoneHedge
     * @return CartItem
     */
    public function setPhoneHedge($phoneHedge)
    {
        $this->phoneHedge = $phoneHedge;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CartItem
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     * @return CartItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return CartItem
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param float $unitPrice
     * @return CartItem
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @return string
     */
    public function getRisk()
    {
        return $this->risk;
    }

    /**
     * @param string $risk
     * @return CartItem
     */
    public function setRisk($risk)
    {
        $this->risk = $risk;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeHedge()
    {
        return $this->timeHedge;
    }

    /**
     * @param string $timeHedge
     * @return CartItem
     */
    public function setTimeHedge($timeHedge)
    {
        $this->timeHedge = $timeHedge;
        return $this;
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
     * @return CartItem
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getVelocityHedge()
    {
        return $this->velocityHedge;
    }

    /**
     * @param string $velocityHedge
     * @return CartItem
     */
    public function setVelocityHedge($velocityHedge)
    {
        $this->velocityHedge = $velocityHedge;
        return $this;
    }

    /**
     * @return Passenger
     */
    public function getPassenger()
    {
        return $this->passenger;
    }

    /**
     * @param Passenger $passenger
     * @return CartItem
     */
    public function setPassenger($passenger)
    {
        $this->passenger = $passenger;

        if (\is_object($passenger) && !($passenger instanceof Passenger)) {
            throw new \InvalidArgumentException('Item must be a Passenger object.');
        } else if (\is_array($passenger)) {
            $this->passenger = new Passenger($passenger);
        }
        return $this;
    }


}