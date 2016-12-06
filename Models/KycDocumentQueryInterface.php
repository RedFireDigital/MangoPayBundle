<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    02/12/2016
 * Time:    15:49
 * File:    KycDocumentQueryInterface.php
 **/
namespace PartFire\MangoPayBundle\Models;

use PartFire\MangoPayBundle\Models\DTOs\KycDocument;

interface KycDocumentQueryInterface
{
    public function create(KycDocument $kycDocument);

    public function submit(KycDocument $kycDocument);


}