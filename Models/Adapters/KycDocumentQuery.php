<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    02/12/2016
 * Time:    15:50
 * File:    KycDocumentQuery.php
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;

use MangoPay\MangoPayApi;
use PartFire\MangoPayBundle\Models\DTOs\KycDocument;
use PartFire\MangoPayBundle\Models\DTOs\Translators\KycDocumentTranslator;
use PartFire\MangoPayBundle\Models\KycDocumentQueryInterface;
use Symfony\Bridge\Monolog\Logger;
use MangoPay\Libraries\ResponseException;
use MangoPay\Libraries\Exception;
use PartFire\MangoPayBundle\Models\Exception as PartFireException;

class KycDocumentQuery extends AbstractQuery implements KycDocumentQueryInterface
{
    protected $kycDocumentTranslator;

    public function __construct(
        $clientId,
        $clientPassword,
        $baseUrl,
        MangoPayApi $mangoPayApi,
        Logger $logger,
        KycDocumentTranslator $kycDocumentTranslator
    ) {
        $this->kycDocumentTranslator = $kycDocumentTranslator;
        parent::__construct($clientId, $clientPassword, $baseUrl,$mangoPayApi, $logger);
    }

    public function create(KycDocument $kycDocumentDto, $shouldSubmit = false)
    {
        $mangoKycDocument = $this->kycDocumentTranslator->convertDTOToMangoKycDocument($kycDocumentDto);
        try {
            $UserId = $kycDocumentDto->getOwnerId();
            if ($shouldSubmit) {
                $mangoKycDocument->Status = "VALIDATION_ASKED";
            }
            $mangoKycDocument = $this->mangoPayApi->Users->CreateKycDocument($UserId, $mangoKycDocument);

        } catch(ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            return new PartFireException($e->getMessage(), $e->getCode());
        } catch(Exception $e) {
            $this->logger->addError($e->getMessage());
            return new PartFireException($e->getMessage(), $e->getCode());
        }
        return $this->kycDocumentTranslator->convertMangoPayKycDocumentToDTO($mangoKycDocument);
    }

    public function submit(KycDocument $kycDocumentDto)
    {
        return $this->create($kycDocumentDto, true);
    }
}
