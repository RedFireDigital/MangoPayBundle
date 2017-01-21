<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    20/01/2017
 * Time:    15:45
 * File:    PayOutQueryInterface.php
 **/

namespace PartFire\MangoPayBundle\Models;

use PartFire\MangoPayBundle\Models\DTOs\PayOutBankWire;

interface PayOutQueryInterface
{
    public function createBankWire(PayOutBankWire $payOutBankWire) : PayOutBankWire;

    public function getBankWire(string $payOutId) : PayOutBankWire;
}
