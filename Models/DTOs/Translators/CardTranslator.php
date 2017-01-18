<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    18/01/2017
 * Time:    16:27
 * File:    CardTranslator.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs\Translators;

use MangoPay\CardRegistration;
use PartFire\MangoPayBundle\Models\DTOs\CardRegistration as CardRegistrationDto;

class CardTranslator
{
    public function translateMangoCardRegistrationDataToDto(CardRegistration $cardRegistration)
    {
        $cartDto = new CardRegistrationDto();
        $cartDto->setAccessKey($cardRegistration->AccessKey);
        $cartDto->setCardId($cardRegistration->CardId);
        $cartDto->setCardRegistrationUrl($cardRegistration->CardRegistrationURL);
        $cartDto->setCardType($cardRegistration->CardType);
        $cartDto->setCreationDate($cardRegistration->CreationDate);
        $cartDto->setCurrency($cardRegistration->Currency);
        $cartDto->setPreregistrationData($cardRegistration->PreregistrationData);
        $cartDto->setResultCode($cardRegistration->ResultCode);
        $cartDto->setId($cardRegistration->Id);
        $cartDto->setTag($cardRegistration->Tag);
        $cartDto->setStatus($cardRegistration->Status);
        $cartDto->setResultMessage($cardRegistration->ResultMessage);
        return $cartDto;
    }
}
