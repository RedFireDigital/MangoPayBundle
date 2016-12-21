<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    27/11/2016
 * Time:    20:47
 * File:    User.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;

class User
{
    protected $personType = 'NATURAL';

    protected $firstName;

    protected $lastName;

    protected $birthday;

    protected $nationality;

    protected $countryOfResidence;

    protected $email;

    protected $id;

    protected $KYCLevel;

    protected $tag;

    /**
     * @return mixed
     */
    public function getPersonType()
    {
        return $this->personType;
    }

    /**
     * @param mixed $personType
     */
    public function setPersonType($personType)
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
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday(\DateTime $birthday)
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getKYCLevel()
    {
        return $this->KYCLevel;
    }

    /**
     * @param mixed $KYCLevel
     */
    public function setKYCLevel($KYCLevel)
    {
        $this->KYCLevel = $KYCLevel;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @param $timestamp
     */
    public function setBirthdayUnixTimestamp($timestamp)
    {
        $dateTime = \DateTime::createFromFormat('U', $timestamp);
        if ($dateTime instanceof \DateTime)
            $this->setBirthday($dateTime);
    }

    /**
     * @return mixed
     */
    public function getBirthdayUnixTimestamp()
    {
        return (int) $this->getBirthday()->format('U');
    }
}
