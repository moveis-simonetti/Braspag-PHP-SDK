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

class Cart extends AbstractModel
{

    /**
     * @var bool
     */
    private $isGift;

    /**
     * @var bool
     */
    private $returnsAccepted;

    /**
     * @var array
     */
    private $items;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'isGift' => $this->isGift(),
            'returnsAccepted' => $this->isReturnsAccepted(),
            'items' => $this->getItems(true)
        ];
    }

    /**
     * @return boolean
     */
    public function isGift()
    {
        return $this->isGift;
    }

    /**
     * @param boolean $isGift
     * @return Cart
     */
    public function setIsGift($isGift)
    {
        $this->isGift = $isGift;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isReturnsAccepted()
    {
        return $this->returnsAccepted;
    }

    /**
     * @param boolean $returnsAccepted
     * @return Cart
     */
    public function setReturnsAccepted($returnsAccepted)
    {
        $this->returnsAccepted = $returnsAccepted;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems($asArray = false)
    {
        if ($asArray) {
            $items = [];
            foreach ($this->items as $item) {
                \array_push($items, $item->toArray());
            }
            return $items;
        }
        return $this->items;
    }

    /**
     * @param array $items
     * @return Cart
     */
    public function setItems($items)
    {
        $this->items = [];
        foreach ($items as $item) {

            if (\is_object($item) && !($item instanceof CartItem)) {
                throw new \InvalidArgumentException('Item must be a CartItem object.');
            } else if (!\is_object($item)) {
                $item = new CartItem($item);
            }

            \array_push($this->items, $item);
        }
        return $this;
    }


}