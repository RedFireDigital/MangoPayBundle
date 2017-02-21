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

use PartFire\MangoPayBundle\Models\DTOs\KycDocument;
use PartFire\MangoPayBundle\Models\DTOs\KycDocumentPage;
use PartFire\MangoPayBundle\Models\KycDocumentPageQueryInterface;
use PartFire\MangoPayBundle\Models\KycDocumentQueryInterface;

class Kyc
{
    protected $kycDocumentQuery;

    protected $kycDocumentPageQuery;

    public function __construct(
        KycDocumentQueryInterface $kycDocumentQuery,
        KycDocumentPageQueryInterface $kycDocumentPageQuery
    ) {
        $this->kycDocumentQuery = $kycDocumentQuery;
        $this->kycDocumentPageQuery = $kycDocumentPageQuery;
    }

    /**
     * @param KycDocument $kycDocument
     * @return mixed
     */
    public function createDocument(KycDocument $kycDocument)
    {
        return $this->kycDocumentQuery->create($kycDocument, false);
    }

    public function submitDocument(KycDocument $kycDocument)
    {
        return $this->kycDocumentQuery->submit($kycDocument);
    }

    public function createPage(KycDocumentPage $kycDocumentPage)
    {
        return $this->kycDocumentPageQuery->create($kycDocumentPage);
    }

    public function getDocument(int $kycDocumentId)
    {
        return $this->kycDocumentQuery->get($kycDocumentId);
    }
}
