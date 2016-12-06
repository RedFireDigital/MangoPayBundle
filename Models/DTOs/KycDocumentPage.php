<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    06/12/2016
 * Time:    21:25
 * File:    KycDocumentPage.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;

class KycDocumentPage
{
    protected $kycDocumentId;

    protected $ownerId;

    protected $filePath;

    /**
     * @return mixed
     */
    public function getKycDocumentId()
    {
        return $this->kycDocumentId;
    }

    /**
     * @param mixed $kycDocumentId
     */
    public function setKycDocumentId($kycDocumentId)
    {
        $this->kycDocumentId = $kycDocumentId;
    }

    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * @param mixed $ownerId
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    }

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param mixed $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }
}
