<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    06/12/2016
 * Time:    22:37
 * File:    Transfer.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;

class Transfer
{
    protected $tag;

    protected $authorId;

    protected $creditedUserId;

    protected $debitedCurrency;

    protected $debitedAmount;

    protected $feeCurrency;

    protected $feeAmount;

    protected $debitedWalledId;

    protected $creditedWalledId;

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param mixed $authorId
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    /**
     * @return mixed
     */
    public function getCreditedUserId()
    {
        return $this->creditedUserId;
    }

    /**
     * @param mixed $creditedUserId
     */
    public function setCreditedUserId($creditedUserId)
    {
        $this->creditedUserId = $creditedUserId;
    }

    /**
     * @return mixed
     */
    public function getDebitedCurrency()
    {
        return $this->debitedCurrency;
    }

    /**
     * @param mixed $debitedCurrency
     */
    public function setDebitedCurrency($debitedCurrency)
    {
        $this->debitedCurrency = $debitedCurrency;
    }

    /**
     * @return mixed
     */
    public function getDebitedAmount()
    {
        return $this->debitedAmount;
    }

    /**
     * @param mixed $debitedAmount
     */
    public function setDebitedAmount($debitedAmount)
    {
        $this->debitedAmount = $debitedAmount;
    }

    /**
     * @return mixed
     */
    public function getFeeCurrency()
    {
        return $this->feeCurrency;
    }

    /**
     * @param mixed $feeCurrency
     */
    public function setFeeCurrency($feeCurrency)
    {
        $this->feeCurrency = $feeCurrency;
    }

    /**
     * @return mixed
     */
    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    /**
     * @param mixed $feeAmount
     */
    public function setFeeAmount($feeAmount)
    {
        $this->feeAmount = $feeAmount;
    }

    /**
     * @return mixed
     */
    public function getDebitedWalledId()
    {
        return $this->debitedWalledId;
    }

    /**
     * @param mixed $debitedWalledId
     */
    public function setDebitedWalledId($debitedWalledId)
    {
        $this->debitedWalledId = $debitedWalledId;
    }

    /**
     * @return mixed
     */
    public function getCreditedWalledId()
    {
        return $this->creditedWalledId;
    }

    /**
     * @param mixed $creditedWalledId
     */
    public function setCreditedWalledId($creditedWalledId)
    {
        $this->creditedWalledId = $creditedWalledId;
    }
}
