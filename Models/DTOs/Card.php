<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    17/01/2017
 * Time:    21:28
 * File:    Card.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;


class Card
{
    private $id;

    private $creationDate;

    private $tag;

    private $currency;

    private $accessKey;

    private $preregistrationData;

    private $cardRegistrationUrl;

    private $registrationUrl;

    private $cardType;

    private $cardId;

    private $resultCode;

    private $resultMessage;

    private $status;

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
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getAccessKey()
    {
        return $this->accessKey;
    }

    /**
     * @param mixed $accessKey
     */
    public function setAccessKey($accessKey)
    {
        $this->accessKey = $accessKey;
    }

    /**
     * @return mixed
     */
    public function getPreregistrationData()
    {
        return $this->preregistrationData;
    }

    /**
     * @param mixed $preregistrationData
     */
    public function setPreregistrationData($preregistrationData)
    {
        $this->preregistrationData = $preregistrationData;
    }

    /**
     * @return mixed
     */
    public function getCardRegistrationUrl()
    {
        return $this->cardRegistrationUrl;
    }

    /**
     * @param mixed $cardRegistrationUrl
     */
    public function setCardRegistrationUrl($cardRegistrationUrl)
    {
        $this->cardRegistrationUrl = $cardRegistrationUrl;
    }

    /**
     * @return mixed
     */
    public function getRegistrationUrl()
    {
        return $this->registrationUrl;
    }

    /**
     * @param mixed $registrationUrl
     */
    public function setRegistrationUrl($registrationUrl)
    {
        $this->registrationUrl = $registrationUrl;
    }

    /**
     * @return mixed
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @param mixed $cardType
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }

    /**
     * @return mixed
     */
    public function getCardId()
    {
        return $this->cardId;
    }

    /**
     * @param mixed $cardId
     */
    public function setCardId($cardId)
    {
        $this->cardId = $cardId;
    }

    /**
     * @return mixed
     */
    public function getResultCode()
    {
        return $this->resultCode;
    }

    /**
     * @param mixed $resultCode
     */
    public function setResultCode($resultCode)
    {
        $this->resultCode = $resultCode;
    }

    /**
     * @return mixed
     */
    public function getResultMessage()
    {
        return $this->resultMessage;
    }

    /**
     * @param mixed $resultMessage
     */
    public function setResultMessage($resultMessage)
    {
        $this->resultMessage = $resultMessage;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
