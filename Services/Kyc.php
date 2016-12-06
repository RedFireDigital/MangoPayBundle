<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    06/12/2016
 * Time:    20:07
 * File:    Kyc.php
 **/

namespace PartFire\MangoPayBundle\Services;

use PartFire\MangoPayBundle\Models\Adapters\KycDocumentQuery;
use PartFire\MangoPayBundle\Models\DTOs\KycDocument;

class Kyc
{
    protected $kycDocumentQuery;

    public function __construct(KycDocumentQuery $kycDocumentQuery)
    {
        $this->kycDocumentQuery = $kycDocumentQuery;
    }

    /**
     * @param KycDocument $kycDocument
     * @return mixed
     */
    public function createDocument(KycDocument $kycDocument)
    {
        return $this->kycDocumentQuery->create($kycDocument);
    }
}
