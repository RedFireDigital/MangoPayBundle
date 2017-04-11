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
use MangoPay\PayInPaymentDetailsBankWire;
use MangoPay\PayInPaymentDetailsCard;
use PartFire\MangoPayBundle\Models\DTOs\BankwireDirectPayIn;
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
        $payIn->Tag = $cardDirectPayIn->getTag();

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
        $cardDirectPayIn->setAmount($payIn->CreditedFunds);
        $cardDirectPayIn->setAuthorId($payIn->AuthorId);
        $cardDirectPayIn->setFees($payIn->Fees->Amount);
        $cardDirectPayIn->setFeesCurrency($payIn->Fees->Currency);
        $cardDirectPayIn->setCardId($payIn->PaymentDetails->CardId);
        $cardDirectPayIn->setCardType($payIn->PaymentDetails->CardType);
        $cardDirectPayIn->setSecureModeReturnUrl($payIn->ExecutionDetails->SecureModeReturnURL);
        $cardDirectPayIn->setSecureMode($payIn->ExecutionDetails->SecureMode);
        $cardDirectPayIn->setSecureModeRedirectUrl($payIn->ExecutionDetails->SecureModeRedirectURL);
        $cardDirectPayIn->setSecureModeNeeded($payIn->ExecutionDetails->SecureModeNeeded);
        $cardDirectPayIn->setTag($payIn->Tag);
        $cardDirectPayIn->setResourceId($payIn->Id);
        $cardDirectPayIn->setResultCode($payIn->ResultCode);
        $cardDirectPayIn->setResultMessage($payIn->ResultMessage);
        return $cardDirectPayIn;
    }

    public function translateDtoToMangoPayInForBankwireDirectPayIn(BankwireDirectPayIn $bankwireDirectPayIn)
    {
        $payIn = new PayIn();
        $payIn->CreditedWalletId = $bankwireDirectPayIn->getCreditedWalletId();
        $payIn->AuthorId = $bankwireDirectPayIn->getAuthorId();
        $payIn->Tag = $bankwireDirectPayIn->getTag();
        $payIn->CreditedUserId = $bankwireDirectPayIn->getCreditedUserId();

        $payIn->PaymentDetails = new PayInPaymentDetailsBankWire();
        $payIn->PaymentDetails->DeclaredDebitedFunds = new Money();
        $payIn->PaymentDetails->DeclaredDebitedFunds->Amount = $bankwireDirectPayIn->getDeclaredDebitedFundsAmount();
        $payIn->PaymentDetails->DeclaredDebitedFunds->Currency = $bankwireDirectPayIn->getDeclaredDebitedFundsCurrency();
        $payIn->PaymentDetails->DeclaredFees = new Money();
        $payIn->PaymentDetails->DeclaredFees->Amount = $bankwireDirectPayIn->getDeclaredFeesAmount();
        $payIn->PaymentDetails->DeclaredFees->Currency = $bankwireDirectPayIn->getDeclaredFeesCurrency();
        $payIn->ExecutionDetails = new PayInExecutionDetailsDirect();

        return $payIn;
    }

    public function translateMangoPayBankwireDirectPayInToDto(PayIn $payIn)
    {
        $cardDirectPayIn = new BankwireDirectPayIn();
        $cardDirectPayIn->setStatus($payIn->Status);
        $cardDirectPayIn->setTag($payIn->Tag);
        $cardDirectPayIn->setAuthorId($payIn->AuthorId);
        $cardDirectPayIn->setCreditedWalletId($payIn->CreditedWalletId);
        $cardDirectPayIn->setCreditedUserId($payIn->CreditedUserId);
        $cardDirectPayIn->setDeclaredDebitedFundsAmount($payIn->CreditedFunds);
        $cardDirectPayIn->setDeclaredDebitedFundsCurrency($payIn->PaymentDetails->DeclaredDebitedFunds->Currency);
        $cardDirectPayIn->setDeclaredFeesAmount($payIn->PaymentDetails->DeclaredFees->Amount);
        $cardDirectPayIn->setDeclaredFeesCurrency($payIn->PaymentDetails->DeclaredFees->Currency);
        $cardDirectPayIn->setType($payIn->Type);
        $cardDirectPayIn->setNature($payIn->Nature);
        $cardDirectPayIn->setPaymentType($payIn->PaymentType);
        $cardDirectPayIn->setExecutionType($payIn->ExecutionType);
        $cardDirectPayIn->setWireReference($payIn->PaymentDetails->WireReference);
        $cardDirectPayIn->setBankAccountType($payIn->PaymentDetails->BankAccount->Type);
        $cardDirectPayIn->setBankAccountOwnerName($payIn->PaymentDetails->BankAccount->OwnerName);
        $cardDirectPayIn->setBankAccountIban($payIn->PaymentDetails->BankAccount->Details->IBAN);
        $cardDirectPayIn->setBankAccountBic($payIn->PaymentDetails->BankAccount->Details->BIC);
        $cardDirectPayIn->setResourceId($payIn->Id);

        return $cardDirectPayIn;
    }
}
