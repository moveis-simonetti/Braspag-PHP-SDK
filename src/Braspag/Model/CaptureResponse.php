<?php

namespace Braspag\Model;

class CaptureResponse extends AbstractModel
{

    /**
     * @var string
     */
    private $status;

    /**
     * @var int
     */
    private $reasonCode;

    /**
     * @var string
     */
    private $reasonMessage;

    /**
     * @var array
     */
    private $links;

    public function toArray()
    {
        return [
            'status' => $this->getStatus(),
            'reasonCode' => $this->getReasonCode(),
            'reasonMessage' => $this->getReasonMessage(),
            'links' => $this->getLinks()
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
     * @return CaptureResponse
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
     * @return CaptureResponse
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
     * @return CaptureResponse
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
     * @return CaptureResponse
     */
    public function setLinks($links)
    {
        $this->links = $this->parseLinks($links);
        return $this;
    }


}
