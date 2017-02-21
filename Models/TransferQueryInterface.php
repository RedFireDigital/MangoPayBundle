<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    06/12/2016
 * Time:    22:30
 * File:    TransferQueryInterface.php
 **/

namespace PartFire\MangoPayBundle\Models;


use PartFire\MangoPayBundle\Models\DTOs\Transfer;

interface TransferQueryInterface
{
    public function create(Transfer $transfer);
    public function get(string $transferId) : Transfer;
}
