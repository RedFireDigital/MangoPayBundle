<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    28/11/2016
 * Time:    16:47
 * File:    Wallet.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;

class Wallet
{
    protected $owenerIds = [];

    protected $id;

    protected $currency;

    protected $description;

    protected $tag;

    protected $balance;

    /**
     * @return mixed
     */
    public function getOwenerIds()
    {
        return $this->owenerIds;
    }

    /**
     * @param mixed $owenerIds
     */
    public function setOwenerIds(array $owenerIds)
    {
        $this->owenerIds = $owenerIds;
    }

    /**
     * @param $owenerId
     */
    public function setOwenerId($owenerId)
    {
        $this->owenerIds[] = $owenerId;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }
}
