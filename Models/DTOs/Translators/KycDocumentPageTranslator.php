<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    06/12/2016
 * Time:    21:32
 * File:    KycDocumentPageTranslator.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs\Translators;


use MangoPay\KycPage;
use PartFire\MangoPayBundle\Models\DTOs\KycDocumentPage;

class KycDocumentPageTranslator
{
    public function convertDTOToMangoKycDocumentpage(KycDocumentPage $kycDocumentPageDto)
    {
        $fileData = file($kycDocumentPageDto->getFilePath());
        $mangoKycDocumentPage = new KycPage();
        $mangoKycDocumentPage->File = $fileData;
        return $mangoKycDocumentPage;
    }
}