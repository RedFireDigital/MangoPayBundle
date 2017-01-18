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
    private $legalPersonType = MangoPayConstants::LEGAL_PERSON_TYPE_BUSINESS;

    private $name;

    private $headquartersAddress;

    private $legalRepresentativeFirstName;

    private $legalRepresentativeLastName;

    private $legalRepresentativeAddress;

    private $legalRepresentativeEmail;

    private $legalRepresentativeBirthday;

    private $legalRepresentativeNationality;

    private $legalRepresentativeCountryOfResidence;

    private $proofOfIdentity;

    private $statute;

    private $proofOfRegistration;

    private $shareholderDeclaration;

    public function __construct()
    {
        $this->setPersonType(MangoPayConstants::LEGAL_PERSON_TYPE);
    }

    /**
     * @return string
     */
    public function getLegalPersonType(): string
    {
        return $this->legalPersonType;
    }

    /**
     * @param string $legalPersonType
     */
    public function setLegalPersonType(string $legalPersonType)
    {
        $this->legalPersonType = $legalPersonType;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getHeadquartersAddress()
    {
        return $this->headquartersAddress;
    }

    /**
     * @param mixed $headquartersAddress
     */
    public function setHeadquartersAddress($headquartersAddress)
    {
        $this->headquartersAddress = $headquartersAddress;
    }

    /**
     * @return mixed
     */
    public function getLegalRepresentativeFirstName()
    {
        return $this->legalRepresentativeFirstName;
    }

    /**
     * @param mixed $legalRepresentativeFirstName
     */
    public function setLegalRepresentativeFirstName($legalRepresentativeFirstName)
    {
        $this->legalRepresentativeFirstName = $legalRepresentativeFirstName;
    }

    /**
     * @return mixed
     */
    public function getLegalRepresentativeLastName()
    {
        return $this->legalRepresentativeLastName;
    }

    /**
     * @param mixed $legalRepresentativeLastName
     */
    public function setLegalRepresentativeLastName($legalRepresentativeLastName)
    {
        $this->legalRepresentativeLastName = $legalRepresentativeLastName;
    }

    /**
     * @return mixed
     */
    public function getLegalRepresentativeAddress()
    {
        return $this->legalRepresentativeAddress;
    }

    /**
     * @param mixed $legalRepresentativeAddress
     */
    public function setLegalRepresentativeAddress($legalRepresentativeAddress)
    {
        $this->legalRepresentativeAddress = $legalRepresentativeAddress;
    }

    /**
     * @return mixed
     */
    public function getLegalRepresentativeEmail()
    {
        return $this->legalRepresentativeEmail;
    }

    /**
     * @param mixed $legalRepresentativeEmail
     */
    public function setLegalRepresentativeEmail($legalRepresentativeEmail)
    {
        $this->legalRepresentativeEmail = $legalRepresentativeEmail;
    }

    /**
     * @return mixed
     */
    public function getLegalRepresentativeBirthday()
    {
        return $this->legalRepresentativeBirthday;
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
    public function getLegalRepresentativeNationality()
    {
        return $this->legalRepresentativeNationality;
    }

    /**
     * @param mixed $legalRepresentativeNationality
     */
    public function setLegalRepresentativeNationality($legalRepresentativeNationality)
    {
        $this->legalRepresentativeNationality = $legalRepresentativeNationality;
    }

    /**
     * @return mixed
     */
    public function getLegalRepresentativeCountryOfResidence()
    {
        return $this->legalRepresentativeCountryOfResidence;
    }

    /**
     * @param mixed $legalRepresentativeCountryOfResidence
     */
    public function setLegalRepresentativeCountryOfResidence($legalRepresentativeCountryOfResidence)
    {
        $this->legalRepresentativeCountryOfResidence = $legalRepresentativeCountryOfResidence;
    }

    /**
     * @return mixed
     */
    public function getProofOfIdentity()
    {
        return $this->proofOfIdentity;
    }

    /**
     * @param mixed $proofOfIdentity
     */
    public function setProofOfIdentity($proofOfIdentity)
    {
        $this->proofOfIdentity = $proofOfIdentity;
    }

    /**
     * @return mixed
     */
    public function getStatute()
    {
        return $this->statute;
    }

    /**
     * @param mixed $statute
     */
    public function setStatute($statute)
    {
        $this->statute = $statute;
    }

    /**
     * @return mixed
     */
    public function getProofOfRegistration()
    {
        return $this->proofOfRegistration;
    }

    /**
     * @param mixed $proofOfRegistration
     */
    public function setProofOfRegistration($proofOfRegistration)
    {
        $this->proofOfRegistration = $proofOfRegistration;
    }

    /**
     * @return mixed
     */
    public function getShareholderDeclaration()
    {
        return $this->shareholderDeclaration;
    }

    /**
     * @param mixed $shareholderDeclaration
     */
    public function setShareholderDeclaration($shareholderDeclaration)
    {
        $this->shareholderDeclaration = $shareholderDeclaration;
    }


}
