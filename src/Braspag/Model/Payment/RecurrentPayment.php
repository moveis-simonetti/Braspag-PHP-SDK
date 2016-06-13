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

namespace Braspag\Model\Payment;

use Braspag\Model\AbstractModel;

class RecurrentPayment extends AbstractModel
{

    /**
     * @var string
     */
    private $recurrentPaymentId;

    /**
     * @var int
     */
    private $reasonCode;

    /**
     * @var string
     */
    private $reasonMessage;

    /**
     * @var \DateTime
     */
    private $nextRecurrency;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var int
     */
    private $interval;

    /**
     * @var array
     */
    private $links;

    /**
     * @var boolean
     */
    private $authorizeNow;

    public function toArray()
    {
        return [
            'recurrentPaymentId' => $this->getRecurrentPaymentId(),
            'reasonCode' => $this->getReasonCode(),
            'reasonMessage' => $this->getReasonMessage(),
            'nextRecurrency' => ($this->getNextRecurrency()) ? $this->getNextRecurrency()->format('Y-m-d') : null,
            'startDate' => ($this->getStartDate()) ? $this->getStartDate()->format('Y-m-d') : null,
            'endDate' => ($this->getEndDate()) ? $this->getEndDate()->format('Y-m-d') : null,
            'interval' => $this->getInterval(),
            'link' => $this->getLinks(true)
        ];
    }

    /**
     * @return string
     */
    public function getRecurrentPaymentId()
    {
        return $this->recurrentPaymentId;
    }

    /**
     * @param string $recurrentPaymentId
     * @return RecurrentPayment
     */
    public function setRecurrentPaymentId($recurrentPaymentId)
    {
        $this->recurrentPaymentId = $recurrentPaymentId;
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
     * @return RecurrentPayment
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
     * @return RecurrentPayment
     */
    public function setReasonMessage($reasonMessage)
    {
        $this->reasonMessage = $reasonMessage;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getNextRecurrency()
    {
        return $this->nextRecurrency;
    }

    /**
     * @param \DateTime $nextRecurrency
     * @return RecurrentPayment
     */
    public function setNextRecurrency($nextRecurrency)
    {
        $this->nextRecurrency = ($nextRecurrency) ? new \DateTime($nextRecurrency) : null;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     * @return RecurrentPayment
     */
    public function setStartDate($startDate)
    {
        $this->startDate = ($startDate) ? new \DateTime($startDate) : null;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     * @return RecurrentPayment
     */
    public function setEndDate($endDate)
    {
        $this->endDate = ($endDate) ? new \DateTime($endDate) : null;
        return $this;
    }

    /**
     * @return int
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @param int $interval
     * @return RecurrentPayment
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;
        return $this;
    }

    /**
     * @return array
     */
    public function getLinks($asArray = false)
    {
        if ($asArray && \is_array($this->links)) {
            $links = [];
            foreach ($this->links as $link) {
                $link = ($link instanceof Link) ? $link->toArray() : $link;
                \array_push($links, $link);
            }

            return $links;
        }
        return $this->links;
    }

    /**
     * @param array $links
     * @return Payment
     */
    public function setLinks($links)
    {
        $this->links = $this->parseLinks($links);
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAuthorizeNow()
    {
        return $this->authorizeNow;
    }

    /**
     * @param boolean $authorizeNow
     * @return RecurrentPayment
     */
    public function setAuthorizeNow($authorizeNow)
    {
        $this->authorizeNow = $authorizeNow;
        return $this;
    }


}
