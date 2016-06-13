<?php

/**
 * Braspag PHP SDK
 *
 * @link https://github.com/JotJunior/BraspagPhpSdk for the canonical source repository
 * @copyright Copyright (c) 2016 JotJunior
 *
 * This file is part of Braspag-PHP-SDK.
 *
 * Braspag PHP SDK is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Braspag-PHP-SDK is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Braspag-PHP-SDK. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Braspag\Model\Antifraud;

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