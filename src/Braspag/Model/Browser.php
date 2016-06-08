<?php

namespace Braspag\Model;

class Browser extends AbstractModel
{

    /**
     * @var boolean
     */
    public $cookiesAccepted;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $hostName;

    /**
     * @var string
     */
    public $ipAddress;

    /**
     * @var string
     */
    public $type;

    /**
     * @return boolean
     */
    public function isCookiesAccepted()
    {
        return $this->cookiesAccepted;
    }

    /**
     * @param boolean $cookiesAccepted
     * @return Browser
     */
    public function setCookiesAccepted($cookiesAccepted)
    {
        $this->cookiesAccepted = $cookiesAccepted;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Browser
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getHostName()
    {
        return $this->hostName;
    }

    /**
     * @param string $hostName
     * @return Browser
     */
    public function setHostName($hostName)
    {
        $this->hostName = $hostName;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     * @return Browser
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
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
     * @return Browser
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }


}