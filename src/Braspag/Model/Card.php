<?php

namespace Braspag\Model;

class Card extends AbstractModel
{

    /**
     * @var string
     */
    private $cardNumber;

    /**
     * @var string
     */
    private $holder;

    /**
     * @var string
     */
    private $expirationDate;

    /**
     * @var string
     */
    private $securityCode;

    /**
     * @var boolean
     */
    private $saveCard;

    /**
     * @var string
     */
    private $cardToken;

    /**
     * @var string
     */
    private $cardAlias;

    /**
     * @var string
     */
    private $brand;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'cardNumber' => $this->getCardNumber(),
            'holder' => $this->getHolder(),
            'expirationDate' => $this->getExpirationDate(),
            'securityCode' => $this->getSecurityCode(),
            'saveCard' => $this->isSaveCard(),
            'cardToken' => $this->getCardToken(),
            'cardAlias' => $this->getCardAlias(),
            'brand' => $this->getBrand()

        ];
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     * @return Card
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param string $holder
     * @return Card
     */
    public function setHolder($holder)
    {
        $this->holder = $holder;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param string $expirationDate
     * @return Card
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * @param int $securityCode
     * @return Card
     */
    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSaveCard()
    {
        return $this->saveCard;
    }

    /**
     * @param boolean $saveCard
     * @return Card
     */
    public function setSaveCard($saveCard)
    {
        $this->saveCard = $saveCard;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardToken()
    {
        return $this->cardToken;
    }

    /**
     * @param string $cardToken
     * @return Card
     */
    public function setCardToken($cardToken)
    {
        $this->cardToken = $cardToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardAlias()
    {
        return $this->cardAlias;
    }

    /**
     * @param string $cardAlias
     * @return Card
     */
    public function setCardAlias($cardAlias)
    {
        $this->cardAlias = $cardAlias;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return Card
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }


}
