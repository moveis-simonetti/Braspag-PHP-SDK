<?php

namespace Braspag\Model;

use Braspag\Lib\Hydrator;

class Travel
{

    /**
     * @var \DateTime
     */
    private $departureTime;

    /**
     * @var string
     */
    private $journeyType;

    /**
     * @var string
     */
    private $route;

    /**
     * @var array
     */
    private $legs;

    public function toArray()
    {
        return [
            'departureTime' => ($this->getDepartureTime()) ? $this->getDepartureTime()->format('Y-m-d') : null,
            'journeyType' => $this->getJourneyType(),
            'legs' => $this->getLegs()
        ];
    }

    public function __construct($options = [])
    {
        Hydrator::hydrate($this, $options);
    }

    /**
     * @return \DateTime
     */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    /**
     * @param \DateTime $departureTime
     * @return Travel
     */
    public function setDepartureTime($departureTime)
    {
        $this->departureTime = $departureTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getJourneyType()
    {
        return $this->journeyType;
    }

    /**
     * @param string $journeyType
     * @return Travel
     */
    public function setJourneyType($journeyType)
    {
        $this->journeyType = $journeyType;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param string $route
     * @return Travel
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return array
     */
    public function getLegs($asArray = false)
    {
        if ($asArray) {
            $legs = [];
            foreach ($this->legs as $leg) {
                \array_push($legs, $leg->toArray());
            }
            return $legs;
        }
        return $this->legs;
    }

    /**
     * @param array $legs
     * @return Cart
     */
    public function setLegs($legs)
    {
        $this->legs = [];
        foreach ($legs as $leg) {

            if (\is_object($leg) && !($leg instanceof Leg)) {
                throw new \InvalidArgumentException('Leg must be a Leg object.');
            } else if (!\is_object($leg)) {
                $leg = new Leg($leg);
            }

            \array_push($this->legs, $leg);
        }
        return $this;
    }


}