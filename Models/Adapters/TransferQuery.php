<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    06/12/2016
 * Time:    22:41
 * File:    TransferQuery.php
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;

use PartFire\MangoPayBundle\Models\DTOs\Transfer;
use PartFire\MangoPayBundle\Models\DTOs\Translators\TransferTranslator;
use PartFire\MangoPayBundle\Models\TransferQueryInterface;
use MangoPay\Libraries\ResponseException;
use MangoPay\Libraries\Exception;
use PartFire\MangoPayBundle\Models\Exception as PartFireException;
use Symfony\Bridge\Monolog\Logger;
use MangoPay\MangoPayApi;

class TransferQuery extends AbstractQuery implements TransferQueryInterface
{
    /**
     * @var TransferTranslator
     */
    protected $transferTranslator;

    /**
     * TransferQuery constructor.
     * @param $clientId
     * @param $clientPassword
     * @param $baseUrl
     * @param MangoPayApi $mangoPayApi
     * @param Logger $logger
     * @param TransferTranslator $transferTranslator
     */
    public function __construct(
        $clientId,
        $clientPassword,
        $baseUrl,
        MangoPayApi $mangoPayApi,
        Logger $logger,
        TransferTranslator $transferTranslator
    ) {
        parent::__construct($clientId, $clientPassword, $baseUrl, $mangoPayApi, $logger);
        $this->transferTranslator = $transferTranslator;
    }

    /**
     * @param Transfer $transferDto
     * @return Transfer|PartFireException
     */
    public function create(Transfer $transferDto)
    {
        $mangoTransfer = $this->transferTranslator->convertDTOToMangoPayTransfer($transferDto);
        try {



            $mangoTransfer = $this->mangoPayApi->Transfers->Create($mangoTransfer);

        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
        return $this->transferTranslator->convertMangoPayTransferToDTO($mangoTransfer);
    }

    public function get(string $transferId) : Transfer
    {
        try {
            $mangoTransfer = $this->mangoPayApi->Transfers->Get($transferId);
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
        return $this->transferTranslator->convertMangoPayTransferToDTO($mangoTransfer);
    }
}
