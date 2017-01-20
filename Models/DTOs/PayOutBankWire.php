<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    20/01/2017
 * Time:    15:14
 * File:    PayOutBankWire.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;

class PayOutBankWire
{
    private $authorId;

    private $tag;

    private $debitedWalletId;

    private $debitedFundsCurrency;

    private $debitedFundsAmount;

    private $feesCurrency;

    private $feesAmount;

    private $paymentType;

    private $bankAccountId;

    private $status;

    private $resultCode;

    private $resultMessage;

    private $type;

    private $nature;

    private $bankWireRef;

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
    public function getDebitedWalletId()
    {
        return $this->debitedWalletId;
    }

    /**
     * @param mixed $debitedWalletId
     */
    public function setDebitedWalletId($debitedWalletId)
    {
        $this->debitedWalletId = $debitedWalletId;
    }

    /**
     * @return mixed
     */
    public function getDebitedFundsCurrency()
    {
        return $this->debitedFundsCurrency;
    }

    /**
     * @param mixed $debitedFundsCurrency
     */
    public function setDebitedFundsCurrency($debitedFundsCurrency)
    {
        $this->debitedFundsCurrency = $debitedFundsCurrency;
    }

    /**
     * @return mixed
     */
    public function getDebitedFundsAmount()
    {
        return $this->debitedFundsAmount;
    }

    /**
     * @param mixed $debitedFundsAmount
     */
    public function setDebitedFundsAmount($debitedFundsAmount)
    {
        $this->debitedFundsAmount = $debitedFundsAmount;
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
    public function getFeesAmount()
    {
        return $this->feesAmount;
    }

    /**
     * @param mixed $feesAmount
     */
    public function setFeesAmount($feesAmount)
    {
        $this->feesAmount = $feesAmount;
    }

    /**
     * @return mixed
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @param mixed $paymentType
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
    }

    /**
     * @return mixed
     */
    public function getBankAccountId()
    {
        return $this->bankAccountId;
    }

    /**
     * @param mixed $bankAccountId
     */
    public function setBankAccountId($bankAccountId)
    {
        $this->bankAccountId = $bankAccountId;
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
    public function getResultCode()
    {
        return $this->resultCode;
    }

    /**
     * @param mixed $resultCode
     */
    public function setResultCode($resultCode)
    {
        $this->resultCode = $resultCode;
    }

    /**
     * @return mixed
     */
    public function getResultMessage()
    {
        return $this->resultMessage;
    }

    /**
     * @param mixed $resultMessage
     */
    public function setResultMessage($resultMessage)
    {
        $this->resultMessage = $resultMessage;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * @param mixed $nature
     */
    public function setNature($nature)
    {
        $this->nature = $nature;
    }

    /**
     * @return mixed
     */
    public function getBankWireRef()
    {
        return $this->bankWireRef;
    }

    /**
     * @param mixed $bankWireRef
     */
    public function setBankWireRef($bankWireRef)
    {
        $this->bankWireRef = $bankWireRef;
    }
}
