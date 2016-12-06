<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    06/12/2016
 * Time:    22:43
 * File:    TransferTranslator.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs\Translators;


use PartFire\MangoPayBundle\Models\DTOs\Transfer;

class TransferTranslator
{
    public function convertDTOToMangoPayTransfer(Transfer $transferDto)
    {
        $Transfer = new \MangoPay\Transfer();
        $Transfer->Tag = $transferDto->getTag();
        $Transfer->AuthorId = $transferDto->getAuthorId();
        $Transfer->CreditedUserId = $transferDto->getCreditedUserId();

        if ($transferDto->getDebitedCurrency() && $transferDto->getDebitedAmount()) {
            $Transfer->DebitedFunds = new \MangoPay\Money();
            $Transfer->DebitedFunds->Currency = $transferDto->getDebitedCurrency();
            $Transfer->DebitedFunds->Amount = $transferDto->getDebitedAmount();
        }

        if ($transferDto->getFeeAmount() && $transferDto->getFeeCurrency()) {
            $Transfer->Fees = new \MangoPay\Money();
            $Transfer->Fees->Currency = $transferDto->getFeeCurrency();
            $Transfer->Fees->Amount = $transferDto->getFeeAmount();
        }

        $Transfer->DebitedWalletId = $transferDto->getDebitedWalledId();
        $Transfer->CreditedWalletId = $transferDto->getCreditedWalledId();
        return $Transfer;
    }

    public function convertMangoPayTransferToDTO(\MangoPay\Transfer $mangoPayTransfer)
    {
        $transfer = new Transfer();
        $transfer->setAuthorId($mangoPayTransfer->AuthorId);
        $transfer->setTag($mangoPayTransfer->Tag);
        $transfer->setCreditedUserId($mangoPayTransfer->CreditedUserId);
        $transfer->setDebitedWalledId($mangoPayTransfer->DebitedWalletId);
        $transfer->setCreditedWalledId($mangoPayTransfer->CreditedWalletId);

        if (isset($mangoPayTransfer->Fees->Currency))
            $transfer->setFeeCurrency($mangoPayTransfer->Fees->Currency);

        if (isset($mangoPayTransfer->Fees->Amount))
            $transfer->setFeeAmount($mangoPayTransfer->Fees->Amount);

        if (isset($mangoPayTransfer->DebitedFunds->Currency))
            $transfer->setDebitedCurrency($mangoPayTransfer->DebitedFunds->Currency);

        if (isset($mangoPayTransfer->DebitedFunds->Amount))
            $transfer->setDebitedAmount($mangoPayTransfer->DebitedFunds->Amount);

        return $transfer;
    }
}