<?php

namespace Braspag\Model;

class VoidResponse extends AbstractModel
{

    /**
     * @var string
     */
    public $status;

    /**
     * @var int
     */
    public $reasonCode;

    /**
     * @var string
     */
    public $reasonMessage;

    /**
     * @var array
     */
    public $links;

    public function toArray()
    {
        return [
            'status' => $this->getStatus(),
            'reasonCode' => $this->getReasonCode(),
            'reasonMessage' => $this->getReasonMessage(),
            'links' => $this->getLinks(true)
        ];
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
     * @return VoidResponse
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @param int $reasonCode
     * @return VoidResponse
     */
    public function setReasonCode($reasonCode)
    {
        $this->reasonCode = $reasonCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getReasonMessage()
    {
        return $this->reasonMessage;
    }

    /**
     * @param string $reasonMessage
     * @return VoidResponse
     */
    public function setReasonMessage($reasonMessage)
    {
        $this->reasonMessage = $reasonMessage;
        return $this;
    }

    /**
     * @return array
     */
    public function getLinks($asArray = false)
    {
        if ($asArray) {
            $links = [];
            foreach ($this->links as $link) {
                \array_push($links, $link->toArray());
            }
            return $links;
        }
        return $this->links;
    }

    /**
     * @param array $links
     * @return VoidResponse
     */
    public function setLinks($links)
    {
        $this->links = $this->parseLinks($links);
        return $this;
    }


}
