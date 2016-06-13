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

class FraudAnalysisReplyData
{

    /**
     * @var int
     */
    private $addressInfoCode;

    /**
     * @var int
     */
    private $factorCode;

    /**
     * @var double
     */
    private $score;

    /**
     * @var string
     */
    private $binCountry;

    /**
     * @var string
     */
    private $cardIssuer;

    /**
     * @var string
     */
    private $cardScheme;

    /**
     * @var string
     */
    private $hostSeverity;

    /**
     * @var int
     */
    private $internetInfoCode;

    /**
     * @var string
     */
    private $ipRoutingMethod;

    /**
     * @var string
     */
    private $scoreModelUsed;

    /**
     * @var string
     */
    private $casePriority;

    public function toArray()
    {
        return [
            'addressInfoCode' => $this->getAddressInfoCode(),
            'factorCode' => $this->getFactorCode(),
            'score' => $this->getScore(),
            'binCountry' => $this->getBinCountry(),
            'cardIssuer' => $this->getCardIssuer(),
            'cardScheme' => $this->getCardScheme(),
            'hostServerity' => $this->getHostSeverity(),
            'internetInfoCode' => $this->getInternetInfoCode(),
            'ipRoutingMethod' => $this->getIpRoutingMethod(),
            'scoreModelUsed' => $this->getScoreModelUsed(),
            'casePriority' => $this->getCasePriority()

        ];
    }

    /**
     * FraudAnalysisReplyData constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        Hydrator::hydrate($this, $options);
    }

    /**
     * @return int
     */
    public function getAddressInfoCode()
    {
        return $this->addressInfoCode;
    }

    /**
     * @param int $addressInfoCode
     * @return FraudAnalysisReplyData
     */
    public function setAddressInfoCode($addressInfoCode)
    {
        $this->addressInfoCode = $addressInfoCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getFactorCode()
    {
        return $this->factorCode;
    }

    /**
     * @param int $factorCode
     * @return FraudAnalysisReplyData
     */
    public function setFactorCode($factorCode)
    {
        $this->factorCode = $factorCode;
        return $this;
    }

    /**
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param float $score
     * @return FraudAnalysisReplyData
     */
    public function setScore($score)
    {
        $this->score = $score;
        return $this;
    }

    /**
     * @return string
     */
    public function getBinCountry()
    {
        return $this->binCountry;
    }

    /**
     * @param string $binCountry
     * @return FraudAnalysisReplyData
     */
    public function setBinCountry($binCountry)
    {
        $this->binCountry = $binCountry;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardIssuer()
    {
        return $this->cardIssuer;
    }

    /**
     * @param string $cardIssuer
     * @return FraudAnalysisReplyData
     */
    public function setCardIssuer($cardIssuer)
    {
        $this->cardIssuer = $cardIssuer;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardScheme()
    {
        return $this->cardScheme;
    }

    /**
     * @param string $cardScheme
     * @return FraudAnalysisReplyData
     */
    public function setCardScheme($cardScheme)
    {
        $this->cardScheme = $cardScheme;
        return $this;
    }

    /**
     * @return string
     */
    public function getHostSeverity()
    {
        return $this->hostSeverity;
    }

    /**
     * @param string $hostSeverity
     * @return FraudAnalysisReplyData
     */
    public function setHostSeverity($hostSeverity)
    {
        $this->hostSeverity = $hostSeverity;
        return $this;
    }

    /**
     * @return int
     */
    public function getInternetInfoCode()
    {
        return $this->internetInfoCode;
    }

    /**
     * @param int $internetInfoCode
     * @return FraudAnalysisReplyData
     */
    public function setInternetInfoCode($internetInfoCode)
    {
        $this->internetInfoCode = $internetInfoCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpRoutingMethod()
    {
        return $this->ipRoutingMethod;
    }

    /**
     * @param string $ipRoutingMethod
     * @return FraudAnalysisReplyData
     */
    public function setIpRoutingMethod($ipRoutingMethod)
    {
        $this->ipRoutingMethod = $ipRoutingMethod;
        return $this;
    }

    /**
     * @return string
     */
    public function getScoreModelUsed()
    {
        return $this->scoreModelUsed;
    }

    /**
     * @param string $scoreModelUsed
     * @return FraudAnalysisReplyData
     */
    public function setScoreModelUsed($scoreModelUsed)
    {
        $this->scoreModelUsed = $scoreModelUsed;
        return $this;
    }

    /**
     * @return string
     */
    public function getCasePriority()
    {
        return $this->casePriority;
    }

    /**
     * @param string $casePriority
     * @return FraudAnalysisReplyData
     */
    public function setCasePriority($casePriority)
    {
        $this->casePriority = $casePriority;
        return $this;
    }


}
