<?php

namespace Braspag\Model;

class Cart extends AbstractModel
{

    /**
     * @var bool
     */
    private $gift;

    /**
     * @var bool
     */
    private $returnsAccepted;

    /**
     * @var array
     */
    private $items;

    public function toArray()
    {
        return [
            'gift' => $this->isGift(),
            'returnsAccepted' => $this->isReturnsAccepted(),
            'items' => $this->getItems()
        ];
    }

    /**
     * @return boolean
     */
    public function isGift()
    {
        return $this->gift;
    }

    /**
     * @param boolean $gift
     * @return Cart
     */
    public function setGift($gift)
    {
        $this->gift = $gift;
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