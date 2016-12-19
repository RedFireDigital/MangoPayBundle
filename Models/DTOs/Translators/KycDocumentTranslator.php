<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    06/12/2016
 * Time:    16:00
 * File:    KycDocumentTranslator.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs\Translators;

use MangoPay\KycDocument;
use PartFire\MangoPayBundle\Models\DTOs\KycDocument as KycDocumentDto;

class KycDocumentTranslator
{
    public function convertDTOToMangoKycDocument(KycDocumentDto $kycDocumentDto)
    {
        $mangoKycDocument = new KycDocument();
        $mangoKycDocument->Tag = $kycDocumentDto->getTag();
        $mangoKycDocument->Type = $kycDocumentDto->getType();
        $mangoKycDocument->UserId = $kycDocumentDto->getOwnerId();
        if ($kycDocumentDto->getStatus()) {
            $mangoKycDocument->Status = $kycDocumentDto->getStatus();
        }
        return $mangoKycDocument;
    }

    public function convertMangoPayKycDocumentToDTO(KycDocument $mangoKycDocument)
    {
        $kycDocumentDto = new KycDocumentDto();
        $kycDocumentDto->setTag($mangoKycDocument->Tag);
        $kycDocumentDto->setType($mangoKycDocument->Type);
        $kycDocumentDto->setOwnerId($mangoKycDocument->UserId);
        $kycDocumentDto->setStatus($mangoKycDocument->Status);
        $kycDocumentDto->setDocumentId($mangoKycDocument->Id);
        return $kycDocumentDto;
    }
}