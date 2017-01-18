<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    17/01/2017
 * Time:    16:25
 * File:    Card.php
 **/

namespace PartFire\MangoPayBundle\Services;

use PartFire\MangoPayBundle\Models\CardRegistrationsQueryInterface;

class Card
{
    /**
     * @var CardRegistrationsQueryInterface
     */
    private $cardQuery;

    public function __construct(CardRegistrationsQueryInterface $cardQuery)
    {
        $this->cardQuery = $cardQuery;
    }

    /**
     * @param string $userId
     * @param string $currency
     * @param string $cardType
     * @param string $tag
     * @return null|\PartFire\MangoPayBundle\Models\DTOs\Card
     * Create a card registration
     */
    public function create(string $userId, string $currency, string $cardType, string $tag)
    {
        return $this->cardQuery->create($userId, $currency, $cardType, $tag);
    }

    /**
     * @param $cardRegisteredId
     * update cardRegister after payment form
     * @param $registrationData
     */
    public function update(string $cardRegisteredId, string $registrationData)
    {


        return $this->cardQuery->update($cardRegisteredId, $registrationData);


    }
}
