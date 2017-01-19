<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    19/01/2017
 * Time:    12:49
 * File:    PayInTranslator.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs\Translators;

use MangoPay\Money;
use MangoPay\PayIn;
use MangoPay\PayInExecutionDetailsDirect;
use MangoPay\PayInPaymentDetailsCard;
use PartFire\MangoPayBundle\Models\DTOs\CardDirectPayIn;

class PayInTranslator
{
    public function translateDtoToMangoPayInForDirectPayIn(CardDirectPayIn $cardDirectPayIn)
    {
        $payIn = new PayIn();
        $payIn->CreditedWalletId = $cardDirectPayIn->getCreditedWalletId();
        $payIn->AuthorId = $cardDirectPayIn->getAuthorId();
        $payIn->DebitedFunds = new Money();
        $payIn->DebitedFunds->Amount = $cardDirectPayIn->getAmount();
        $payIn->DebitedFunds->Currency = $cardDirectPayIn->getCurrency();
        $payIn->Fees = new Money();
        $payIn->Fees->Amount = $cardDirectPayIn->getFees();
        $payIn->Fees->Currency = $cardDirectPayIn->getFeesCurrency();

        // payment type as CARD
        $payIn->PaymentDetails = new PayInPaymentDetailsCard();
        $payIn->PaymentDetails->CardType = $cardDirectPayIn->getCardType();
        $payIn->PaymentDetails->CardId = $cardDirectPayIn->getCardId();

        // execution type as DIRECT
        $payIn->ExecutionDetails = new PayInExecutionDetailsDirect();
        $payIn->ExecutionDetails->SecureModeReturnURL = $cardDirectPayIn->getSecureModeReturnUrl();
        return $payIn;
    }

    public function translateMangoPayDirectPayInToDto(PayIn $payIn)
    {
        $cardDirectPayIn = new CardDirectPayIn();
        $cardDirectPayIn->setStatus($payIn->Status);
        $cardDirectPayIn->setCurrency($payIn->DebitedFunds->Currency);
        $cardDirectPayIn->setAmount($payIn->DebitedFunds->Amount);
        $cardDirectPayIn->setAuthorId($payIn->AuthorId);
        $cardDirectPayIn->setFees($payIn->Fees->Amount);
        $cardDirectPayIn->setFeesCurrency($payIn->Fees->Currency);
        $cardDirectPayIn->setCardId($payIn->PaymentDetails->CardId);
        $cardDirectPayIn->setCardType($payIn->PaymentDetails->CardType);
        $cardDirectPayIn->setSecureModeReturnUrl($payIn->ExecutionDetails->SecureModeReturnURL);
        $cardDirectPayIn->setSecureMode($payIn->ExecutionDetails->SecureMode);
        $cardDirectPayIn->setSecureModeReturnUrl($payIn->ExecutionDetails->SecureModeReturnURL);
        $cardDirectPayIn->setSecureModeRedirectUrl($payIn->ExecutionDetails->SecureModeRedirectURL);
        $cardDirectPayIn->setSecureModeNeeded($payIn->ExecutionDetails->SecureModeNeeded);
        return $cardDirectPayIn;
    }
}
