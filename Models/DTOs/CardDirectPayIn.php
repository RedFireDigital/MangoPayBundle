<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    19/01/2017
 * Time:    12:21
 * File:    CardDirectPayIn.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;

class CardDirectPayIn
{
    private $tag;

    private $authorId;

    private $creditedUserId;

    private $creditedWalletId;

    private $debitedFunds;

    private $fees;

    private $feesCurrency;

    private $secureModeReturnUrl;

    private $cardId;

    private $secureMode;

    private $secureModeNeeded;

    private $secureModeRedirectUrl;

    private $statementDescriptor;

    private $amount;

    private $currency;

    private $cardType;

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
    public function getDebitedFunds()
    {
        return $this->debitedFunds;
    }

    /**
     * @param mixed $debitedFunds
     */
    public function setDebitedFunds($debitedFunds)
    {
        $this->debitedFunds = $debitedFunds;
    }

    /**
     * @return mixed
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * @param mixed $fees
     */
    public function setFees($fees)
    {
        $this->fees = $fees;
    }

    /**
     * @return mixed
     */
    public function getFeesCurrency()
    {
        return $this->feesCurrency;
    }

    /**
     * @param mixed $feesCurrency
     */
    public function setFeesCurrency($feesCurrency)
    {
        $this->feesCurrency = $feesCurrency;
    }

    /**
     * @return mixed
     */
    public function getSecureModeReturnUrl()
    {
        return $this->secureModeReturnUrl;
    }

    /**
     * @param mixed $secureModeReturnUrl
     */
    public function setSecureModeReturnUrl($secureModeReturnUrl)
    {
        $this->secureModeReturnUrl = $secureModeReturnUrl;
    }

    /**
     * @return mixed
     */
    public function getCardId()
    {
        return $this->cardId;
    }

    /**
     * @param mixed $cardId
     */
    public function setCardId($cardId)
    {
        $this->cardId = $cardId;
    }

    /**
     * @return mixed
     */
    public function getSecureMode()
    {
        return $this->secureMode;
    }

    /**
     * @param mixed $secureMode
     */
    public function setSecureMode($secureMode)
    {
        $this->secureMode = $secureMode;
    }

    /**
     * @return mixed
     */
    public function getStatementDescriptor()
    {
        return $this->statementDescriptor;
    }

    /**
     * @param mixed $statementDescriptor
     */
    public function setStatementDescriptor($statementDescriptor)
    {
        $this->statementDescriptor = $statementDescriptor;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @param mixed $cardType
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
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

    /**
     * @return mixed
     */
    public function getSecureModeNeeded()
    {
        return $this->secureModeNeeded;
    }

    /**
     * @param mixed $secureModeNeeded
     */
    public function setSecureModeNeeded($secureModeNeeded)
    {
        $this->secureModeNeeded = $secureModeNeeded;
    }

    /**
     * @return mixed
     */
    public function getSecureModeRedirectUrl()
    {
        return $this->secureModeRedirectUrl;
    }

    /**
     * @param mixed $secureModeRedirectUrl
     */
    public function setSecureModeRedirectUrl($secureModeRedirectUrl)
    {
        $this->secureModeRedirectUrl = $secureModeRedirectUrl;
    }
}
