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

use MangoPay\UserNatural;
use PartFire\MangoPayBundle\Models\DTOs\User;

class UserTranslator
{
    public function convertDTOToMangoPayNaturalUser(User $userDto)
    {
        $mangoUser = new UserNatural();
        $mangoUser->PersonType = $userDto->getPersonType();
        $mangoUser->FirstName = $userDto->getFirstName();
        $mangoUser->LastName = $userDto->getLastName();
        $mangoUser->Birthday = (int) $userDto->getBirthdayUnixTimestamp();
        $mangoUser->Nationality = $userDto->getNationality();
        $mangoUser->CountryOfResidence = $userDto->getCountryOfResidence();
        $mangoUser->Email = $userDto->getEmail();
        if ($userDto->getId()) {
            $mangoUser->Id = $userDto->getId();
        }
        return $mangoUser;
    }

    public function convertMangoPayNaturalUserToDTO(UserNatural $mangoUser)
    {
        $userDto = new User();
        $userDto->setPersonType($mangoUser->PersonType);
        $userDto->setFirstName($mangoUser->FirstName);
        $userDto->setLastName($mangoUser->LastName);
        $userDto->setBirthdayUnixTimestamp($mangoUser->Birthday);
        $userDto->setNationality($mangoUser->Nationality);
        $userDto->setCountryOfResidence($mangoUser->CountryOfResidence);
        $userDto->setEmail($mangoUser->Email);
        $userDto->setId($mangoUser->Id);
        $userDto->setKYCLevel($mangoUser->KYCLevel);
        return $userDto;
    }
}
