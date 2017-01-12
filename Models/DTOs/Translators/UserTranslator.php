<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    28/11/2016
 * Time:    11:14
 * File:    UserTranslator.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs\Translators;

use MangoPay\UserLegal;
use MangoPay\UserNatural;
use MangoPay\Address;

use PartFire\MangoPayBundle\MangoPayConstants;
use PartFire\MangoPayBundle\Models\DTOs\UserBase;
use PartFire\MangoPayBundle\Models\DTOs\Address as PFAddress;
use PartFire\MangoPayBundle\Models\DTOs\UserNatural as PFUserNatural;
use PartFire\MangoPayBundle\Models\DTOs\UserLegal as PFUserLegal;

class UserTranslator
{
    public function convertDTOToMangoPayNaturalUser(PFUserNatural $userDto)
    {
        $mangoUser = new UserNatural();
        $mangoUser->PersonType = MangoPayConstants::NATURAL_PERSON_TYPE;
        $mangoUser->FirstName = $userDto->getFirstName();
        $mangoUser->LastName = $userDto->getLastName();
        $mangoUser->Birthday = (int) $userDto->getBirthday();
        $mangoUser->Nationality = $userDto->getNationality();
        $mangoUser->CountryOfResidence = $userDto->getCountryOfResidence();
        $mangoUser->Email = $userDto->getEmail();
        $mangoUser->Tag = $userDto->getTag();
        $mangoUser->Address = $this->getConvertDTOToMangoPayAddress($userDto->getAddress());
        if ($userDto->getId()) {
            $mangoUser->Id = $userDto->getId();
        }
        return $mangoUser;
    }

    public function convertMangoPayNaturalUserToDTO(UserNatural $mangoUser)
    {
        $userDto = new PFUserNatural();
        $userDto->setPersonType($mangoUser->PersonType);
        $userDto->setFirstName($mangoUser->FirstName);
        $userDto->setLastName($mangoUser->LastName);
        $userDto->setBirthday($mangoUser->Birthday);
        $userDto->setNationality($mangoUser->Nationality);
        $userDto->setCountryOfResidence($mangoUser->CountryOfResidence);
        $userDto->setEmail($mangoUser->Email);
        $userDto->setId($mangoUser->Id);
        $userDto->setKYCLevel($mangoUser->KYCLevel);
        $userDto->setAddress($this->getConvertMangoAddressToDTO($mangoUser->Address));
        return $userDto;
    }

    public function convertDTOToMangoPayLegalUser(PFUserLegal $userDto)
    {
        $mangoUser = new UserLegal();
        $mangoUser->PersonType = MangoPayConstants::LEAGAL_PERSON_TYPE;
        $mangoUser->Name = $userDto->getFirstName() . " " . $userDto->getLastName();
        $mangoUser->LastName = $userDto->getLastName();
        $mangoUser->Birthday = (int) $userDto->getLegalRepresentativeBirthday();
        $mangoUser->Nationality = $userDto->getNationality();
        $mangoUser->CountryOfResidence = $userDto->getCountryOfResidence();
        $mangoUser->Email = $userDto->getEmail();
        $mangoUser->Tag = $userDto->getTag();
        if ($userDto->getId()) {
            $mangoUser->Id = $userDto->getId();
        }
        return $mangoUser;
    }

    public function convertMangoPayLegalUserToDTO(UserNatural $mangoUser)
    {
        $userDto = new PFUserLegal();
        $userDto->setPersonType($mangoUser->PersonType);
        $userDto->setFirstName($mangoUser->FirstName);
        $userDto->setLastName($mangoUser->LastName);
        $userDto->setLegalRepresentativeBirthday($mangoUser->Birthday);
        $userDto->setNationality($mangoUser->Nationality);
        $userDto->setCountryOfResidence($mangoUser->CountryOfResidence);
        $userDto->setEmail($mangoUser->Email);
        $userDto->setId($mangoUser->Id);
        $userDto->setKYCLevel($mangoUser->KYCLevel);
        return $userDto;
    }

    private function getConvertDTOToMangoPayAddress(PFAddress $pfAddress)
    {
        $address = new Address();
        $address->AddressLine1 = $pfAddress->getAddressLine1();
        $address->AddressLine2 = $pfAddress->getAddressLine2();
        $address->City = $pfAddress->getCity();
        $address->Region = $pfAddress->getRegion();
        $address->PostalCode = $pfAddress->getPostalCode();
        $address->Country = $pfAddress->getCountry();
    }

    private function getConvertMangoAddressToDTO(Address $address)
    {
        $pfAddress = new PFAddress();
        $pfAddress->setAddressLine1($address->AddressLine1);
        $pfAddress->setAddressLine2($address->AddressLine2);
        $pfAddress->setCity($address->City);
        $pfAddress->setRegion($address->Region);
        $pfAddress->setPostalCode($address->PostalCode);
        $pfAddress->setCountry($address->Country);

        return $pfAddress;
    }

}
