<?php

namespace Braspag\Model;

class Passenger extends AbstractModel
{

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $identity;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $rating;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $status;

    public function toArray()
    {
        return [
            'email' => $this->getEmail(),
            'identity' => $this->getIdentity(),
            'name' => $this->getName(),
            'rating' => $this->getRating(),
            'phone' => $this->getPhone(),
            'status' => $this->getStatus()
        ];
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
     * @return Passenger
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * @return Passenger
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;
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
     * @return Passenger
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     * @return Passenger
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Passenger
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
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
     * @return Passenger
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }


}