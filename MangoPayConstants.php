<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    31/12/16
 * Time:    00:53
 * Project: PartFire MangoPay Bundle
 * File:    MangoPayConstants.php
 *
 **/

namespace PartFire\MangoPayBundle;


class MangoPayConstants
{
    const       NATURAL_PERSON_TYPE                 = 'NATURAL';
    const       LEGAL_PERSON_TYPE                   = 'LEGAL';

    //  https://docs.mangopay.com/endpoints/v2.01/users#e259_create-a-legal-user

    //  May also help https://www.gov.uk/business-legal-structures/overview

    const       LEGAL_PERSON_TYPE_SOLETRADER        = 'SOLETRADER';
    const       LEGAL_PERSON_TYPE_ORGANISATION      = 'ORGANIZATION';
    const       LEGAL_PERSON_TYPE_BUSINESS          = 'BUSINESS';

    //  https://docs.mangopay.com/endpoints/v2.01/users#e253_the-user-object

    const       KYC_LEVEL_LIGHT                     = 'LIGHT';
    const       KYC_LEVEL_REGULAR                   = 'REGULAR';

    // https://docs.mangopay.com/endpoints/v2/users#e254_the-natural-user-object

    public static function getIncomeRangeFromId(int $id) : string
    {
        switch ($id) {
            case 1:
                $range = "incomes <18K€";
                break;
            case 2:
                $range = "incomes between 18 and 30K€";
                break;
            case 3:
                $range = "incomes between 30 and 50K€";
                break;
            case 4:
                $range = "incomes between 50 and 80K€";
                break;
            case 5:
                $range = "incomes between 80 and 120K€";
                break;
            case 6:
                $range = "incomes>120K€";
                break;
            default:
                $range = "Unknown range";
        }

        return $range;
    }

    public static function isPersonTypeOk($personType)
    {
        return in_array($personType, self::getPersonTypeArray());
    }

    public static function getPersonTypeArray()
    {
        return [
            self::NATURAL_PERSON_TYPE,
            self::LEGAL_PERSON_TYPE
        ];
    }
}