<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    19/01/2017
 * Time:    15:31
 * File:    BankwireDirectPayIn.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;

class BankwireDirectPayIn
{
    private $tag;

    private $authorId;

    private $creditedWalletId;

    private $creditedUserId;

    private $declaredDebitedFundsCurrency;

    private $declaredDebitedFundsAmount;

    private $declaredFeesCurrency;

    private $declaredFeesAmount;

    private $status;

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
    public function getCreditedWalletId()
    {
        return $this->creditedWalletId;
    }

    /**
     * @param mixed $creditedWalletId
     */
    public function setCreditedWalletId($creditedWalletId)
    {
        $this->creditedWalletId = $creditedWalletId;
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
    public function getDeclaredDebitedFundsCurrency()
    {
        return $this->declaredDebitedFundsCurrency;
    }

    /**
     * @param mixed $declaredDebitedFundsCurrency
     */
    public function setDeclaredDebitedFundsCurrency($declaredDebitedFundsCurrency)
    {
        $this->declaredDebitedFundsCurrency = $declaredDebitedFundsCurrency;
    }

    /**
     * @return mixed
     */
    public function getDeclaredDebitedFundsAmount()
    {
        return $this->declaredDebitedFundsAmount;
    }

    /**
     * @param mixed $declaredDebitedFundsAmount
     */
    public function setDeclaredDebitedFundsAmount($declaredDebitedFundsAmount)
    {
        $this->declaredDebitedFundsAmount = $declaredDebitedFundsAmount;
    }

    /**
     * @return mixed
     */
    public function getDeclaredFeesCurrency()
    {
        return $this->declaredFeesCurrency;
    }

    /**
     * @param mixed $declaredFeesCurrency
     */
    public function setDeclaredFeesCurrency($declaredFeesCurrency)
    {
        $this->declaredFeesCurrency = $declaredFeesCurrency;
    }

    /**
     * @return mixed
     */
    public function getDeclaredFeesAmount()
    {
        return $this->declaredFeesAmount;
    }

    /**
     * @param mixed $declaredFeesAmount
     */
    public function setDeclaredFeesAmount($declaredFeesAmount)
    {
        $this->declaredFeesAmount = $declaredFeesAmount;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
