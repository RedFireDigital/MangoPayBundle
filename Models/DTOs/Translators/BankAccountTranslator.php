<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    20/01/2017
 * Time:    13:14
 * File:    BankAccountTranslator.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs\Translators;

use MangoPay\Address;
use MangoPay\BankAccount;
use MangoPay\BankAccountDetailsGB;
use MangoPay\BankAccountDetailsIBAN;
use PartFire\MangoPayBundle\Models\DTOs\Address as AddressDto;
use PartFire\MangoPayBundle\Models\DTOs\GbBankAccount;
use PartFire\MangoPayBundle\Models\DTOs\IbanBankAccount;

class BankAccountTranslator
{
    /**
     * @param IbanBankAccount $ibanBankAccount
     * @return BankAccount
     */
    public function translateIbanDtoToMango(IbanBankAccount $ibanBankAccount) : BankAccount
    {
        $bankAccount = new BankAccount();
        $bankAccount->Tag = $ibanBankAccount->getTag();
        $bankAccount->OwnerName = $ibanBankAccount->getOwnerName();
        $bankAccount->Details = new BankAccountDetailsIBAN();
        $bankAccount->Details->IBAN = $ibanBankAccount->getIban();
        $bankAccount->Details->BIC = $ibanBankAccount->getBic();
        $bankAccount->OwnerAddress = new Address();
        $bankAccount->OwnerAddress->AddressLine1 = $ibanBankAccount->getOwnerAddress()->getAddressLine1();
        $bankAccount->OwnerAddress->AddressLine2 = $ibanBankAccount->getOwnerAddress()->getAddressLine2();
        $bankAccount->OwnerAddress->City = $ibanBankAccount->getOwnerAddress()->getCity();
        $bankAccount->OwnerAddress->Country = $ibanBankAccount->getOwnerAddress()->getCountry();
        $bankAccount->OwnerAddress->PostalCode = $ibanBankAccount->getOwnerAddress()->getPostalCode();
        $bankAccount->OwnerAddress->Region = $ibanBankAccount->getOwnerAddress()->getRegion();
        return $bankAccount;
    }

    public function translateMangoToIbanDto(BankAccount $bankAccount) : IbanBankAccount
    {
        $ibanBankAccount = new IbanBankAccount();
        $ibanBankAccount->setTag($bankAccount->Tag);
        $ibanBankAccount->setActive($bankAccount->Active);
        $ibanBankAccount->setCreationDate($bankAccount->CreationDate);
        $ibanBankAccount->setId($bankAccount->Id);
        $ibanBankAccount->setUserId($bankAccount->UserId);
        $ibanBankAccount->setOwnerName($bankAccount->OwnerName);
        $ibanBankAccount->setType($bankAccount->Type);
        $ibanBankAccount->setIban($bankAccount->Details->IBAN);
        $ibanBankAccount->setBic($bankAccount->Details->Bic);

        $address = new AddressDto();
        $address->setAddressLine1($bankAccount->OwnerAddress->AddressLine1);
        $address->setAddressLine2($bankAccount->OwnerAddress->AddressLine2);
        $address->setCity($bankAccount->OwnerAddress->City);
        $address->setCountry($bankAccount->OwnerAddress->Country);
        $address->setPostalCode($bankAccount->OwnerAddress->PostalCode);
        $address->setRegion($bankAccount->OwnerAddress->Region);
        $ibanBankAccount->setOwnerAddress($address);
        return $ibanBankAccount;
    }

    public function translateGbDtoToMango(GbBankAccount $gbBankAccount) : BankAccount
    {
        $bankAccount = new BankAccount();
        $bankAccount->Tag = $gbBankAccount->getTag();
        $bankAccount->OwnerName = $gbBankAccount->getOwnerName();
        $bankAccount->Details = new BankAccountDetailsGB();
        $bankAccount->Details->AccountNumber = $gbBankAccount->getAccountNumber();
        $bankAccount->Details->SortCode = $gbBankAccount->getSortCode();
        $bankAccount->OwnerAddress = new Address();
        $bankAccount->OwnerAddress->AddressLine1 = $gbBankAccount->getOwnerAddress()->getAddressLine1();
        $bankAccount->OwnerAddress->AddressLine2 = $gbBankAccount->getOwnerAddress()->getAddressLine2();
        $bankAccount->OwnerAddress->City = $gbBankAccount->getOwnerAddress()->getCity();
        $bankAccount->OwnerAddress->Country = $gbBankAccount->getOwnerAddress()->getCountry();
        $bankAccount->OwnerAddress->PostalCode = $gbBankAccount->getOwnerAddress()->getPostalCode();
        $bankAccount->OwnerAddress->Region = $gbBankAccount->getOwnerAddress()->getRegion();
        return $bankAccount;
    }

    public function translateMangoToGbDto(BankAccount $bankAccount) : GbBankAccount
    {
        $gbBankAccount = new GbBankAccount();
        $gbBankAccount->setTag($bankAccount->Tag);
        $gbBankAccount->setActive($bankAccount->Active);
        $gbBankAccount->setCreationDate($bankAccount->CreationDate);
        $gbBankAccount->setId($bankAccount->Id);
        $gbBankAccount->setUserId($bankAccount->UserId);
        $gbBankAccount->setOwnerName($bankAccount->OwnerName);
        $gbBankAccount->setType($bankAccount->Type);
        $gbBankAccount->setSortCode($bankAccount->Details->SortCode);
        $gbBankAccount->setAccountNumber($bankAccount->Details->AccountNumber);

        $address = new AddressDto();
        $address->setAddressLine1($bankAccount->OwnerAddress->AddressLine1);
        $address->setAddressLine2($bankAccount->OwnerAddress->AddressLine2);
        $address->setCity($bankAccount->OwnerAddress->City);
        $address->setCountry($bankAccount->OwnerAddress->Country);
        $address->setPostalCode($bankAccount->OwnerAddress->PostalCode);
        $address->setRegion($bankAccount->OwnerAddress->Region);
        $gbBankAccount->setOwnerAddress($address);
        return $gbBankAccount;
    }
}
