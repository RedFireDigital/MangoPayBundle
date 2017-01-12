<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    10/01/17
 * Time:    15:36
 * Project: PartFire MangoPay Bundle
 * File:    UserLegal.php
 *
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;

use PartFire\MangoPayBundle\MangoPayConstants;

class UserLegal extends UserBase
{
    private $personType = MangoPayConstants::LEAGAL_PERSON_TYPE;

    private $firstName;

    private $lastName;

    private $legalRepresentativeBirthday;

    private $nationality;

    private $countryOfResidence;

    /**
     * @return string
     */
    public function getPersonType(): string
    {
        return $this->personType;
    }

    /**
     * @param string $personType
     */
    public function setPersonType(string $personType)
    {
        $this->personType = $personType;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getLegalRepresentativeBirthday()
    {
        return $this->legalRepresentativeBirthday->format('U');
    }

    /**
     * @param mixed $legalRepresentativeBirthday
     */
    public function setLegalRepresentativeBirthday($legalRepresentativeBirthday)
    {
        $this->legalRepresentativeBirthday = $legalRepresentativeBirthday;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * @return mixed
     */
    public function getCountryOfResidence()
    {
        return $this->countryOfResidence;
    }

    /**
     * @param mixed $countryOfResidence
     */
    public function setCountryOfResidence($countryOfResidence)
    {
        $this->countryOfResidence = $countryOfResidence;
    }



}
