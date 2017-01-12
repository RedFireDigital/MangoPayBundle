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
use PartFire\MangoPayBundle\MangoPayConstants;
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

}
