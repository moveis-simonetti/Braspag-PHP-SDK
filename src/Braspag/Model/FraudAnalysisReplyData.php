<?php

namespace Braspag\Model;

class FraudAnalysisReplyData extends AbstractModel
{

    /**
     * @var int
     */
    public $addressInfoCode;

    /**
     * @var int
     */
    public $factorCode;

    /**
     * @var double
     */
    public $score;

    /**
     * @var string
     */
    public $binCountry;

    /**
     * @var string
     */
    public $cardIssuer;

    /**
     * @var string
     */
    public $cardScheme;

    /**
     * @var string
     */
    public $hostSeverity;

    /**
     * @var int
     */
    public $internetInfoCode;

    /**
     * @var string
     */
    public $ipRoutingMethod;

    /**
     * @var string
     */
    public $scoreModelUsed;

    /**
     * @var string
     */
    public $casePriority;

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
