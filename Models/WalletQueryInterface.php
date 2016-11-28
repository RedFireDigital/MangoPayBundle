<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    24/11/2016
 * Time:    19:54
 * File:    WalletInterface.php
 **/
namespace PartFire\MangoPayBundle\Models;

use PartFire\MangoPayBundle\Models\DTOs\Wallet;

interface WalletQueryInterface
{
    public function create(Wallet $walletDto);

    public function get($walletId);

    public function getAll();

    public function delete($walletId);
}
