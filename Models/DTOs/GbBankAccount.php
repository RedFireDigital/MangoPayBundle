<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    20/01/2017
 * Time:    14:35
 * File:    GbBankAccount.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;

class GbBankAccount extends AbstractBankAccount
{

    private $accountNumber;

    private $sortCode;

    /**
     * @return mixed
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param mixed $accountNumber
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return mixed
     */
    public function getSortCode()
    {
        return $this->sortCode;
    }

    /**
     * @param mixed $sortCode
     */
    public function setSortCode($sortCode)
    {
        $this->sortCode = $sortCode;
    }
}
