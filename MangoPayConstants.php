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

    // Hook Variables
    // https://docs.mangopay.com/endpoints/v2.01/hooks#e246_the-hook-object
    const       HOOK_EVENT_TYPE                     = "EventType";
    const       HOOK_RESOURCE_ID                    = "RessourceId";  // Known spelling mistake in MangoPay Api
    const       HOOK_DATE                           = "Date";

    // Event types

    const PAYIN_NORMAL_CREATED                      = "PAYIN_NORMAL_CREATED";
    const PAYIN_NORMAL_SUCCEEDED                    = "PAYIN_NORMAL_SUCCEEDED";
    const PAYIN_NORMAL_FAILED                       = "PAYIN_NORMAL_FAILED";

    const PAYOUT_NORMAL_CREATED                     = "PAYOUT_NORMAL_CREATED";
    const PAYOUT_NORMAL_SUCCEEDED                   = "PAYOUT_NORMAL_SUCCEEDED";
    const PAYOUT_NORMAL_FAILED                      = "PAYOUT_NORMAL_FAILED";

    const TRANSFER_NORMAL_CREATED                   = "TRANSFER_NORMAL_CREATED";
    const TRANSFER_NORMAL_SUCCEEDED                 = "TRANSFER_NORMAL_SUCCEEDED";
    const TRANSFER_NORMAL_FAILED                    = "TRANSFER_NORMAL_FAILED";

    const PAYIN_REFUND_CREATED                      = "PAYIN_REFUND_CREATED";
    const PAYIN_REFUND_SUCCEEDED                    = "PAYIN_REFUND_SUCCEEDED";
    const PAYIN_REFUND_FAILED                       = "PAYIN_REFUND_FAILED";

    const PAYOUT_REFUND_CREATED                     = "PAYOUT_REFUND_CREATED";
    const PAYOUT_REFUND_SUCCEEDED                   = "PAYOUT_REFUND_SUCCEEDED";
    const PAYOUT_REFUND_FAILED                      = "PAYOUT_REFUND_FAILED";

    const TRANSFER_REFUND_CREATED                   = "TRANSFER_REFUND_CREATED";
    const TRANSFER_REFUND_SUCCEEDED                 = "TRANSFER_REFUND_SUCCEEDED";
    const TRANSFER_REFUND_FAILED                    = "TRANSFER_REFUND_FAILED";

    const PAYIN_REPUDIATION_CREATED                 = "PAYIN_REPUDIATION_CREATED";
    const PAYIN_REPUDIATION_SUCCEEDED               = "PAYIN_REPUDIATION_SUCCEEDED";
    const PAYIN_REPUDIATION_FAILED                  = "PAYIN_REPUDIATION_FAILED";

    const KYC_CREATED                               = "KYC_CREATED";
    const KYC_SUCCEEDED                             = "KYC_SUCCEEDED";
    const KYC_FAILED                                = "KYC_FAILED";
    const KYC_VALIDATION_ASKED                      = "KYC_VALIDATION_ASKED";

    const DISPUTE_DOCUMENT_CREATED                  = "DISPUTE_DOCUMENT_CREATED";
    const DISPUTE_DOCUMENT_VALIDATION_ASKED         = "DISPUTE_DOCUMENT_VALIDATION_ASKED";
    const DISPUTE_DOCUMENT_SUCCEEDED                = "DISPUTE_DOCUMENT_SUCCEEDED";
    const DISPUTE_DOCUMENT_FAILED                   = "DISPUTE_DOCUMENT_FAILED";

    const DISPUTE_CREATED                           = "DISPUTE_CREATED";
    const DISPUTE_SUBMITTED                         = "DISPUTE_SUBMITTED";
    const DISPUTE_ACTION_REQUIRED                   = "DISPUTE_ACTION_REQUIRED";
    const DISPUTE_FURTHER_ACTION_REQUIRED           = "DISPUTE_FURTHER_ACTION_REQUIRED";
    const DISPUTE_CLOSED                            = "DISPUTE_CLOSED";
    const DISPUTE_SENT_TO_BANK                      = "DISPUTE_SENT_TO_BANK";

    const TRANSFER_SETTLEMENT_CREATED               = "TRANSFER_SETTLEMENT_CREATED";
    const TRANSFER_SETTLEMENT_SUCCEEDED             = "TRANSFER_SETTLEMENT_SUCCEEDED";
    const TRANSFER_SETTLEMENT_FAILED                = "TRANSFER_SETTLEMENT_FAILED";

    const MANDATE_CREATED                           = "MANDATE_CREATED";
    const MANDATED_FAILED                           = "MANDATED_FAILED";
    const MANDATE_ACTIVATED                         = "MANDATE_ACTIVATED";
    const MANDATE_SUBMITTED                         = "MANDATE_SUBMITTED";

    const PREAUTHORIZATION_PAYMENT_WAITING          = "PREAUTHORIZATION_PAYMENT_WAITING";
    // (not currently available) 'PREAUTHORIZATION_PAYMENT_EXPIRED',
    const PREAUTHORIZATION_PAYMENT_CANCELED         = "PREAUTHORIZATION_PAYMENT_CANCELED";
    const PREAUTHORIZATION_PAYMENT_VALIDATED        = "PREAUTHORIZATION_PAYMENT_VALIDATED";

    // PAY IN Status' CREATED, SUCCEEDED, FAILED
    const       NEW_WAITING                            = "NEW-WAITING-FOR-HOOK-UPDATE";
    const       CREATED_VERIFIED                       = "CREATED";
    const       SUCCEEDED_VERIFIED                     = "SUCCEEDED";
    const       FAILED_VERIFIED                        = "FAILED";



    public static function getErrorCodeFriendlyReason($mangoErrorCode)
    {

    }

    public static function getErrorCodeMangoPayReason($mangoErrorCode)
    {
        $msg = "";
        switch ($mangoErrorCode) {
            case "001999":
                $msg = "Generic Operation error. Mangopay has no information for the bank yet.";
                break;
            case "001001":
                $msg = "Unsufficient wallet balance. The wallet balance doesn’t allow to process transaction.";
                break;
            case "001002":
                $msg = "Author is not the wallet owner. The user ID used as Author has to be the wallet owner.";
                break;
            case "001011":
                $msg = "Transaction amount is higher than maximum permitted amount.";
                break;
            case "001012":
                $msg = "Transaction amount is lower than minimum permitted amount.";
                break;
            case "001013":
                $msg = "Invalid transaction amount.";
                break;
            case "001014":
                $msg = "CreditedFunds must be more than 0 (DebitedFunds can not equal Fees).";
                break;
        }
    }

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

    public static function isEventTypeToDoWithKYC($eventType)
    {
        return substr($eventType, 0, 4) == "KYC_";
    }

    public static function isEventTypeToDoWithPayIn($eventType)
    {
        return substr($eventType, 0, 6) == "PAYIN_";
    }

    public static function getAllEventTypes()
    {
        return [
            self::PAYIN_NORMAL_CREATED,
            self::PAYIN_NORMAL_SUCCEEDED,
            self::PAYIN_NORMAL_FAILED,

            self::PAYOUT_NORMAL_CREATED,
            self::PAYOUT_NORMAL_SUCCEEDED,
            self::PAYOUT_NORMAL_FAILED,

            self::TRANSFER_NORMAL_CREATED,
            self::TRANSFER_NORMAL_SUCCEEDED,
            self::TRANSFER_NORMAL_FAILED,

            self::PAYIN_REFUND_CREATED,
            self::PAYIN_REFUND_SUCCEEDED,
            self::PAYIN_REFUND_FAILED,

            self::PAYOUT_REFUND_CREATED,
            self::PAYOUT_REFUND_SUCCEEDED,
            self::PAYOUT_REFUND_FAILED,

            self::TRANSFER_REFUND_CREATED,
            self::TRANSFER_REFUND_SUCCEEDED,
            self::TRANSFER_REFUND_FAILED,

            self::PAYIN_REPUDIATION_CREATED,
            self::PAYIN_REPUDIATION_SUCCEEDED,
            self::PAYIN_REPUDIATION_FAILED,

            self::KYC_CREATED,
            self::KYC_SUCCEEDED,
            self::KYC_FAILED,
            self::KYC_VALIDATION_ASKED,

            self::DISPUTE_DOCUMENT_CREATED,
            self::DISPUTE_DOCUMENT_VALIDATION_ASKED,
            self::DISPUTE_DOCUMENT_SUCCEEDED,
            self::DISPUTE_DOCUMENT_FAILED,

            self::DISPUTE_CREATED,
            self::DISPUTE_SUBMITTED,
            self::DISPUTE_ACTION_REQUIRED,
            self::DISPUTE_FURTHER_ACTION_REQUIRED,
            self::DISPUTE_CLOSED,
            self::DISPUTE_SENT_TO_BANK,

            self::TRANSFER_SETTLEMENT_CREATED,
            self::TRANSFER_SETTLEMENT_SUCCEEDED,
            self::TRANSFER_SETTLEMENT_FAILED,

            self::MANDATE_CREATED,
            self::MANDATED_FAILED,
            self::MANDATE_ACTIVATED,
            self::MANDATE_SUBMITTED,

            self::PREAUTHORIZATION_PAYMENT_WAITING,
            // (not currently available) 'PREAUTHORIZATION_PAYMENT_EXPIRED',
            self::PREAUTHORIZATION_PAYMENT_CANCELED,
            self::PREAUTHORIZATION_PAYMENT_VALIDATED

        ];
    }
}