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
     * @var int
     */
    private $providerReturnCode;

    /**
     * @var string
     */
    private $providerReturnMessage;

    /**
     * @var array
     */
    private $links;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'status' => $this->getStatus(),
            'reasonCode' => $this->getReasonCode(),
            'reasonMessage' => $this->getReasonMessage(),
            'providerReturnCode' => $this->getProviderReturnCode(),
            'providerReturnMessage' => $this->getProviderReturnMessage(),
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
     * @return int
     */
    public function getProviderReturnCode()
    {
        return $this->providerReturnCode;
    }

    /**
     * @param int $providerReturnCode
     * @return CaptureResponse
     */
    public function setProviderReturnCode($providerReturnCode)
    {
        $this->providerReturnCode = $providerReturnCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderReturnMessage()
    {
        return $this->providerReturnMessage;
    }

    /**
     * @param string $providerReturnMessage
     * @return CaptureResponse
     */
    public function setProviderReturnMessage($providerReturnMessage)
    {
        $this->providerReturnMessage = $providerReturnMessage;
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
