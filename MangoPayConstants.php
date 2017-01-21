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

    // KYC Doc types = https://docs.mangopay.com/endpoints/v2.01/kyc-documents#e205_create-a-kyc-document
    const       IDENTITY_PROOF                      = 'IDENTITY_PROOF';
    const       REGISTRATION_PROOF                  = 'REGISTRATION_PROOF';
    const       ARTICLES_OF_ASSOCIATION             = 'ARTICLES_OF_ASSOCIATION';
    const       SHAREHOLDER_DECLARATION             = 'SHAREHOLDER_DECLARATION';
    const       ADDRESS_PROOF                       = 'ADDRESS_PROOF';

    // KYC Doc Refusal reasons

    const       DOCUMENT_UNREADABLE                 = 'DOCUMENT_UNREADABLE';
    const       DOCUMENT_NOT_ACCEPTED               = 'DOCUMENT_NOT_ACCEPTED';
    const       DOCUMENT_HAS_EXPIRED                = 'DOCUMENT_HAS_EXPIRED';
    const       DOCUMENT_INCOMPLETE                 = 'DOCUMENT_INCOMPLETE';
    const       DOCUMENT_MISSING                    = 'DOCUMENT_MISSING';
    const       DOCUMENT_DO_NOT_MATCH_USER_DATA     = 'DOCUMENT_DO_NOT_MATCH_USER_DATA';
    const       DOCUMENT_DO_NOT_MATCH_ACCOUNT_DATA  = 'DOCUMENT_DO_NOT_MATCH_ACCOUNT_DATA';
    const       SPECIFIC_CASE                       = 'SPECIFIC_CASE';
    const       DOCUMENT_FALSIFIED                  = 'DOCUMENT_FALSIFIED';
    const       UNDERAGE_PERSON                     = 'UNDERAGE_PERSON';
    const       OTHER                               = 'OTHER';
    const       TRIGGER_PEPS                        = 'TRIGGER_PEPS';
    const       TRIGGER_SANCTIONS_LISTS             = 'TRIGGER_SANCTIONS_LISTS';
    const       TRIGGER_INTERPOL                    = 'TRIGGER_INTERPOL';

    // KYC Doc Status

    const       CREATED                             = 'CREATED';
    const       VALIDATION_ASKED                    = 'VALIDATION_ASKED';
    const       VALIDATED                           = 'VALIDATED';
    const       REFUSED                             = 'REFUSED';

    // Hook Status
    const       HOOK_NEW                            = "HOOK_NEW";
    const       HOOK_IN_PROGRESS                    = "HOOK_IN_PROGRESS";
    const       HOOK_ACTIONED                       = "HOOK_ACTIONED";

    public static function getKYCRefusalArray() : array
    {
        return [
            self::DOCUMENT_UNREADABLE,
            self::DOCUMENT_NOT_ACCEPTED,
            self::DOCUMENT_HAS_EXPIRED,
            self::DOCUMENT_INCOMPLETE,
            self::DOCUMENT_MISSING,
            self::DOCUMENT_DO_NOT_MATCH_USER_DATA,
            self::DOCUMENT_DO_NOT_MATCH_ACCOUNT_DATA,
            self::SPECIFIC_CASE,
            self::DOCUMENT_FALSIFIED,
            self::UNDERAGE_PERSON,
            self::OTHER,
            self::TRIGGER_PEPS,
            self::TRIGGER_SANCTIONS_LISTS,
            self::TRIGGER_INTERPOL
        ];
    }

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

    public static function isDocumentTypeOk($documentType)
    {
        return in_array($documentType, self::getDocumentTypeArray());
    }

    public static function getDocumentTypeArray()
    {
        return [
            self::IDENTITY_PROOF,
            self::REGISTRATION_PROOF,
            self::ARTICLES_OF_ASSOCIATION,
            self::SHAREHOLDER_DECLARATION,
            self::ADDRESS_PROOF
        ];
    }

    //  https://docs.mangopay.com/endpoints/v2.01/hooks#e246_the-hook-object
    // 16th Jan 2017

    public static function isEventTypeOk($eventType)
    {
        return in_array($eventType, self::getAllEventTypes());
    }

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