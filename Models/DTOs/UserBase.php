<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    10/01/17
 * Time:    15:13
 * Project: PartFire MangoPay Bundle
 * File:    UserBase.php
 *
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;


class UserBase
{
    private $personType;
    private $email;
    private $kYCLevel;
    private $id;
    private $tag;
    private $creationDate;

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
    public function getKYCLevel()
    {
        return $this->kYCLevel;
    }

    /**
     * @param mixed $kYCLevel
     */
    public function setKYCLevel($kYCLevel)
    {
        $this->kYCLevel = $kYCLevel;
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
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function setSnapShotArrayToObject(array $array)
    {
        foreach ($array as $key => $value)
        {
            $methodName = 'set' . $key;
            $this->$methodName($value);
        }
    }

}