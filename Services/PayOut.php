<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    19/01/2017
 * Time:    23:21
 * File:    PayOut.php
 **/

namespace PartFire\MangoPayBundle\Services;

use PartFire\MangoPayBundle\Models\DTOs\PayOutBankWire;
use PartFire\MangoPayBundle\Models\PayOutQueryInterface;

class PayOut
{
    /**
     * @var PayOutQueryInterface
     */
    private $payOutQuery;

    public function __construct(PayOutQueryInterface $payOutQuery)
    {
        $this->payOutQuery = $payOutQuery;
    }

    public function create(PayOutBankWire $payOutBankWire) : PayOutBankWire
    {
        return $this->payOutQuery->createBankWire($payOutBankWire);
    }

    public function get($payOutId) : PayOutBankWire
    {
        return $this->payOutQuery->getBankWire($payOutId);
    }
}
