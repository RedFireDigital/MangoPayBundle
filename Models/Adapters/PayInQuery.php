<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    19/01/2017
 * Time:    12:47
 * File:    PayInQuery.php
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;

use MangoPay\PayIn;
use MangoPay\PayInStatus;
use PartFire\MangoPayBundle\Models\DTOs\BankwireDirectPayIn;
use PartFire\MangoPayBundle\Models\DTOs\CardDirectPayIn;
use PartFire\MangoPayBundle\Models\DTOs\Translators\PayInTranslator;
use PartFire\MangoPayBundle\Models\PayInQueryInterface;
use Symfony\Bridge\Monolog\Logger;
use PartFire\MangoPayBundle\Models\Exception as PartFireException;
use MangoPay\Libraries\Exception;
use MangoPay\Libraries\ResponseException;
use MangoPay\MangoPayApi;

class PayInQuery extends AbstractQuery implements PayInQueryInterface
{
    /**
     * @var PayInTranslator
     */
    private $payInTranslator;

    public function __construct(
        $clientId,
        $clientPassword,
        $baseUrl,
        MangoPayApi $mangoPayApi,
        Logger $logger,
        PayInTranslator $payInTranslator
    ) {
        parent::__construct($clientId, $clientPassword, $baseUrl, $mangoPayApi, $logger);
        $this->payInTranslator = $payInTranslator;
    }

    public function createPayInCardDirect(CardDirectPayIn $cardDirectPayIn) : CardDirectPayIn
    {
        try {
            $payIn = $this->payInTranslator->translateDtoToMangoPayInForDirectPayIn($cardDirectPayIn);
            $createdPayIn = $this->mangoPayApi->PayIns->Create($payIn);

            if ($createdPayIn instanceof PayIn) {
                if ($createdPayIn->Status == PayInStatus::Succeeded) {
                    return $this->payInTranslator->translateMangoPayDirectPayInToDto($createdPayIn);
                }
                $this->logger->addCritical(
                    "Pay-In has been created with status: ".$createdPayIn->Status . ' (result code: ' . $createdPayIn->ResultCode . ')'
                );
                throw new PartFireException(
                    "Pay-In has been created with status: ".$createdPayIn->Status . ' (result code: ' . $createdPayIn->ResultCode . ')'
                );
            }
            $this->logger->addCritical("Failed to create PayIn");
            throw new PartFireException("Failed to create PayIn");
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function createBankWireDirectPayIn(BankwireDirectPayIn $bankwireDirectPayIn) : BankwireDirectPayIn
    {
        try {
            $payIn = $this->payInTranslator->translateDtoToMangoPayInForBankwireDirectPayIn($bankwireDirectPayIn);
            $createdPayIn = $this->mangoPayApi->PayIns->Create($payIn);

            if ($createdPayIn instanceof PayIn) {

                if ($createdPayIn->Status == PayInStatus::Created) {
                    return $this->payInTranslator->translateMangoPayBankwireDirectPayInToDto($createdPayIn);
                }
                $this->logger->addCritical(
                    "Pay-In has been created with status: ".$createdPayIn->Status . ' (result code: ' . $createdPayIn->ResultCode . ')'
                );
                throw new PartFireException(
                    "Pay-In has been created with status: ".$createdPayIn->Status . ' (result code: ' . $createdPayIn->ResultCode . ')'
                );
            }
            $this->logger->addCritical("Failed to create PayIn");
            throw new PartFireException("Failed to create PayIn");
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
