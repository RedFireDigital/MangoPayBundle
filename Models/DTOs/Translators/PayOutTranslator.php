<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    20/01/2017
 * Time:    15:58
 * File:    PayOutTranslator.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs\Translators;

use MangoPay\Money;
use MangoPay\PayOut;
use MangoPay\PayOutPaymentDetailsBankWire;
use PartFire\MangoPayBundle\Models\DTOs\PayOutBankWire;

class PayOutTranslator
{
    public function translatePayOutDtoToMango(PayOutBankWire $payOutBankWire) : PayOut
    {
        $payOut = new PayOut();
        $payOut->Tag = $payOutBankWire->getTag();
        $payOut->AuthorId = $payOutBankWire->getAuthorId();
        $payOut->DebitedWalletId = $payOutBankWire->getDebitedWalletId();
        $payOut->DebitedFunds = new Money();
        $payOut->DebitedFunds->Amount = $payOutBankWire->getDebitedFundsAmount();
        $payOut->DebitedFunds->Currency = $payOutBankWire->getDebitedFundsCurrency();
        $payOut->Fees = new Money();
        $payOut->Fees->Amount = $payOutBankWire->getFeesAmount();
        $payOut->Fees->Currency = $payOutBankWire->getFeesCurrency();
        $payOut->PaymentType = $payOutBankWire->getPaymentType();
        $payOut->MeanOfPaymentDetails = new PayOutPaymentDetailsBankWire();
        $payOut->MeanOfPaymentDetails->BankAccountId = $payOutBankWire->getBankAccountId();
        return $payOut;
    }

    public function translateMangoToPayOutDto(PayOut $createdPayout)
    {
        $payOutBankWire = new PayOutBankWire();
        $payOutBankWire->setAuthorId($createdPayout->AuthorId);
        $payOutBankWire->setDebitedWalletId($createdPayout->CreditedWalletId);
        $payOutBankWire->setDebitedFundsAmount($createdPayout->DebitedFunds->Amount);
        $payOutBankWire->setDebitedFundsCurrency($createdPayout->DebitedFunds->Currency);
        $payOutBankWire->setFeesAmount($createdPayout->Fees->Amount);
        $payOutBankWire->setFeesCurrency($createdPayout->Fees->Currency);
        $payOutBankWire->setPaymentType($createdPayout->PaymentType);
        $payOutBankWire->setBankAccountId($createdPayout->MeanOfPaymentDetails->BankAccountId);
        $payOutBankWire->setTag($createdPayout->Tag);
        $payOutBankWire->setStatus($createdPayout->Status);
        $payOutBankWire->setNature($createdPayout->Nature);
        $payOutBankWire->setType($createdPayout->Type);
        $payOutBankWire->setBankWireRef($createdPayout->MeanOfPaymentDetails->BankWireRef);
        return $payOutBankWire;
    }
}
