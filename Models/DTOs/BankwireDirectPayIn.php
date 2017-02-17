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
    private $resourceId;

    private $tag;

    private $authorId;

    private $creditedWalletId;

    private $creditedUserId;

    private $declaredDebitedFundsCurrency;

    private $declaredDebitedFundsAmount;

    private $declaredFeesCurrency;

    private $declaredFeesAmount;

    private $status;

    private $resultCode;

    private $resultMessage;

    private $type;

    private $nature;

    private $paymentType;

    private $executionType;

    private $wireReference;

    private $bankAccountType;

    private $bankAccountOwnerName;

    private $bankAccountIban;

    private $bankAccountBic;

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
    public function getExecutionType()
    {
        return $this->executionType;
    }

    /**
     * @param mixed $executionType
     */
    public function setExecutionType($executionType)
    {
        $this->executionType = $executionType;
    }

    /**
     * @return mixed
     */
    public function getWireReference()
    {
        return $this->wireReference;
    }

    /**
     * @param mixed $wireReference
     */
    public function setWireReference($wireReference)
    {
        $this->wireReference = $wireReference;
    }

    /**
     * @return mixed
     */
    public function getBankAccountType()
    {
        return $this->bankAccountType;
    }

    /**
     * @param mixed $bankAccountType
     */
    public function setBankAccountType($bankAccountType)
    {
        $this->bankAccountType = $bankAccountType;
    }

    /**
     * @return mixed
     */
    public function getBankAccountOwnerName()
    {
        return $this->bankAccountOwnerName;
    }

    /**
     * @param mixed $bankAccountOwnerName
     */
    public function setBankAccountOwnerName($bankAccountOwnerName)
    {
        $this->bankAccountOwnerName = $bankAccountOwnerName;
    }

    /**
     * @return mixed
     */
    public function getBankAccountIban()
    {
        return $this->bankAccountIban;
    }

    /**
     * @param mixed $bankAccountIban
     */
    public function setBankAccountIban($bankAccountIban)
    {
        $this->bankAccountIban = $bankAccountIban;
    }

    /**
     * @return mixed
     */
    public function getBankAccountBic()
    {
        return $this->bankAccountBic;
    }

    /**
     * @param mixed $bankAccountBic
     */
    public function setBankAccountBic($bankAccountBic)
    {
        $this->bankAccountBic = $bankAccountBic;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * @param mixed $resourceId
     */
    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;
    }
}
