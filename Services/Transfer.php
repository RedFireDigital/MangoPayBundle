<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    06/12/2016
 * Time:    22:05
 * File:    Transfer.php
 **/

namespace PartFire\MangoPayBundle\Services;

use PartFire\MangoPayBundle\Models\TransferQueryInterface;
use PartFire\MangoPayBundle\Models\DTOs\Transfer as TransferDto;

class Transfer
{
    protected $transferQuery;

    public function __construct(TransferQueryInterface $transferQuery)
    {
        $this->transferQuery = $transferQuery;
    }

    public function create(TransferDto $transfer)
    {
        return $this->transferQuery->create($transfer);
    }
}
