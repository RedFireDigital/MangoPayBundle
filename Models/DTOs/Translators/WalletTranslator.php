<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    28/11/2016
 * Time:    21:08
 * File:    WalletTranslator.php
 **/
namespace PartFire\MangoPayBundle\Models\DTOs\Translators;

use MangoPay\Wallet as MangoWallet;
use PartFire\MangoPayBundle\Models\DTOs\Wallet;

class WalletTranslator
{
    public function convertDTOToMangoPayWallet(Wallet $walletDto)
    {
        $mangoWallet = new MangoWallet();
        $mangoWallet->Tag = $walletDto->getTag();
        $mangoWallet->Owners = $walletDto->getOwenerIds();
        $mangoWallet->Description = $walletDto->getDescription();
        $mangoWallet->Currency = $walletDto->getCurrency();
        if ($mangoWallet->getId()) {
            $mangoWallet->Id = $walletDto->getId();
        }
        return $mangoWallet;
    }

    public function convertMangoPayWalletToDTO(MangoWallet $mangoWallet)
    {
        $walletDto = new Wallet();
        $walletDto->setTag($mangoWallet->Tag);
        $walletDto->setOwenerIds($mangoWallet->Owners);
        $walletDto->setDescription($mangoWallet->Description);
        $walletDto->setCurrency($mangoWallet->Currency);
        $walletDto->setId($mangoWallet->Id);
        return $walletDto;
    }
}
