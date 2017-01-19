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
use PartFire\MangoPayBundle\Models\DTOs\Card;
use PartFire\MangoPayBundle\Models\DTOs\CardRegistration as CardRegistrationDto;
use MangoPay\Card as mangoCard;

class CardTranslator
{
    /**
     * @param CardRegistration $cardRegistration
     * @return CardRegistrationDto
     */
    public function translateMangoCardRegistrationDataToDto(CardRegistration $cardRegistration)
    {
        $cardRegistrationDto = new CardRegistrationDto();
        $cardRegistrationDto->setAccessKey($cardRegistration->AccessKey);
        $cardRegistrationDto->setCardId($cardRegistration->CardId);
        $cardRegistrationDto->setCardRegistrationUrl($cardRegistration->CardRegistrationURL);
        $cardRegistrationDto->setCardType($cardRegistration->CardType);
        $cardRegistrationDto->setCreationDate($cardRegistration->CreationDate);
        $cardRegistrationDto->setCurrency($cardRegistration->Currency);
        $cardRegistrationDto->setPreregistrationData($cardRegistration->PreregistrationData);
        $cardRegistrationDto->setResultCode($cardRegistration->ResultCode);
        $cardRegistrationDto->setId($cardRegistration->Id);
        $cardRegistrationDto->setTag($cardRegistration->Tag);
        $cardRegistrationDto->setStatus($cardRegistration->Status);
        $cardRegistrationDto->setResultMessage($cardRegistration->ResultMessage);
        return $cardRegistrationDto;
    }

    /**
     * @param mangoCard $card
     * @return Card
     */
    public function translateMangoCardToDto(mangoCard $card)
    {
        $cardDto = new Card();
        $cardDto->setTag($card->Tag);
        $cardDto->setId($card->Id);
        $cardDto->setActive($card->Active);
        $cardDto->setBankCode($card->BankCode);
        $cardDto->setAlias($card->Alias);
        $cardDto->setCardProvider($card->CardProvider);
        $cardDto->setCardType($card->CardType);
        $cardDto->setCountry($card->Country);
        $cardDto->setCreationDate($card->CreationDate);
        $cardDto->setExpirationDate($card->ExpirationDate);
        $cardDto->setCurrency($card->Currency);
        $cardDto->setValidity($card->Validity);
        $cardDto->setProduct($card->Product);
        return $cardDto;
    }
}
