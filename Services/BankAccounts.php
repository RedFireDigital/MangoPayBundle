<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    19/01/2017
 * Time:    23:18
 * File:    BankAccounts.php
 **/

namespace PartFire\MangoPayBundle\Services;

use PartFire\MangoPayBundle\Models\BankAccountQueryInterface;
use PartFire\MangoPayBundle\Models\DTOs\AbstractBankAccount;
use PartFire\MangoPayBundle\Models\DTOs\GbBankAccount;
use PartFire\MangoPayBundle\Models\DTOs\IbanBankAccount;

class BankAccounts
{
    /**
     * @var BankAccountQueryInterface
     */
    private $bankAccountQuery;

    public function __construct(BankAccountQueryInterface $bankAccountQuery)
    {
        $this->bankAccountQuery = $bankAccountQuery;
    }

    /**
     * @param IbanBankAccount $ibanBankAccount
     * @return IbanBankAccount
     */
    public function createIbanBankAccount(IbanBankAccount $ibanBankAccount) : IbanBankAccount
    {
        return $this->bankAccountQuery->createIbanBankAccount($ibanBankAccount);
    }

    /**
     * @param GbBankAccount $gbBankAccount
     * @return GbBankAccount
     */
    public function createGbBankAccount(GbBankAccount $gbBankAccount) : GbBankAccount
    {
        return $this->bankAccountQuery->createGbBankAccount($gbBankAccount);
    }

    /**
     * @param $userId
     * @param $bankAccountId
     * @return bool
     */
    public function deactivate($userId, $bankAccountId) : bool
    {
        return $this->bankAccountQuery->deactivate($userId, $bankAccountId);
    }

    /**
     * @param $userId
     * @param $bankAccountId
     * @return AbstractBankAccount
     */
    public function get($userId, $bankAccountId) : AbstractBankAccount
    {
        return $this->bankAccountQuery->get($userId, $bankAccountId);
    }
}
