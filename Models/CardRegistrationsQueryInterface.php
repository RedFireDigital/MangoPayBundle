<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    17/01/2017
 * Time:    16:26
 * File:    CardQueryInterface.php
 **/

namespace PartFire\MangoPayBundle\Models;

use PartFire\MangoPayBundle\Models\DTOs\CardRegistration as CardRegistrationDto;

interface CardRegistrationsQueryInterface
{
    public function create(string $userId, string $currency, string $cardType, string $tag): CardRegistrationDto;

    public function update(string $cardRegisteredId, string $registrationData): CardRegistrationDto;

    public function get(string $cardRegisteredId): CardRegistrationDto;
}
