<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    20/01/2017
 * Time:    13:01
 * File:    BankAccountQueryInterface.php
 **/

namespace PartFire\MangoPayBundle\Models;

use PartFire\MangoPayBundle\Models\DTOs\AbstractBankAccount;
use PartFire\MangoPayBundle\Models\DTOs\GbBankAccount;
use PartFire\MangoPayBundle\Models\DTOs\IbanBankAccount;

interface BankAccountQueryInterface
{
    public function createIbanBankAccount(IbanBankAccount $ibanBankAccount) : IbanBankAccount;

    public function createGbBankAccount(GbBankAccount $gbBankAccount): GbBankAccount;

    public function deactivate($userId, $bankAccountId): bool;

    public function get($userId, $bankAccountId) : AbstractBankAccount;

    public function getAll($userId);
}
