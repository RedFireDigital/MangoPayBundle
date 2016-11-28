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
namespace Fruitful\WalletsBundle\Model\PaymentManager\Provider;

use Fruitful\IdentityCheckBundle\Entity\IdentityCheck;

interface WalletQueryInterface
{
    public function create(IdentityCheck $identityCheck);
}
