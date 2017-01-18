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
        $mangoUser->IncomeRange = $userDto->getIncomeRange();
        $mangoUser->Occupation = $userDto->getOccupation();
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
        $userDto->setOccupation($mangoUser->Occupation);
        $userDto->setIncomeRange($mangoUser->IncomeRange);
        return $userDto;
    }

    public function convertDTOToMangoPayLegalUser(PFUserLegal $userDto)
    {
        $mangoUser = new UserLegal();
        $mangoUser->PersonType                      = MangoPayConstants::LEGAL_PERSON_TYPE;
        $mangoUser->LegalPersonType                 = $userDto->getLegalPersonType();
        $mangoUser->Name                            = $userDto->getName();
        $mangoUser->HeadquartersAddress             = $this->getConvertDTOToMangoPayAddress(
            $userDto->getHeadquartersAddress()
        );
        $mangoUser->LegalRepresentativeFirstName    = $userDto->getLegalRepresentativeFirstName();
        $mangoUser->LegalRepresentativeLastName     = $userDto->getLegalRepresentativeLastName();
        $mangoUser->LegalRepresentativeAddress      = $this->getConvertDTOToMangoPayAddress(
            $userDto->getLegalRepresentativeAddress()
        );
        $mangoUser->LegalRepresentativeEmail        = $userDto->getLegalRepresentativeEmail();
        $mangoUser->LegalRepresentativeBirthday     = (int) $userDto->getLegalRepresentativeBirthday();
        $mangoUser->LegalRepresentativeNationality  = $userDto->getLegalRepresentativeNationality();
        $mangoUser->LegalRepresentativeCountryOfResidence = $userDto->getLegalRepresentativeCountryOfResidence();

        $mangoUser->Email = $userDto->getEmail();
        $mangoUser->Tag = $userDto->getTag();
        if ($userDto->getId()) {
            $mangoUser->Id = $userDto->getId();
        }
        return $mangoUser;
    }

    public function convertMangoPayLegalUserToDTO(UserLegal $mangoUser)
    {
        $userDto = new PFUserLegal();
        $userDto->setLegalPersonType($mangoUser->LegalPersonType);
        $userDto->setName($mangoUser->Name);
        $userDto->setHeadquartersAddress($this->getConvertMangoAddressToDTO($mangoUser->HeadquartersAddress));
        $userDto->setLegalRepresentativeFirstName($mangoUser->LegalRepresentativeFirstName);
        $userDto->setLegalRepresentativeLastName($mangoUser->LegalRepresentativeLastName);
        $userDto->setLegalRepresentativeAddress($this->getConvertMangoAddressToDTO($mangoUser->LegalRepresentativeAddress));
        $userDto->setLegalRepresentativeEmail($mangoUser->LegalRepresentativeEmail);
        $userDto->setLegalRepresentativeBirthday($mangoUser->LegalRepresentativeBirthday);
        $userDto->setLegalRepresentativeNationality($mangoUser->LegalRepresentativeNationality);
        $userDto->setLegalRepresentativeCountryOfResidence($mangoUser->LegalRepresentativeCountryOfResidence);
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

        return $address;
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
