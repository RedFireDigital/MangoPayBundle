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
 * File:    UserNatural.php
 *
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;

use PartFire\MangoPayBundle\MangoPayConstants;

class UserNatural extends UserBase
{
    private $firstName;

    private $lastName;

    private $birthday;

    private $nationality;

    private $countryOfResidence;

    private $occupation;

    private $incomeRange;

    private $address;

    public function __construct()
    {
        $this->setPersonType(MangoPayConstants::NATURAL_PERSON_TYPE);
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
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
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

    /**
     * @return mixed
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @param mixed $occupation
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
    }

    /**
     * @return mixed
     */
    public function getIncomeRange()
    {
        return $this->incomeRange;
    }

    /**
     * @param mixed $incomeRange
     */
    public function setIncomeRange($incomeRange)
    {
        $this->incomeRange = $incomeRange;
    }

    /**
     * @return mixed
     */
    public function getAddress() : Address
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }



}
