<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    28/11/2016
 * Time:    21:27
 * File:    Wallet.php
 **/

namespace PartFire\MangoPayBundle\Services;

use PartFire\MangoPayBundle\Models\WalletQueryInterface;
use \PartFire\MangoPayBundle\Models\DTOs\Wallet as WalletDto;

class Wallet
{
    protected $walletQuery;

    public function __construct(WalletQueryInterface $walletQuery)
    {
        $this->walletQuery = $walletQuery;
    }

    /**
     * @param UserDto $user
     * @return mixed
     */
    public function create(WalletDto $walletDto)
    {
        return $this->walletQuery->create($walletDto);
    }
}
