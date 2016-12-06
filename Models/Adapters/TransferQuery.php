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

class TransferQuery extends AbstractQuery implements TransferQueryInterface
{
    /**
     * @var TransferTranslator
     */
    protected $transferTranslator;

    public function __construct(
        $clientId,
        $clientPassword,
        $baseUrl,
        MangoPayApi $mangoPayApi,
        Logger $logger,
        TransferTranslator $transferTranslator
    ) {
        parent::__construct($clientId, $clientPassword, $baseUrl,$mangoPayApi, $logger);
        $this->transferTranslator = $transferTranslator;
    }

    /**
     * @param User $userDto
     * @return User|PartFireException
     */
    public function create(Transfer $transferDto)
    {
        $mangoTransfer = $this->transferTranslator->convertDTOToMangoPayTransfer($transferDto);
        try {
            $mangoTransfer = $this->mangoPayApi->Transfers->Create($mangoTransfer);
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            return new PartFireException($e->getMessage(), $e->getCode());
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            return new PartFireException($e->getMessage(), $e->getCode());
        }
        return $this->transferTranslator->convertMangoPayTransferToDTO($mangoTransfer);
    }
}
