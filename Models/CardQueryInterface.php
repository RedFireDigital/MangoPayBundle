<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    18/01/2017
 * Time:    23:41
 * File:    CardQueryInterface.php
 **/

namespace PartFire\MangoPayBundle\Models;

use PartFire\MangoPayBundle\Models\DTOs\Card;

interface CardQueryInterface
{
    public function get(string $cardId): Card;

    public function deactivate(string $cardId): Card;
}
