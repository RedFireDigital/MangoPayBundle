<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    20/01/2017
 * Time:    15:40
 * File:    PayOutQuery.php
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;


use MangoPay\PayOut;
use MangoPay\PayOutStatus;
use PartFire\MangoPayBundle\Models\DTOs\PayOutBankWire;
use PartFire\MangoPayBundle\Models\DTOs\Translators\PayOutTranslator;
use PartFire\MangoPayBundle\Models\PayOutQueryInterface;
use PartFire\MangoPayBundle\Models\Exception as PartFireException;
use MangoPay\Libraries\Exception;
use MangoPay\Libraries\ResponseException;
use MangoPay\MangoPayApi;
use Symfony\Bridge\Monolog\Logger;

class PayOutQuery extends AbstractQuery implements PayOutQueryInterface
{
    /**
     * @var PayOutTranslator
     */
    private $payOutTranslator;

    public function __construct(
        $clientId,
        $clientPassword,
        $baseUrl,
        MangoPayApi $mangoPayApi,
        Logger $logger,
        PayOutTranslator $payOutTranslator
    ) {
        parent::__construct($clientId, $clientPassword, $baseUrl, $mangoPayApi, $logger);
        $this->payOutTranslator = $payOutTranslator;
    }

    public function createBankWire(PayOutBankWire $payOutBankWire) : PayOutBankWire
    {
        try {
            $payout = $this->payOutTranslator->translatePayOutDtoToMango($payOutBankWire);
            $createdPayout = $this->mangoPayApi->PayOuts->Create($payout);

            if ($createdPayout instanceof PayOut) {

                if ($createdPayout->Status == PayOutStatus::Created) {
                    return $this->payOutTranslator->translateMangoToPayOutDto($createdPayout);
                }
                $this->logger->addCritical(
                    "Pay-Out has been created with status: ".$createdPayout->Status . ' (result code: ' . $createdPayout->ResultCode . ')'
                );
                throw new PartFireException(
                    "Pay-Out has been created with status: ".$createdPayout->Status . ' (result code: ' . $createdPayout->ResultCode . ')'
                );
            }
            $this->logger->addCritical("Failed to create PayOut");
            throw new PartFireException("Failed to create PayOut");
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getBankWire(string $payOutId): PayOutBankWire
    {
        try {
            $payout = $this->mangoPayApi->PayOuts->Get($payOutId);
            if ($payout instanceof PayOut) {
                return $this->payOutTranslator->translateMangoToPayOutDto($payout);
            }
            $this->logger->addCritical("could not get pay out when querying API.");
            throw new PartFireException("could not get pay out when querying API.");
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
