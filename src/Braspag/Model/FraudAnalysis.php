<?php

namespace Braspag\Model;

class FraudAnalysis extends AbstractModel
{

    /**
     * @var string
     */
    public $sequence;

    /**
     * @var string
     */
    public $sequenceCriteria;

    /**
     * @var string
     */
    public $fingerPrintId;

    /**
     * @var boolean
     */
    public $captureOnLowRisk;

    /**
     * @var boolean
     */
    public $voidOnHighRisk;

    /**
     * @var string
     */
    public $status;

    /**
     * @var Browser
     */
    public $browser;

    /**
     * @var Cart
     */
    public $cart;


    /**
     * @var FraudAnalysisReplyData
     */
    public $replyData;

    /**
     * @return string
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @param string $sequence
     * @return FraudAnalysis
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
        return $this;
    }

    /**
     * @return string
     */
    public function getSequenceCriteria()
    {
        return $this->sequenceCriteria;
    }

    /**
     * @param string $sequenceCriteria
     * @return FraudAnalysis
     */
    public function setSequenceCriteria($sequenceCriteria)
    {
        $this->sequenceCriteria = $sequenceCriteria;
        return $this;
    }

    /**
     * @return string
     */
    public function getFingerPrintId()
    {
        return $this->fingerPrintId;
    }

    /**
     * @param string $fingerPrintId
     * @return FraudAnalysis
     */
    public function setFingerPrintId($fingerPrintId)
    {
        $this->fingerPrintId = $fingerPrintId;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCaptureOnLowRisk()
    {
        return $this->captureOnLowRisk;
    }

    /**
     * @param boolean $captureOnLowRisk
     * @return FraudAnalysis
     */
    public function setCaptureOnLowRisk($captureOnLowRisk)
    {
        $this->captureOnLowRisk = $captureOnLowRisk;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isVoidOnHighRisk()
    {
        return $this->voidOnHighRisk;
    }

    /**
     * @param boolean $voidOnHighRisk
     * @return FraudAnalysis
     */
    public function setVoidOnHighRisk($voidOnHighRisk)
    {
        $this->voidOnHighRisk = $voidOnHighRisk;
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
     * @return FraudAnalysis
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Browser
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * @param Browser $browser
     * @return FraudAnalysis
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;

        if (\is_object($browser) && !($browser instanceof Browser)) {
            throw new \InvalidArgumentException('Item must be a Browser object.');
        } else if (\is_array($browser)) {
            $this->browser = new Browser($browser);
        }
        return $this;
    }

    /**
     * @return Cart
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param Cart $cart
     * @return FraudAnalysis
     */
    public function setCart($cart)
    {
        $this->cart = $cart;

        if (\is_object($cart) && !($cart instanceof Cart)) {
            throw new \InvalidArgumentException('Item must be a Cart object.');
        } else if (\is_array($cart)) {
            $this->cart = new Cart($cart);
        }
        return $this;
    }

    /**
     * @return FraudAnalysisReplyData
     */
    public function getReplyData()
    {
        return $this->replyData;
    }

    /**
     * @param FraudAnalysisReplyData $replyData
     * @return FraudAnalysis
     */
    public function setReplyData($replyData)
    {
        $this->replyData = $replyData;

        if (\is_object($replyData) && !($replyData instanceof FraudAnalysisReplyData)) {
            throw new \InvalidArgumentException('Item must be a FraudAnalysisReplyData object.');
        } else if (\is_array($replyData)) {
            $this->replyData = new FraudAnalysisReplyData($replyData);
        }
        return $this;
    }


}