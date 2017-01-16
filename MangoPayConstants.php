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

    //  https://docs.mangopay.com/endpoints/v2.01/hooks#e246_the-hook-object
    // 16th Jan 2017

    public static function getAllEventTypes()
    {
        return [
            'PAYIN_NORMAL_CREATED',
            'PAYIN_NORMAL_SUCCEEDED',
            'PAYIN_NORMAL_FAILED',

            'PAYOUT_NORMAL_CREATED',
            'PAYOUT_NORMAL_SUCCEEDED',
            'PAYOUT_NORMAL_FAILED',

            'TRANSFER_NORMAL_CREATED',
            'TRANSFER_NORMAL_SUCCEEDED',
            'TRANSFER_NORMAL_FAILED',

            'PAYIN_REFUND_CREATED',
            'PAYIN_REFUND_SUCCEEDED',
            'PAYIN_REFUND_FAILED',

            'PAYOUT_REFUND_CREATED',
            'PAYOUT_REFUND_SUCCEEDED',
            'PAYOUT_REFUND_FAILED',

            'TRANSFER_REFUND_CREATED',
            'TRANSFER_REFUND_SUCCEEDED',
            'TRANSFER_REFUND_FAILED',

            'PAYIN_REPUDIATION_CREATED',
            'PAYIN_REPUDIATION_SUCCEEDED',
            'PAYIN_REPUDIATION_FAILED',

            'KYC_CREATED',
            'KYC_SUCCEEDED',
            'KYC_FAILED',
            'KYC_VALIDATION_ASKED',

            'DISPUTE_DOCUMENT_CREATED',
            'DISPUTE_DOCUMENT_VALIDATION_ASKED',
            'DISPUTE_DOCUMENT_SUCCEEDED',
            'DISPUTE_DOCUMENT_FAILED',

            'DISPUTE_CREATED',
            'DISPUTE_SUBMITTED',
            'DISPUTE_ACTION_REQUIRED',
            'DISPUTE_FURTHER_ACTION_REQUIRED',
            'DISPUTE_CLOSED',
            'DISPUTE_SENT_TO_BANK',

            'TRANSFER_SETTLEMENT_CREATED',
            'TRANSFER_SETTLEMENT_SUCCEEDED',
            'TRANSFER_SETTLEMENT_FAILED',

            'MANDATE_CREATED',
            'MANDATED_FAILED',
            'MANDATE_ACTIVATED',
            'MANDATE_SUBMITTED',

            'PREAUTHORIZATION_PAYMENT_WAITING',
            // (not currently available) 'PREAUTHORIZATION_PAYMENT_EXPIRED',
            'PREAUTHORIZATION_PAYMENT_CANCELED',
            'PREAUTHORIZATION_PAYMENT_VALIDATED',

        ];
    }
}