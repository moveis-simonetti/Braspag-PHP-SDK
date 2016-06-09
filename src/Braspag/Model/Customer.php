<?php

namespace Braspag\Model;

class Customer extends AbstractModel
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $identity;

    /**
     * @var string
     */
    private $identityType;

    /**
     * @var string
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $birthDate;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var Address
     */
    private $deliveryAddress;

    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'identity' => $this->getIdentity(),
            'identityType' => $this->getIdentityType(),
            'email' => $this->getEmail(),
            'birthDate' => ($this->getBirthDate()) ? $this->getBirthDate()->format('Y-m-d') : null,
            'address' => $this->getAddress()->toArray(),
            'deliveryAddress' => $this->getDeliveryAddress()->toArray()
        ];
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
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param string $identity
     * @return Customer
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentityType()
    {
        return $this->identityType;
    }

    /**
     * @param string $identityType
     * @return Customer
     */
    public function setIdentityType($identityType)
    {
        $this->identityType = $identityType;
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
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     * @return Customer
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = ($birthDate) ? new \DateTime($birthDate) : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Customer
     */
    public function setAddress($address)
    {
        $this->address = $address;

        if (\is_object($address) && !($address instanceof Address)) {
            throw new \InvalidArgumentException('Item must be an Address object.');
        } else if (\is_array($address)) {
            $this->address = new Address($address);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param Address $deliveryAddress
     * @return Customer
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;

        if (\is_object($deliveryAddress) && !($deliveryAddress instanceof Address)) {
            throw new \InvalidArgumentException('Item must be an DeliveryAddress object.');
        } else if (\is_array($deliveryAddress)) {
            $this->deliveryAddress = new Address($deliveryAddress);
        }
        return $this;
    }


}
