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

use PartFire\MangoPayBundle\Models\CardQueryInterface;
use PartFire\MangoPayBundle\Models\CardRegistrationsQueryInterface;

class Card
{
    /**
     * @var CardRegistrationsQueryInterface
     */
    private $cardRegistrationQuery;
    /**
     * @var CardQueryInterface
     */
    private $cardQuery;

    public function __construct(CardRegistrationsQueryInterface $cardRegistrationsQuery, CardQueryInterface $cardQuery)
    {
        $this->cardRegistrationQuery = $cardRegistrationsQuery;
        $this->cardQuery = $cardQuery;
    }

    /**
     * @param string $userId
     * @param string $currency
     * @param string $cardType
     * @param string $tag
     * @return null|\PartFire\MangoPayBundle\Models\DTOs\CardRegistration
     * Create a card registration
     */
    public function createRegistration(string $userId, string $currency, string $cardType, string $tag)
    {
        return $this->cardRegistrationQuery->create($userId, $currency, $cardType, $tag);
    }

    /**
     * @param $cardRegisteredId
     * update cardRegister after payment form
     * @param $registrationData
     * @return null|\PartFire\MangoPayBundle\Models\DTOs\CardRegistration
     */
    public function updateRegistration(string $cardRegisteredId, string $registrationData)
    {
        return $this->cardRegistrationQuery->update($cardRegisteredId, $registrationData);
    }

    /**
     * @param string $cardRegisteredId
     * @return null|\PartFire\MangoPayBundle\Models\DTOs\CardRegistration
     */
    public function getRegistration(string $cardRegisteredId)
    {
        return $this->cardRegistrationQuery->get($cardRegisteredId);
    }

    /**
     * @param $cardId
     * @return null|\PartFire\MangoPayBundle\Models\DTOs\Card
     */
    public function get($cardId)
    {
        return $this->cardQuery->get($cardId);
    }

    /**
     * @param $cardId
     * @return null|\PartFire\MangoPayBundle\Models\DTOs\Card
     */
    public function deactivate($cardId)
    {
        return $this->cardQuery->deactivate($cardId);
    }
}
