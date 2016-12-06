<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    06/12/2016
 * Time:    21:29
 * File:    KycDocumentPageQueryInterface.php
 **/

namespace PartFire\MangoPayBundle\Models;

use PartFire\MangoPayBundle\Models\DTOs\KycDocumentPage;

interface KycDocumentPageQueryInterface
{
    public function create(KycDocumentPage $kycDocumentPage);
}
