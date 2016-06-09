<?php

namespace Braspag\Model;

class Link extends AbstractModel
{
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $rel;

    /**
     * @var string
     */
    private $href;

    public function toArray()
    {
        return [
            'method' => $this->getMethod(),
            'rel' => $this->getRel(),
            'href' => $this->getHref()
        ];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return Link
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getRel()
    {
        return $this->rel;
    }

    /**
     * @param string $rel
     * @return Link
     */
    public function setRel($rel)
    {
        $this->rel = $rel;
        return $this;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param string $href
     * @return Link
     */
    public function setHref($href)
    {
        $this->href = $href;
        return $this;
    }


}