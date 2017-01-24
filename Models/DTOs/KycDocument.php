<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    02/12/2016
 * Time:    15:54
 * File:    KycDocument.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;

use PartFire\MangoPayBundle\MangoPayConstants;

class KycDocument
{
    protected $type = MangoPayConstants::IDENTITY_PROOF;

    protected $status;

    protected $tag;

    protected $ownerId;

    protected $documentId;

    protected $refusedReasonMessage;

    protected $refusedReasonType;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
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
    public function getDocumentId()
    {
        return $this->documentId;
    }

    /**
     * @param mixed $documentId
     */
    public function setDocumentId($documentId)
    {
        $this->documentId = $documentId;
    }

    /**
     * @return mixed
     */
    public function getRefusedReasonMessage()
    {
        return $this->refusedReasonMessage;
    }

    /**
     * @param mixed $refusedReasonMessage
     */
    public function setRefusedReasonMessage($refusedReasonMessage)
    {
        $this->refusedReasonMessage = $refusedReasonMessage;
    }

    /**
     * @return mixed
     */
    public function getRefusedReasonType()
    {
        return $this->refusedReasonType;
    }

    /**
     * @param mixed $refusedReasonType
     */
    public function setRefusedReasonType($refusedReasonType)
    {
        $this->refusedReasonType = $refusedReasonType;
    }
}
